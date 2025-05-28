<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliverySupply extends Model
{
    use HasFactory;

    // Optional: if your table name is different than 'delivery_supplies'
    // protected $table = 'your_custom_table_name';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'item_name',
        'quantity',
        'delivered_by',
        'delivery_date',
    ];

    /**
     * Indicates if the model should be timestamped.
     * Set to false if you don't have created_at and updated_at columns.
     *
     * @var bool
     */
    public $timestamps = true;
}
