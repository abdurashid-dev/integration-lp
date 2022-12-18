<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'type', 'link', 'status', 'order', 'slug', 'image'];

    public static function search($search)
    {
        return empty($search)
            ? static::query()
            : static::query()->where('id', 'like', '%' . $search . '%')
                ->orWhere('name', 'like', '%' . $search . '%')
                ->orWhere('price', 'like', '%' . $search . '%');
    }

    public function platforms()
    {
        return $this->hasMany(PackagePlatform::class);
    }

    public function technologies()
    {
        return $this->hasMany(PackageTechnology::class);
    }

    public function images()
    {
        return $this->hasMany(PackageImage::class);
    }
}
