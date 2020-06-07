<?php


namespace App\Http\Controllers\Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class ApiRegisterController
{
    use RegistersUsers;

    protected $redirectTo ='/home';

    public function __construct()
    {
//        $this->middleware('guest');
    }

    protected function validator(array $data){
        return Validator::make($data, [
            'name' => 'required|string|max:20',
            'email' => 'required|string|email|max:50|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);
    }

    protected function create(Request $request){
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
    }


}