<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use GuzzleHttp\Client;
// use Symfony\Component\HttpFoundation\Request;
use GuzzleHttp\Psr7\Request;
class PayController extends Controller
{

// public function __construct(){

//     $this->orderid = "21798378";
//     $this->merchantid = config('app.merchant_id');
//     $this->merchantpw = "66d72697efb172ee7f50f2fd7a506d37";
//     $this->amount = "10.00";
//     $this->returnurl = "http://localhost/mastercard";
//     $this->currency = "USD";
// }

public function sms(){  
        
    $client = new Client();
    $options = [
      'multipart' => [
        [
          'name' => 'token',
          'contents' => 'cmajj893nKAWJ'
        ],
        [
          'name' => 'phone',
          'contents' => '251947102017'
        ],
        [
          'name' => 'msg',
          'contents' => 'your message'
        ],
        [
          'name' => 'shortcode_id',
          'contents' => '9481'
        ]
    ]];
    $request = new Request('POST', 'https://api.geezsms.com/api/v1/sms/send');
    $res = $client->sendAsync($request, $options)->wait();
    echo $res->getBody();
    
    }
public function pay(){

    return config('app.merchant_id');

    $client = new Client(['base_uri' => 'https://test-gateway.mastercard.com/']);

    $response = $client->request('POST', '/api/nvp/version/49', ['form_params' => [
    
        "apiOperation" => "CREATE_CHECKOUT_SESSION",
        "apiPassword" => $this->merchantpw,
        "apiUsername" => "merchant.$this->merchantid",
        "merchant" => $this->merchantid,
        "order.id" => $this->orderid,
        "order.amount" => $this->amount,
        "order.currency" => $this->currency,
        "interaction.returnUrl" => $this->returnurl
    
     ]], [
              'verify' => false
              ]);

   $result = $response->getBody();
   
   $sessionId = explode("=",explode("&",$result)[2])[1];
   echo $sessionId;
   
   $this->show($sessionId);
            }
            
            
            public function show($sessionId){
            
            ?>
                <script src="https://test-gateway.mastercard.com/checkout/version/49/checkout.js"
                data-error="errorCallback" data-cancel="cancelCallback"></script>
                       <script type="text/javascript">
                           function errorCallback(error) {
                               console.log(JSON.stringify(error));
                           }
                           function cancelCallback() {
                               console.log('Payment cancelled');
                           }
                           Checkout.configure({
                       merchant: '<?php echo $this->merchantid ?>',
                       order: {
                       amount: function(){
                           return '<?php echo $this->amount ?>'
                       },
                       currency: '<?php echo $this->currency ?>',
                       description: 'hello',
                       id: '<?php echo $this->orderid ?>'
                       },
                           session: { 
                               id: '<?php echo $sessionId ?>'
                               },
                           interaction: {
                                   merchant: {
                                       name: 'Mike',
                                       address: {
                                           line1: '200 Sample St',
                                           line2: '1234 Example Town'            
                                       }    
                                   }
                           }
                           });
                           Checkout.showPaymentPage()
       
                           
                       </script>
                       <?php
            }
}
