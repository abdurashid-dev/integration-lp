<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackagePlatform extends Model
{
    use HasFactory;

    protected $fillable = ['package_id', 'platform_id'];

    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }
}
