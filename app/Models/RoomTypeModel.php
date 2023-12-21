<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomTypeModel extends Model
{

    use HasFactory;

    protected $table = 'tr_room_type';

    // Atur kolom yang dapat diisi (fillable)
    protected $fillable = [
        'room_type_id',
        'room_type_name',
        'room_type_code',
    ];

    // Atur kolom yang harus disembunyikan (hidden)
    protected $hidden = [
        'cretime',
        'modtime',
    ];
}
