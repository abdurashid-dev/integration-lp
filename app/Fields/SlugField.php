<?php

namespace App\Fields;

use Illuminate\Support\Str;

class SlugField extends Fields
{
    public function getType()
    {
        return 'slug';
    }

    public function fill($object, $data)
    {
        $object->{'slug'} = Str::slug($data['name']);
    }
}
