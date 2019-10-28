<?php
require_once("../TCPDF/tcpdf.php");
require_once("./conexao.php");
$obj_pdf=new TCPDF('P',PDF_UNIT,PDF_PAGE_FORMAT,true,'UTF-8',false);  
$obj_pdf->SetCreator(PDF_CREATOR);  
$obj_pdf->SetTitle("Gerando arquivo PDF com dados do MySQL - biblioteca TCPDF php");  
$obj_pdf->SetHeaderData('','62','EMPRESA MUSISOM' );  
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN)); 
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA,'',PDF_FONT_SIZE_DATA));  
$obj_pdf->SetDefaultMonospacedFont('helvetica');  
$obj_pdf->SetHeaderMargin('15'); 
$obj_pdf->SetFooterMargin('30');  
$obj_pdf->SetMargins(PDF_MARGIN_LEFT,'40',PDF_MARGIN_RIGHT);  
$obj_pdf->setPrintHeader(true);  
$obj_pdf->setPrintFooter(true);  
$obj_pdf->SetAutoPageBreak(TRUE,10);  
$obj_pdf->SetFont('dejavusans', '', 12, '', true); 
$obj_pdf->AddPage();  


$obj_pdf->Image('../img/logo.png', 15, 10, 50, 15, '', '', '', true, 200, '', false, false, 0, false, false, false);
$txt="PRODUTOS";
$co="Código";
$tipo="Tipo";
$marca="Marca";
$desc="Descrição";
$valor="Valor";
$qtd = "Qtde";

$obj_pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

$conexao = conexao::getInstance();
$sql = 'SELECT * FROM produtos';
$stm = $conexao->prepare($sql);
$stm->execute();
$produtos = $stm->fetchAll(PDO::FETCH_OBJ);

$tbl_rows = '';

foreach($produtos as $produto){
    $tbl_rows.= '<tr>';
    $tbl_rows.= '<td>'.$produto->codigo.'</td>';
    $tbl_rows.= '<td>'.$produto->tipo.'</td>';
    $tbl_rows.= '<td>'.$produto->marca.'</td>';
    $tbl_rows.= '<td>'.$produto->descricao.'</td>';
    $tbl_rows.= '<td>'.$produto->valor.'</td>';
    $tbl_rows.= '<td>'.$produto->qtd_estoque.'</td>';
    $tbl_rows.= '</tr>';
}
$tbl = <<<EOD
<table  cellspacing="0" cellpadding="1" border="1">
    <tr>
        <th colspan="6" align="center">Produtos</th>
    </tr>
    <tr>
        <th>Código</th>
        <th>Tipo</th>
        <th>Marca</th>
        <th>Descrição</th>
        <th>Valor</th>
        <th>Qtd</th>
    </tr>
    $tbl_rows
    
</table>
EOD;

ob_start ();
$obj_pdf->writeHTML($tbl, true, false, false, false, '');
$obj_pdf->Output('../php/relatorio.pdf','I');