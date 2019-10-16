<?php 

class CompressImage {

    // image quality for reducing size
    private static $quality = 75;

    // output image path
    private static $outputPath = null;


    // set image quality
    public static function setQuality(int $quality) {
        self::$quality = $quality;
    }

    // set output path
    public static function setOutputPath(string $path) {
        self::$outputPath = $path;
    }

    // compress image
    public static function compress($source) {

        $info = getimagesize($source);

        if ($info['mime'] == 'image/jpeg') 
            $image = imagecreatefromjpeg($source);

        elseif ($info['mime'] == 'image/gif') 
            $image = imagecreatefromgif($source);

        elseif ($info['mime'] == 'image/png') 
            $image = imagecreatefrompng($source);

        if(imagejpeg($image, self::$outputPath, self::$quality)) {
            return self::$outputPath;
        }
        
        return NULL;

    }
    

}