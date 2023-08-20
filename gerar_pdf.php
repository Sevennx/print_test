<?php
require 'dompdf/autoload.inc.php'; // Carrega o autoload do DomPDF

use Dompdf\Dompdf;
use Dompdf\Options;

// Criação de uma instância do Dompdf
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);
$options->set('tempDir', sys_get_temp_dir());
$dompdf = new Dompdf($options);

// Definição do conteúdo do PDF
$logo = "cupom2.jpg";

$html = "
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Cupom de Análises</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            width: 300px;

        }
	th { 
            padding:0px;
            text-align: left;
            font-size: 7px;
	}
    td { 
            font-size: 7px;
	}
    tfoot{text-align: center;}


</style>
</head>

<body>
    <table>
        <thead>
            <img src='$logo'style='width:15%;'/>
       </thead>
       <tbody>


           <tr>
               <th><b>RESULTADO DE ANALISE DE MATERIA PRIMA SOJA</b></th>
           </tr>
           <tr>
               <td>DATA:</td>
           </tr>
           <tr>
               <td>ROMANEIO:</td>
           </tr>
           <tr>
            <td>PRODUTOR:</td>
           </tr>
           <tr>
            <td>NOTA FISCAL:</td>
           </tr>
           <tr>
            <td>MOTORISTA:</td>
           </tr>


           <tr>
               <th>
                   <b>AMOSTRA PARA IMPUREZA E UMIDADE:</b>
               </th>
           </tr>
           <tr>
               <td><b>DESCRIÇÃO:</b></td>
                <td><B>%MÁX.</B></td>
               <td><B>%RESULTADO</B></td>
           </tr>
           <tr>
               <td>IMPUREZA:</td>
                 <td>1,00%</td>
               <td>0,00%</td>
           </tr>
           <tr>
               <td>UMIDADE:</td>
                 <td>14,00%</td>
               <td>0,00%</td>
           </tr>


           <tr>
               <th>
                <B>AMOSTRA PARA OUTRAS ANÁLISES:</B>
              </th>
           </tr>
           <tr>
               <td>ESVERDEADO:</td>
                 <td>8,00%</td>
               <td>0,00%</td>
           </tr>
           <tr>
               <td>QUEBRADO:</td>
                  <td>30,00%</td>
               <td>0,00%</td>
           </tr>
           <tr>
               <th>
                <B>ANÁLISE DE AVARIADOS</B>
              </th>
           </tr>
           <tr>
               <td>BROTADOS:</td>
               <td>0,00%</td>
           </tr>
           <tr>
               <td>IMATUROS:</td>
               <td></td>
               <td>0,00%</td>
           </tr>
           <tr>
            <td>IMATUROS:</td>
            <td></td>
            <td>0,00%</td>
            </tr>
            <tr>
                <td>CHOCOS:</td>
                <td></td>
                <td>0,00%</td>
            </tr>
            <tr>
                <td>FERMENTADOS:</td>
                <td></td>
                <td>0,00%</td>
            </tr>
            <tr>
                <td>MOFADOS:</td>
                <td>6,00%</td>
                <td>0,00%</td>
            </tr>
            <tr>
                <td>QUEIMADOS:</td>
                <td>1,00%</td>
                <td>0,00%</td>
            </tr>
            <tr>
                <td>ARDIDOS:</td>
                <td>4,00%</td>
                <td>0,00%</td>
            </tr>


            <tr>
                <td>AVARIADOS TOTAIS</td>
                <td>8,00%</td>
                <td>0,00%</td>
            </tr>
            <tr>
                <td>AVARIADOS TOTAIS</td>
                <td></td>
                <td>0,00%</td>
            </tr>
        </tbody>
    <br><br><br><br>
    
        <tfoot>
            <hr>
           <tr>
               <td>
                   Assinatura Classificador
               </td>
           </tr>
        </tfoot>

</body>
</html>
";

// Carregamento do HTML no Dompdf
$dompdf->loadHtml($html);

// Renderização do PDF
$dompdf->render();

// Saída do PDF para o navegador como download
$dompdf->stream("exemplo.pdf", ["Attachment" => false]);
?>
