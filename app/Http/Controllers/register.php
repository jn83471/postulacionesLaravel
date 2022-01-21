<?php

namespace App\Http\Controllers;

use App\Http\Requests\registerRule;
use App\Models\filas;
use App\Models\prospects;
use App\Models\puestos;
use Carbon\Carbon;
use Illuminate\Http\Request;

class register extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puestos=puestos::where('Estatus',"=","0")->get();
        return view("register.index",compact('puestos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "a";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(registerRule $request)
    {
        $date=Carbon::now();
        $cad=date_format($date,"dmyyHis");
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
        foreach ($request->file('files') as $file) {
            $name = $file->getClientOriginalName();
            $file->move(public_path() . '/upload/', $cad.$name);
            filas::create(
                [
                    "id_prospect"=>$prospect->id,
                    "src"=>public_path() . '/upload/'.$cad.$name
                ]
                );
            $data[] = $name;
        }
        return redirect()->route("welcome");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
