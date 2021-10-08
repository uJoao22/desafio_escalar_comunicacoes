<?php
    require_once("../conexao/conexao.php");

    //Verificando Dados
    if (isset($_POST["nomeTV"])) {
        $TvID = $_POST["TvID"];
        $quantidadeTV = $_POST["quantidadeTV"];
        $nomeTV = $_POST["nomeTV"];
        $valorUnitarioTV = $_POST["valorUnitarioTV"];
        $valorUnitarioTV = str_replace("R$ ", "", $valorUnitarioTV);
        $valorUnitarioTV = str_replace(".", "", $valorUnitarioTV);
        $valorUnitarioTV = str_replace(",", ".", $valorUnitarioTV);
        
        $updateTVs = "UPDATE tvs SET quantidade = $quantidadeTV, nomeTV = '$nomeTV', valorUnitario = $valorUnitarioTV ";
        $updateTVs .= " WHERE TvID = $TvID";
        $listaUpdateTV = mysqli_query($conect, $updateTVs);

        if(mysqli_affected_rows($conect) > 0) {
            echo json_encode(array('TvID' => $TvID,'quantidade' => $quantidadeTV, 'nomeTV' => $nomeTV, 'valorUnitario' => $valorUnitarioTV)); 
        } else {
            echo json_encode("Nao foi alterado"); 
        }
    } else{
        echo "Nao foi recebido";
    }
?>