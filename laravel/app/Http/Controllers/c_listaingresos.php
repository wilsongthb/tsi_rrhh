<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\m_listaingresos;
use App\Http\Requests;

use App\m_ingreso;
use App\m_moneda;
use App\m_perfilpago;

class c_listaingresos extends Controller
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
        $ingresos = m_ingreso::get();
        $perfilpagos = m_perfilpago::get();
        return view("listas.create", ["perfilpagos" => $perfilpagos, "pagina" => "ingresos", "items" => $ingresos, "monedas" => $monedas]);
    }    
    public function agregar($id)
    {
        $monedas = m_moneda::get();
        $ingresos = m_ingreso::get();
        return view("listas.create", ["id_perfil" => $id, "pagina" => "ingresos", "items" => $ingresos, "monedas" => $monedas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $listaingreso = new m_listaingresos;
        $listaingreso->monto = $request->input("monto");
        $listaingreso->moneda_id = $request->input("moneda_id");
        $listaingreso->ingresos_id = $request->input("ingresos_id");
        $listaingreso->perfilpago_id = $request->input("perfilpago_id");
        $listaingreso->save();
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
        $lista = m_listaingresos::find($id);
        $arr_lista = array();
        $arr_lista["id"] = $lista->id;
        $arr_lista["monto"] = $lista->monto;
        $arr_lista["moneda_id"] = $lista->moneda_id;
        $arr_lista["item_id"] = $lista->ingresos_id;
        $arr_lista["perfilpago_id"] = $lista->perfilpago_id;

        $monedas = m_moneda::get();
        $ingresos = m_ingreso::get();
        $perfilpagos = m_perfilpago::get();
        return view("listas.edit", ["perfilpagos" => $perfilpagos, "pagina" => "ingresos", "items" => $ingresos, "monedas" => $monedas, "lista" => $arr_lista]);
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
        $listaingreso = m_listaingresos::find($id);
        $listaingreso->monto = $request->input("monto");
        $listaingreso->moneda_id = $request->input("moneda_id");
        $listaingreso->ingresos_id = $request->input("ingresos_id");
        $listaingreso->perfilpago_id = $request->input("perfilpago_id");
        $listaingreso->save();
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
        $perfilpago_id = m_listaingresos::find($id)->perfilpago_id;
        m_listaingresos::destroy($id);
        return redirect("perfilpago/editar/" . $perfilpago_id);
    }
}
