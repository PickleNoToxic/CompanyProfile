<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function galleries()
    {
        return $this->hasMany(CompanyGallery::class);
    }

    public function lintree()
    {
        return $this->hasOne(Linktree::class);
    }
}
