<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

/**
 * Class Productdetail
 *
 * @package App
 * @property string $name
 * @property string $type
 * @property string $parent_product
*/
class Productdetail extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    
    protected $fillable = ['name', 'type', 'parent_product_id'];
    protected $appends = ['image', 'image_link', 'uploaded_image'];
    protected $with = ['media'];
    

    public static function storeValidation($request)
    {
        return [
            'name' => 'max:191|required',
            'type' => 'max:191|required',
            'parent_product_id' => 'integer|exists:productdetails,id|max:4294967295|required',
            'vendor' => 'array|nullable',
            'vendor.*' => 'integer|exists:users,id|max:4294967295|nullable',
            'image' => 'nullable',
            'image.*' => 'file|image|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'name' => 'max:191|required',
            'type' => 'max:191|required',
            'parent_product_id' => 'integer|exists:productdetails,id|max:4294967295|required',
            'vendor' => 'array|nullable',
            'vendor.*' => 'integer|exists:users,id|max:4294967295|nullable',
            'image' => 'sometimes',
            'image.*' => 'file|image|nullable'
        ];
    }

    

    public function getImageAttribute()
    {
        return [];
    }

    public function getUploadedImageAttribute()
    {
        return $this->getMedia('image')->keyBy('id');
    }

    /**
     * @return string
     */
    public function getImageLinkAttribute()
    {
        $image = $this->getMedia('image');
        if (! count($image)) {
            return null;
        }
        $html = [];
        foreach ($image as $file) {
            $html[] = '<a href="' . $file->getUrl() . '" target="_blank">' . $file->file_name . '</a>';
        }

        return implode('<br/>', $html);
    }
    
    public function parent_product()
    {
        return $this->belongsTo(Productdetail::class, 'parent_product_id')->withTrashed();
    }
    
    public function vendor()
    {
        return $this->belongsToMany(User::class, 'productdetail_user');
    }    

}
