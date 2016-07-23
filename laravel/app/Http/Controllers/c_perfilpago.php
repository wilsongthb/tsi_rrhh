<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\m_perfilpago;
use App\Http\Requests;

use App\m_estado;
use App\m_moneda;

use App\m_listaingresos;
use App\m_ingreso;

use App\m_listadescuentos;
use App\m_descuento;

use App\m_listaaportes;
use App\m_aporte;

class c_perfilpago extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perfilpagos = m_perfilpago::get();
        return view("perfilpago.index", ["perfilpagos" => $perfilpagos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = m_estado::get();
        return view("perfilpago.crear", ["estados" => $estados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $perfilpago = new m_perfilpago;
        $perfilpago->nombre = $request->input("nombre");
        $perfilpago->descripcion = $request->input("descripcion");
        $perfilpago->estado_id = $request->input("estado_id");
        $perfilpago->save();
        return redirect("/perfilpago");
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
        $perfilpago = m_perfilpago::find($id);

        $listaingreso = m_listaingresos::where("perfilpago_id",$id)->get();
        $arr_ingresos = array();
        foreach ($listaingreso as $ingreso) {
            $temp_ingreso = array();
            $temp_ingreso["id"] = $ingreso->id;
            $temp_ingreso["moneda"] = m_moneda::find($ingreso->moneda_id)->abreviatura;
            $temp_ingreso["monto"] = $ingreso->monto;
            $temp_ingreso["ingreso"] = m_ingreso::find($ingreso->ingresos_id)->abreviatura;
            $arr_ingresos[] = $temp_ingreso;
        }

        $listadescuento = m_listadescuentos::where("perfilpago_id",$id)->get();
        $arr_descuentos = array();
        foreach ($listadescuento as $descuento) {
            $temp_descuento = array();
            $temp_descuento["id"] = $descuento->id;
            $temp_descuento["moneda"] = m_moneda::find($descuento->moneda_id)->abreviatura;
            $temp_descuento["monto"] = $descuento->monto;
            $temp_descuento["descuento"] = m_descuento::find($descuento->descuentos_id)->abreviatura;
            $arr_descuentos[] = $temp_descuento;
        }

        $listaaporte = m_listaaportes::where("perfilpago_id",$id)->get();
        $arr_aportes = array();
        foreach ($listaaporte as $aporte) {
            $temp_aporte = array();
            $temp_aporte["id"] = $aporte->id;
            $temp_aporte["moneda"] = m_moneda::find($aporte->moneda_id)->abreviatura;
            $temp_aporte["monto"] = $aporte->monto;
            $temp_aporte["aporte"] = m_aporte::find($aporte->aportes_id)->abreviatura;
            $arr_aportes[] = $temp_aporte;
        }

        $estados = m_estado::get();
        return view("perfilpago.editar", ["perfilpago" => $perfilpago, "estados" => $estados, "listaingreso" => $arr_ingresos, "listadescuento" => $arr_descuentos, "listaaporte" => $arr_aportes]);
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
        $perfilpago = m_perfilpago::find($id);
        $perfilpago->nombre = $request->input("nombre");
        $perfilpago->descripcion = $request->input("descripcion");
        $perfilpago->estado_id = $request->input("estado_id");
        $perfilpago->save();
        return redirect("/perfilpago");
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
