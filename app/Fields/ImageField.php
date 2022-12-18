<?php

namespace App\Fields;

class ImageField extends Fields
{
    protected $defaultRules = 'sometimes';

    public function getType()
    {
        return 'image';
    }

    public function fill($object, $data)
    {
        if (isset($data[$this->getName()])) {
            if (isset($object->image)) {
                if (file_exists('uploads/' . $object->image)) {
                    unlink($object->image);
                }
            }
            $file = $data[$this->getName()];
            $image = imagecreatefromstring(file_get_contents($file));
            ob_start();
            imagejpeg($image, NULL, 100);
            $cont = ob_get_contents();
            ob_end_clean();
            imagedestroy($image);
            $content = imagecreatefromstring($cont);
            $output = 'uploads/' . md5(rand(1000, 9999) . microtime()) . '.webp';
            imagewebp($content, $output);
            imagedestroy($content);
            $object->{$this->getName()} = $output;
        }
    }
}
