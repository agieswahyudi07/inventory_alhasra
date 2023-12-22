<?php

namespace App\Exports;

use App\Models\RoomModel;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class RoomExport implements FromCollection, WithHeadings
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
        return $this->data->map(function ($room, $index) {
            return [
                'No' => $index + 1,
                'Room Name' => $room->room_name,
                'Room Code' => $room->room_code,
                'Institution Name' => $room->institution->institution_name,
                'Room Type' => $room->type->room_type_name,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'No',
            'Room Name',
            'Room Code',
            'Institution',
            'Room Type',
        ];
    }
}
