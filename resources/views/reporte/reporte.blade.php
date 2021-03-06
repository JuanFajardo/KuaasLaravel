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
      <b style="font-size:20px; text-align: center;" ><br><br> <u>ACTA DE ENTREGA<br>{{ strtoupper( $datos[0]->colegio )}} </u></b>
    </center>
    <br>
    <hr>
    <br>
    <?php $sueltos = count($datos) - ((count($cajas)-1) * 6); ?>
    <?php
    $contadorCajas = 0;
    $contadorSueltos = 0;
    foreach($cajas as $caja){
      if(strlen($caja->codigo_cajon) == 10  )
        $contadorCajas++;
      else
        $contadorSueltos++;

    }
    ?>

    A los  {{date('d')}} días del mes de {{bett0Fecha(date('m'))}} de {{date('Y')}}, se hace la entrega al {{ strtoupper( $datos[0]->colegio )}},
    computadoras de la empresa estatal Quipus, Computadoras Personales Quipus - Kuaa Modelo MG 101A8, un total de {{$contadorCajas}}
    cajas de 6 unidades, y {{$contadorSueltos}} maquinas sueltas haciendo un total de
     <b> {{count($datos)}}  computadoras Kuaas </b>.
     <br>
     Dichos computadoras fueron revisadas en la unidad de educativa a solicitud de la Unidad de Bienes del G.A.M.P.<br>
     Las computadoras fueron revisadas en fechas
    @foreach($fechas as $fecha)
      <b> {{ date('Y/m/d', strtotime($fecha->fecha)) }},</b>
    @endforeach
    se realizo la inspeccion.
    <br>
    A continuacion se  detalla en una tabla los datos y observaciones de cada una de las computadoras.
    <table width="100%" border="1" style="font-size:9pt">
      <thead>
        <tr>
          <th width="10">Nro</th>
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
    Firman al pie de la presente.
    <br><br><br><br><br><br>
    <table width="100%">

      <tr>
        <td width="50%">
          <b> <center> <b>{{$bien->nombre1}}</b> <br> Técnico Revisor </center> </b>
        </td>
        <td width="50%">
          <b> <center> <b>{{$bien->nombre2}}</b> <br> Técnico Revisor  </center> </b>
        </td>
      </tr>

      <tr> <td> <br><br><br><br> </td> </tr>
      @if($bien->profesor == "0")
      <tr>
        <td width="50%" colspan="2">
          <b> <center> <b>{{$bien->responsable}}</b> <br> Responsable del {{$datos[0]->colegio}}  </center> </b>
        </td>
      </tr>
      @else
      <tr>
        <td width="50%">
          <b> <center> <b>{{$bien->profesor}}</b> <br> Profesores de Computación  </center> </b>
        </td>

        <td width="50%">
          <b> <center> <b>{{$bien->responsable}}</b> <br> Responsable del {{$datos[0]->colegio}}  </center> </b>
        </td>

      </tr>
      @endif

      <tr> <td> <br><br><br><br> </td> </tr>
      <tr>

        <td width="50%">
          <b> <center> <b>Percy Burgoa Velasquez</b> <br> Responsable de Educación </center> </b>
        </td>
        <td width="50%">
          <b> <center> <b>Ing. Marlene Chumacero</b> <br> Jefe de la Unidad de Metodos y Sistemas  </center> </b>
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
