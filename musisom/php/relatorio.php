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


$obj_pdf->Image('../img/logo.png', 15, 10, 50, 13, '', '', '', true, 200, '', false, false, 0, false, false, false);
$txt="PRODUTOS";
$co="Código";
$tipo="Tipo";
$marca="Marca";
$desc="Descrição";
$valor="Valor";
$qtd = "Qtde";
// config de fonte e texto
$obj_pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
//Titulo relatorio
$obj_pdf->Cell(185, 15,$txt, 1, 1, 'C', 0, '', 0);
//Cabeçalho relatorio
$obj_pdf->MultiCell(25, 5,''.$co, 1, 'C', 1, 0, '', '', true);
$obj_pdf->MultiCell(35, 5,''.$tipo, 1, 'C', 1, 0, '', '', true);
$obj_pdf->MultiCell(35, 5,''.$marca, 1, 'C', 1, 0, '', '', true);
$obj_pdf->MultiCell(50, 2,''.$desc, 1, 'C', 1, 0, '', '', true);
$obj_pdf->MultiCell(25, 5,''.$valor, 1, 'C', 1, 0, '', '', true);
$obj_pdf->MultiCell(15, 5,''.$qtd, 1, 'C', 1, 1, '', '', true);
$conexao = conexao::getInstance();
$sql = 'SELECT * FROM produtos';
$stm = $conexao->prepare($sql);
$stm->execute();
$produtos = $stm->fetchAll(PDO::FETCH_OBJ);
foreach($produtos as $produto){
    
    $obj_pdf->writeHTMLCell(25, 0, '', '', $produto->codigo, 1, 0, 0, 1, '', true);
    $obj_pdf->writeHTMLCell(35, 0, '', '', $produto->tipo, 1, 0, 0, 1, '', true);
    $obj_pdf->writeHTMLCell(35, 0, '', '', $produto->marca, 1, 0, 0, 1, '', true);
    $obj_pdf->writeHTMLCell(50, 0, '', '', $produto->descricao, 1, 0, 0, 1, '', true);
    $obj_pdf->writeHTMLCell(25, 0, '', '', $produto->valor, 1, 0, 0, 1, '', true);
    $obj_pdf->writeHTMLCell(15, 0, '', '', $produto->qtd_estoque, 1, 1, 0, 1, '', true);
    
}

ob_start ();

$obj_pdf->Output('../php/relatorio.pdf','I');