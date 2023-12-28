<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemModel;
use App\Models\InstitutionModel;
use App\Models\RoomModel;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function dashboard_index()
    {
        $item = DB::table('ms_item')->count();
        $technology = DB::table('ms_item')->where('category_id', '=', '1')->count();
        $furniture = DB::table('ms_item')->where('category_id', '=', '2')->count();
        $stationary = DB::table('ms_item')->where('category_id', '=', '3')->count();
        $clean = DB::table('ms_item')->where('category_id', '=', '4')->count();
        $utility = DB::table('ms_item')->where('category_id', '=', '5')->count();


        $institution = DB::table('ms_institution')->count();

        $room = DB::table('ms_room')->count();
        $office = DB::table('ms_room')->where('room_type_id', '=', '1')->count();
        $class = DB::table('ms_room')->where('room_type_id', '=', '2')->count();
        $facilities  = DB::table('ms_room')->where('room_type_id', '=', '3')->count();

        $category = DB::table('ms_category')->count();
        $totalAsset =  ItemModel::sum('item_price');
        $totalAssetFormatted = "Rp " . number_format($totalAsset, 0, ',', '.');

        $recentItems = ItemModel::orderBy('item_id', 'desc')->get();

        $recentItems = ItemModel::orderBy('item_id', 'desc')
            ->join('ms_room', 'ms_item.room_id', '=', 'ms_room.room_id')
            ->select('ms_item.*', 'ms_room.room_name')
            ->get();
            
        $data1 = [
            'item' => $item,
            'technology' => $technology,
            'stationary' => $stationary,
            'institution' => $institution,
            'clean' => $clean,
            'utility' => $utility,

            'room' => $room,
            'office' => $office,
            'class' => $class,
            'facilities' => $facilities,

            'category' => $category,
            'total' => $totalAssetFormatted,
            'recent' => $recentItems
        ];

        $room_yayasan = DB::table('ms_room')->where('institution_id', '=', '1')->where('room_type_id', '=', '1')->get();
        $yayasan = [];
        foreach ($room_yayasan as $yys) {
            $yayasan[] = [
                'room_id' => $yys->room_id,
                'room_name' => $yys->room_name,
            ];
        }

        $room_smp = DB::table('ms_room')->where('institution_id', '=', '2')->get();
        $smp = [];
        foreach ($room_smp as $mp) {
            $smp[] = [
                'room_id' => $mp->room_id,
                'room_name' => $mp->room_name,
            ];
        }

        $room_sma = DB::table('ms_room')->where('institution_id', '=', '3')->get();
        $sma = [];
        foreach ($room_sma as $ma) {
            $sma[] = [
                'room_id' => $ma->room_id,
                'room_name' => $ma->room_name,
            ];
        }

        $room_smk = DB::table('ms_room')->where('institution_id', '=', '4')->get();
        $smk = [];
        foreach ($room_smk as $mk) {
            $smk[] = [
                'room_id' => $mk->room_id,
                'room_name' => $mk->room_name,
            ];
        }

        $room_facilities = DB::table('ms_room')->where('room_type_id', '=', '3')->get();
        $facilities = [];
        foreach ($room_facilities as $fct) {
            $facilities[] = [
                'room_id' => $fct->room_id,
                'room_name' => $fct->room_name,
            ];
        }
        // dd($yayasan);

        $data2 = [
            'yayasan' => $yayasan,
            'smp' => $smp,
            'sma' => $sma,
            'smk' => $smk,
            'facilities' => $facilities,
        ];

        return view('dashboard', compact('data1', 'data2'));
    }

    public function room_index()
    {
        $items = ItemModel::orderBy('item_id', 'desc')->get();

        foreach ($items as $item) {

            $institution = DB::table('ms_institution')->select('institution_name')->where('institution_id', $item->institution_id)->first();
            $room = DB::table('ms_room')->select('room_name')->where('room_id', $item->room_id)->first();
            $category = DB::table('ms_category')->select('category_name')->where('category_id', $item->category_id)->first();

            $item->institution_name = $institution ? $institution->institution_name : null;
            $item->room_name = $room ? $room->room_name : null;
            $item->category_name = $category ? $category->category_name : null;
        }

        return view('layout.menu', compact('items'));
    }
}
