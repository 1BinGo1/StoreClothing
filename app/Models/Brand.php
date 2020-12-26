<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Brand extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    protected $table = 'brands';
    protected $guarded = ['id'];

    public function setImgAttribute($value)
    {
        $attribute_name = "img";

        if ($value == null) {
            if (!empty($this->attributes[$attribute_name])){
                if (file_exists($_SERVER['DOCUMENT_ROOT'] . $this->{$attribute_name})){
                    unlink($_SERVER['DOCUMENT_ROOT'] . $this->{$attribute_name});
                }
            }
            $this->attributes[$attribute_name] = null;
        }
        if ($value != null){
            if (!empty($this->attributes[$attribute_name])){
                if (file_exists($_SERVER['DOCUMENT_ROOT'] . $this->{$attribute_name})){
                    unlink($_SERVER['DOCUMENT_ROOT'] . $this->{$attribute_name});
                }
            }
            $code_image = strstr($value, 'base64');
            $code_image = substr($code_image, 7);
            $new_image = imagecreatefromstring(base64_decode($code_image));
            $file_name = "/storage/brands/" . md5(time()) . ".png";
            imagepng($new_image, $_SERVER['DOCUMENT_ROOT'] . $file_name);
            imagedestroy($new_image);
            $this->attributes[$attribute_name] = $file_name;
        }
    }

}
