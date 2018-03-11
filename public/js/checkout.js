var stripe = Stripe('pk_test_z6mDBuXx0gjdZlLzMvXYfA4W');
var elements = stripe.elements();

var card = elements.create('card');
card.mount('#card-number');



var $form = $('#checkout-form');

$form.submit(function(event){
    $('#charge-error').addClass('hidden');
    $form.find('button').prop('disabled',true);
    stripe.createToken(card).then(stripeResponseHandler);
    return false;
});

function stripeResponseHandler(result){
    if(result.error){
        console.log('error');
        $('#charge-error').removeClass('hidden');
        $('#charge-error').text(result.error.message)
        $form.find('button').prop('disabled',false);
    }else{
        console.log('pass');
        var token = result.token.id;
        $form.append($('<input type="hidden" name="stripeToken" />').val(token));
        $form.get(0).submit();
    }
}


