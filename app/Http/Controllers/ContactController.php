<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $data = [
            'title' => "Contact | Axioo Class Program"
        ];
        return view('contact', $data);
    }
}
