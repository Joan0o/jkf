<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.template');
    }

    public function dashboard(){
        return view('admin.dashboard');
    }
}
