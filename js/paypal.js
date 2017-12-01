jQuery(document).ready(function($) {
    function initPaypalButton(total) {
        let sandboxId = "ASA0GN2Cm7RR00_4Bl1ig9lnTK_ARaIc2xCx-C0201nCSqG7d7_R7v92Xk2jJjg1oQeOJ9BW_bifNk8I"; 
        let prodId = "AXoWgdRrFSlxba9hEccAEH_UhtXzWNzCP3h4KBX_gTgRVSrei-QnxJOGJgmg14pQOQH0wkFt40oD3W_C"; 
        
        paypal.Button.render({

             style: {
                size: 'medium',
                color: 'gold',
                shape: 'rect',
                label: 'checkout'
            },

            env: 'sandbox', // Or 'sandbox'

            client: {
                sandbox:    sandboxId,
                production: prodId
            },

            commit: true, // Show a 'Pay Now' button

            payment: function(data, actions) {
                return actions.payment.create({
                    payment: {
                        transactions: [
                            {
                                amount: { total: total, currency: 'MXN' }
                            }
                        ]
                    }
                });
            },

            onAuthorize: function(data, actions) {
                return actions.payment.execute().then(function(payment) {
                    console.log(payment);
                    alert("Pagado perro");
                    // AJAX CALL TO BUY CART 
                    $.ajax({
                        url: 'comprarCarrito.php',
                        type: 'POST',
                    })
                    .done(function() {
                        alert("SUCCESS");
                        window.location.replace("../gracias");
                    })
                    .fail(function() {
                        console.log("error");
                    })                    
                });
            }

        }, '#paypal-button');
    }; 

    $.ajax({
        url: '../carrito/total.php',
        type: 'POST',
    })
    .done(function(data) {
        if (isNaN(parseInt(data))) {
            alert("Parece haber un error intentelo más tarde");
        }else {
            initPaypalButton(parseInt(data));
        }
        
    })
    .fail(function() {
        alert("error");
    });
    
    
	
});