/**
 * Created by Erick on 02/08/2017.
 */
$(document).ready(function () {
    $('.datemask').mask('00/00/0000');
    $('.time').mask('00:00:00');
    $('.hora_min').mask('00:00');
    $('.date_time').mask('00/00/0000 00:00');
    $('.daterange').mask('00/00/0000 - 00/00/0000');
    $('.cep').mask('00000-000');
    $('.phone').mask('0000-0000');
    $('.phone_with_ddd').mask('(00) 0000-0000');
    $('.cel_with_ddd').mask('(00) 00000-0000');
    $('.phone_us').mask('(000) 000-0000');
    $('.mixed').mask('AAA 000-S0S');
    $('.cpf').mask('000.000.000-00', {reverse: true});
    $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
    $('.money').mask('000.000.000.000.000,00', {reverse: true});
    $('.money2').mask("#.##0,00", {reverse: true});
    $('.mac').mask('AA:AA:AA:AA:AA:AA', {
            onKeyPress: function(str, e, obj){
                $(obj).val(str.toLowerCase());
            }
        }
    );
    $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
        translation: {
            'Z': {
                pattern: /[0-9]/,
                optional: true
            }
        }
    });
    
    $('.ip_address').mask('099.099.099.099');
    $('.percent').mask('##0,00%', {reverse: true});
    $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
    $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
    $('.fallback').mask("00r00r0000", {
        translation: {
            'r': {
                pattern: /[\/]/,
                fallback: '/'
            },
            placeholder: "__/__/____"
        }
    });
    $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});

    var options = {
        onKeyPress: function (cpf, ev, el, op) {
            var masks = ['000.000.000-000', '00.000.000/0000-00'];
            $('.cpfOuCnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
        }
    }

    $('.cpfOuCnpj').length > 11 ? $('.cpfOuCnpj').mask('00.000.000/0000-00', options) : $('.cpfOuCnpj').mask('000.000.000-00#', options);
    
     $('.phone_or_celphone').keydown(function(){

        try {
            $('.phone_or_celphone').unmask();
        } catch (e) {}

        var tamanho = $('.phone_or_celphone').val().length;

        if(tamanho < 10){
            $('.phone_or_celphone').mask("(99) 9999-9999");
        } else if(tamanho >= 10){
            $('.phone_or_celphone').mask("(99) 99999-9999");
        }

        // ajustando foco
        var elem = this;
        setTimeout(function(){
            // mudo a posiÃƒÂ§ÃƒÂ£o do seletor
            elem.selectionStart = elem.selectionEnd = 10000;
        }, 0);
        // reaplico o valor para mudar o foco
        var currentValue = $(this).val();
        $(this).val('');
        $(this).val(currentValue);
    });


      /*CEP*/
      var input = $( 'input' );
      input.filter( "[name='cep']" ).mask( '99999-999', { onComplete: function(cep) {
  
          $.ajax({
              url: 'https://viacep.com.br/ws/' + cep + '/json/',
              type: 'GET',
          }).done(function (data) {
  
              var strJson = JSON.stringify(data);
              var json = JSON && JSON.parse(strJson) || $.parseJSON(strJson);
  
              input.filter("[name='logradouro']").val(json.logradouro);
              input.filter("[name='bairro']").val(json.bairro);
              input.filter("[name='cidade']").val(json.localidade);
              input.filter("[name='estado']").val(json.uf);
  
          });
      }
      });
});