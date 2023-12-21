<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class InstitutionModel extends Model
{

    use HasFactory;

    protected $table = 'ms_institution';

    // Atur kolom yang dapat diisi (fillable)
    protected $fillable = [
        'institution_name',
        'institution_code',
        'institution_id',
    ];

    // Atur kolom yang harus disembunyikan (hidden)
    protected $hidden = [
        'cretime',
        'modtime',
    ];

    protected $primaryKey = 'institution_id';

    public function get_data_($id)
    {
        return DB::table('ms_institution')->where('institution_id', '=', $id)->get();
    }

    public function get_data($id)
    {
        return $this->where('institution_id', $id);
        // return $this->find($id);
    }
}
