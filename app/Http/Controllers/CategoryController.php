<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InstitutionModel;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class CategoryController extends Controller
{


    /**
     * Display the specified resource.
     */



    public function category_admin()
    {
        try {
            $categories = CategoryModel::orderBy('category_id', 'desc')->get();
            $title = "Category";
            foreach ($categories as $category) {
    
                $institution = DB::table('ms_institution')->select('institution_name')->where('institution_id', $category->institution_id)->first();
                $room = DB::table('ms_room')->select('room_name')->where('room_id', $category->room_id)->first();
                $category = DB::table('ms_category')->select('category_name')->where('category_id', $category->category_id)->first();
    
                $category->category_name = $category ? $category->category_name : null;
            }
    
            $data = [
                'categories' => $categories,
                'title' => $title
            ];
    
    
            return view('admin.category.index', compact('data'));
        } catch (\Throwable $th) {
            Session::flash($th->getMessage());
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function category_user()
    {
        try {
            $categories = CategoryModel::orderBy('category_id', 'desc')->get();
            $title = "Category";
            foreach ($categories as $category) {
    
                $institution = DB::table('ms_institution')->select('institution_name')->where('institution_id', $category->institution_id)->first();
                $room = DB::table('ms_room')->select('room_name')->where('room_id', $category->room_id)->first();
                $category = DB::table('ms_category')->select('category_name')->where('category_id', $category->category_id)->first();
    
                $category->category_name = $category ? $category->category_name : null;
            }
    
            $data = [
                'categories' => $categories,
                'title' => $title
            ];
    
    
            return view('user.category.index', compact('data'));
        } catch (\Throwable $th) {
            Session::flash($th->getMessage());
            return redirect()->back()->withErrors($th->getMessage());
        }
    }


    public function category_create()
    {
        try {
            $institution = InstitutionModel::all();
            $category = CategoryModel::all();
            $title = "Category";
    
            $data = [
                'institution' => $institution,
                'category' => $category,
                'title' => $title
            ];
    
            return view('admin.category.add', compact('data'));
        } catch (\Throwable $th) {
            Session::flash($th->getMessage());
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */

    public function category_store(Request $request)
    {
        try {
            Session::flash('txtCategoryName', $request->txtCategoryName);
            Session::flash('txtCategoryCode', $request->txtCategoryCode);
    
            $request->validate([
                'txtCategoryName' => 'required',
                'txtCategoryCode' => 'required',
            ], [
                'txtCategoryName.required' => 'Category Name Required.',
                'txtCategoryCode.required' => 'Category Code Required.',
            ]);
    
    
            $data = [
                'category_name' => $request->input('txtCategoryName'),
                'category_code' => $request->input('txtCategoryCode'),
            ];
    
            CategoryModel::create($data);
    
            Session::flash('success', 'Data successfully Inserted.');
            return redirect()->route('admin.category');
        } catch (\Throwable $th) {
            Session::flash($th->getMessage());
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function category_edit($id)
    {
        try {
            $category = DB::table('ms_category')->where('category_id', '=', $id)->first();
    
            $data = [
                'category' => $category
            ];
    
            return view('admin.category.edit', compact('data'));
        } catch (\Throwable $th) {
            Session::flash($th->getMessage());
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function category_update(Request $request, $id)
    {
        try {
            $category = CategoryModel::where('category_id', '=', $id);
    
            Session::flash('txtCategoryName', $request->txtCategoryName);
            Session::flash('txtCategoryCode', $request->txtCategoryCode);
    
    
            $request->validate([
                'txtCategoryName' => 'required',
                'txtCategoryCode' => 'required',
    
            ], [
                'txtCategoryName.required' => 'Category Name Required.',
                'txtCategoryCode.required' => 'Category Code Required.',
    
            ]);
    
            $data = [
                'category_name' => $request->input('txtCategoryName'),
                'category_code' => $request->input('txtCategoryCode'),
            ];
    
            // $result = $CategoryModel->update($data);
            $category->update($data);
            Session::flash('success', 'Data successfully updated.');
            return redirect()->route('admin.category');
        } catch (\Throwable $th) {
            Session::flash($th->getMessage());
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */

    public function category_destroy($id)
    {
        try {
            CategoryModel::where('category_id', '=', $id)->delete();
            Session::flash('success', 'Data successfully deleted.');
            return redirect()->route('admin.category');
        } catch (\Throwable $th) {
            Session::flash($th->getMessage());
            return redirect()->back()->withErrors($th->getMessage());
        }
    }
}
