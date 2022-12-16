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
            $path = 'uploads';
            $image = $data[$this->getName()];
            $imageName = md5(rand(1000, 9999) . microtime()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path($path . '/'), $imageName);
            $object->{$this->getName()} = $path . '/' . $imageName;
        }
    }
}
