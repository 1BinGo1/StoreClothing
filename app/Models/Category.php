<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    protected $table = 'categories';
    protected $guarded = ['id'];

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function section(){
        return $this->belongsTo(Section::class);
    }
}
