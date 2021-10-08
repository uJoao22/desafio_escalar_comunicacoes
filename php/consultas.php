<?php
//Consultando tabela de TVs
$selectTV = "SELECT *, (quantidade*valorUnitario) as valorTotal FROM tvs";
$listaTVs = mysqli_query($conect, $selectTV);
if (!$listaTVs)
    die("Erro na consulta da tabela de TVs");



//Consultando valor total na tabela de TVs
$selectValTotTv = "SELECT SUM(quantidade*valorUnitario) AS ValTot FROM tvs";
$listaValTotTv = mysqli_query($conect, $selectValTotTv);
if (!$listaValTotTv)
    die("Erro na consulta do Valor Total das TV's");
$linhaValTotTv = mysqli_fetch_assoc($listaValTotTv);
$ValTotTv = $linhaValTotTv["ValTot"];



//Consultando tabela de Players
$selectPlayers = "SELECT *, (quantidade*valorUnitario) as valorTotal FROM players";
$listaPlayers = mysqli_query($conect, $selectPlayers);
if (!$listaPlayers)
    die("Erro na consulta da tabela de Players");

//Consultando valor total na tabela de Players
$selectValTotPlayers = "SELECT SUM(quantidade*valorUnitario) AS ValTot FROM players";
$listaValTotPlayers = mysqli_query($conect, $selectValTotPlayers);
if (!$listaValTotPlayers)
    die("Erro na consulta do Valor Total dos Players");
$linhaValTotPlayers = mysqli_fetch_assoc($listaValTotPlayers);
$ValTotPlayers = $linhaValTotPlayers["ValTot"];



//Consultando na tabela de Planos
$selectPlanos = "SELECT * FROM planos";
$listaPlanos = mysqli_query($conect, $selectPlanos);
if (!$listaPlanos)
    die("Erro na consulta da tabela de Planos");

$selectPlanos2 = "SELECT * FROM planos";
$listaPlanos2 = mysqli_query($conect, $selectPlanos2);
if (!$listaPlanos2)
    die("Erro na consulta da tabela de Planos2");
?>