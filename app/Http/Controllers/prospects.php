<?php

namespace App\Http\Controllers;

use App\Models\prospects as ModelsProspects;
use Illuminate\Http\Request;

class prospects extends Controller
{
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        if(request()->ajax()){
            $prospect=ModelsProspects::with('hasPuesto')->where('nombre','like',$id.'%')->get();
            return $prospect;
        }
        else{
            $prospect=ModelsProspects::with('hasPuesto')->findOrFail($id);
            return view("admin/prospects/show",compact('prospect'));
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
        $prospect=ModelsProspects::findOrFail($id);
        if($request->input("acept")=="acept"){
            $prospect->update([
                "Estatus"=>1
            ]);
            return redirect()->route("welcome")->with("message","Se ha aceptado con exito");
        }
        else{
            $prospect->update([
                "Estatus"=>2
            ]);
            return redirect()->route("welcome")->with("message","Se ha rechazado con exito");
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