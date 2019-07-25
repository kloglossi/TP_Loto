<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Psy\sh;

class GerantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gerant=DB::table('users')->insert([
            'nom'=>$request->input('nom'),
            'prenoms'=>$request->input('prenoms'),
            'email'=>$request->input('email'),
            'tel'=>$request->input('tel'),
            'password'=>password_hash($request->input('password'),PASSWORD_BCRYPT),
            'type_user'=>'gerant',
            'active'=>1,
            'contrat'=>$request->input('contrat'),
            'status'=>1,
            'societe'=>$request->input('societe')
        ]);
        //var_dump($gerant);
        if($gerant){

            $resp=array('response'=>'validee','succes'=>'true');
            return response()->json($resp);
        }else{
            $resp=array('response'=>'echec','succes'=>'false');
            return response()->json($resp);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  string $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $val=DB::table('users')->where('nom',$id)->first();
        if($val){
            //$resp=array('response'=>'validee','succes'=>'true');
            return response()->json($val,200);
        }else{
            $resp=array('response'=>'echec','succes'=>'false');
            return response()->json($resp,404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update=DB::table('users')->where('id_user',$id)->update([
            'nom'=>$request->input('nom'),
            'prenoms'=>$request->input('prenoms'),
            'email'=>$request->input('email'),
            'tel'=>$request->input('tel'),
            'password'=>bcrypt($request->input('password')),
            'type_user'=>'gerant',
            'active'=>1,
            'contrat'=>$request->input('contrat'),
            'status'=>1,
            'societe'=>$request->input('societe')
        ]);

        if($update){
            $resp=array('response'=>'Mise à jour validee','succes'=>'true');
            return response()->json($resp,200);
        }else{
            $resp=array('response'=>'echec','succes'=>'false');
            return response()->json($resp,404);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=DB::table('users')->where('id_user',$id)->delete();
        if($del){
            $resp=array('response'=>'validee','succes'=>'true');
            return response()->json($resp,200);
        }else{
            $resp=array('response'=>'echec','succes'=>'false');
            return response()->json($resp,404);
        }
    }
}
