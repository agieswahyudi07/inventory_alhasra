<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemModel;
use App\Models\InstitutionModel;
use App\Models\RoomModel;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Exports\ItemExport;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;


class ItemController extends Controller
{
    public function item_admin()
    {
        $items = ItemModel::orderBy('item_id', 'desc')->get();

        $title = "Item";

        foreach ($items as $item) {

            $institution = DB::table('ms_institution')->select('institution_name')->where('institution_id', $item->institution_id)->first();
            $room = DB::table('ms_room')->select('room_name')->where('room_id', $item->room_id)->first();
            $category = DB::table('ms_category')->select('category_name')->where('category_id', $item->category_id)->first();

            $item->institution_name = $institution ? $institution->institution_name : null;
            $item->room_name = $room ? $room->room_name : null;
            $item->category_name = $category ? $category->category_name : null;
        }

        $data = [
            'items' => $items,
            'title' => $title,
        ];

        return view('admin.item.index', compact('data'));
    }

    public function item_user()
    {
        $items = ItemModel::orderBy('item_id', 'desc')->get();

        $title = "Item";

        foreach ($items as $item) {

            $institution = DB::table('ms_institution')->select('institution_name')->where('institution_id', $item->institution_id)->first();
            $room = DB::table('ms_room')->select('room_name')->where('room_id', $item->room_id)->first();
            $category = DB::table('ms_category')->select('category_name')->where('category_id', $item->category_id)->first();

            $item->institution_name = $institution ? $institution->institution_name : null;
            $item->room_name = $room ? $room->room_name : null;
            $item->category_name = $category ? $category->category_name : null;
        }

        $data = [
            'items' => $items,
            'title' => $title,
        ];

        return view('user.item.index', compact('data'));
    }

    public function item_room_admin($id)
    {


        $title = DB::table('ms_room')->where('room_id', '=', $id)->get();

        $items = DB::table('ms_item')
            ->where('room_id', $id)
            ->orderBy('item_id', 'desc')
            ->get();

        $total_item = count($items);
        $total_price = $items->sum('item_price');
        $total_price_formated = "Rp " . number_format($total_price, 0, ',', '.');

        foreach ($items as $item) {

            $institution = DB::table('ms_institution')->select('institution_name')->where('institution_id', $item->institution_id)->first();
            $room = DB::table('ms_room')->select('room_name')->where('room_id', $item->room_id)->first();
            $category = DB::table('ms_category')->select('category_name')->where('category_id', $item->category_id)->first();

            $item->institution_name = $institution ? $institution->institution_name : null;
            $item->room_name = $room ? $room->room_name : null;
            $item->category_name = $category ? $category->category_name : null;
        }


        $data = [

            'title' => $title,
            'items' => $items,
            'total_item' => $total_item,
            'total_price' => $total_price_formated
        ];

        return view('admin.item.room.index', compact('data'));
    }

    public function item_room_user($id)
    {


        $title = DB::table('ms_room')->where('room_id', '=', $id)->get();

        $items = DB::table('ms_item')
            ->where('room_id', $id)
            ->orderBy('item_id', 'desc')
            ->get();

        $total_item = count($items);
        $total_price = $items->sum('item_price');
        $total_price_formated = "Rp " . number_format($total_price, 0, ',', '.');

        foreach ($items as $item) {

            $institution = DB::table('ms_institution')->select('institution_name')->where('institution_id', $item->institution_id)->first();
            $room = DB::table('ms_room')->select('room_name')->where('room_id', $item->room_id)->first();
            $category = DB::table('ms_category')->select('category_name')->where('category_id', $item->category_id)->first();

            $item->institution_name = $institution ? $institution->institution_name : null;
            $item->room_name = $room ? $room->room_name : null;
            $item->category_name = $category ? $category->category_name : null;
        }


        $data = [

            'title' => $title,
            'items' => $items,
            'total_item' => $total_item,
            'total_price' => $total_price_formated
        ];

        return view('user.item.room.index', compact('data'));
    }


