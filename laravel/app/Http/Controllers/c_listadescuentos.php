<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\m_listadescuentos;
use App\Http\Requests;

use App\m_descuento;
use App\m_moneda;
use App\m_perfilpago;

class c_listadescuentos extends Controller
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
        $descuentos = m_descuento::get();
        $perfilpagos = m_perfilpago::get();
        return view("listas.create", ["perfilpagos" => $perfilpagos, "pagina" => "descuentos", "items" => $descuentos, "monedas" => $monedas]);
    }    
    public function agregar($id)
    {
        $monedas = m_moneda::get();
        $descuentos = m_descuento::get();
        return view("listas.create", ["id_perfil" => $id, "pagina" => "descuentos", "items" => $descuentos, "monedas" => $monedas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $listadescuento = new m_listadescuentos;
        $listadescuento->monto = $request->input("monto");
        $listadescuento->moneda_id = $request->input("moneda_id");
        $listadescuento->descuentos_id = $request->input("descuentos_id");
        $listadescuento->perfilpago_id = $request->input("perfilpago_id");
        $listadescuento->save();
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
        $lista = m_listadescuentos::find($id);
        $arr_lista = array();
        $arr_lista["id"] = $lista->id;
        $arr_lista["monto"] = $lista->monto;
        $arr_lista["moneda_id"] = $lista->moneda_id;
        $arr_lista["item_id"] = $lista->descuentos_id;
        $arr_lista["perfilpago_id"] = $lista->perfilpago_id;

        $monedas = m_moneda::get();
        $descuentos = m_descuento::get();
        $perfilpagos = m_perfilpago::get();
        return view("listas.edit", ["perfilpagos" => $perfilpagos, "pagina" => "descuentos", "items" => $descuentos, "monedas" => $monedas, "lista" => $arr_lista]);
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
        $listadescuento = m_listadescuentos::find($id);
        $listadescuento->monto = $request->input("monto");
        $listadescuento->moneda_id = $request->input("moneda_id");
        $listadescuento->descuentos_id = $request->input("descuentos_id");
        $listadescuento->perfilpago_id = $request->input("perfilpago_id");
        $listadescuento->save();
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
        $perfilpago_id = m_listadescuentos::find($id)->perfilpago_id;
        m_listadescuentos::destroy($id);
        return redirect("perfilpago/editar/" . $perfilpago_id);
    }
}
