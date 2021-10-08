let plano = document.getElementById("plano")
let opPlano = document.getElementById("plain")
let qtdPlain = document.getElementById("qtdPlain")
let mensalidade = document.getElementById("mensalidade")
let maoObra = document.getElementById("maoObra")
let licenca = document.getElementById("licenca")
let planoDiamanteAnual = $(".valorPlanoAnual[value=4]")
let planoDiamanteMensal = $(".valorPlanoMensal[value=4]")
let optionPlain = opPlano.options[opPlano.selectedIndex].value
let value = plano.options[plano.selectedIndex].value

maoObra.addEventListener("focus", function(){
    maoObra.value = null
})

maoObra.addEventListener("blur", function(){
    let valMaoObra = maoObra.value
    maoObra.value = Number(valMaoObra).toLocaleString("pt-br", {style: "currency", currency: "BRL"})
    investimentoInicial()
})

licenca.addEventListener("change", function(){
    valorPlanos()
    investimentoInicial()
})

plano.addEventListener("change", function(){
    valorPlanos()
    investimentoInicial()
})

opPlano.addEventListener("change", function(){
    valorPlanos()
    investimentoInicial()
})

qtdPlain.addEventListener("change", function(){
    valorTotal(qtdPlain)
    investimentoInicial()
})

function valorPlanos(){
    optionPlain = opPlano.options[opPlano.selectedIndex].value //Tipo do plano
    value = plano.options[plano.selectedIndex].value //Formas de Pagamento
    valueLicenca = licenca.options[licenca.selectedIndex].value //Quantidade de Licenças
    planoPagamento(optionPlain, value, valueLicenca)
    quantidadeLicenca(value, valueLicenca)

    qtdPlain = document.getElementById("qtdPlain")
    valorTotal(qtdPlain)
}

function valorTotal(quant){
    let newQtdPlain = quant.value
    let valorUnit = document.getElementById("PlainValUnit").value
    valorUnit = valorUnit.replace(",", ".")
    valorUnit = valorUnit.replace("R$ ", "")
    let valorTot = document.getElementById("PlainValTot")
    let valorTotal = (Number(newQtdPlain)*Number(valorUnit)).toLocaleString("pt-br", {style: "currency", currency: "BRL"})
    valorTot.value = valorTotal
    mensalidade.value = valorTotal
}

function planoPagamento (tipoPlano, pagPlano, qtdLicenca){
    let valorUnit = document.getElementById("PlainValUnit")
    let valorTot = document.getElementById("PlainValTot")
    if(tipoPlano==1){
        if(pagPlano==1){
            valorUnit.value = "R$ 39,00"
            valorTot.value = "R$ 39,00"
        } else if(pagPlano==2){
            valorUnit.value = "R$ 15,90"
            valorTot.value = "R$ 15,90"
        }
    } else if(tipoPlano==2){
        if(pagPlano==1){
            valorUnit.value = "R$ 49,00"
            valorTot.value = "R$ 49,00"
        } else if(pagPlano==2){
            valorUnit.value = "R$ 19,60"
            valorTot.value = "R$ 19,60"
        }
    } else if(tipoPlano==3){
        if(pagPlano==1){
            valorUnit.value = "R$ 59,00"
            valorTot.value = "R$ 59,00"
        } else if(pagPlano==2){
            valorUnit.value = "R$ 23,01"
            valorTot.value = "R$ 23,01"
        }
    } else if(tipoPlano==4){
        if(pagPlano==1){
            if(qtdLicenca==1){
                valorUnit.value = "R$ 69,00"
                valorTot.value = "R$ 69,00"
            } else if(qtdLicenca==10){
                valorUnit.value = "R$ 59,00"
                valorTot.value = "R$ 59,00"
            } else if(qtdLicenca==15){
                valorUnit.value = "R$ 57,00"
                valorTot.value = "R$ 57,00"
            } else if(qtdLicenca==20){
                valorUnit.value = "R$ 55,00"
                valorTot.value = "R$ 55,00"
            } else if(qtdLicenca==30){
                valorUnit.value = "R$ 53,00"
                valorTot.value = "R$ 53,00"
            } else if(qtdLicenca==40){
                valorUnit.value = "R$ 51,00"
                valorTot.value = "R$ 51,00"
            } else if(qtdLicenca==60){
                valorUnit.value = "R$ 45,00"
                valorTot.value = "R$ 45,00"
            } else if(qtdLicenca==100){
                valorUnit.value = "R$ 39,00"
                valorTot.value = "R$ 39,00"
            }
        } else if(pagPlano==2){
            if(qtdLicenca==1){
                valorUnit.value = "R$ 26,91"
                valorTot.value = "R$ 26,91"
            } else if(qtdLicenca==10){
                valorUnit.value = "R$ 26,67"
                valorTot.value = "R$ 26,67"
            } else if(qtdLicenca==15){
                valorUnit.value = "R$ 26,50"
                valorTot.value = "R$ 26,50"
            } else if(qtdLicenca==20){
                valorUnit.value = "R$ 26,17"
                valorTot.value = "R$ 26,17"
            } else if(qtdLicenca==30){
                valorUnit.value = "R$ 25,83"
                valorTot.value = "R$ 25,83"
            } else if(qtdLicenca==40){
                valorUnit.value = "R$ 25,50"
                valorTot.value = "R$ 25,50"
            } else if(qtdLicenca==60){
                valorUnit.value = "R$ 24,90"
                valorTot.value = "R$ 24,90"
            } else if(qtdLicenca==100){
                valorUnit.value = "R$ 24,50"
                valorTot.value = "R$ 24,50"
            }
        }
    }
    if (pagPlano==1){
        $(".anual").css("display", "none")
        $(".mensal").css("display", "block")
    } else if(pagPlano==2){
        $(".mensal").css("display", "none")
        $(".anual").css("display", "block")
    }
}

