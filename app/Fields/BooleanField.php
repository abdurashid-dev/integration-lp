<?php

namespace App\Fields;

class BooleanField extends Fields
{
    public function getType()
    {
        return 'boolean';
    }

    public function fill($object, $data)
    {
        $object->{$this->getName()} = $data[$this->getName()];
    }
}
