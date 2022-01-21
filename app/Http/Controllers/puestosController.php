<?php

namespace App\Http\Controllers;

use App\Models\puestos;
use Illuminate\Http\Request;

class puestosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puestos=puestos::all();
        return view("admin.puestos.index",compact('puestos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.puestos.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombre=$request->input("nombre");
        $estatus=$request->input("active",0);
        puestos::create(
            [
                "Estatus"=>$estatus,
                "display_name"=>$nombre
            ]
        );
        return redirect()->route("puestos.index")->with("message","Se ha generado el puesto");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $puestos=puestos::findOrFail($id);
        return view("admin.puestos.show",compact('puestos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $puestos=puestos::findOrFail($id);
        return view("admin.puestos.edit",compact('puestos'));
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
        $puestos=puestos::findOrFail($id);
        $nombre=$request->input("nombre");
        $estatus=$request->input("active",0);
        $puestos->update(
            [
                "Estatus"=>$estatus,
                "display_name"=>$nombre
            ]
        );
        return redirect()->route("puestos.index")->with("message","Se ha modificado del puesto");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $puestos=puestos::findOrFail($id);
        $puestos->update(
            [
                "Estatus"=>($puestos->Estatus==0)?1:0
            ]
            );
        return redirect()->route("puestos.index")->with("message","Se ha modificado el estatus del puesto");
    }
}
