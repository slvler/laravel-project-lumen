<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

   public function register(Request $request)
   {
    $input = $request->all();
    $input['password'] = Hash::make($request->password);
    
    
    User::create($input);

    return response()->json([

        'res' => true,
        'message' => "Başarıyla Oluşturuldu."

    ]);

   }

   public function login(Request $request)
   {

    $user = User::WhereEmail($request->email()->first());
      
 

   }

   public function giris(Request $request)
   {

 
     
    $this->validate($request,[

        'email' => "required",
        'password' => "required",
        'durum' => 'required'
    ]);


    $input = $request->only('email','password');

    if(!$authorized = Auth::attempt($input))
    {

        $code = 401;
        $output = [
            'code' => $code,
            'message' => "401 hatası"
        ];

    }else {
        $code = 201;
        $token =  $this->respondWithToken($authorized);
        $output = [
            'code' => $code,
            'message' => "Tamamke",
            'token' => $token
        ];
    }

    return response()->json($output,$code);

   }



}