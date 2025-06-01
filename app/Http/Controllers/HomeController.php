<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Deposit;

class HomeController extends Controller
{
     public function homepage()
    {

        return view('home.homepage');
 
    }
}
