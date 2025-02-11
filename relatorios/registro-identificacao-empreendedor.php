<?php

require('../vendor/autoload.php');
ob_start();
$codBarragem = $_GET['codBarragem'];
include('registro-identificacao-empreendedor-pdf.php');
$conteudo = ob_get_contents();
ob_end_clean();

$mpdf = new mPDF('utf-8', 'A4');
$mpdf->WriteHTML($conteudo);
$mpdf->Output();

?>