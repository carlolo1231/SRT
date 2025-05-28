<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplyRequest extends Model
{
    use HasFactory;

    // Specify fillable fields
    protected $fillable = [
        'item_name',
        'quantity',
        'requested_by',
        'request_date',
        'status', // e.g. 'pending', 'approved', 'denied'
    ];

    // Enable timestamps (created_at and updated_at)
    public $timestamps = true;
}
