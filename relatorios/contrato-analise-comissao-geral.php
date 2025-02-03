<?php

require('../vendor/autoload.php');
ob_start();

include('contrato-relatorio-analise-comissao-geral-pdf.php');
$conteudo = ob_get_contents();
ob_end_clean();

$mpdf = new mPDF('utf-8', 'A4-L');
$mpdf->WriteHTML($conteudo);
$mpdf->Output();

?>