    public function item_create()
    {
        $institution = InstitutionModel::all();
        $room = RoomModel::all();
        $category = CategoryModel::all();
        $title = "ITEM";

        $data = [
            'institutions' => $institution,
            'room' => $room,
            'category' => $category,
            'title' => $title
        ];

        return view('admin.item.add', compact('data'));
    }

    public function item_store(Request $request)
    {
        $ItemModel = new ItemModel();
        Session::flash('txtItemName', $request->txtItemName);
        Session::flash('txtItemPrice', $request->txtItemPrice);
        Session::flash('txtItemBrand', $request->txtItemBrand);
        Session::flash('txtItemType', $request->txtItemType);
        Session::flash('txtItemQty', $request->txtItemQty);
        Session::flash('selInstitution', $request->selInstitution);
        Session::flash('txtSerialNumber', $request->txtSerialNumber);
        $institution = DB::table('ms_institution')->where('institution_id', '=', $request->selInstitution)->first();
        if ($institution) {
            Session::flash('txtInstitution', $institution->institution_name);
        }
        Session::flash('selRoom', $request->selRoom);
        $room = DB::table('ms_room')->where('room_id', '=', $request->selRoom)->first();
        if ($room) {
            Session::flash('txtRoom', $room->room_name);
        }
        Session::flash('selCategory', $request->selCategory);
        $category = DB::table('ms_category')->where('category_id', '=', $request->selCategory)->first();
        if ($category) {
            Session::flash('txtCategory', $category->category_name);
        }
        Session::flash('txtPurchaseDate', $request->txtPurchaseDate);
        Session::flash('txtItemNotes', $request->txtItemNotes);

        $request->validate([
            'txtItemName' => 'required',
            'txtItemPrice' => 'required',
            'selInstitution' => 'integer|required',
            'selRoom' => 'integer|required',
            'selCategory' => 'integer|required',
            // 'txtPurchaseDate' => 'required',
        ], [
            'txtItemName.required' => 'Item Name Required.',
            'txtItemPrice.required' => 'Item Price Required.',
            'selInstitution.integer' => 'Please Choose Item Institution.',
            'selInstitution.required' => 'Please Choose Item Institution.',
            'selRoom.integer' => 'Please Choose the Item Room.',
            'selRoom.required' => 'Please Choose the Item Room.',
            'selCategory.integer' => 'Please Choose the Item Category.',
            'selCategory.required' => 'Please Choose the Item Category.',
            // 'txtPurchaseDate.required' => 'Please fill the Purchase Date.',
        ]);

        $itemQty = $request->input('txtItemQty');
        $itemName = $request->input('txtItemName');
        $itemBrand = $request->input('txtItemBrand');
        $itemType = $request->input('txtItemType');
        $serialNumber = $request->input('txtSerialNumber');
        $notes = $request->input('txtNotes');
        $itemPrice = intval(str_replace(',', '',  $request->input('txtItemPrice')));
        $institution_id = intval($request->input('selInstitution'));
        $category_id = intval($request->input('selCategory'));
        $institution = InstitutionModel::find($request->input('selInstitution'));
        if (!empty($institution->institution_code)) {
            $institutionCode = $institution->institution_code;
        }
        $room = RoomModel::find($request->input('selRoom'));
        if (!empty($room->room_code)) {
            $roomCode = $room->room_code;
        }
        $purchase_date = $request->input('txtPurchaseDate');
        $room_id = intval($request->input('selRoom'));

        $lastItem = ItemModel::where('room_id', $room_id)
            ->orderBy('item_id', 'desc')
            ->first();
        $sequenceNumber = $lastItem ? intval(substr($lastItem->item_code, -3)) + 1 : 1;
        for ($i = 0; $i < $itemQty; $i++) {

            if (!empty($purchase_date)) {
                $purchase_date = $request->input('txtPurchaseDate');
            } else {
                $purchase_date = false;
            }

            $code = $this->itemCode($institutionCode, $roomCode, $purchase_date, $room_id, $sequenceNumber);

            if ($purchase_date === false) {
                $purchase_date = null;
            }

            $data = [
                'item_name' => $itemName,
                'item_brand' => $itemBrand,
                'item_type' => $itemType,
                'item_price' =>  $itemPrice,
                'item_qty' =>  $itemQty,
                'item_code' => $code,
                'institution_id' => $institution_id,
                'room_id' => $room_id,
                'category_id' => $category_id,
                'serial_number' => $serialNumber,
                'purchase_date' => $purchase_date,
                'notes' => $notes,
            ];
            // dd($data);
            $insert = ItemModel::create($data);
            // dd($insert);
            $sequenceNumber++;
        }

        Session::flash('success', 'Data successfully Inserted.');
        return redirect()->route('admin.item');
    }

