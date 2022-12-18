<?php

namespace App\Http\Services;

use App\Models\Package;
use App\Models\PackageImage;
use App\Models\PackagePlatform;
use App\Models\PackageTechnology;
use App\Models\Platform;
use App\Models\Technology;
use Illuminate\Support\Str;

class PackageService extends AbstractService
{
    protected $model = Package::class;

    public function show($id)
    {
        return $this->model::where('id', $id)->with('technologies', 'platforms', 'images')->first();
    }

    public function create()
    {
        $technologies = Technology::all();
        $platforms = Platform::all();
        $item = new $this->model;
        return [$technologies, $platforms, $item];
    }

    public function store(array $data)
    {
        $data['slug'] = Str::slug($data['name']);
        $model = $this->model::create($data);
        foreach ($data['technologies'] as $technology) {
            PackageTechnology::create([
                'package_id' => $model->id,
                'technology_id' => $technology
            ]);
        }
        foreach ($data['platforms'] as $platform) {
            PackagePlatform::create([
                'package_id' => $model->id,
                'platform_id' => $platform
            ]);
        }
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

    public function update($data, $id)
    {
        $model = $this->show($id);
        $data['slug'] = Str::slug($data['name']);
        $model->update($data);
        PackageTechnology::where('package_id', $id)->delete();
        foreach ($data['technologies'] as $technology) {
            PackageTechnology::create([
                'package_id' => $model->id,
                'technology_id' => $technology
            ]);
        }
        PackagePlatform::where('package_id', $id)->delete();
        foreach ($data['platforms'] as $platform) {
            PackagePlatform::create([
                'package_id' => $model->id,
                'platform_id' => $platform
            ]);
        }
        if (isset($data['images'])) {
            $path = 'uploads';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            foreach ($model->images as $image) {
                if (file_exists($image->image)) {
                    unlink($image->image);
                }
            }
            PackageImage::where('package_id', $id)->delete();
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

    public function edit($id)
    {
        $item = $this->show($id);
        $technologies = Technology::all();
        $platforms = Platform::all();
        return [$technologies, $platforms, $item];
    }

    public function destroy($id)
    {
        $item = $this->show($id);
        PackagePlatform::where('package_id', $id)->delete();
        PackageTechnology::where('package_id', $id)->delete();
        foreach ($item->images as $image) {
            if (file_exists($image->image)) {
                unlink($image->image);
            }
        }
        PackageImage::where('package_id', $id)->delete();
        $item->delete();
    }
}
