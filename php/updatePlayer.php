<?php
    require_once("../conexao/conexao.php");

    //Verificando Dados
    if (isset($_POST["nomePlayer"])) {
        $playerID = $_POST["playerID"];
        $quantidadePlayer = $_POST["quantidadePlayer"];
        $nomePlayer = $_POST["nomePlayer"];
        $valorUnitarioPlayer = $_POST["valorUnitarioPlayer"];
        $valorUnitarioPlayer = str_replace("R$ ", "", $valorUnitarioPlayer);
        $valorUnitarioPlayer = str_replace(",", ".", $valorUnitarioPlayer);
        
        $updatePlayer = "UPDATE players SET quantidade = $quantidadePlayer, nomePlayer = '$nomePlayer', valorUnitario = $valorUnitarioPlayer ";
        $updatePlayer .= " WHERE playerID = $playerID";
        $listaUpdatePlayer = mysqli_query($conect, $updatePlayer);

        if(mysqli_affected_rows($conect) > 0) {
            echo json_encode(array('playerID' => $playerID,'quantidade' => $quantidadePlayer, 'nomePlayer' => $nomePlayer, 'valorUnitario' => $valorUnitarioPlayer)); 
        } else {
            echo json_encode("Nao foi alterado"); 
        }
    } else{
        echo "Nao foi recebido";
    }
?>