<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index(){
        return view('admin.pages.categoryAdd');
    }

    public function read(){
        return view('admin.pages.categoryAll');
    }
}
