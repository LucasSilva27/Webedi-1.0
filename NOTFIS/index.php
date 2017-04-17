<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<?php
/*
require_once 'class/conexaoMysql.php';


$localhost = "localhost";
$user = "root";
$password = "";
$database = "arquivos";


$MY = new mysqli($localhost, $user, $password, $database);
$sql = "select login from login";

$result = $MY->query($sql);
$row = mysqli_num_rows ( mysqli_result, $result);

//$row = $mysqli_result->$result;
while ($select = mysqli_fetch_array($row, MYSQLI_NUM)) {
    echo $select['login'];
}
*/

//require_once 'class/conexaoOracle.php';
//header("Location: http://localhost/InteracaoPHP/class/conexaoOracle.php");
//echo sha1('admin');

$nf = fopen("C:/Users/joao.menezes/Desktop/NOTFIS_055117_005601_2703170051_1809712_03252545000183.txt", "r");
while (!feof($nf)) {
    $linha = fgets($nf);
    echo $linha;
    echo "<br />";
    switch (substr($linha, 0, 3)) {
        case "000":
            echo "<br />U N B - CABEÇALHO DE INTERCÂMBIO";
            echo "<br />ID registro - " . $id = substr($linha, 0, 3);
            echo "<br />ID remetente - " . $idr = substr($linha, 3, 35);
            echo "<br />ID destinatario - " . $idd = substr($linha, 38, 35);
            echo "<br />Data - " . $dat = substr($linha, 73, 6);
            echo "<br />Hora - " . $hor = substr($linha, 79, 4);
            echo "<br />ID intercambio - " . $idi = substr($linha, 83, 12);
            echo "<br />Filler - " . $filler = substr($linha, 95, 145);
            echo "<br />";
            $insert = "Insert into TUSC_UNB ( ID_reg, ID_remet, ID_dest, data, hora, ID_inter";
            $values = ") VALUES ($id, $idr, $idd, $dat, $hor, $idi";

            $filler = trim($filler);

            if (!$filler = "") {
                $insert .= ", filler";
                $values .= ", $filler";
            }

            $insert .= $values;
            $insert .= ");";
            echo $insert;
            break;
        case "310":
            echo "<br />U N H - CABEÇALHO DE DOCUMENTO";
            echo "<br />ID registro - " . $idr = substr($linha, 0, 3);
            echo "<br />ID documento - " . $idd = substr($linha, 3, 14);
            echo "<br />Filler - " . $filler = substr($linha, 18, 222);
            echo "<br />";
            $insert = "Insert into TUSC_UNH ( ID_reg, ID_doc";
            $values = ") VALUES ( $idr, $idd";
            $filler = trim($filler);
            if (!$filler = "") {
                $insert .= ", filler";
                $values .= ", $filler";
            }
            $insert .= $values;
            $insert .= ");";
            echo $insert;
            break;
        case "311":
            echo "<br />D E M - DADOS DA EMBARCADORA";
            echo "<br />ID registro - " . $idr = substr($linha, 0, 3);
            echo "<br />C.G.C. - " . $cgc = substr($linha, 4, 13);
            echo "<br />IE embarcadora - " . $iee = substr($linha, 18, 14);
            echo "<br />Endereço - " . $end = substr($linha, 32, 59);
            echo "<br />Numero - " . $num = substr($linha, 93, 59);
            echo "<br />Complemento - " . $com = substr($linha, 153, 59);
            echo "<br />Cidade - " . $cid = substr($linha, 213, 34);
            echo "<br />Código postal - " . $cp = substr($linha, 248, 8);
            echo "<br />Subentidade de País - " . $sp = substr($linha, 256, 8);
            echo "<br />Data do embarque das mercadorias - " . $dem = substr($linha, 265, 7);
            echo "<br />Nome da empresa embarcadora - " . $nee = substr($linha, 273, 39);
            echo "<br />Filler - " . $filler = substr($linha, 313, 66);
            echo "<br />";
            $insert = "Insert into TUSC_DEM ( ID_reg, cgc, IE_emb";
            $values = ") VALUES ( $idr, $cgc, $iee";
            if (!empty($end)) {
                $insert .= ", endereco";
                $values .= ", $end";
            }
            if (!empty($num)) {
                $insert .= ", numero";
                $values .= ", $num";
            }
            $insert .= ", complemento, cidade, cod_post, sub_entidade, data_embar_merc, nome_empresa_embarcadora";
            $values .= ", $com, $cid, $cp, $sp, $dem, $nee";
            if ((trim($filler)) != "") {
                $insert .= ", filler";
                $values .= ", $filler";
            }
            $insert .= $values;
            $insert .= ");";
            echo $insert;
            break;
        case "312":
            echo "<br />D E S - DADOS DO DESTINATÁRIO DA MERCADORIA";
            echo "<br />ID registro - " . $idr = substr($linha, 0, 3);
            echo "<br />Razão social - " . $rs = substr($linha, 3, 40);
            echo "<br />C.G.C./ C. P. F. - " . $cpf = substr($linha, 43, 14);
            echo "<br />IE - " . $ie = substr($linha, 57, 15);
            echo "<br />Endereço - " . $end = substr($linha, 72, 60);
            echo "<br />Número - " . $num = substr($linha, 132, 60);
            echo "<br />Complemento - " . $com = substr($linha, 192, 60);
            echo "<br />Bairro - " . $bai = substr($linha, 252, 20);
            echo "<br />Cidade - " . $cid = substr($linha, 272, 35);
            echo "<br />Codigo postal - " . $cp = substr($linha, 307, 9);
            echo "<br />Codigo de municipio - " . $cm = substr($linha, 316, 9);
            echo "<br />Subentidade de país - " . $sp = substr($linha, 325, 9);
            echo "<br />Área de frete - " . $af = substr($linha, 334, 4);
            echo "<br />Número de comunicação - " . $nc = substr($linha, 338, 35);
            echo "<br />Tipo de identificação - " . $ti = substr($linha, 373, 1);
            echo "<br />Filler - " . $filler = substr($linha, 374, 6);
            echo "<br />";
            $insert = "Insert into TUSC_DES (ID_reg";
            $values = ") VALUES ( $idr";
            if (!empty($rs)) {
                $insert .= ", razao_social";
                $values .= ", $rs";
            }
            $insert .= ", cpf, ie, endereco";
            $values .= ", $cpf, $ie, $end";
            if (!empty($num)) {
                $insert .= ", numero";
                $values .= ", $num";
            }
            if (!empty($com)) {
                $insert .= ", complemento";
                $values .= ", $com";
            }
            $insert .= ", bairro, cidade, cod_postal";
            $values .= ", $bai, $cid, $cp";
            if (!empty($cm)) {
                $insert .= ", cod_municipio";
                $values .= ", $cm";
            }
            $insert .= ", sub_pais";
            $values .= ", $sp";
            if (!empty($af)) {
                $insert .= ", area_frete";
                $values .= ", $af";
            }
            if (!empty($nc)) {
                $insert .= ", num_comunicacao";
                $values .= ", $nc";
            }
            if (!empty($ti)) {
                $insert .= ", tipo_identificacao";
                $values .= ", $ti";
            }
            if (!empty($filler)) {
                $insert .= ", filler";
                $values .= ", $filler";
            }
            $insert .= $values;
            $insert .= ");";
            echo $insert;
            break;
        case "313":
            echo "<br />D N F - DADOS DE NOTA FISCAL";
            echo "<br />m-ID registro - " . $id = substr($linha, 0, 3);
            echo "<br />Num. Romaneio/coleta. resumo de carga - " . $nrcrc = substr($linha, 3, 15);
            echo "<br />Código da rota - " . $cr = substr($linha, 18, 7);
            echo "<br />m-Meio de transporte - " . $mt = substr($linha, 25, 1);
            echo "<br />m-Tipo do transporte de carga - " . $ttc = substr($linha, 26, 1);
            echo "<br />m-Tipo de carga - " . $tc = substr($linha, 27, 1);
            echo "<br />m-Condição de frete - " . $cf = substr($linha, 28, 1);
            echo "<br />m-Série da NF - " . $snf = substr($linha, 29, 3);
            echo "<br />m-Número da NF - " . $nnf = substr($linha, 32, 8);
            echo "<br />m-Data da emissão - " . $de = substr($linha, 40, 8);
            echo "<br />m-Natureza (TIPO) da mercadoria - " . $nm = substr($linha, 48, 15);
            echo "<br />m-Espécie de acondicionamento - " . $ea = substr($linha, 63, 15);
            echo "<br />m-QTDE de volume - " . $qv = substr($linha, 78, 5);
            echo "<br />m-Valor total da nota - " . $vtn = substr($linha, 86, 5);
            echo "<br />m-Peso total da mercadoria a transp. - " . $ptmt = substr($linha, 100, 5);
            echo "<br />Peso densidade/cubagem - " . $pdc = substr($linha, 107, 3);
            echo "<br /><---------Continuação---------><br />";
            echo "<br />m-Tipo de ICMS - " . $ticms = substr($linha, 112, 1);
            echo "<br />m-Seguro já efetuado (S/N)? - " . $sje = substr($linha, 113, 1);
            echo "<br />Valor do seguro - " . $vs = substr($linha, 114, 13);
            echo "<br />Valor a ser cobrado - " . $vc = substr($linha, 129, 13);
            echo "<br />Nº da placa caminhão ou carreta - " . $npcc = substr($linha, 144, 7);
            echo "<br />Plano de carga rápida (S/N)? - " . $pcr = substr($linha, 151, 1);
            echo "<br />Valor do frete peso-volume - " . $vfpv = substr($linha, 152, 13);
            echo "<br />Valor da viagem - " . $vv = substr($linha, 167, 13);
            echo "<br />Valor total das taxas - " . $vtt = substr($linha, 182, 13);
            echo "<br />Valor total do frete - " . $vtf = substr($linha, 197, 13);
            echo "<br /><---------Continuação---------><br />";
            echo "<br />Ação do documento - " . $ad = substr($linha, 212, 1);
            echo "<br />Valor do ICMS - " . $vicms = substr($linha, 213, 10);
            echo "<br />Valor do ICMS retido - " . $vicmsr = substr($linha, 225, 10);
            echo "<br />Indicação de bonificação (S/N) - " . $ib = substr($linha, 237, 1);
            echo "<br />Código numérico da NF-e cNF - " . $cnf = substr($linha, 238, 8);
            echo "<br />m-Chave NF-e chNFe - " . $chnfe = substr($linha, 246, 44);
            echo "<br />Número do protocolo SEFAZ nProt - " . $nprot = substr($linha, 290, 15);
            echo "<br />Data recebimento SEFAZ dhRecbto - " . $dhrecbto = substr($linha, 305, 14);
            echo "<br />";
            $insert = "Insert into TUSC_DNF (";
            $values = ") VALUES (";

            $insert .= $values;
            $insert .= ");";
            echo $insert;
            break;
        case "333":
            echo "<br />D C N - DADOS COMPLEMENTARES DA NOTA FISCAL";
            echo "<br />ID registro - " . $id = substr($linha, 0, 3);
            echo "<br />CFOP - " . $cfop = substr($linha, 3, 4);
            echo "<br />Tipo de período de entrega - " . $tpe = substr($linha, 7, 1);
            echo "<br />Data inicial de entrega - " . $die = substr($linha, 8, 8);
            echo "<br />Hora inicial de entrega - " . $hie = substr($linha, 16, 4);
            echo "<br />Data final de entrega - " . $dfe = substr($linha, 20, 8);
            echo "<br />Hora final de entrega - " . $hfe = substr($linha, 28, 4);
            echo "<br />Identificação do local de desembarque - " . $ile = substr($linha, 32, 15);
            echo "<br />Cálculo de frete diferenciado? (S/N) - " . $cfd = substr($linha, 47, 1);
            echo "<br />Identificação tabela de preço de frete - " . $itpf = substr($linha, 48, 10);
            echo "<br /><---------Continuação---------><br />";
            echo "<br />C.G.C emissor da NF a ser entrege - " . $cgc1 = substr($linha, 58, 15);
            echo "<br />Serie da NF - " . $snf1 = substr($linha, 73, 3);
            echo "<br />Número da NF - " . $nnf1 = substr($linha, 76, 8);
            echo "<br />NF2";
            echo "<br />C.G.C - " . $cgc2 = substr($linha, 84, 15);
            echo "<br />Serie - " . $snf2 = substr($linha, 99, 3);
            echo "<br />Número - " . $nnf2 = substr($linha, 102, 8);
            echo "<br />NF3";
            echo "<br />C.G.C - " . $cgc3 = substr($linha, 110, 15);
            echo "<br />Serie - " . $snf3 = substr($linha, 125, 3);
            echo "<br />Número - " . $nnf3 = substr($linha, 128, 8);
            echo "<br />NF4";
            echo "<br />C.G.C - " . $cgc4 = substr($linha, 136, 15);
            echo "<br />Serie - " . $snf4 = substr($linha, 151, 3);
            echo "<br />Número - " . $nnf4 = substr($linha, 154, 8);
            echo "<br />NF5";
            echo "<br />C.G.C - " . $cgc5 = substr($linha, 162, 15);
            echo "<br />Serie - " . $snf5 = substr($linha, 177, 3);
            echo "<br />Número - " . $nnf5 = substr($linha, 180, 8);
            echo "<br />Valor despesas adicionais transporte - " . $vdat = substr($linha, 188, 13);
            echo "<br /><---------Continuação---------><br />";
            echo "<br />Tipo veículo de transporte - " . $tvt = substr($linha, 203, 5);
            echo "<br />Filial emis. conhecimento - transp. contratante - " . $fectc = substr($linha, 208, 10);
            echo "<br />Série do conhecimento da transport. contratante - " . $sctc = substr($linha, 218, 5);
            echo "<br />Número do conhecimento da transp. contratante - " . $nctc = substr($linha, 223, 12);
            echo "<br />Filler - " . $filler = substr($linha, 235, 5);
            echo "<br />";
            $insert = "Insert into TUSC_DCN (";
            $values = ") VALUES (";
            if (!empty($filler)) {
                $insert .= ", filler";
                $values .= ", $filler";
            }
            $insert .= $values;
            $insert .= ");";
            echo $insert;
            break;
        case "314":
            echo "<br />M N F - MERCADORIA DA NOTA FISCAL";
            echo "<br />ID registro - " . $id = substr($linha, 0, 3);
            echo "<br />Quantidade volumes - " . $qv = substr($linha, 3, 5);
            echo "<br />Espécie de acondicionamento - " . $ea = substr($linha, 10, 15);
            echo "<br />Mercadoria NF - " . $mnf = substr($linha, 26, 30);
            echo "<br />Quantidade volumes - " . $qv2 = substr($linha, 56, 5);
            echo "<br />Espécie de acondicionamento - " . $ea2 = substr($linha, 62, 15);
            echo "<br />Mercadoria NF - " . $mnf2 = substr($linha, 77, 30);
            echo "<br />Quantidade volume - " . $qv3 = substr($linha, 107, 5);
            echo "<br />Espécie de acondicionamento - " . $ea3 = substr($linha, 114, 15);
            echo "<br />Mercadoria NF - " . $mnf3 = substr($linha, 129, 30);
            echo "<br />Quantidade volumes - " . $mnf4 = substr($linha, 159, 5);
            echo "<br />Espécie de acondicionamento - " . $mnf4 = substr($linha, 166, 15);
            echo "<br />Mercadoria NF - " . $mnf4 = substr($linha, 181, 30);
            echo "<br />Filler - " . $filler = substr($linha, 211, 29);
            echo "<br />";
            $insert = "Insert into TUSC_MNF (";
            $values = ") VALUES (";
            if (!empty($filler)) {
                $insert .= ", filler";
                $values .= ", $filler";
            }
            $insert .= $values;
            $insert .= ");";
            echo $insert;
            break;
        case "315":
            echo "<br />C O N - DADOS DO CONSIGNATÁRIO DA MERCADORIA";
            echo "<br />ID registro - " . $id = substr($linha, 0, 3);
            echo "<br />Razão social - " . $rz = substr($linha, 3, 40);
            echo "<br />C.G.C - " . $cgc = substr($linha, 43, 14);
            echo "<br />Inscrição estadual - " . $ie = substr($linha, 57, 15);
            echo "<br />Endereço - " . $end = substr($linha, 72, 60);
            echo "<br />Número - " . $num = substr($linha, 132, 60);
            echo "<br />Complemento - " . $com = substr($linha, 192, 60);
            echo "<br />Bairro - " . $bai = substr($linha, 252, 20);
            echo "<br />Cidade - " . $cid = substr($linha, 272, 35);
            echo "<br />Código postal - " . $cp = substr($linha, 307, 9);
            echo "<br />Código de município - " . $cm = substr($linha, 316, 9);
            echo "<br />Subentidade de país - " . $sp = substr($linha, 325, 9);
            echo "<br />Númeto de comunicação - " . $nc = substr($linha, 334, 35);
            echo "<br />Filler - " . $filler = substr($linha, 369, 11);
            echo "<br />";
            $insert = "Insert into TUSC_CON (";
            $values = ") VALUES (";
            if (!empty($filler)) {
                $insert .= ", filler";
                $values .= ", $filler";
            }
            $insert .= $values;
            $insert .= ");";
            echo $insert;
            break;
        case "316":
            echo "<br />R E D - DADOS PARA REDESPACHO DA MERCADORIA";
            echo "<br />ID registro - " . $id = substr($linha, 0, 3);
            echo "<br />Razão social - " . $rs = substr($linha, 3, 40);
            echo "<br />C.G.C - " . $cgc = substr($linha, 43, 14);
            echo "<br />Inscrição estadual - " . $ie = substr($linha, 57, 15);
            echo "<br />Endereço - " . $end = substr($linha, 72, 60);
            echo "<br />Número - " . $num = substr($linha, 132, 60);
            echo "<br />Complemento - " . $com = substr($linha, 192, 60);
            echo "<br />Bairro - " . $bai = substr($linha, 252, 20);
            echo "<br />Cidade - " . $cid = substr($linha, 272, 35);
            echo "<br />Código postal - " . $cp = substr($linha, 307, 8);
            echo "<br />Código de município - " . $cm = substr($linha, 316, 8);
            echo "<br />Subentidade de país - " . $sp = substr($linha, 325, 8);
            echo "<br />Area de frete - " . $af = substr($linha, 334, 4);
            echo "<br />Número de comunicação  - " . $nc = substr($linha, 338, 35);
            echo "<br />Filler - " . $filler = substr($linha, 373, 7);
            echo "<br />";
            $insert = "Insert into TUSC_RED (";
            $values = ") VALUES (";
            if (!empty($filler)) {
                $insert .= ", filler";
                $values .= ", $filler";
            }
            $insert .= $values;
            $insert .= ");";
            echo $insert;
            break;
        case "317":
            echo "<br />R P F - DADOS RESPONSÁVEL PELO FRETE";
            echo "<br />ID registro - " . $id = substr($linha, 0, 3);
            echo "<br />Razão social - " . $rs = substr($linha, 3, 40);
            echo "<br />C.G.C - " . $cgc = substr($linha, 41, 14);
            echo "<br />Inscrição estadual - " . $ie = substr($linha, 55, 15);
            echo "<br />Endereço - " . $end = substr($linha, 70, 60);
            echo "<br />Número - " . $num = substr($linha, 130, 60);
            echo "<br />Complemento - " . $com = substr($linha, 190, 60);
            echo "<br />Bairro - " . $bai = substr($linha, 250, 20);
            echo "<br />Cidade - " . $cid = substr($linha, 270, 35);
            echo "<br />Código postal - " . $cp = substr($linha, 305, 9);
            echo "<br />Código de município - " . $cm = substr($linha, 314, 9);
            echo "<br />Subentidade de país - " . $sp = substr($linha, 323, 9);
            echo "<br />Número de comunicação  - " . $nc = substr($linha, 332, 35);
            echo "<br />Filler - " . $filler = substr($linha, 367, 11);
            echo "<br />";
            $insert = "Insert into TUSC_RPF (";
            $values = ") VALUES (";
            if (!empty($filler)) {
                $insert .= ", filler";
                $values .= ", $filler";
            }
            $insert .= $values;
            $insert .= ");";
            echo $insert;
            break;
        case "318":
            echo "<br />T O T - VALORES TOTAIS DO DOCUMENTO (ARQ.)";
            echo "<br />ID registro - " . $id = substr($linha, 0, 3);
            echo "<br />Valor total das NF - " . $vtnf = substr($linha, 3, 13);
            echo "<br />Peso total das NF - " . $ptnf = substr($linha, 18, 13);
            echo "<br />Peso total densidade/cubagem - " . $ptdc = substr($linha, 33, 13);
            echo "<br />Quantidade total de volumes - " . $qtsc = substr($linha, 48, 13);
            echo "<br />Valor total a ser cobrado - " . $vtsc = substr($linha, 63, 13);
            echo "<br />Valor total do seguro - " . $vts = substr($linha, 78, 13);
            echo "<br />Marca do produto - " . $mp = substr($linha, 93, 30);
            echo "<br />Filler - " . $filler = substr($linha, 123, 117);
            echo "<br />";
            $insert = "Insert into TUSC_TOT (";
            $values = ") VALUES (";
            if (!empty($filler)) {
                $insert .= ", filler";
                $values .= ", $filler";
            }
            $insert .= $values;
            $insert .= ");";
            echo $insert;
            break;
        default:
            echo "<br />Registro não encontrado ou não reconhecido!";
            break;
    }

    echo "<hr>";

}
fclose($nf);
?>
</body>
</html>
