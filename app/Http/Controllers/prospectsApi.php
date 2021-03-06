<?php

namespace App\Http\Controllers;

use App\Models\prospects;
use Illuminate\Http\Request;

class prospectsApi extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return prospects::with('hasPuesto','hasfiles')->where('nombre','like',$request->input("nombre","").'%')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return prospects::with('hasPuesto','hasfiles')->findOrFail($id);
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
        $prospect=prospects::findOrFail($id);
        $razon=$request->input("razor");
        if($request->input("acept")=="add"){
            $prospect->update([
                "Estatus"=>1
            ]);
            return ["message"=>"se ha aceptado con exito","Estatus"=>0];
        }
        else{
            $prospect->update([
                "Motive"=>$razon,
                "Estatus"=>2
            ]);
            return ["message"=>"se ha rechazado con exito","Estatus"=>0];
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
        //
    }
}
