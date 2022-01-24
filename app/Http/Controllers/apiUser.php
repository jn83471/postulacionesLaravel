<?php

namespace App\Http\Controllers;

use App\Models\filas;
use App\Models\prospects;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class apiUser extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=$request->input("user",null);
        $pass=$request->input("pass",null);
         $use = User::where('email', $user)->first();

         if($use){
            if (Hash::check($pass, $use->password)) {
                $tokenResult = $use->createToken(["client_".$use->id,bcrypt($use->password)]);
                $token = $tokenResult->token;
                if ($request->remember_me)
                    $token->expires_at = Carbon::now()->addWeeks(1);
                $token->save();
                $use->access_token=$tokenResult->accessToken;
                $use->expires_at=Carbon::parse($token->expires_at)->toDateTimeString();
                return response($use,200);
            } else {
                $response = ["message" => "Constraseña invalida"];
                return response($response, 422);
            }
         }


         $response = ["message" => "Usuario no identificado"];
         return response($response, 422);
    }


    public function register(Request $request){
        $date=Carbon::now();
        $cad=date_format($date,"dmyyHis");
        $namefiles=$request->input("nameFile");
        $prospect=prospects::create(
            [
                "nombre"=>$request->input("nombre"),
                "apellidoPaterno"=>$request->input("app"),
                "apellidoMaterno"=>$request->input("apm"),
                "calle"=>$request->input("calle"),
                "numero"=>$request->input("numero"),
                "colonia"=>$request->input("col"),
                "cp"=>$request->input("cp"),
                "email"=>$request->input("email"),
                "phone"=>$request->input("phone"),
                "puesto"=>$request->input("puesto"),
                "rfc"=>$request->input("rfc")
            ]
        );
        $index=0;
        foreach ($request->file('nameFile') as $file) {
            $name = $file->getClientOriginalName();
            $file->move('upload/', $cad.$name);
            filas::create(
                [
                    "id_prospect"=>$prospect->id,
                    "src"=>'upload/'.$cad.$name,
                    "name"=>$namefiles[$index]
                ]
                );
            $index++;
            $data[] = $name;
        }
        return $request->all();
    }

}
