<?php

namespace App\Fields;

class TextField extends Fields
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
