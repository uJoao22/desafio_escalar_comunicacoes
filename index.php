<?php
require_once("conexao/conexao.php");
require_once("php/consultas.php");

//Função para formatar preço
function real_format($valor)
{
    $valor  = number_format($valor, 2, ",", ".");
    return "R$ " . $valor;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <title>Midia Indoor</title>
</head>

<body>
    <nav class="w-100 text-white">
        <h2 class="text-center">Planilha de orçamento Midia Indoor por licença</h2>
    </nav>

    <table class="table table-sm table-secondary table-striped w-75 mx-auto mt-4">
        <!-- Tabela de TV's -->
        <thead class="table border border-1 border-secondary border-bottom-0">
            <tr>
                <th colspan="5" class="text-center fs-3">
                    TV's
                </th>
            </tr>
        </thead>
        <thead class="table-dark">
            <tr>
                <th>Quantidade</th>
                <th>TVs</th>
                <th>Valor Unitário</th>
                <th>Valor Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            <?php while ($linhaTV = mysqli_fetch_assoc($listaTVs)) { ?>
                <tr>
                    <form class="formTV">
                        <td class="quantidadeTV"><input type="number" class="inputTV quantidadeTV" name="quantidadeTV" readonly="readonly" value='<?php echo $linhaTV["quantidade"] ?>' /></td>
                        <td class="nomeTV"><input type="text" class="inputTV name nomeTV" name="nomeTV" readonly="readonly" value='<?php echo $linhaTV["nomeTV"] ?>' /></td>
                        <td class="valorUnitarioTV"><input type="text" class="inputTV valorUnitarioTV" name="valorUnitarioTV" readonly="readonly" value='<?php echo real_format($linhaTV["valorUnitario"]) ?>' /></td>
                        <td class="valTotTV"><input type="text" class="valTotTV valorTotalTv" readonly="readonly" value="<?php echo real_format($linhaTV['valorTotal']) ?>"/></td>
                        <td style="width: 20px;">
                            <button type="button" class="alterTV border-0 bg-transparent" value="<?php echo $linhaTV['TvID'] ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="black" class="bi bi-pencil-fill float-end" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                </svg>
                            </button>
                            <button class="saveTV border-0 bg-transparent" value="<?php echo $linhaTV['TvID'] ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="black" class="bi bi-check-lg" viewBox="0 0 16 16">
                                    <path d="M13.485 1.431a1.473 1.473 0 0 1 2.104 2.062l-7.84 9.801a1.473 1.473 0 0 1-2.12.04L.431 8.138a1.473 1.473 0 0 1 2.084-2.083l4.111 4.112 6.82-8.69a.486.486 0 0 1 .04-.045z" />
                                </svg>
                            </button>
                        </td>
                        <input type="hidden" name="TvID" class="TvID" value="<?php echo $linhaTV['TvID'] ?>" />
                    </form>
                </tr>
            <?php } ?>

            <tr class="table-dark">
                <td colspan="3" class="bg-transparent border-0 text-danger"></td>
                <td><input type="text" class="text-white" id="valorTotalTVs" readonly='readonly' value="<?php echo real_format($ValTotTv) ?>" /></td>
            </tr>

        </tbody>
    </table>

    <table class="table table-sm table-secondary table-striped w-75 mx-auto mt-5">
        <!-- Tabela de Players -->
        <thead class="table border border-1 border-secondary border-bottom-0">
            <tr>
                <th colspan="5" class="text-center fs-3">Players</th>
            </tr>
        </thead>
        <thead class="table-dark">
            <tr>
                <th>Quantidade</th>
                <th>Player</th>
                <th>Valor Unitário</th>
                <th>Valor Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            <?php while ($linhaPlayers = mysqli_fetch_assoc($listaPlayers)) { 
        
            ?>
                <tr>
                    <form class="formPlayer">
                        <td class="quantidadePlayer"><input type="number" class="inputPlayer quantidadePlayer" name="quantidadePlayer" readonly="readonly" value='<?php echo $linhaPlayers["quantidade"] ?>' /></td>
                        <td class="nomePlayer"><input type="text" class="inputPlayer name nomePlayer" name="nomePlayer" readonly="readonly" value='<?php echo $linhaPlayers["nomePlayer"] ?>' /></td>
                        <td class="valorUnitarioPlayer"><input type="text" class="inputPlayer valorUnitarioPlayer" name="valorUnitarioPlayer" readonly="readonly" value='<?php echo real_format($linhaPlayers["valorUnitario"]) ?>' /></td>
                        <td class="valTotPlayer"><input type="text" class="valTot valTotPlayer valorTotalPlayer" readonly="readonly" value='<?php echo real_format($linhaPlayers["valorTotal"]) ?>' /></td>
                        <td style="width: 20px;">
                            <button type="button" class="alterPlayer border-0 bg-transparent" value="<?php echo $linhaPlayers['playerID'] ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="black" class="bi bi-pencil-fill float-end" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                </svg>
                            </button>
                            <button class="savePlayer border-0 bg-transparent" value="<?php echo $linhaPlayers['playerID'] ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="black" class="bi bi-check-lg" viewBox="0 0 16 16">
                                    <path d="M13.485 1.431a1.473 1.473 0 0 1 2.104 2.062l-7.84 9.801a1.473 1.473 0 0 1-2.12.04L.431 8.138a1.473 1.473 0 0 1 2.084-2.083l4.111 4.112 6.82-8.69a.486.486 0 0 1 .04-.045z" />
                                </svg>
                            </button>
                        </td>
                        <input type="hidden" name="playerID" class="playerID" value="<?php echo $linhaPlayers['playerID'] ?>" />
                    </form>
                </tr>
            <?php } ?>

            <tr class="table-dark">
                <td colspan="3" class="bg-transparent border-0"></td>
                <td><input type="text" class="text-white" id="valorTotalPlayers" readonly='readonly' value="<?php echo real_format($ValTotPlayers) ?>" /></td>
            </tr>

        </tbody>
    </table>

    <div class="d-flex justify-content-around my-5 w-75 mx-auto">

        <div class="w-25">
            <label for="maoObra" class="form-label mb-0">Mão de Obra Instalação</label>
            <input type="text" id="maoObra" class="form-control mb-3" placeholder="Insira o valor" value="R$ 1.000,00">

            <label for="licenca" class="form-label mb-0">Quanidade de Licenças</label>
            <select class="form-select mb-3" id="licenca" name="licenca">
                <option value="1">1</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="40">40</option>
                <option value="60">60</option>
                <option value="100">100</option>
            </select>

            <label for="plano" class="form-label mb-0">Formas de Pagamento</label>
            <select class="form-select" id="plano" name="plano">
                <option value="1">Mensal</option>
                <option value="2">Anual</option>
            </select>
        </div>

        <table class="table table-sm table-secondary table-striped w-50">
            <!-- Tabela de Planos -->
            <thead class="table border border-1 border-secondary border-bottom-0">
                <tr>
                    <th colspan="2" class="text-center fs-3">Planos</th>
                </tr>
            </thead>
            <thead class="table-dark">
                <tr>
                    <th colspan="2" class="text-center">Valores dos Planos/Mês</th>
                </tr>
            </thead>
            <tbody>

                <?php while ($linhaPlanos = mysqli_fetch_assoc($listaPlanos)) {
                    $valPag[] = $linhaPlanos;
                ?>
                    <tr>
                        <td><?php echo $linhaPlanos["nomePlano"] ?></td>
                        <td class="mensal"><button type="text" class="bg-transparent border-0 valorPlanoMensal" value="<?php echo $linhaPlanos['planoID'] ?>"><?php echo real_format($linhaPlanos["pagMensal"]) ?></button></td>
                        <td class="anual"><button type="text" class="bg-transparent border-0 valorPlanoAnual" value="<?php echo $linhaPlanos['planoID'] ?>"><?php echo real_format($linhaPlanos["pagAnual"]) ?></button></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>

    </div>

    <table class="table table-sm table-secondary table-striped w-75 mx-auto my-5">
        <!-- Tabela de Selecionar seu plano -->
        <thead class="table border border-1 border-secondary border-bottom-0">
            <tr>
                <th colspan="4" class="text-center fs-3">Planos</th>
            </tr>
        </thead>
        <thead class="table-dark">
            <tr>
                <th>Quantidade</th>
                <th>Planos</th>
                <th>Valor Unitário</th>
                <th>Valor Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="number" class="qtd" id="qtdPlain" value='1' /></td>
                <td>
                    <select class="form-select mb-3 w-100" id="plain" name="plain">
                        <?php while ($linhaPlanos2 = mysqli_fetch_assoc($listaPlanos2)) { ?>
                            <option value='<?php echo $linhaPlanos2["planoID"] ?>'><?php echo $linhaPlanos2["nomePlano"] ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td><input type="text" class="valUnit" id="PlainValUnit" readonly="readonly" value="<?php echo real_format($valPag[0]['pagMensal']) ?>" /></td>
                <td><input type="text" class="valTot" id="PlainValTot" readonly="readonly" value='<?php echo real_format($valPag[0]['pagMensal']) ?>' /></td>
            </tr>
        </tbody>
    </table>

    <table class="table table-secondary table-striped w-75 mx-auto my-5">
        <!-- Tabela de Orçamento-->
        <thead class="table border border-1 border-secondary border-bottom-0">
            <tr>
                <th colspan="2" class="text-center fs-3">Orçamento</th>
            </tr>
        </thead>
        <thead class="table-dark">
            <tr>
                <th>Investimento Inicial</th>
                <th>Mensalidade</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="text" class="investimento" id="investimento" readonly="readonly" value="" /></td>
                <td><input type="text" class="mensalidade" id="mensalidade" readonly="readonly" value='<?php echo real_format($valPag[0]['pagMensal']) ?>' /></td>
            </tr>
        </tbody>
    </table>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>