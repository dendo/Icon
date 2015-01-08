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
class IconDir implements StructureInterface {
    const STRUCTURE_LENGTH_IN_BYTES = 6;

    protected $reserved = 0;
    
    protected $type = 0;
    
    protected $numberOfImages = 0;
    
    public function __construct($binaryData = null) {
        if($binaryData !== null) {
            $this->unpack($binaryData);
        }
    }
    
    public function pack() {
        
    }
    
    public function unpack($binaryData) {
        $data = unpack("vreserved/vtype/vnumberOfImages",$binaryData);
        if($data['reserved'] !== 0) {
            throw new \Exception();
        }
        if($data['type'] !== 1) {
            throw new \Exception();
        }
        
        $this->reserved = $data['reserved'];
        $this->type = $data['type'];
        $this->numberOfImages = $data['numberOfImages'];
    }
    /**
     * 
     * @return int
     */
    public function getReserved() {
        return $this->reserved;
    }

    public function getType() {
        return $this->type;
    }

    public function getNumberOfImages() {
        return $this->numberOfImages;
    }

    public function setReserved($reserved) {
        $this->reserved = $reserved;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setNumberOfImages($numberOfImages) {
        $this->numberOfImages = $numberOfImages;
    }


}
