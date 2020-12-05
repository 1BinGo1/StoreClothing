<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;
    protected $table = 'baskets';
    protected $fillable = ['quantity'];

    public function products(){
        return $this->belongsToMany(Product::class, 'basket_product')
            ->withPivot([
                'quantity',
        ])
            ->withTimestamps();
    }

    public static function change($product_id, $count = 0){
        $basket = self::query()->where('user_id', auth()->id())->first();
        if (!empty($basket)){
            $pivot = $basket->products()->where('basket_id', $basket->id)->where('product_id', $product_id)->first();
            if (!empty($pivot)){
                $pivot = $pivot->pivot;
                $quantity = $pivot->quantity + $count;
                if ($quantity <= 0){
                    $pivot->delete();
                }
                else{
                    $pivot->update(['quantity' => $quantity]);
                }
            }
            else{
                abort(404);
            }
        }
        else{
            abort(404);
        }
    }

    public static function remove($product_id){
        $basket = self::query()->where('user_id', auth()->id())->first();
        if (!empty($basket)){
            $pivot = $basket->products()->where('basket_id', $basket->id)->where('product_id', $product_id)->first();
            if (!empty($pivot)){
                $pivot = $pivot->pivot;
                $pivot->delete();
            }
            else{
                abort(404);
            }
        }
        else{
            abort(404);
        }
    }

}
