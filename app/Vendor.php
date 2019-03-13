<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Vendor
 *
 * @package App
 * @property string $user
 * @property string $contact_person_name
 * @property string $contact_person_phone
 * @property string $contact_person_email
*/
class Vendor extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['contact_person_name', 'contact_person_phone', 'contact_person_email', 'user_id'];
    

    public static function storeValidation($request)
    {
        return [
            'user_id' => 'integer|exists:users,id|max:4294967295|required',
            'contact_person_name' => 'max:191|required',
            'contact_person_phone' => 'max:191|nullable',
            'contact_person_email' => 'email|max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'user_id' => 'integer|exists:users,id|max:4294967295|required',
            'contact_person_name' => 'max:191|required',
            'contact_person_phone' => 'max:191|nullable',
            'contact_person_email' => 'email|max:191|nullable'
        ];
    }

    

    
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    
}
