<?php

namespace App\Http\Services;

use App\Fields\TextField;
use App\Models\Package;

class PackageService extends AbstractService
{
    protected $model = Package::class;

    public function getFields()
    {
        return [
            TextField::make('name')
        ];
    }
}
