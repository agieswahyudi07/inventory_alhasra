<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomModel extends Model
{

    use HasFactory;

    protected $table = 'ms_room';

    // Atur kolom yang dapat diisi (fillable)
    protected $fillable = [
        'room_name',
        'room_code',
        'institution_id',
        'room_type_id',
        'room_id',
    ];

    // Atur kolom yang harus disembunyikan (hidden)
    protected $hidden = [
        'cretime',
        'modtime',
    ];

    protected $primaryKey = 'room_id';

    public function get_all_data($id)
    {

        $result = $this->where('room_id', $id)->get()->toArray();
        return $result;
    }

    public function get_data($id)
    {

        $result = $this->where('room_id', $id)->get();
        return $result;
    }
}
