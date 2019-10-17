<?php 

class CompressImage {

    private static $quality = 75;

    private static $outputPath = null;

    private static $outputPrefix = "image";

    private static $outputImageName = null;

    
    public static function setQuality(int $quality) {
        self::$quality = $quality;
    }


    public static function setOutputPath(string $path) {
        self::$outputImageName = self::$outputPrefix . "-" . uniqid() . ".jpg";
        self::$outputPath = trim($path, "/") . "/" . self::$outputImageName;
    }


    static function setOutputPrefix(string $prefix) {
        self::$outputPrefix = $prefix;
    }


    public static function compress($source) {

        $info = getimagesize($source);

        if ($info['mime'] == 'image/jpeg') 
            $image = imagecreatefromjpeg($source);

        elseif ($info['mime'] == 'image/gif') 
            $image = imagecreatefromgif($source);

        elseif ($info['mime'] == 'image/png') 
            $image = imagecreatefrompng($source);

        imagejpeg($image, self::$outputPath, self::$quality);
            
        return array(
            "path" => self::$outputPath,
            "name" => self::$outputImageName
        );
    }
    

}