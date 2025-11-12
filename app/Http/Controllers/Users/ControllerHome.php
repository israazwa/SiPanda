<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControllerHome extends Controller
{
    //
    public function index()
    {
        $data = [
            'title' => 'SiPanda || Home',
        ];
        return view('users.main.home', $data);
    }
}
