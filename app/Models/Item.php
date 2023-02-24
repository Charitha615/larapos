<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Kyslik\ColumnSortable\Sortable;

class Item extends Model
{
    use HasFactory;
    use Sortable;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $user = Auth::user();
            $model->created_by = $user->first_name . ' ' . $user->last_name;
            $model->last_modified_by = $user->first_name . ' ' . $user->last_name;
            $model->record_status = 1;
            $model->open_price == null ? $model->open_price = 0 : $model->open_price = 1;
            $model->open_description == null ? $model->open_description = 0 : $model->open_description = 1;
            $model->modifier_popup == null ? $model->modifier_popup = 0 : $model->modifier_popup = 1;
            $model->inc_price_in_kp == null ? $model->inc_price_in_kp = 0 : $model->inc_price_in_kp = 1;
        });

        static::updating(function ($model) {
            $user = Auth::user();
            $model->open_price == null ? $model->open_price = 0 : $model->open_price = 1;
            $model->open_description == null ? $model->open_description = 0 : $model->open_description = 1;
            $model->modifier_popup == null ? $model->modifier_popup = 0 : $model->modifier_popup = 1;
            $model->inc_price_in_kp == null ? $model->inc_price_in_kp = 0 : $model->inc_price_in_kp = 1;
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
    protected $table = 'item';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'item_id';

    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'last_modified_date';

    protected $fillable = [
        'description',
        'plu_no',
        'department_id',
        // 'supplier_id',
        'unit_id',
        // 'number_of_units',
        'tax_id',
        // 'carton_cost',
        'open_price',
        'open_description',
        'modifier_popup',
        'inc_price_in_kp',
        // 'no_of_dockets',
        'kp_description',
    ];

    public $sortable = ['description', 'plu_no'];
    public function department()
    {
        return $this->belongsTo(Department::class,'department_id','department_id');
    }
}
