<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\m_moneda;
use App\Http\Requests;

class c_moneda extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monedas = m_moneda::get();
        return view("items.index", [ "items" => $monedas, "pagina" => "monedas" ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("items.crear", ["pagina" => "monedas"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $moneda = new m_moneda;
        $moneda->descripcion = $request->input("descripcion");
        $moneda->abreviatura = $request->input("abreviatura");
        $moneda->save();
        return redirect("/monedas");
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
        $moneda = m_moneda::find($id);
        return view("items.editar", ["item" => $moneda, "pagina" => "monedas"]);
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
        $moneda = m_moneda::find($id);
        $moneda->descripcion = $request->input("descripcion");
        $moneda->abreviatura = $request->input("abreviatura");
        $moneda->save();
        return redirect("/monedas");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        m_moneda::destroy($id);
        return redirect("/monedas");
    }
}
