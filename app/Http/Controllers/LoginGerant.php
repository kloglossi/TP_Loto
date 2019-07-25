<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginGerant extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
        $email=$request->input('email');
        $mdp=$request->input('password');

        $mdp_crp=DB::table('users')->where(['email'=>$email
        ])->select('password')->value('password');

       // echo $mdp_crp;

        $login=DB::table('users')->where([
           'email'=>$email,
        ])->get();




        if($login->isNotEmpty() &&  $this->pass_crypt($mdp,$mdp_crp)){
            $val=$request->session('login',$login->values());
            $res=array('response'=>'Validée','succes'=>'true',$val);
            return response()->json($res,200);
        }else{
            $res=array('response'=>'données incorrectes','succes'=>'false');
            return  response()->json($res,404);
        }

    }

    public function pass_crypt($mdp,$hash){
        if (password_verify($mdp, $hash)) {
           return true;
        } else {
            return false;
        }
    }

    public function getData(Request $request){

        $data=DB::table('users')->where([
           'email'=>$request->input('email')
        ]);

        if($data){
            return response()->json($data,200);
        }else{
            $error=array('response'=>'echec','succes'=>'false');
            return response()->json($error,404);
        }

    }
}
