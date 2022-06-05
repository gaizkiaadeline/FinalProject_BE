<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // kasi tau dia paka table ini, karena ga s
    protected $table = 'categories';

    protected $fillable = ['title'];

    public function blog(){

        return $this->hasMany('App\Models\Blog', 'category_id');
    }



    
}
