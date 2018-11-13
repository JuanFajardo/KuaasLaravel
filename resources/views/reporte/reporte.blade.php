<?php
$nombre1  = "Ing. Ignacio Maturano Morales";
$nombre2  = "Ing. Richard Carmona Estrada";
$c1 = "13262003";
$c2 = "6680378";
function bett0Fecha($mes){
  $letra = "";
  switch ($mes) {
    case '01': $letra = "enero"; break;
    case '02': $letra = "febrero"; break;
    case '03': $letra = "marzo"; break;
    case '04': $letra = "abril"; break;
    case '05': $letra = "mayo"; break;
    case '06': $letra = "junio"; break;
    case '07': $letra = "julio"; break;
    case '08': $letra = "agosto"; break;
    case '09': $letra = "septiembre"; break;
    case '10': $letra = "octubre"; break;
    case '11': $letra = "noviembre"; break;
    case '12': $letra = "diciembre"; break;
  }
  return $letra;
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">

    </style>
  </head>
  <body>
    <center>
    <b style="font-size:20px; text-align: center;" ><br><br> <u>INFORME DE REVISION DE LAS COMPUTADORAS <BR>QUIPUS-KUAA EN LA UNIDAD EDUCATIVA<br>{{ strtoupper( $datos[0]->colegio )}} </u></b>
    </center>
    <br><br>
    <table width="100%">
        <tbody>
          <tr>
            <td width="30">&nbsp; </td>
            <td width="30"> <b>A:</b> </td>
            <td> Ing. Marlene Ruth Chumacero R.</td>
          </tr>
          <tr>
            <td width="30">&nbsp; </td>
            <td colspan="2"> <b>JEFE UNIDAD DE MÉTODOS Y SISTEMAS</b> </td>
          </tr>
          <tr><td>&nbsp;</td></tr>
          <tr>
            <td width="30">&nbsp; </td>
            <td width="30"> <b>DE:</b> </td>
            <td> {{$nombre2}} ,  {{$nombre2}} </td>
          </tr>
          <tr>
            <td width="30">&nbsp; </td>
            <td colspan="2"> <b>PROGRAMADORES</b> </td>
          </tr>
          <tr><td>&nbsp;</td></tr>
          <tr>
            <td width="30">&nbsp; </td>
            <td colspan="2"> <br><b>Fecha:</b> {{date('d')}} de {{ bett0Fecha(date('m')) }} de {{date('Y')}} </td>
          </tr>
        </tbody>
    </table>
    <hr>
    <br><br>
    En fechas
    @foreach($fechas as $fecha)
      {{ date('Y/m/d', strtotime($fecha->fecha)) }},
    @endforeach
    se realizo la inspeccion de las computadoras de la empresa estatal Quipus el model KUAA un total de {{ count($cajas)-1 }}
    cajas con 6 unidades cada una, haciendo un total de {{ (count($cajas)-1) * 6}} computadoras Kuaa <!--mas 3 sueltos.--><br>
    A continuacion se da un detalla en una tabla los datos y observaciones de cada una de ellas de las computadoras,
    con anexando las fotografias de aquellas observadas.
    <table width="100%" border="1">
      <thead>
        <tr>
          <th>Nro</th>
          <th>Fecha</th>
          <th>Codigo de Caja</th>
          <th>Codigo de Unidad</th>
          <th>Estado Fisico</th>
          <th>Observacion</th>
        </tr>
      </thead>
      <tbody><?php $nro = 0; ?>
        @foreach($datos as $dato) <?php $nro++; ?>
          @if( $dato->codigo_cajon )
            <!--<tr style="background-color:#dcdcdc ;">-->
            <tr>
          @else
            <tr>
          @endif
          <td> {{$nro}} </td>
          <td> {{ (explode(" ", $dato->created_at))[0] }} </td>
          <td> {{ $dato->codigo_cajon  }} </td>
          <td> {{ $dato->codigo  }} </td>
          <td> {{ $dato->estado  }} </td>
          <td> {{ $dato->observacion  }} </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <br><br><br><br><br><br>
    <table width="100%">
      <tr>
        <td width="50%">
          <b> <center> {{$nombre1}} <br> {{$c1}} </center> </b>
        </td>
        <td width="50%">
          <b> <center> {{$nombre2}} <br> {{$c2}} </center> </b>
        </td>
      </tr>
    </table>

    <script type="text/php">
        if ( isset($pdf) ) {
            $font = Font_Metrics::get_font("helvetica", "bold");
            $pdf->page_text(72, 18, "Header: {PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(0,0,0));
        }
    </script>
    
  </body>
</html>
