<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\ItemModel;
use App\Models\RoomModel;
use App\Exports\RoomExport;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\RoomTypeModel;
use App\Models\InstitutionModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;


class RoomController extends Controller
{


    /**
     * Display the specified resource.
     */



    public function room_index()
    {
        $rooms = RoomModel::orderBy('room_id', 'desc')->get();
        $title = "Room";

        foreach ($rooms as $room) {
            $institution = DB::table('ms_institution')->select('institution_name')->where('institution_id', $room->institution_id)->first();

            $room->institution_name = $institution ? $institution->institution_name : null;
        }

        $data = [
            'rooms' => $rooms,
            'title' => $title
        ];

        return view('room.index', compact('data'));
    }


    public function room_index_()
    {
        $rooms = RoomModel::orderBy('room_id', 'desc')->get();

        foreach ($rooms as $room) {
            $institution = DB::table('ms_institution')->select('institution_name')->where('institution_id', $room->institution_id)->first();

            $room->institution_name = $institution ? $institution->institution_name : null;
        }

        return view('room.index', compact('rooms'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function room_create()
    {
        $institution = InstitutionModel::all();
        $room = RoomModel::all();
        $room_type = RoomTypeModel::all();

        $data = [$institution, $room, $room_type];

        return view('room.add', compact('data'));
    }

    public function office_create()
    {
        $institution = InstitutionModel::all();
        $room = RoomModel::all();
        $room_type = RoomTypeModel::all();
        $title = "Office";
        $floor = [
            [
                'floor_id' => '1',
                'floor_name' => '1st Floor',
            ],
            [
                'floor_id' => '2',
                'floor_name' => '2nd Floor',
            ],
            [
                'floor_id' => '3',
                'floor_name' => '3rd Floor',
            ],
        ];

        $data = [
            'title' => $title,
            'institutions' => $institution,
            'room' => $room,
            'room_type' => $room_type,
            'floor' => $floor
        ];

        return view('room.office.add', compact('data'));
    }

    public function class_create()
    {
        $institution = InstitutionModel::all();
        $room = RoomModel::all();
        $room_type = RoomTypeModel::all();
        $title = "Class";
        $floor = [
            [
                'floor_id' => '1',
                'floor_name' => '1st Floor',
            ],
            [
                'floor_id' => '2',
                'floor_name' => '2nd Floor',
            ],
            [
                'floor_id' => '3',
                'floor_name' => '3rd Floor',
            ],
        ];

        $data = [
            'title' => $title,
            'institutions' => $institution,
            'room' => $room,
            'room_type' => $room_type,
            'floor' => $floor
        ];

        return view('room.class.add', compact('data'));
    }

    public function facilities_create()
    {
        $institution = InstitutionModel::all();
        $room = RoomModel::all();
        $room_type = RoomTypeModel::all();
        $title = "Facilities";
        $floor = [
            [
                'floor_id' => '1',
                'floor_name' => '1st Floor',
            ],
            [
                'floor_id' => '2',
                'floor_name' => '2nd Floor',
            ],
            [
                'floor_id' => '3',
                'floor_name' => '3rd Floor',
            ],
        ];

        $data = [
            'title' => $title,
            'institutions' => $institution,
            'room' => $room,
            'room_type' => $room_type,
            'floor' => $floor
        ];

        return view('room.facilities.add', compact('data'));
    }


    /**
     * Store a newly created resource in storage.
     */

    public function office_store(Request $request)
    {

        $RoomModel = new RoomModel();
        Session::flash('txtOfficeName', $request->txtOfficeName);
        Session::flash('selInstitution', $request->selInstitution);
        $floor = $request->selFloor;
        switch ($floor) {
            case '1':
                Session::flash('txtFloor', '1st Floor');
                break;
            case '2':
                Session::flash('txtFloor', '2nd Floor');
                break;
            case '3':
                Session::flash('txtFloor', '3rd Floor');
                break;
        }
        $institution = DB::table('ms_institution')->where('institution_id', '=', $request->selInstitution)->first();
        if ($institution) {
            Session::flash('txtInstitution', $institution->institution_name);
        }

        Session::flash('notes', $request->notes);

        $request->validate([
            'txtOfficeName' => 'required',
            'selInstitution' => 'integer',
            'selFloor' => 'integer',
        ], [
            'txtOfficeName.required' => 'Room Name Required.',
            'selInstitution.integer' => 'Please Choose Room Institution.',
            'selFloor.integer' => 'Please Choose Room Floor.',
        ]);

        $category = 'OFC';
        $room_type = 1;
        $code = $this->officeCode($category, $request->input('selInstitution'), $room_type, $request->selFloor);

        $data = [
            'room_name' => $request->input('txtOfficeName'),
            'institution_id' => intval($request->input('selInstitution')),
            'room_code' => $code,
            'room_type_id' => $room_type,
        ];

        RoomModel::create($data);

        Session::flash('success', 'Data successfully Inserted.');
        return redirect()->route('room.index');
    }

    public function class_store(Request $request)
    {

        $RoomModel = new RoomModel();
        Session::flash('txtClassName', $request->txtClassName);
        Session::flash('selInstitution', $request->selInstitution);
        $floor = $request->selFloor;
        switch ($floor) {
            case '1':
                Session::flash('txtFloor', '1st Floor');
                break;
            case '2':
                Session::flash('txtFloor', '2nd Floor');
                break;
            case '3':
                Session::flash('txtFloor', '3rd Floor');
                break;
        }
        $institution = DB::table('ms_institution')->where('institution_id', '=', $request->selInstitution)->first();
        if ($institution) {
            Session::flash('txtInstitution', $institution->institution_name);
        }

        Session::flash('notes', $request->notes);

        $request->validate([
            'txtClassName' => 'required',
            'selInstitution' => 'integer',
            'selFloor' => 'integer',
        ], [
            'txtClassName.required' => 'Room Name Required.',
            'selInstitution.integer' => 'Please Choose Room Institution.',
            'selFloor.integer' => 'Please Choose Room Floor.',
        ]);

        $room_name = $request->input('txtClassName');
        $institution_id = $request->input('selInstitution');
        $category = 'CLS';
        $room_type = 2;
        $floor = $request->selFloor;
        $code = $this->classCode($category, $institution_id, $room_type, $floor);

        $data = [
            'room_name' => $room_name,
            'institution_id' => $institution_id,
            'room_code' => $code,
            'room_type_id' => $room_type,
        ];
        RoomModel::create($data);

        Session::flash('success', 'Data successfully Inserted.');
        return redirect()->route('room.index');
    }

    public function facilities_store(Request $request)
    {

        $RoomModel = new RoomModel();
        Session::flash('txtFacilitiesName', $request->txtFacilitiesName);
        Session::flash('selInstitution', $request->selInstitution);
        $floor = $request->selFloor;
        switch ($floor) {
            case '1':
                Session::flash('txtFloor', '1st Floor');
                break;
            case '2':
                Session::flash('txtFloor', '2nd Floor');
                break;
            case '3':
                Session::flash('txtFloor', '3rd Floor');
                break;
        }
        $institution = DB::table('ms_institution')->where('institution_id', '=', $request->selInstitution)->first();
        if ($institution) {
            Session::flash('txtInstitution', $institution->institution_name);
        }

        Session::flash('notes', $request->notes);

        $request->validate([
            'txtFacilitiesName' => 'required',
            'selInstitution' => 'integer',
            'selFloor' => 'integer',
        ], [
            'txtFacilitiesName.required' => 'Room Name Required.',
            'selInstitution.integer' => 'Please Choose Room Institution.',
            'selFloor.integer' => 'Please Choose Room Floor.',
        ]);

        $room_name = $request->input('txtFacilitiesName');
        $institution_id = $request->input('selInstitution');
        $category = 'FCT';
        $room_type = 3;
        $floor = $request->selFloor;
        $code = $this->facilitiesCode($category, $institution_id, $room_type, $floor);

        $data = [
            'room_name' => $room_name,
            'institution_id' => $institution_id,
            'room_code' => $code,
            'room_type_id' => $room_type,
        ];
        RoomModel::create($data);

        Session::flash('success', 'Data successfully Inserted.');
        return redirect()->route('room.index');
    }

    /**
     * Display the specified resource.
     */
    public function room_show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function room_edit($id)
    {
        $room = DB::table('ms_room')->where('room_id', '=', $id)->first();
        $institutions = InstitutionModel::all();
        $categories = CategoryModel::all();
        $title = "Office";

        $data = [
            'room' => $room,
            'institutions' => $institutions,
            'categories' => $categories,
            'title' => $title
        ];
        // dd($data);
        return view('room.edit', compact('data'));
    }
    // public function class_edit($id)
    // {
    //     $room = DB::table('ms_room')->where('room_id', '=', $id)->first();
    //     $institutions = InstitutionModel::all();
    //     $categories = CategoryModel::all();
    //     $title = "Class";

    //     $data = [
    //         'room' => $room,
    //         'institutions' => $institutions,
    //         'categories' => $categories,
    //         'title' => $title
    //     ];

    //     return view('room.office.edit', compact('data'));
    // }
    // public function facilities_edit($id)
    // {
    //     $room = DB::table('ms_room')->where('room_id', '=', $id)->first();
    //     $institutions = InstitutionModel::all();
    //     $categories = CategoryModel::all();
    //     $title = "Facilities";

    //     $data = [
    //         'room' => $room,
    //         'institutions' => $institutions,
    //         'categories' => $categories,
    //         'title' => $title
    //     ];

    //     return view('room.office.edit', compact('data'));
    // }

    /**
     * Update the specified resource in storage.
     */
    public function room_update(Request $request, $id)
    {
        $room = RoomModel::find($id);
        if (!$room) {
            Session::flash('error', 'Room not found.');
            return redirect()->route('/room.index');
        }

        Session::flash('txtRoomName', $request->txtRoomName);
        Session::flash('selInstitution', $request->selInstitution);
        $institution = DB::table('ms_institution')->where('institution_id', '=', $request->selInstitution)->first();
        if ($institution) {
            Session::flash('txtInstitution', $institution->institution_name);
        }

        $request->validate([
            'txtRoomName' => 'required',
            'selInstitution' => 'integer',

        ], [
            'txtRoomName.required' => 'Room Name Required.',
            'selInstitution.integer' => 'Please Choose Room Institution.',

        ]);

        $data = [
            'room_name' => $request->input('txtRoomName'),
            'institution_id' => $request->input('selInstitution'),
        ];
// dd($data);
        $room->update($data);
        Session::flash('success', 'Data successfully updated.');
        return redirect()->route('room.index');
    }

    public function export() 
    {
        $columns = [
            'ms_room.*', // Pilih semua kolom dari ms_item
            'ms_institution.institution_name',
        ];
        
        $data = RoomModel::select($columns)
            ->join('ms_institution', 'ms_institution.institution_id', '=', 'ms_room.institution_id')
            ->join('tr_room_type', 'tr_room_type.room_type_id', '=', 'ms_room.room_type_id')
            ->get();

        return Excel::download(new RoomExport($data), 'room-'.Carbon::now()->timestamp.'.xlsx');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function room_destroy($id)
    {
        RoomModel::find($id)->delete();
        Session::flash('success', 'Data successfully deleted.');
        return redirect()->route('room.index');
    }

    public function getRoomsByInstitution($institutionId)
    {
        $rooms = RoomModel::where('institution_id', $institutionId)->get();
        // dd($rooms);

        // Return data dalam bentuk JSON
        return response()->json(['data' => $rooms]);
    }
}
