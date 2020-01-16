<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Category;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index(){
        return view('admin.pages.categoryAdd');
    }


    //===========store=============
    public function store(Request $request){

        $request->validate([
            'categoryName' => 'required|regex:/(^([a-zA-Z ]+)(\d+)?$)/u', //space after A-Z,it allows space
            'categoryDescription' => 'required'
        ]);

        $cat = new Category();
        $cat->cat_name = $request->categoryName;
        $cat->cat_description = $request->categoryDescription; //remove tags like p,h1

        if (isset($request->categoryStatus)){
            $cat->cat_status = true;
        }else{
            $cat->cat_status = false;
        }

        $cat->save();

        Toastr::success('New Category Added','success');
        return redirect()->route('admin.category.read');
    }

    //===========read===========
    public function read(){
        $allCategoryData = Category::latest()->get();

        return view('admin.pages.categoryAll',compact('allCategoryData'));
    }



    //=================update,delete=================
    public function edit($id){
        $singleData = Category::find($id);
        return view('admin.pages.edit',compact('singleData'));
    }

    public function update(Request $request,$id){

        $request->validate([
            'categoryName' => 'required|regex:/(^([a-zA-Z ]+)(\d+)?$)/u', //space after A-Z,it allows space
            'categoryDescription' => 'required'
        ]);

        $cat = Category::find($id);
        $cat->cat_name = $request->categoryName;
        $cat->cat_description = $request->categoryDescription; //remove tags like p,h1

        if (isset($request->categoryStatus)){
            $cat->cat_status = true;
        }else{
            $cat->cat_status = false;
        }

        $cat->save();

        Toastr::success('Category Updated Successfully','success');
        return redirect()->route('admin.category.read');


    }

    public function delete($id){
        $row = Category::find($id);
        $row->delete();

        Toastr::success('Deleted Successfully','success');
        return redirect()->back();

    }




    //===========publish,unpublish============
    public function publish($id){
        $cat = Category::find($id);
        $cat->cat_status = true;
        $cat->save();

        Toastr::success('Category Published !','success');
        return redirect()->back();
    }

    public function unpublish($id){
        $cat = Category::find($id);
        $cat->cat_status = false;
        $cat->save();

        Toastr::info('Category Unublished !','info');
        return redirect()->back();
    }


}
