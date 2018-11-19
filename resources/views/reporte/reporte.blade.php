<?php
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
    <!--<b style="font-size:20px; text-align: center;" ><br><br> <u>INFORME DE REVISION DE LAS COMPUTADORAS <BR>QUIPUS-KUAA EN LA UNIDAD EDUCATIVA<br>{{ strtoupper( $datos[0]->colegio )}} </u></b>-->
      <b style="font-size:20px; text-align: center;" ><br><br> <u>ACTA DE ENTREGA<br>{{ strtoupper( $datos[0]->colegio )}} </u></b>
    </center>
    <br><br>
    <!--<table width="100%">
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
            <td>
                  {{$bien->nombre1}}, {{$bien->nombre2}}
            </td>
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
    </table>-->
    <hr>
    <br><br>
    A los  {{date('d')}} días del mes de {{bett0Fecha(date('m'))}} de {{date('Y')}}, se hace la entrega a {{ strtoupper( $datos[0]->colegio )}} la entrega
    computadoras de la empresa estatal Quipus, Computadoras Personales Quipus - Kuaa Modelo MG 101A8, un total de {{ count($cajas)-1 }}
    cajas con 6 unidades, y {{ count($datos) - ((count($cajas)-1) * 6) }} maquinas sueltas haciendo un total de
     <b> {{count($datos)}}  computadoras Kuaas </b>.
     <br>
     Dichos computadoras fueron revisadas en la unidad de educativa a solicitud de la Unidad de Bienes del G.A.M.P.<br>
     Las compuitadoras fueron revisadas en fechas
    @foreach($fechas as $fecha)
      <b> {{ date('Y/m/d', strtotime($fecha->fecha)) }},</b>
    @endforeach
    se realizo la inspeccion.
    <br>
    A continuacion se da un detalla en una tabla los datos y observaciones de cada una de ellas de las computadoras,
    con anexando las fotografias de aquellas observadas.
    <table width="100%" border="1">
      <thead>
        <tr>
          <th>Nro</th>
          <th>Fecha</th>
          <th>Codigo de Caja</th>
          <th>Codigo de Computadora</th>
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
          <b> <center> <b>Ing. Marlene Chumacero</b> <br> Jefe de la Unidad de Metodos y Sistemas  </center> </b>
        </td>
        <td width="50%">
          <b> <center> <b>Percy Burgoa Velasquez</b> <br> Responsable de Educación </center> </b>
        </td>
      </tr>
      <tr> <td> <br><br><br><br> </td> </tr>
      <tr>
        <td width="50%" colspan="2">
          <b> <center> <b>{{$bien->responsable}}</b> <br> Responsable del {{$datos[0]->colegio}}  </center> </b>
        </td>
      </tr>
      <tr> <td> <br><br><br><br> </td> </tr>
      <tr>
        <td width="50%">
          <b> <center> <b>{{$bien->nombre1}}</b> <br> Tecnico Revisor </center> </b>
        </td>
        <td width="50%">
          <b> <center> <b>{{$bien->nombre2}}</b> <br> Tecnico Revisor  </center> </b>
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
