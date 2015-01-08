<?php

namespace Dendo\IconToolkit\Structures;


class ImageData {
    const PNG_HEADER = "\x89\x50\x4E\x47\x0D\x0A\x1A\x0A";
    
    protected $bitmapInformationHeader;
    
    protected $pixelData;
    
    
    public function __construct($binaryData = null) {
        if($binaryData !== null) {
            $this->unpack($binaryData);
        }
    }
    
    public function unpack($binaryData) {
        if(substr($binaryData,0,strlen(static::PNG_HEADER)) == static::PNG_HEADER) {
            throw new \Exception("PNG image data not supported");
        }
        
        $bitmapInformationHeader = new BitmapInformationHeader($binaryData,substr($binaryData,0,BitmapInformationHeader::STRUCTURE_LENGTH_IN_BYTES));
        
        $iconHeight = $bitmapInformationHeader->getHeight()/2;
        
        $pixelData = substr($binaryData,$bitmapInformationHeader->getHeaderSize());
        $pixelArray = array();
        
        $rowSizeInBits = $bitmapInformationHeader->getBits() * $bitmapInformationHeader->getWidth();
        $paddingInBits = $rowSizeInBits % 32;
        
        $rowSizeInBytes = ($rowSizeInBits + $paddingInBits) / 8;
        

        for($i=0;$i<$iconHeight;$i++) {
            $row = substr($pixelData,$i*$rowSizeInBytes,$rowSizeInBytes);
            for($j=0;$j<$bitmapInformationHeader->getWidth();$j++) {
                
                if($bitmapInformationHeader->getBits() == 32) { // alpha channelos
                    $pixel = substr($pixelData,$i*$rowSizeInBytes+$j*4,3) . chr(0);
                    $alpha = substr($pixelData,$i*$rowSizeInBytes+$j*4+3,1) . chr(0);
                    //$pixel = substr($pixelData,$i*$rowSizeInBytes+$j*4,4) . chr(0);
                    $color = unpack('V',$pixel);
                    $alpha = unpack('C',$alpha);
                    $alpha = $alpha[1];
                    
                    $rgb = $color[1];
                    
                    $r = ($rgb >> 16) & 0xFF;
                    $g = ($rgb >> 8) & 0xFF;
                    $b = $rgb & 0xFF;
                    
                    
                    $this->pixelData[$j][$iconHeight-1 - $i] = array($r, $g, $b, $alpha);
                    
                    
                } elseif($bitmapInformationHeader->getBits() == 24) {
                    die('implement');
                    
                    $pixel = substr($pixelData,$i*$rowSizeInBytes+$j*4,3) . chr(0);
                    $color = unpack('V',$pixel);
                    imagesetpixel($res,$j,$iconHeight-1 - $i,$color[1]);
                }
                
            }
        }
        //var_dump($this->pixelData[0][0]); exit;
        $this->dumpPNG();
        
    }
    
    public function dumpPNG() {
        $res = imagecreatetruecolor(count($this->pixelData),count($this->pixelData[0]));
        imagealphablending($res, false);
        imagesavealpha($res, true);
        imagefilledrectangle($res, 0, 0, imagesx($res), imagesy($res), imagecolorallocatealpha($res, 0, 0, 0, 127));
        for($x=0;$x<count($this->pixelData);$x++) {
            for($y=0;$y<count($this->pixelData[$x]);$y++) {
                $pixel = $this->pixelData[$x][$y];
                $r = $pixel[0];
                $g = $pixel[1];
                $b = $pixel[2];
                $a = 127 - $pixel[3] / 2;
                
                imagesetpixel($res,$x,$y,  imagecolorallocatealpha($res, $r, $g, $b, $a));
            }
        }
        
        header('Content-type: image/png');
        imagepng($res);
    }
}
