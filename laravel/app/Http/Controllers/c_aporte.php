<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\m_aporte;
use App\Http\Requests;

class c_aporte extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aportes = m_aporte::get();
        return view("items.index", [ "items" => $aportes, "pagina" => "aportes" ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("items.crear", ["pagina" => "aportes"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aporte = new m_aporte;
        $aporte->descripcion = $request->input("descripcion");
        $aporte->abreviatura = $request->input("abreviatura");
        $aporte->save();
        return redirect("/aportes");
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
        $aporte = m_aporte::find($id);
        return view("items.editar", ["item" => $aporte, "pagina" => "aportes"]);
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
        $aporte = m_aporte::find($id);
        $aporte->descripcion = $request->input("descripcion");
        $aporte->abreviatura = $request->input("abreviatura");
        $aporte->save();
        return redirect("/aportes");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        m_aporte::destroy($id);
        return redirect("/aportes");
    }
}
