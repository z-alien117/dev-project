<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function clients_view(){
        return view('clients.index', ['page_title'=>'Clients']);
    }
}
