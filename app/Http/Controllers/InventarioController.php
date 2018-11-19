<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Inventario;
class InventarioController extends Controller
{
  public function __construct(){
  //$this->middleware('auth');
  }

  public function index(Request $request){
    $datos = \DB::table('inventarios')->join('biens', 'inventarios.bien_id', '=', 'biens.id')
                                      ->select('inventarios.*', 'biens.colegio', 'biens.responsable', 'biens.telefono')->get();
    if ($request->ajax()) {
      return $datos;
    }else{
      return view('inventario.index', compact('datos'));
    }
  }
  public function datos(Request $request){
    $id = $curso = $anio = $estado = $observacion = "";
    $id         = $request->bien_id;
    $curso      = $request->curso;
    $anio       = $request->anio;
    $estado     = $request->estado;
    $observacion= $request->observacion;

    $datos = \DB::table('inventarios')->join('biens', 'inventarios.bien_id', '=', 'biens.id')
                                      ->where('inventarios.bien_id', '=', $request->bien_id)
                                      ->select('inventarios.*', 'biens.colegio', 'biens.responsable', 'biens.telefono')->get();

    return view('inventario.create', compact('curso', 'anio', 'estado', 'observacion', 'id', 'datos'));
  }

  public function store(Request $request){
    $id = $curso = $anio = $estado = $observacion = "";
    $id         = $request->bien_id;
    $curso      = $request->curso;
    $anio       = $request->anio;
    $estado     = $request->estado;
    $request['fecha']      = date('Y-m-d');
    $observacion= $request->observacion;
    $dato = new Inventario;
    $dato->fill($request->all());
    $dato->save();

    $datos = \DB::table('inventarios')->join('biens', 'inventarios.bien_id', '=', 'biens.id')
                                      ->where('inventarios.bien_id', '=', $request->bien_id)
                                      ->select('inventarios.*', 'biens.colegio', 'biens.responsable', 'biens.telefono')->get();
    return view('inventario.create', compact('curso', 'anio', 'estado', 'observacion', 'id', 'datos'));
  }

  public function show($id){
    $datos = Inventario::Where('id', '=', $id)->get();
    return $datos;
  }

  public function update(Request $request, $id){
    $dato = Inventario::find($id);
    $fecha['fecha']     = date('Y-m-d');
    $request['user_id'] = 1;//\Auth::user()->id;

    if( $request->tipo == "USO" ){
      $request['fecha_uso'] = date('Y-m-d');
    }else{
      $request['fecha_baja'] = date('Y-m-d');
    }

    $dato->fill($request->all());
    $dato->save();
    return redirect('/Inventario');
  }

  public function destroy(Request $request, $id){
    if( $request->ajax() ){
      $dato = Inventario::find($id);
      $dato->delete();
      return "Inventario Eliminado";
    }else{
      return redirect('/');
    }
  }

  public function global($id){
    return view('inventario.global', compact('id'));
  }

}
