<?php

require('../vendor/autoload.php');
ob_start();
$codContrato = $_GET['codContrato'];
include('contrato-relatorio-analise-individual-pdf.php');
$conteudo = ob_get_contents();
ob_end_clean();

$mpdf = new mPDF('utf-8', 'A4-L');
$mpdf->WriteHTML($conteudo);
$mpdf->Output();

?>