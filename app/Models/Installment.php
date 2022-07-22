<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    use HasFactory;

    public $fillable = [
        'customer_id',
        'user_id',
        'date',
        'no_of_installment',
        'days_passed_overdue',
        'principal_amount',
        'mark_up_amount',
        'penalty_charges',
        'total_principal_markup_penalty',
        'principal_outstanding',
        'category_of_default',
    ];
}
