<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class KeyboardItem extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $user = Auth::user();
            $model->created_by = $user->first_name . ' ' . $user->last_name;
            $model->last_modified_by = $user->first_name . ' ' . $user->last_name;
            $model->record_status = 1;
        });

        static::updating(function ($model) {
            $user = Auth::user();
            $model->last_modified_by = $user->first_name . ' ' . $user->last_name;
        });

        static::deleting(function ($model) {
            // $model->photos()->delete();
            // do the rest of the cleanup...
        });
    }

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'keyboard_item';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    
    protected $primaryKey = 'keyboard_item_id';

    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'last_modified_date';

    protected $fillable = [
        'keyboard_sub_depatment_id',
        'description',
        'item_id',
        'position',
        'caption',
        'color',
        'key_image',
        'modify_option'
    ];
}
