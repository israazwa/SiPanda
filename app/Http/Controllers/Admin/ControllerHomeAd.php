<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControllerHomeAd extends Controller
{
    //
    public function index()
    {
        $data = [
            'title' => 'Admin SiPanda',
        ];
        return view('admin.main.home', $data);
    }
}
