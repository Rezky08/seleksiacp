<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function landingPage()
    {
        $data = [
            'title' => "Home | Axioo Class Program"
        ];
        return view('home', $data);
    }
}
