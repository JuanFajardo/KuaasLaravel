<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Bien;
class BienController extends Controller
{
  public function __construct(){
  //$this->middleware('auth');
  }

  public function index(Request $request){
    $datos = Bien::all();
    if ($request->ajax()) {
      return $datos;
    }else{
      return view('bien.index', compact('datos'));
    }
  }

  public function store(Request $request){
    $dato = new Bien;
    $request['user_id'] = 1;//\Auth::user()->id;
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Bien');
  }

  public function show($id){
    $datos = Bien::Where('id', '=', $id)->get();
    return $datos;
  }

  public function computadoras($id){
   $datos = \DB::table('inventarios')->join('biens', 'inventarios.bien_id', '=', 'biens.id')
                                     ->where('inventarios.bien_id', '=', $id)
                                     ->select('inventarios.*',
                                     'biens.colegio', 'biens.responsable', 'biens.telefono',
                                     'biens.profesor', 'biens.celular_profesor', 'biens.observacion_profesor')->get();
    return view('bien.computadoras', compact('datos'));
  }


  public function update(Request $request, $id){
    $dato = Bien::find($id);
    $request['user_id'] = 1;//\Auth::user()->id;
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Bien');
  }

  public function destroy(Request $request, $id){
    if( $request->ajax() ){
      $dato = Bien::find($id);
      $dato->delete();
      return "Bien Eliminado";
    }else{
      return redirect('/');
    }
  }

  public function reporte($id){
    $bien   = Bien::find($id);
    $datos  = \DB::table('biens')->join('inventarios', 'biens.id', 'inventarios.bien_id')->where('biens.id', '=', $id)->get();
    $fechas = \DB::table('inventarios')->where('bien_id', '=', $id)->select('fecha')->groupBy('fecha')->get();
    $cajas  = \DB::table('inventarios')->where('bien_id', '=', $id)->select('codigo_cajon')->groupBy('codigo_cajon')->get();


    $fecha = date('Y-m-d');
    $view =  \View::make('reporte.reporte', compact('datos','fechas', 'cajas', 'bien') )->render();
    $pdf = \App::make('dompdf.wrapper');
    //$pdf->setPaper('office', 'landscape');
    $pdf->loadHTML($view);
    return $pdf->stream('ReporteQuass.pdf');
  }

}
