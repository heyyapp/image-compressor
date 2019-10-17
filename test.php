<?php 

require_once "CompressImage.php";

if(isset($_FILES['image'])) {

    if(!empty($_FILES['image']) && !is_null($_FILES['image'])) {

        CompressImage::setQuality(50);

        CompressImage::setOutputPrefix("media");

        CompressImage::setOutputPath("image");

        print_r(CompressImage::compress($_FILES['image']['tmp_name']));
    }

}