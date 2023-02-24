<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transaction';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'transaction_id';

    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'last_modified_date';

    protected $fillable = [
        'transaction_id',
        'till_id',
        'total_amount',
        'discount',
        'net_amount',
        'reciept_balance',
        'discount_amount'
    ];
}
