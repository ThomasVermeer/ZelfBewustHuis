<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $table = 'partners';
    protected $guarded = [];

    public function aboutUs()
    {
        return $this->belongsToMany(AboutUs::class);
    }
}
