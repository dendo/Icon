<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Dendo\Icon\Structures;

/**
 * Description of StructureInterface
 *
 * @author artur
 */
interface StructureInterface {
    
    public function pack();
    public function unpack($binaryData);
}
