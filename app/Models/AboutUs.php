<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    protected $fillable = ['text', 'image', 'partner_id', 'employee_id'];

    public function partners()
    {
        return $this->belongsToMany(Partner::class, 'partners');
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employees');
    }
}
