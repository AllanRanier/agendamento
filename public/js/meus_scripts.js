// confirmar exclusao no banco de dados
function confirm_delete(mensagem, href, nota = null) {
    $('span#modal_confirm-body').html(mensagem);
    $('a#modal_confirm-href').attr('href', href);
    if (nota) { $('span#modal_confirm-note').html(nota); }
    $('div#modal_confirm').modal('show');
}
// -------------------------------------------------------------------------

// mascaras do formulario
$(function () {
    // necessita da class no campo para funcionamento da função
    $('.money').mask('#.##0,00', { reverse: true });
    $('.percent').mask('##0,00%', { reverse: true });
    $('.phone').mask('(00) 0.0000-0000');
    $('.phoneFixo').mask('(00) 0000-0000');
    $('.cpf').mask('000.000.000-00', { reverse: true });
    $('.cnpj').mask('00.000.000/0000-00', { reverse: true });
    var elementCpfCnpj = $('.cpfCnpj');
    var options = {
        onKeyPress: function (cpf, ev, el, op) {
            var masks = ['000.000.000-000', '00.000.000/0000-00'];
            elementCpfCnpj.mask((cpf.length > 14) ? masks[1] : masks[0], op);
        }
    }
    elementCpfCnpj.length > 11 ? elementCpfCnpj.mask('00.000.000/0000-00', options) : elementCpfCnpj.mask('000.000.000-00#', options);

    // função já vai automaticamente pelo id do campo
    $('#cep').mask('00.000-000');
    $('#cpf').mask('000.000.000-00', { reverse: true });
    $('#cnpj').mask('00.000.000/0000-00', { reverse: true });
    $('#phone').mask('(00) 0.0000-0000');

})

function stringToDouble(value) {
    try {
        if (value == undefined || value == null || value == '') throw "Error";
        value = value.replaceAll('R$ ', '').trim();
        value = value.replaceAll('.', '');
        value = value.replaceAll(',', '.');
        value = parseFloat(value);

    } catch (exception) {
        value = 0.00;

    } finally {
        return value;
    }
}

function doubleToString(value) {
    try {
        value = new Intl.NumberFormat('pt-PT', { style: 'currency', currency: 'BRL' }).format(value);
        value = value.replaceAll('R$', '').trim();
        value = value.replaceAll(' ', '.');
        value = 'R$ ' + value;

    } catch (exception) {
        value = '' + value;

    } finally {
        return value;
    }
}

// busca endereço pelo cep
function searchAddress() {
    // segue apenas se existir um botao de span para busca do cep
    if (this.tagName == 'SPAN') {
        var cep = $("#cep").val().replaceAll(/\D/g, '');
        if (cep != "") {
            $("#endereco").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#uf").val("");
            $("#uf_associado").val("");
            $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(result) {
                if (result.error == null) {
                    console.log(result)
                    //Atualiza os campos com os valores da consulta.
                    $("#endereco").val(result.logradouro);
                    $("#bairro").val(result.bairro);
                    $("#cidade").val(result.localidade);
                    $("#uf").val(result.uf);
                    $("#uf_associado").val(result.uf);
                }
            });
        }
    }
}

// inclui o R$ nos campos de class .money
function passRsMoney() {
    var value = $(this).val().replaceAll('R$ ', '');
    if (value != '') {
        if (!value.includes(',')) { value = value + ',00'; }
        $(this).val('R$ ' + value);
    }
}

// funcoes globais após carregamento da página
$(document).ready(function () {
    // chamada da função "searchAddress" responsavel pela busca do endereço pelo cep
    $('#cep').next().click(searchAddress);
    // formata o campo de moeda no formato real brasileiro
    $('.money').change(passRsMoney); // passa R$ ao modificar o valor do campo
    $('.money').each(passRsMoney); // passa o R$ ao formulario ser carregado
});
