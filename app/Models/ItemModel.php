<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class ItemModel extends Model
{

    use HasFactory;

    protected $table = 'ms_item';

    // Atur kolom yang dapat diisi (fillable)
    protected $fillable = [
        'item_name',
        'item_brand',
        'item_type',
        'item_code',
        'item_price',
        'item_qty',
        'institution_id',
        'room_id',
        'category_id',
        'purchase_date',
        'notes',
    ];

    // Atur kolom yang harus disembunyikan (hidden)
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $primaryKey = 'item_id';
}
