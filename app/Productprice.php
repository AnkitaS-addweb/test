<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Productprice
 *
 * @package App
 * @property string $vendor
 * @property string $price
 * @property string $product
*/
class Productprice extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['price', 'vendor_id', 'product_id'];
    

    public static function storeValidation($request)
    {
        return [
            'vendor_id' => 'integer|exists:users,id|max:4294967295|nullable',
            'price' => 'max:191|nullable',
            'product_id' => 'integer|exists:productdetails,id|max:4294967295|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'vendor_id' => 'integer|exists:users,id|max:4294967295|nullable',
            'price' => 'max:191|nullable',
            'product_id' => 'integer|exists:productdetails,id|max:4294967295|nullable'
        ];
    }

    

    
    
    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }
    
    public function product()
    {
        return $this->belongsTo(Productdetail::class, 'product_id')->withTrashed();
    }
    
    
}
