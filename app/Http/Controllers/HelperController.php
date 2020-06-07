<?php

namespace App\Http\Controllers;

use App\Helper;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Integer;
use PHPUnit\TextUI\Help;

class HelperController extends Controller
{
    public function index(){
        $helpers = DB::table('helpers')->get();
        return $helpers;
    }

    public function show(​$id){
        $helper = Helper::find($id);
        return view('helper.show',compact('helper'));
    }

    public function test($helped){
        $helpers = DB::table('helpeds')->find($helped);
        return $helpers->name;
    }
}
