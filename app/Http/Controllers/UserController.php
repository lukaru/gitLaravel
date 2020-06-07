<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index($id){
        $user = User::where('id', $id)->get();
        return $user;
    }
}
