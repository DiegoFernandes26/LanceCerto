$(document).ready(function () {
    $(".button-collapse").sideNav();
    // $('.tap-target').tapTarget('open');
    // $('.tap-target').tapTarget('close');

    $("#menu").click(function () {
        $(".container-cad").fadeToggle();
    });


    $('.datepicker').pickadate({
        format: 'mm/dd/yyyy',
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });


    $(".dinheiro").maskMoney({showSymbol: true, symbol: "R$ ", decimal: ",", thousands: "."});

});


// traduzir para pt-br o campo data
$('.datepicker').pickadate({
    monthsFull: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
    monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
    weekdaysFull: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabádo'],
    weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
    today: 'Hoje',
    clear: 'Limpar',
    close: 'Pronto',
    labelMonthNext: 'Próximo mês',
    labelMonthPrev: 'Mês anterior',
    labelMonthSelect: 'Selecione um mês',
    labelYearSelect: 'Selecione um ano',
    selectMonths: true,
    selectYears: 15,
    format: 'mm/dd/yyyy',
});


$(".carrega").click(function () {
    $(".carrega-load").fadeIn();
});

$(document).ready(function () {
    $('select').material_select();
});

