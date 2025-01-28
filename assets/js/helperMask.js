$(function(){
    $('[name=cpf]').mask('999.999.999-99');
   // $('[name=cep]').mask('99999-999');
    $('[name=cnpj]').mask('99.999.999/9999-99');
    $('[name=cpf1]').mask('999.999.999-99');
    $('[name=cnpj1]').mask('99.999.999/9999-99');
    $('[name=cpf2]').mask('999.999.999-99');
    $('[name=cnpj2]').mask('99.999.999/9999-99');
    $('[name=cnpj_contratado]').mask('99.999.999/9999-99');
    $('[name=tel_fixo]').mask('(99) 9999-9999');
    $('[name=ramal]').mask('9999-9999');
    $('[name=celular]').mask('(99)99999-9999');
    $('[name=tel_fixo2]').mask('(99) 9999-9999');
    $('[name=tel_celular2]').mask('(99) 99999-9999');
    $('[name=coord_N]').mask('9.999.999');
    $('[name=coord_E]').mask('999.999');
    $('[name=valor_inicial]').maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
    $('[name=valor_pago]').maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});

    $('[name=empreendedor1]').change(function(){
        var val = $(this).val();
        if(val == 'fisico'){
            $('[name=cpf1]').parent().show();
            $('[name=cnpj1]').parent().hide();
        } else {
            $('[name=cpf1]').parent().hide();
            $('[name=cnpj1]').parent().show();
        }
    })

    $('[name=empreendedor2]').change(function(){
        var val = $(this).val();
        if(val == 'fisico'){
            $('[name=cpf2]').parent().show();
            $('[name=cnpj2]').parent().hide();
        } else {
            $('[name=cpf2]').parent().hide();
            $('[name=cnpj2]').parent().show();
        }
    })
})

