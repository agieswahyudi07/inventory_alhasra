<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\InstitutionModel;
use App\Models\CategoryModel;
use App\Models\RoomModel;
use App\Models\ItemModel;
use Illuminate\Support\Facades\DB;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function get_institution($param)
    {
        $DivionModel = new InstitutionModel();
        $result = $DivionModel->get_data($param);
        return $result;
    }

    public function get_category($param)
    {
        $CategoryModel = new CategoryModel();
        $result = $CategoryModel->get_data($param);
        return $result;
    }

    public function get_room($param)
    {
        $RoomModel = new RoomModel();
        $result = $RoomModel->get_data($param);
        return $result;
    }

    public function itemCode_($institutionCode, $roomCode, $purchaseDate, $roomID, $sequenceNumber)
    {
        // Ubah format tanggal menjadi ddmmyy (180823)
        $formattedDate = date('dmy', strtotime($purchaseDate));

        // Menghasilkan kode dengan format yang diinginkan
        $itemCode = $institutionCode . '/' . $roomCode . '/' . $formattedDate . '/' . str_pad($sequenceNumber, 3, '0', STR_PAD_LEFT);

        return $itemCode;
    }

    public function itemCode($institutionCode, $roomCode, $purchaseDate, $roomID, $sequenceNumber)
    {
        // Memeriksa apakah $purchaseDate berisi false
        if ($purchaseDate === false) {
            // Jika $purchaseDate adalah false, maka set $formattedDate ke "000000"
            $formattedDate = "000000";
        } else {
            // Jika $purchaseDate bukan false, maka ubah format tanggal menjadi ddmmyy (180823)
            $formattedDate = date('dmy', strtotime($purchaseDate));
        }

        // Menghasilkan kode dengan format yang diinginkan
        $itemCode = $institutionCode . '/' . $roomCode . '/' . $formattedDate . '/' . str_pad($sequenceNumber, 3, '0', STR_PAD_LEFT);

        return $itemCode;
    }



    public function officeCode($category, $institution, $room_type, $floor)
    {

        $lastRoom = RoomModel::where('room_type_id', $room_type)
            // ->where('institution_id', $institution)
            ->orderBy('room_id', 'desc')
            ->first();


        $sequenceNumber = $lastRoom ? intval(substr($lastRoom->room_code, -3)) + 1 : 1;

        $code = $category . $institution . '-' .  $floor . str_pad($sequenceNumber, 3, '0', STR_PAD_LEFT);
        return $code;
    }

    public function classCode($category, $institution, $room_type, $floor)
    {

        $lastRoom = RoomModel::where('room_type_id', $room_type)
            // ->where('institution_id', $institution)
            ->orderBy('room_id', 'desc')
            ->first();


        $sequenceNumber = $lastRoom ? intval(substr($lastRoom->room_code, -3)) + 1 : 1;

        $code = $category . '-' .  $floor . str_pad($sequenceNumber, 3, '0', STR_PAD_LEFT);
        return $code;
    }

    public function facilitiesCode($category, $institution, $room_type, $floor)
    {

        $lastRoom = RoomModel::where('room_type_id', $room_type)
            // ->where('institution_id', $institution)
            ->orderBy('room_id', 'desc')
            ->first();


        $sequenceNumber = $lastRoom ? intval(substr($lastRoom->room_code, -3)) + 1 : 1;

        $code = $category . '-' .  $floor . str_pad($sequenceNumber, 3, '0', STR_PAD_LEFT);
        return $code;
    }
}
