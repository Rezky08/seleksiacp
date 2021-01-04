<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $page_name = "Dashboard";
        $data = [
            'title' => $page_name . " | Axioo Class Program",
            'page_name' => $page_name
        ];
        return view('dashboard', $data);
    }
}
