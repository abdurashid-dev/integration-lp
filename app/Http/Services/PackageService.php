<?php

namespace App\Http\Services;

use App\Models\Package;
use App\Models\PackageImage;

class PackageService extends AbstractService
{
    protected $model = Package::class;

    public function store(array $data)
    {
        $model = $this->model::create($data);
        if (isset($data['images'])) {
            $path = 'uploads';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            foreach ($data['images'] as $image) {
                $imageName = md5(rand(1000, 9999) . microtime()) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path($path . '/'), $imageName);
                PackageImage::create([
                    'package_id' => $model->id,
                    'image' => $path . '/' . $imageName
                ]);
            }
        }
    }
}
