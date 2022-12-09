<?php

namespace App\Fields;

class ImageField extends Fields
{
    public function getType()
    {
        return 'text';
    }

    public function fill($object, $data)
    {
        $object->{$this->getName()} = $data[$this->getName()];
    }
}
