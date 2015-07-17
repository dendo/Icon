<?php
namespace Dendo\Icon;

use Dendo\Icon\Structures\IconDir;
use Dendo\Icon\Structures\IconDirEntry;

/**
 * Description of Icon
 *
 * @author dendo
 */
class Icon {
    /**
     *
     * @var IconDir
     */
    protected $iconDir;
    /**
     *
     * @var IconDirEntry[] 
     */
    protected $iconDirEntries = array();
    
    protected $imageEntries = array();
    
    public function __construct() {
       $this->iconDir = new IconDir;
    }
    
    /**
     * 
     * @return IconDir
     */
    public function getIconDir() {
        return $this->iconDir;
    }
    /**
     * 
     * @param \Dendo\Icon\Structures\IconDir $iconDir
     * @return Icon
     */
    public function setIconDir(IconDir $iconDir) {
        $this->iconDir = $iconDir;
        return $this;
    }

    public function addIconDirEntry(IconDirEntry $iconDirEntry) {
        $this->iconDirEntries[] = $iconDirEntry;
    }
    /**
     * 
     * @return IconDirEntry[]
     */
    public function getIconDirEntries() {
        return $this->iconDirEntries;
    }


}