    public function item_store_(Request $request)
    {
        $ItemModel = new ItemModel();
        Session::flash('txtItemName', $request->txtItemName);
        Session::flash('txtItemPrice', $request->txtItemPrice);
        Session::flash('txtItemBrand', $request->txtItemBrand);
        Session::flash('txtItemType', $request->txtItemType);
        Session::flash('txtItemQty', $request->txtItemQty);
        Session::flash('selInstitution', $request->selInstitution);
        $institution = DB::table('ms_institution')->where('institution_id', '=', $request->selInstitution)->first();
        if ($institution) {
            Session::flash('txtInstitution', $institution->institution_name);
        }
        Session::flash('selRoom', $request->selRoom);
        $room = DB::table('ms_room')->where('room_id', '=', $request->selRoom)->first();
        if ($room) {
            Session::flash('txtRoom', $room->room_name);
        }
        Session::flash('selCategory', $request->selCategory);
        $category = DB::table('ms_category')->where('category_id', '=', $request->selCategory)->first();
        if ($category) {
            Session::flash('txtCategory', $category->category_name);
        }
        Session::flash('txtPurchaseDate', $request->txtPurchaseDate);
        Session::flash('txtItemNotes', $request->txtItemNotes);

        $request->validate([
            'txtItemName' => 'required',
            'txtItemPrice' => 'required',
            'selInstitution' => 'integer',
            'selRoom' => 'integer',
            'selCategory' => 'integer',
            // 'txtPurchaseDate' => 'required',
        ], [
            'txtItemName.required' => 'Item Name Required.',
            'txtItemPrice.required' => 'Item Price Required.',
            'selInstitution.integer' => 'Please Choose Item Institution.',
            'selRoom.integer' => 'Please Choose the Item Room.',
            'selCategory.integer' => 'Please Choose the Item Category.',
            // 'txtPurchaseDate.required' => 'Please fill the Purchase Date.',
        ]);

        $itemQty = $request->input('txtItemQty');
        $itemName = $request->input('txtItemName');
        $itemBrand = $request->input('txtItemBrand');
        $itemType = $request->input('txtItemType');
        $itemPrice = intval(str_replace(',', '',  $request->input('txtItemPrice')));
        $institution_id = intval($request->input('selInstitution'));
        $category_id = intval($request->input('selCategory'));

        $institution = InstitutionModel::find($request->input('selInstitution'));
        $institutionCode = $institution->institution_code;
        $room = RoomModel::find($request->input('selRoom'));
        $roomCode = $room->room_code;

        $purchase_date = $request->input('txtPurchaseDate');
        if (!empty($purchase_date)) {
            $purchase_date = $request->input('txtPurchaseDate');
        } else {
            $purchase_date = false;
        }

        $room_id = intval($request->input('selRoom'));


        $lastItem = ItemModel::where('room_id', $room_id)
            ->orderBy('item_id', 'desc')
            ->first();

        $sequenceNumber = $lastItem ? intval(substr($lastItem->item_code, -3)) + 1 : 1;
        for ($i = 0; $i < $itemQty; $i++) {

            $code = $this->itemCode($institutionCode, $roomCode, $purchase_date, $room_id, $sequenceNumber);

            if ($purchase_date === false) {
                $purchase_date = null;
            }
            $data = [
                'item_name' => $itemName,
                'item_brand' => $itemBrand,
                'item_type' => $itemType,
                'item_price' =>  $itemPrice,
                'item_qty' =>  $itemQty,
                'item_code' => $code,
                'institution_id' => $institution_id,
                'room_id' => $room_id,
                'category_id' => $category_id,
                'purchase_date' => $purchase_date,
                'notes' => $request->input('txtNotes'),
            ];

            $insert = ItemModel::create($data);

            $sequenceNumber++;
        }

        Session::flash('success', 'Data successfully Inserted.');
        return redirect()->route('admin.item');
    }

