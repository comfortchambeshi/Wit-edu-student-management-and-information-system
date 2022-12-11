<?php
require_once "vendor/autoload.php";
use thiagoalessio\TesseractOCR\TesseractOCR;
echo (new TesseractOCR('image1.jpeg'))->run();
?>

    