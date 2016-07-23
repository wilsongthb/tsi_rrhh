<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\m_listaaportes;
use App\Http\Requests;

use App\m_aporte;
use App\m_moneda;
use App\m_perfilpago;

class c_listaaportes extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $monedas = m_moneda::get();
        $aportes = m_aporte::get();
        $perfilpagos = m_perfilpago::get();
        return view("listas.create", ["perfilpagos" => $perfilpagos, "pagina" => "aportes", "items" => $aportes, "monedas" => $monedas]);
    }    
    public function agregar($id)
    {
        $monedas = m_moneda::get();
        $aportes = m_aporte::get();
        return view("listas.create", ["id_perfil" => $id, "pagina" => "aportes", "items" => $aportes, "monedas" => $monedas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $listaaporte = new m_listaaportes;
        $listaaporte->monto = $request->input("monto");
        $listaaporte->moneda_id = $request->input("moneda_id");
        $listaaporte->aportes_id = $request->input("aportes_id");
        $listaaporte->perfilpago_id = $request->input("perfilpago_id");
        $listaaporte->save();
        return redirect("/perfilpago/editar/" . $request->input("perfilpago_id"));
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
        $lista = m_listaaportes::find($id);
        $arr_lista = array();
        $arr_lista["id"] = $lista->id;
        $arr_lista["monto"] = $lista->monto;
        $arr_lista["moneda_id"] = $lista->moneda_id;
        $arr_lista["item_id"] = $lista->aportes_id;
        $arr_lista["perfilpago_id"] = $lista->perfilpago_id;

        $monedas = m_moneda::get();
        $aportes = m_aporte::get();
        $perfilpagos = m_perfilpago::get();
        return view("listas.edit", ["perfilpagos" => $perfilpagos, "pagina" => "aportes", "items" => $aportes, "monedas" => $monedas, "lista" => $arr_lista]);
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
        $listaaporte = m_listaaportes::find($id);
        $listaaporte->monto = $request->input("monto");
        $listaaporte->moneda_id = $request->input("moneda_id");
        $listaaporte->aportes_id = $request->input("aportes_id");
        $listaaporte->perfilpago_id = $request->input("perfilpago_id");
        $listaaporte->save();
        return redirect("/perfilpago/editar/" . $request->input("perfilpago_id"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $perfilpago_id = m_listaaportes::find($id)->perfilpago_id;
        m_listaaportes::destroy($id);
        return redirect("perfilpago/editar/" . $perfilpago_id);
    }
}