    public function item_edit($id)
    {
        $item = DB::table('ms_item')->where('item_id', '=', $id)->first();
        $institution = InstitutionModel::all();
        $room = RoomModel::all();
        $category = CategoryModel::all();

        $data = [$item, $institution, $room, $category];

        return view('admin.item.edit', compact('data'));
    }

    public function item_update(Request $request, $id)
    {
        $item = ItemModel::find($id);
        if (!$item) {
            Session::flash('error', 'Item not found.');
            return redirect()->route('admin.item');
        }

        Session::flash('txtItemName', $request->txtItemName);
        Session::flash('txtItemBrand', $request->txtItemBrand);
        Session::flash('txtItemType', $request->txtItemType);
        Session::flash('txtItemName', $request->txtItemName);
        Session::flash('txtItemPrice', $request->txtItemPrice);
        Session::flash('txtSerialNumber', $request->txtSerialNumber);
        Session::flash('notes', $request->notes);

        $request->validate([
            'txtItemName' => 'required',
            'txtItemPrice' => 'required',
        ], [
            'txtItemName.required' => 'Item Name Required.',
            'txtItemPrice.required' => 'Item Price Required.',
        ]);

        $data = [
            'item_name' => $request->input('txtItemName'),
            'item_brand' => $request->input('txtItemBrand'),
            'item_type' => $request->input('txtItemType'),
            'item_price' => $request->input('txtItemPrice'),
            'serial_number' => $request->input('txtSerialNumber'),
            'notes' => $request->input('txtNotes'),
        ];

        $item->update($data);
        Session::flash('success', 'Data successfully updated.');
        return redirect()->route('admin.item');
    }


    public function item_export()
    {
        $columns = [
            'ms_item.*',
            'ms_institution.institution_name',
            'ms_room.room_name',
            'ms_category.category_name',
        ];

        $data = ItemModel::select($columns)
            ->join('ms_institution', 'ms_institution.institution_id', '=', 'ms_item.institution_id')
            ->join('ms_room', 'ms_room.room_id', '=', 'ms_item.room_id')
            ->join('ms_category', 'ms_category.category_id', '=', 'ms_item.category_id')
            ->get();

        return Excel::download(new ItemExport($data), 'All_item |' . Carbon::now()->timestamp . '.xlsx');
    }

    public function item_room_export($room_id)
    {

        $roomName = RoomModel::where('room_id', $room_id)->value('room_name');

        $data = ItemModel::select([
            'ms_item.*',
            'ms_institution.institution_name AS institution_name',
            'ms_room.room_name AS room_name',
            'ms_category.category_name AS category_name',
        ])
            ->join('ms_institution', 'ms_institution.institution_id', '=', 'ms_item.institution_id')
            ->join('ms_room', 'ms_room.room_id', '=', 'ms_item.room_id')
            ->join('ms_category', 'ms_category.category_id', '=', 'ms_item.category_id')
            ->where('ms_item.room_id', '=', $room_id)
            ->get();

        return Excel::download(new ItemExport($data), 'Item |' . $roomName . '|' . Carbon::now()->timestamp . '.xlsx');
    }


    public function item_destroy($id)
    {
        ItemModel::find($id)->delete();
        Session::flash('success', 'Data successfully deleted.');
        return redirect()->route('admin.item');
    }
}
