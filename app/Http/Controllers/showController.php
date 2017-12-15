<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class showController extends Controller
{
    public function show(){
     	return	User::all();
    }
}
