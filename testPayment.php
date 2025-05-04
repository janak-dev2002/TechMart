<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Directpay|OneTimePayment</title>
    </head>
    <div id="card_container"></div>
    <body>
        <script src="https://cdn.directpay.lk/dev/v1/directpayCardPayment.js?v=1"></script>
        <script>
             DirectPayCardPayment.init({
                    container: 'card_container', //<div id="card_container"></div>
                    merchantId: 'CT15721', //your merchant_id
                    amount: "100.00",
                    refCode: "DP12345", //unique referance code form merchant
                    currency: 'LKR',
                    type: 'ONE_TIME_PAYMENT',
                    customerEmail: 'janakasangeethjava2@gmail.com',
                    customerMobile: '+94762228848',
                    description: 'test products',  //product or service description
                    debug: true,
                    responseCallback: responseCallback,
                    errorCallback: errorCallback,
                    logo: 'https://test.com/directpay_logo.png',
                    apiKey: '767d0a38388781fc4baa6c4713951ca717a2f5a7e395807e67cf297635bc40df'
                });

             //response callback.
             function responseCallback(result) {
                    console.log("successCallback-Client", result);
                    alert(JSON.stringify(result));
                }

             //error callback
             function errorCallback(result) {
                    console.log("successCallback-Client", result);
                    alert(JSON.stringify(result));
               }
        </script>
    </body>
</html>