function quantidadeLicenca(formPag, quantLicen){
    if(formPag==1){
        if(quantLicen==1){
            planoDiamanteMensal.text("R$ 69,00")
        } else if(quantLicen==10){
            planoDiamanteMensal.text("R$ 59,00")
        } else if(quantLicen==15){
            planoDiamanteMensal.text("R$ 57,00")
        } else if(quantLicen==20){
            planoDiamanteMensal.text("R$ 55,00")
        } else if(quantLicen==30){
            planoDiamanteMensal.text("R$ 53,00")
        } else if(quantLicen==40){
            planoDiamanteMensal.text("R$ 51,00")
        } else if(quantLicen==60){
            planoDiamanteMensal.text("R$ 45,00")
        } else if(quantLicen==100){
            planoDiamanteMensal.text("R$ 39,00")
        }
    } else if(formPag==2){
        if(quantLicen==1){
            planoDiamanteAnual.text("R$ 26,91")
        } else if(quantLicen==10){
            planoDiamanteAnual.text("R$ 26,67")
        } else if(quantLicen==15){
            planoDiamanteAnual.text("R$ 26,50")
        } else if(quantLicen==20){
            planoDiamanteAnual.text("R$ 26,17")
        } else if(quantLicen==30){
            planoDiamanteAnual.text("R$ 25,83")
        } else if(quantLicen==40){
            planoDiamanteAnual.text("R$ 25,50")
        } else if(quantLicen==60){
            planoDiamanteAnual.text("R$ 24,90")
        } else if(quantLicen==100){
            planoDiamanteAnual.text("R$ 24,50")
        }   
    }
}

function investimentoInicial(){
    let valorTotalTVs = document.getElementById("valorTotalTVs").value
    valorTotalTVs = valorTotalTVs.replace(".","").replace(",",".").replace("R$","")

    let valorTotalPlayers = document.getElementById("valorTotalPlayers").value
    valorTotalPlayers = valorTotalPlayers.replace(".","").replace(",",".").replace("R$","")
    
    let maoDeObra = document.getElementById("maoObra").value
    maoDeObra = maoDeObra.replace(".","").replace(",",".").replace("R$","")

    let valorMensal = document.getElementById("mensalidade").value
    valorMensal = valorMensal.replace(",",".").replace("R$", "").replace(" ", "")

    let investimento = document.getElementById("investimento")
    investimento.value = (Number(valorTotalTVs)+Number(valorTotalPlayers)+Number(maoDeObra)+Number(valorMensal)).toLocaleString("pt-br", {style: "currency", currency: "BRL"})
}
investimentoInicial()

//Tabela de TVs
$(".alterTV").click(function(){
    this.style.display = "none"
    let valorSave = $(this).siblings(".saveTV")
    valorSave.css("display", "block")
    
    let pai = $(this).parent()
    let tioNome = $(pai).siblings(".nomeTV")
    let nome = $(tioNome).find(".nomeTV")
    nome.removeAttr('readonly')
    
    let tioQtd = $(pai).siblings(".quantidadeTV")
    let quantidade = $(tioQtd).find(".quantidadeTV")
    quantidade.removeAttr('readonly')
    
    let tioValUnit = $(pai).siblings(".valorUnitarioTV")
    let valorUnitario = $(tioValUnit).find(".valorUnitarioTV")
    valorUnitario.removeAttr('readonly')
})

$(".saveTV").click(function(){
    this.style.display = "none"
    let valorALter = $(this).siblings(".alterTV")
    valorALter.css("display", "block")

    let pai = $(this).parent()
    let tioNome = $(pai).siblings(".nomeTV")
    let nome = $(tioNome).find(".nomeTV")
    nome.attr('readonly', 'readonly');
    
    let tioQtd = $(pai).siblings(".quantidadeTV")
    let quantidade = $(tioQtd).find(".quantidadeTV")
    quantidade.attr('readonly', 'readonly');
    
    let tioValUnit = $(pai).siblings(".valorUnitarioTV")
    let valorUnitario = $(tioValUnit).find(".valorUnitarioTV")
    valorUnitario.attr('readonly', 'readonly');
})

