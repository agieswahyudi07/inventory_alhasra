<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{

    use HasFactory;

    protected $table = 'ms_category';

    // Atur kolom yang dapat diisi (fillable)
    protected $fillable = [
        'category_name',
        'category_code',
        'category_id',
    ];

    // Atur kolom yang harus disembunyikan (hidden)
    protected $hidden = [
        'cretime',
        'modtime',
    ];
    protected $primaryKey = 'category_id';


    public function get_data($id)
    {
        return CategoryModel::table($this->table)->where('category_id', $id)->get()->toArray();
    }
}
