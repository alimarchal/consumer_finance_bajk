<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchOutstanding extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'branch_id',
        'customer_id',
        'user_id',
        'principal_outstanding_customer',
        'branch_outstanding_balance',
    ];
}
