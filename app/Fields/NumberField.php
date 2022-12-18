<?php

namespace App\Fields;

class NumberField extends Fields
{
    public function getType()
    {
        return 'number';
    }

    public function fill($object, $data)
    {
        $object->{$this->getName()} = $data[$this->getName()];
    }
}
