<?php 

require_once "CompressImage.php";

if(isset($_FILES['image'])) {

    if(!empty($_FILES['image']) && !is_null($_FILES['image'])) {

        // Image quality
        CompressImage::setQuality(50);


        // Pass the Folder name
        // where compress images are going to store
        CompressImage::setOutputPath("image");

        print_r(CompressImage::compress($_FILES['image']['tmp_name']));
    }

}