<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script id="alfa-payment-script" 
        type="text/javascript"
        src="https://testpay.alfabank.ru/assets/alfa-payment.js"> 
    </script>
</head>

<body>

    <span class="orderNumber"><?= uniqId();?></span>
    <span class="amount">6990</span>

    <div id="alfa-payment-button"
    data-amount-selector='.amount'
    data-order-number-selector='.orderNumber'
    data-version='1.0'
    data-amount-format='rubli'
    data-client-info-selector='.clientInfo'
    data-token='qmr4hi9gnv2fgold9a3bq1f7ji'
    data-description='Самый вкусный торт'
    data-language='en'
    data-stages='1'
    data-email-selector='.clientEmail'
    >
    </div>
</body>

</html>