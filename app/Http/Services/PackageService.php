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
        return $this->model::where('id', $id)->with('technologies', 'platforms', 'images')->firstOrFail();
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
        $data['image'] = $this->imageUpload($data['image'], false);
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
            $this->imagesUpload($model, $data['images']);
        }
    }

    public function update($data, $id)
    {
        $model = $this->show($id);
        $data['slug'] = Str::slug($data['name']);
        if (!empty($data['image'])) {
            if (file_exists($data['image'])) {
                unlink($data['image']);
            }
            $image = imagecreatefromstring(file_get_contents($data['image']));
            ob_start();
            imagejpeg($image, NULL, 100);
            $cont = ob_get_contents();
            ob_end_clean();
            imagedestroy($image);
            $content = imagecreatefromstring($cont);
            $output = 'uploads/' . md5(rand(1000, 9999) . microtime()) . '.webp';
            imagewebp($content, $output);
            imagedestroy($content);
            $data['image'] = $output;
        }
        $model->update($data);
        if (isset($data['images'])) {
            $this->imagesUpload($model, $data['images']);
        }
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

        if (file_exists($item->image)) {
            unlink($item->image);
        }
        foreach ($item->images as $image) {
            if (file_exists($image->image)) {
                unlink($image->image);
            }
        }
        PackageImage::where('package_id', $id)->delete();
        $item->delete();
    }

    public function imageUpload($data, $update)
    {
        if ($update) {
            if (file_exists($data)) {
                unlink($data);
            }
        } else {
            if (file_exists('uploads/' . $data)) {
                unlink($data);
            }
        }

        return $this->getPathStr($data);
    }

    public function imagesUpload($model, $images)
    {
        $path = 'uploads';
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        foreach ($model->images as $image) {
            if (file_exists($image->image)) {
                unlink($image->image);
            }
        }
        PackageImage::where('package_id', $model->id)->delete();
        foreach ($images as $image) {
            $output = $this->getPathStr($image);
            PackageImage::create([
                'package_id' => $model->id,
                'image' => $output
            ]);
        }
    }

    /**
     * @param $data
     * @return string
     */
    public function getPathStr($data)
    {
        $image = imagecreatefromstring(file_get_contents($data));
        ob_start();
        imagejpeg($image, NULL, 100);
        $cont = ob_get_contents();
        ob_end_clean();
        imagedestroy($image);
        $content = imagecreatefromstring($cont);
        $output = 'uploads/' . md5(rand(1000, 9999) . microtime()) . '.webp';
        imagewebp($content, $output);
        imagedestroy($content);
        return $output;
    }
}
