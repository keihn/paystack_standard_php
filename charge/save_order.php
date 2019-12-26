

<?php

if(isset($_POST['save_order'])){


    // $db = Database();

    $email = $_POST['email'];
    $amount = $_POST['amount'];
    $cartid = $_POST['cartid'];




    require '../vendor/autoload.php';

    $reference = $cartid;


// the code below throws an exception if there was a problem completing the request, 
// else returns an object created from the json response

$paystack = new Yabacon\Paystack('sk_test_009d695b57ba8f641e9766795f8a86cdd263810a');
    try
    {
      $tranx = $paystack->transaction->initialize([
        'amount'=>$amount, /* 20 naira */
        'email'=>$email,
        // 'callback_url'=>'http://your-site.tld/folder/anotherfolder/verify.php',
        'metadata'=>json_encode([
        //   'cart_id'=>$_POST['cartid'],
          'reference'=>$reference,
          'custom_fields'=> [
            [
              'display_name'=> "Paid on",
              'variable_name'=> "paid_on",
              'value'=> 'Website'
            ],
            [
              'display_name'=> "Paid via",
              'variable_name'=> "paid_via",
              'value'=> 'Standard'
            ]
          ]
        ])
      ]);
    } catch(\Yabacon\Paystack\Exception\ApiException $e){
      print_r($e->getResponseObject());
      die($e->getMessage());
    }


    // store transaction reference so we can query in case user never comes back
    // perhaps due to network issue
    // save_last_transaction_reference($tranx->data->reference);

    // print_r($tranx);

    // redirect to page so User can pay
    header('Location: ' . $tranx->data->authorization_url);
}


