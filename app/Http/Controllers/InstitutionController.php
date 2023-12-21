<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemModel;
use App\Models\InstitutionModel;
use App\Models\RoomModel;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function institution_store(Request $request)
    {

        Session::flash('txtInstitutionName', $request->txtInstitutionName);
        Session::flash('selInstitution', $request->selInstitution);

        $institution = DB::table('ms_institution')->where('institution_id', '=', $request->selInstitution)->first();
        if ($institution) {
            Session::flash('txtInstitution', $institution->institution_name);
        }

        Session::flash('notes', $request->notes);

        $request->validate([
            'txtInstitutionName' => 'required',
            'selInstitution' => 'integer',
        ], [
            'txtInstitutionName.required' => 'Institution Name Required.',
            'selInstitution.integer' => 'Please Choose Institution Institution.',
        ]);


        $data = [
            'institution_name' => $request->input('txtInstitutionName'),
            'institution_id' => intval($request->input('selInstitution')),
        ];

        InstitutionModel::create($data);

        Session::flash('success', 'Data successfully Inserted.');
        return redirect()->route('institution.index');
    }

    /**
     * Display the specified resource.
     */




    public function kantor_yayasan_index()
    {
        $items = ItemModel::all();

        foreach ($items as $item) {
            $institution = DB::table('ms_institution')->select('institution_name')->where('institution_id', $item->institution_id)->first();
            $room = DB::table('ms_room')->select('room_name')->where('room_id', $item->room_id)->first();
            $category = DB::table('ms_category')->select('category_name')->where('category_id', $item->category_id)->first();

            $item->institution_name = $institution ? $institution->institution_name : null;
            $item->room_name = $room ? $room->room_name : null;
            $item->category_name = $category ? $category->category_name : null;
        }

        return view('item.index', compact('items'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function kantor_yayasan_create()
    {
        $institution = InstitutionModel::all();
        $room = RoomModel::all();
        $category = CategoryModel::all();

        $data = [$institution, $room, $category];

        return view('item.add', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function kantor_yayasan_store(Request $request)
    {
        $ItemModel = new ItemModel();
        Session::flash('txtItemName', $request->txtItemName);
        Session::flash('txtItemPrice', $request->txtItemPrice);
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
        Session::flash('notes', $request->notes);

        $request->validate([
            'txtItemName' => 'required',
            'txtItemPrice' => 'required',
            'selInstitution' => 'integer',
            'selRoom' => 'integer',
            'selCategory' => 'integer',
            'txtPurchaseDate' => 'required',
        ], [
            'txtItemName.required' => 'Item Name Required.',
            'txtItemPrice.required' => 'Item Price Required.',
            'selInstitution.integer' => 'Please Choose Item Institution.',
            'selRoom.integer' => 'Please Choose the Item Room.',
            'selCategory.integer' => 'Please Choose the Item Category.',
            'txtPurchaseDate.required' => 'Please fill the Purchase Date.',
        ]);

        $data = [
            'item_name' => $request->input('txtItemName'),
            'item_price' => $request->input('txtItemPrice'),
            'institution_id' => $request->input('selInstitution'),
            'room_id' => $request->input('selRoom'),
            'category_id' => $request->input('selCategory'),
            'purchase_date' => $request->input('txtPurchaseDate'),
            'notes' => $request->input('txtNotes'),
        ];

        ItemModel::create($data);
        Session::flash('success', 'Data successfully Inserted.');
        return redirect()->route('/kantor_yayasan');
    }

    /**
     * Display the specified resource.
     */
    public function kantor_yayasan_show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function kantor_yayasan_edit($id)
    {
        $item = DB::table('ms_item')->where('item_id', '=', $id)->first();
        $institution = InstitutionModel::all();
        $room = RoomModel::all();
        $category = CategoryModel::all();

        $data = [$item, $institution, $room, $category];
        // foreach ($data as $institution) {
        //     dd($institution);
        // }

        // dd($data);
        return view('item.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function kantor_yayasan_update(Request $request, $id)
    {
        $item = ItemModel::find($id);
        if (!$item) {
            Session::flash('error', 'Item not found.');
            return redirect()->route('/kantor_yayasan.index');
        }

        Session::flash('txtItemName', $request->txtItemName);
        Session::flash('txtItemPrice', $request->txtItemPrice);
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
        Session::flash('notes', $request->notes);

        $request->validate([
            'txtItemName' => 'required',
            'txtItemPrice' => 'required',
            'selInstitution' => 'integer',
            'selRoom' => 'integer',
            'selCategory' => 'integer',
            'txtPurchaseDate' => 'required',
        ], [
            'txtItemName.required' => 'Item Name Required.',
            'txtItemPrice.required' => 'Item Price Required.',
            'selInstitution.integer' => 'Please Choose Item Institution.',
            'selRoom.integer' => 'Please Choose the Item Room.',
            'selCategory.integer' => 'Please Choose the Item Category.',
            'txtPurchaseDate.required' => 'Please fill the Purchase Date.',
        ]);

        $data = [
            'item_name' => $request->input('txtItemName'),
            'item_price' => $request->input('txtItemPrice'),
            'institution_id' => $request->input('selInstitution'),
            'room_id' => $request->input('selRoom'),
            'category_id' => $request->input('selCategory'),
            'purchase_date' => $request->input('txtPurchaseDate'),
            'notes' => $request->input('txtNotes'),
        ];

        $item->update($data);
        Session::flash('success', 'Data successfully updated.');
        return redirect()->route('kantor_yayasan.index');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function kantor_yayasan_destroy($id)
    {
        ItemModel::find($id)->delete();
        Session::flash('success', 'Data successfully deleted.');
        return redirect()->route('kantor_yayasan.index');
    }


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
}
