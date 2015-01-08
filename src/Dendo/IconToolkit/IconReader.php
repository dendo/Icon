<?php

/*
 * All values in ICO/CUR files are represented in little-endian byte order.
 */

namespace Dendo\IconToolkit;
use Dendo\IconToolkit\Structures\IconDir;
use Dendo\IconToolkit\Structures\IconDirEntry;

class IconReader {
    
    /**
     * 
     * @param string $filePath path of the .ico file
     */
    public function open($filename) {
        $f = fopen($filename, "rb");
        
        $icon = new Icon();
        //read header
        $header = fread($f, IconDir::STRUCTURE_LENGTH_IN_BYTES);
        $iconDir = new IconDir($header);
        $icon->setIconDir($iconDir);

        for($i=0;$i<$iconDir->getNumberOfImages();$i++) {
            $entry = fread($f, IconDirEntry::STRUCTURE_LENGTH_IN_BYTES);
            $iconDirEntry = new IconDirEntry($entry);
            $icon->addIconDirEntry($iconDirEntry);
        }

        foreach($icon->getIconDirEntries() as $iconDirEntry) {
            $offset = $iconDirEntry->getImageDataOffset();
            $size = $iconDirEntry->getImageDataSize();
            fseek($f,$offset);
            
            $data = fread($f,$size);
            $imageData = new Structures\ImageData($data);
           

        }
        
        
        return $icon;
    }
}
