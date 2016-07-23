<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\m_descuento;
use App\Http\Requests;

class c_descuento extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $descuentos = m_descuento::get();
        return view("items.index", [ "items" => $descuentos, "pagina" => "descuentos" ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("items.crear", ["pagina" => "descuentos"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $descuento = new m_descuento;
        $descuento->descripcion = $request->input("descripcion");
        $descuento->abreviatura = $request->input("abreviatura");
        $descuento->save();
        return redirect("/descuentos");
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
        $descuento = m_descuento::find($id);
        return view("items.editar", ["item" => $descuento, "pagina" => "descuentos"]);
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
        $descuento = m_descuento::find($id);
        $descuento->descripcion = $request->input("descripcion");
        $descuento->abreviatura = $request->input("abreviatura");
        $descuento->save();
        return redirect("/descuentos");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        m_descuento::destroy($id);
        return redirect("/descuentos");
    }
}
