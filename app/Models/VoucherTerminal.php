<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class VoucherTerminal extends Model
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

    // The table associated with the model.
    protected $table = 'voucher_terminal';

    // The primary key associated with the table.
    protected $primaryKey = 'voucher_terminal_id';

    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'last_modified_date';

    protected $fillable = [
        'voucher_id',
        'terminal_id',
    ];
}
