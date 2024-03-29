<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class PassportAuthController extends Controller
{
    //

    public function register(Request $request){
        try {
            //name required, email required, password required kalau nak letak phone ke boleh
            $this->validate($request, [
                'name' => 'required|min:4',
                'email' => 'required|email',
                'password' => 'required|min:8',
            ]);

    //create new user

$user = User::create([
'name' => $request->name,
'email' => $request->email,
'password' => bcrypt($request->password),
'photo_url' => $request->photo_url,
'phone_number' => $request->phone_number,
'address' => $request->address,
]);

//create token hantar user bila berjaya register
$token = $user->createToken('LaravelAuthApp')->accessToken;
return response()->json(['token' => $token], 200);
} catch (\Exception $e) {

return response()->json(['error' => 'Registration failed '.$e], 500);
}
}

public function login(Request $request)
{
    //Dapatkan email dan password dari user
$credentials = $request->only('email', 'password');

//cuba login, dan kalau berjaya hasilkan JWT token
if (! $token = JWTAuth::attempt($credentials)) {
return response()->json(['error' => 'Unauthorized'], 401);
}
//hantar token tersebut kepada user jika berjaya
return response()->json(['token' => $token], 200);
}



}
