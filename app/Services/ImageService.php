<?php
namespace App\Services;

class ImageService
{
    public function createImages($image):\GdImage
    {
        $image = imagecreatefromstring(file_get_contents($image));
        return $this->resizeImage($image);
    }

    public function resizeImage($image){
        $originalWidth = ImageSX($image);
        $originalHeight = ImageSY($image);
        $maxWidth = 500;
        if ($originalWidth > $maxWidth) {
            $ratio = $maxWidth / $originalWidth;
            $maxHeight = $originalHeight * $ratio;
        } else {
            $maxWidth = $originalWidth;
            $maxHeight = $originalHeight;
        }
        imagepalettetotruecolor($image);
        $resizedImage = imagecreatetruecolor($maxWidth, $maxHeight);
        imagealphablending($resizedImage, false);
        imagesavealpha($resizedImage, true);
        imagecopyresampled($resizedImage, $image, 0, 0, 0, 0, $maxWidth, $maxHeight, $originalWidth, $originalHeight);
        imagedestroy($image);
        return $resizedImage;
    }

    public function uploadImages($img, $id, $folder):void
    {
        $image = $this->createImages($img);
        $path = storage_path('app/public/'. $folder . '/' . $id);

        imagejpeg($image, $path.'.jpg', 100);
        imagewebp($image, $path.'.webp', 100);
        imageavif($image, $path.'.avif', 80);
        imagedestroy($image);
    }

    public function deleteImages($id, $folder):void
    {
        $path = storage_path('app/public/'. $folder . '/' . $id);
        if(file_exists($path . '.jpg')){
            unlink($path . '.jpg');
        }
        if(file_exists($path . '.webp')){
            unlink($path . '.webp');
        }
        if(file_exists($path . '.avif')){
            unlink($path . '.avif');
        }
    }
}
