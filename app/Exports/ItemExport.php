<?php

namespace App\Exports;

use App\Models\ItemModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class ItemExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ItemModel::all();
    }
}
