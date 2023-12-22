<?php

namespace App\Exports;

use App\Models\ItemModel;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ItemExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
    
    public function collection()
    {
        return $this->data->map(function ($item, $index) {
            return [
                'No' => $index + 1,
                'Item Name' => $item->item_name,
                'Item Code' => $item->item_code,
                'Item Brand' => $item->item_brand,
                'Item Type' => $item->item_type,
                'Item Price' => $item->item_price,
                'Institution Name' => $item->institution->institution_name,
                'Room Name' => $item->room->room_name,
                'Category Name' => $item->category->category_name,
                'Purchasse Date' => $item->purchase_date,
            ];
        });
    }


    public function headings(): array
    {
        return [
            'No',
            'Item Name',
            'Item Code',
            'Item Brand',
            'Item Type',
            'Item Price',
            'Institution',
            'Room',
            'Category',
            'Purchase Date',
        ];
    }
}
