<?php

namespace App\Http\Services;

use App\Fields\ImageField;
use App\Fields\TextField;
use App\Models\PackageTechnology;
use App\Models\Technology;

class TechnologyService extends AbstractService
{
    protected $model = Technology::class;

    public function getFields()
    {
        return [
            TextField::make('name')->setRules('required'),
            TextField::make('link')->setRules('sometimes'),
            ImageField::make('image')
        ];
    }

    public function destroy($id)
    {
        $item = $this->show($id);
        PackageTechnology::where('technology_id', $id)->delete();
        $item->delete();
    }
}
