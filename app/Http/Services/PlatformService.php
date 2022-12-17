<?php

namespace App\Http\Services;

use App\Fields\ImageField;
use App\Fields\TextField;
use App\Models\PackagePlatform;
use App\Models\Platform;

class PlatformService extends AbstractService
{
    protected $model = Platform::class;

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
        PackagePlatform::where('platform_id', $id)->delete();
        $item->delete();
    }
}
