<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionPaymentDetail extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transaction_payment_detail';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'transaction_payment_detail_id';

    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'last_modified_date';

    protected $fillable = [
        'till_id',
        'transaction_id',
        'payment_type',
        'amount'
    ];
}
