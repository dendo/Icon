<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Dendo\IconToolkit\Structures;

/**
 * Description of IconDir
 *
 * @author artur
 */
class BitmapInformationHeader implements StructureInterface {
    const STRUCTURE_LENGTH_IN_BYTES = 40;
    
    protected $headerSize = 0;
    
    protected $width = 0;
    
    protected $height = 0;
    
    protected $planes = 0;
    
    protected $bits = 0;
    
    protected $compression = 0;
    
    protected $imagesize = 0;
    
    protected $xres = 0;
    
    protected $yres = 0;
    
    protected $colors = 0;
    
    protected $important = 0;
    
    public function __construct($binaryData = null) {
        if($binaryData !== null) {
            $this->unpack($binaryData);
        }
    }
    
    public function pack() {
        
    }
    
    public function unpack($binaryData) {
        $data = unpack('VheaderSize/Vwidth/Vheight/vplanes/vbits/Vcompression/Vimagesize/Vxres/Vyres/Vcolors/Vimportant',$binaryData);
        $this->headerSize = $data['headerSize'];
        $this->width = $data['width'];
        $this->height = $data['height'];
        $this->planes = $data['planes'];
        $this->bits = $data['bits'];
        $this->compression = $data['compression'];
        $this->imagesize = $data['imagesize'];
        $this->xres = $data['xres'];
        $this->yres = $data['yres'];
        $this->colors = $data['colors'];
        $this->important = $data['important']; 
    }
    
    public function getHeaderSize() {
        return $this->headerSize;
    }

    public function getWidth() {
        return $this->width;
    }

    public function getHeight() {
        return $this->height;
    }

    public function getPlanes() {
        return $this->planes;
    }

    public function getBits() {
        return $this->bits;
    }

    public function getCompression() {
        return $this->compression;
    }

    public function getImagesize() {
        return $this->imagesize;
    }

    public function getXres() {
        return $this->xres;
    }

    public function getYres() {
        return $this->yres;
    }

    public function getColors() {
        return $this->colors;
    }

    public function getImportant() {
        return $this->important;
    }

    public function setHeaderSize($headerSize) {
        $this->headerSize = $headerSize;
        return $this;
    }

    public function setWidth($width) {
        $this->width = $width;
        return $this;
    }

    public function setHeight($height) {
        $this->height = $height;
        return $this;
    }

    public function setPlanes($planes) {
        $this->planes = $planes;
        return $this;
    }

    public function setBits($bits) {
        $this->bits = $bits;
        return $this;
    }

    public function setCompression($compression) {
        $this->compression = $compression;
        return $this;
    }

    public function setImagesize($imagesize) {
        $this->imagesize = $imagesize;
        return $this;
    }

    public function setXres($xres) {
        $this->xres = $xres;
        return $this;
    }

    public function setYres($yres) {
        $this->yres = $yres;
        return $this;
    }

    public function setColors($colors) {
        $this->colors = $colors;
        return $this;
    }

    public function setImportant($important) {
        $this->important = $important;
        return $this;
    }


    
}
