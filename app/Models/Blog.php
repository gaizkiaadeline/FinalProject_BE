<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function category(){

        return $this->belogsTo('App\Models\Category', 'category_id', 'id');
    }

    public function user(){

        return $this->belogsTo('App\Models\User', 'user_id', 'id');
    }
}
