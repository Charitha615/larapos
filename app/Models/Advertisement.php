<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Advertisement extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $user = Auth::user();
            $model->created_by = $user->first_name . ' ' . $user->last_name;
            $model->last_modified_by = $user->first_name . ' ' . $user->last_name;
        });

        static::updating(function ($model) {
            $user = Auth::user();
            //$model->last_modified_by = $user->first_name . ' ' . $user->last_name;
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
    protected $table = 'advertisement';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'advertisement_id';

    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'last_modified_date';

    protected $fillable = [
        'name',
        'contents',
        'terminal',
        'display_effect',
        'duration',
        'no_end_date',
        'start_date',
        'end_date',
        'status'
    ];
}
