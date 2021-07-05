<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'content'
    ];

    public function getRouteKey() {
        return parent::getRouteKey(); // TODO: Change the autogenerated stub
    }

}
