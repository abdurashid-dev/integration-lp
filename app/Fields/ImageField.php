<?php

namespace App\Fields;

class ImageField extends Fields
{
    protected $defaultRules = 'sometimes';

    public function getType()
    {
        return 'file';
    }

    public function fill($object, $data)
    {
        if (!is_null($object->image)) {
            unlink($object->image);
        }
        $path = 'uploads';
        $image = $data[$this->getName()];
        $imageName = md5(rand(1000, 9999) . microtime()) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path($path . '/'), $imageName);
        $object->{$this->getName()} = $path . '/' . $imageName;
    }
}
