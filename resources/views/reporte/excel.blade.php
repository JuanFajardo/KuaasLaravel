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

    <table width="100%" border="1" style="font-size:9pt">
      <thead>
        <tr>
          <th>FECHA</th>
          <th>RESPONSABLE</th>
          <th>UNIDAD</th>
          <th>CÓDIGO</th>
          <th>DETALLE</th>
        </tr>
      </thead>
      <tbody><?php $nro = 0; ?>
        @foreach($datos as $dato) <?php $nro++; ?>
          @if( $dato->codigo_cajon )
            <tr>
          @else
            <tr>
          @endif
          <td> {{ (explode(" ", $dato->created_at))[0] }} </td>
          <td> <b> Director</b> {{ $bien->responsable  }}  </td>
          <td>  {{ $bien->colegio  }}  </td>
          <td>  {{ $dato->codigo  }}  </td>
          <td> {{ $dato->observacion  }} </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <br><br>
    <script type="text/php">
        if ( isset($pdf) ) {
            $font = Font_Metrics::get_font("helvetica", "bold");
            $pdf->page_text(72, 18, "Header: {PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(0,0,0));
        }
    </script>
  </body>
</html>
