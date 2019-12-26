
<?php

require_once '../vendor/autoload.php';

$event = Yabacon\Paystack\Event::capture();
    http_response_code(200);


    print_r($event);

    

    /* It is a important to log all events received. Add code *
     * here to log the signature and body to db or file       */
    // openlog('MyPaystackEvents', LOG_CONS | LOG_NDELAY | LOG_PID, LOG_USER | LOG_PERROR);
    // syslog(LOG_INFO, $event->raw);
    // closelog();

    /* Verify that the signature matches one of your keys*/
    //  $my_keys = [
    //             'live'=>'sk_live_blah',
    //             'test'=>'sk_test_009d695b57ba8f641e9766795f8a86cdd263810a',
    //           ];
    // $owner = $event->discoverOwner($my_keys);
    // if(!$owner){
    //     // None of the keys matched the event's signature
    //     die();
    // } 

    // Do something with $event->obj
    // Give value to your customer but don't give any output
    // Remember that this is a call from Paystack's servers and
    // Your customer is not seeing the response here at all
    //  switch($event->obj->event){
    //     // charge.success
    //     case 'charge.success':
    //         if('success' === $event->obj->data->status){
    //             // TIP: you may still verify the transaction
    //             // via an API call before giving value.
    //         }
    //         break;
    // }

