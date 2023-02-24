<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyboardSubDepartment extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'keyboard_sub_department';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    
    protected $primaryKey = 'keyboard_sub_department_id';
}
