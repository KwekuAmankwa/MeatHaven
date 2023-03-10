paypal.Buttons({
    style : {
        color: 'blue',
        shape: 'pill'
    },
    createOrder: function(data, actions){
        return actions.order.create({
            purchase_units: [{
                amount:{
                    value:$('#amt').html()
                }
            }]
        })
    },
    onApprove: function(data, actions){
        return actions.order.capture().then(function (details){
            console.log(details)
            window.location.href = "../Actions_Functions/pay.php?status=completed"
        })
    },
    onCancel: function(data){
        window.location.href = "../View/cart.php?status=failed"
    }
}).render('#paypal-payment-button');
