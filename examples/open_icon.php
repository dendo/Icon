<?php

require('../src/Dendo/IconToolkit/Icon.php');
require('../src/Dendo/IconToolkit/IconReader.php');
require('../src/Dendo/IconToolkit/Structures/StructureInterface.php');
require('../src/Dendo/IconToolkit/Structures/IconDir.php');
require('../src/Dendo/IconToolkit/Structures/IconDirEntry.php');
require('../src/Dendo/IconToolkit/Structures/ImageData.php');
require('../src/Dendo/IconToolkit/Structures/BitmapInformationHeader.php');

$reader = new \Dendo\IconToolkit\IconReader();
//$reader->open('../tests/data/google_favicon.ico');
$reader->open('../tests/data/github_favicon.ico');
//$reader->open('../tests/data/transparent_1x1.ico');
$icon = $reader->open('../tests/data/rgbwa_32x32.ico');
//$reader->open('../tests/data/red_1x1.ico');


$icon->addFromImageFile('../tests/data/16x16.png');

$writer = new \Dendo\IconToolkit\IconWrite();
$writer->write($icon,'../tests/data/test.ico');