$(".formTV").submit(function(e){
    e.preventDefault()
    let dadosForm = $(this)
    enviarDadosTV(dadosForm)
})

function enviarDadosTV(data){
    $.ajax({
        url: 'php/updateTV.php',
        type: 'POST',
        data: data.serialize(),
        async: false
    }).done(function(data){
        console.log("Dados enviados")
        data = JSON.parse(data);
        valorTotTVs(data)
        somaTotalTVs()
    }).fail(function(){
        console.log("Dados não foram enviados")
    })
}

function valorTotTVs(dadosTV){
    let tio = $(".TvID[value="+dadosTV.TvID+"]")
    let pai = $(tio).siblings(".valTotTV")
    let filho = $(pai).find(".valTotTV")
    filho.val((Number(dadosTV.quantidade)*Number(dadosTV.valorUnitario)).toLocaleString("pt-br", {style: "currency", currency: "BRL"}))
}

function somaTotalTVs(){
    let aux = 0.0
    for(var i=0; i<=10; i++){
        let valorTotalTelevioes = $(".valorTotalTv:nth("+i+")").val()
        valorTotalTelevioes = valorTotalTelevioes.replace("R$","").replace(".", "").replace(",",".")
        aux = aux + Number(valorTotalTelevioes)
    }
    
    let somaTotalTVs = document.getElementById("valorTotalTVs")
    somaTotalTVs.value = aux.toLocaleString("pt-br", {style: "currency", currency: "BRL"})
    investimentoInicial()
}

//Tabela de Players
$(".alterPlayer").click(function(){
    this.style.display = "none"
    let valorSave = $(this).siblings(".savePlayer")
    valorSave.css("display", "block")
    
    let pai = $(this).parent()
    let tioNome = $(pai).siblings(".nomePlayer")
    let nome = $(tioNome).find(".nomePlayer")
    nome.removeAttr('readonly')
    
    let tioQtd = $(pai).siblings(".quantidadePlayer")
    let quantidade = $(tioQtd).find(".quantidadePlayer")
    quantidade.removeAttr('readonly')
    
    let tioValUnit = $(pai).siblings(".valorUnitarioPlayer")
    let valorUnitario = $(tioValUnit).find(".valorUnitarioPlayer")
    valorUnitario.removeAttr('readonly')
})

$(".savePlayer").click(function(){
    this.style.display = "none"
    let valorALter = $(this).siblings(".alterPlayer")
    valorALter.css("display", "block")

    let pai = $(this).parent()
    let tioNome = $(pai).siblings(".nomePlayer")
    let nome = $(tioNome).find(".nomePlayer")
    nome.attr('readonly', 'readonly');
    
    let tioQtd = $(pai).siblings(".quantidadePlayer")
    let quantidade = $(tioQtd).find(".quantidadePlayer")
    quantidade.attr('readonly', 'readonly');
    
    let tioValUnit = $(pai).siblings(".valorUnitarioPlayer")
    let valorUnitario = $(tioValUnit).find(".valorUnitarioPlayer")
    valorUnitario.attr('readonly', 'readonly');
})

$(".formPlayer").submit(function(e){
    e.preventDefault()
    let dadosForm = $(this)
    enviarDadosPlayer(dadosForm)
})

function enviarDadosPlayer(data){
    $.ajax({
        url: 'php/updatePlayer.php',
        type: 'POST',
        data: data.serialize(),
        async: false
    }).done(function(data){
        console.log("Dados enviados")
        data = JSON.parse(data);
        valorTotPlayers(data)
        somaTotalPlayers()
    }).fail(function(){
        console.log("Dados não foram enviados")
    })
}

function valorTotPlayers(dadosPlayer){
    let tio = $(".playerID[value="+dadosPlayer.playerID+"]")
    let pai = $(tio).siblings(".valTotPlayer")
    let filho = $(pai).find(".valTotPlayer")
    filho.val((Number(dadosPlayer.quantidade)*Number(dadosPlayer.valorUnitario)).toLocaleString("pt-br", {style: "currency", currency: "BRL"}))
}

function somaTotalPlayers(){
    let aux = 0.0
    for(var i=0; i<=2; i++){
        let valorTotalPlayers = $(".valorTotalPlayer:nth("+i+")").val()
        valorTotalPlayers = valorTotalPlayers.replace("R$","").replace(".", "").replace(",",".")
        aux = aux + Number(valorTotalPlayers)
    }
    
    let somaTotalPlayers = document.getElementById("valorTotalPlayers")
    somaTotalPlayers.value = aux.toLocaleString("pt-br", {style: "currency", currency: "BRL"})
    investimentoInicial()
}