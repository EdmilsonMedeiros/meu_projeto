import './bootstrap';
import '../sass/app.scss';
import '@popperjs/core'
import 'bootstrap/dist/js/bootstrap'
import 'bootstrap/dist/js/bootstrap.bundle'
import 'bootstrap/js/dist/tooltip'

$(function(){
    $("#valor_receita").maskMoney({
        allowNegative: true,
        thousands: '.',
        decimal: ','
    });
});
$(function(){
    $("#valor_despesa").maskMoney({
        allowNegative: true,
        thousands: '.',
        decimal: ','
    });
});
$(function(){
    $("#title-valor").maskMoney({
        allowNegative: true,
        thousands: '.',
        decimal: ','
    });
});
$(function(){
    $(".valor_edit_lancamento").maskMoney({
        allowNegative: true,
        thousands: '.',
        decimal: ','
    });
});
$( function() {
  $( '.tooltip-arrow' ).tooltip();
} );
