<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Dendo\Icon\Structures;

/**
 * Description of IconDirEntry
 *
 * @author artur
 */
class IconDirEntry implements StructureInterface {
    
    const STRUCTURE_LENGTH_IN_BYTES = 16;
    
    protected $imageWidth;
    
    protected $imageHeight;
    
    protected $numberOfColors;
    
    protected $reserved;
    
    protected $colorPlanes;
    
    protected $bitsPerPixel;
    
    protected $imageDataSize;
    
    protected $imageDataOffset;
    
    public function __construct($binaryData = null) {
        if($binaryData !== null) {
            $this->unpack($binaryData);
        }
    }
    
    public function pack() {
        
    }
    
    public function unpack($binaryData) {
        $data = unpack("cimageWidth/cimageHeight/cnumberOfColors/creserved/vcolorPlanes/vbitsPerPixel/VimageDataSize/VimageDataOffset",$binaryData);
         
        $this->imageWidth = $data['imageWidth'];
        $this->imageHeight = $data['imageHeight'];
        $this->numberOfColors = $data['numberOfColors'];
        $this->colorPlanes = $data['colorPlanes'];
        $this->bitsPerPixel = $data['bitsPerPixel'];
        $this->imageDataSize = $data['imageDataSize'];
        $this->imageDataOffset = $data['imageDataOffset'];
    }
    
    public function getImageWidth() {
        return $this->imageWidth;
    }

    public function getImageHeight() {
        return $this->imageHeight;
    }

    public function getNumberOfColors() {
        return $this->numberOfColors;
    }

    public function getReserved() {
        return $this->reserved;
    }

    public function getColorPlanes() {
        return $this->colorPlanes;
    }

    public function getBitsPerPixel() {
        return $this->bitsPerPixel;
    }

    public function getImageDataSize() {
        return $this->imageDataSize;
    }

    public function getImageDataOffset() {
        return $this->imageDataOffset;
    }

    public function setImageWidth($imageWidth) {
        $this->imageWidth = $imageWidth;
    }

    public function setImageHeight($imageHeight) {
        $this->imageHeight = $imageHeight;
    }

    public function setNumberOfColors($numberOfColors) {
        $this->numberOfColors = $numberOfColors;
    }

    public function setReserved($reserved) {
        $this->reserved = $reserved;
    }

    public function setColorPlanes($colorPlanes) {
        $this->colorPlanes = $colorPlanes;
    }

    public function setBitsPerPixel($bitsPerPixel) {
        $this->bitsPerPixel = $bitsPerPixel;
    }

    public function setImageDataSize($imageDataSize) {
        $this->imageDataSize = $imageDataSize;
    }

    public function setImageDataOffset($imageDataOffset) {
        $this->imageDataOffset = $imageDataOffset;
    }


}
