<?php 

class azampay

{   //Options are sandbox and production
  private static $environment = "sandbox";
	private static $appName = "ROYAL LINER EXPRESS";
	private static $clientId = "7daf23e5-4ba3-4e17-a224-3e54403c6286";
	private static $clientSecret = "F/Bg/M2UIvFutvnmrYNc0gaKKOtRDoAGo5s0oMMUfkMCZjjoGV8MTdFWDAQ4pgfY5sKiUohX9rQ39L5nn1Hwcrs4dE5LUAQvSNX6scDsNgqIg+Dn79edEVtOOTrYMtgmvNw8zrW7o/UYKgTSGqmJ4wPF6fjornGp1+KEGAocr/HkZtoP8YyuxifOn1Iv8q0qcphdRdeK9rX+FDlpR5U+fB48CfUiknR/ZCEYqdlUQxwv+asY6J+QaoTOuBoSImsw86/oBVa3vm6zx9IAvPBnt81BIvXrSebSbv5aOxcCQwXGbnaBdODYrwL2agejG9lQnIQtfXlsLUDoWeClYkG12ySsnU5Zk4QirXO1JG2f2CBRMxhdQcLo+IbXiblL7rCCxBG1++c3jPChtkwogki8TOchSYIT/556eLRzxtB7SIoK6Kj0N8SvhXKdOZ5nTUslPZ8QD4UKIgFGkfy3uo02egdf+2Or+15J/TKnBGnb9VpsmTph1rP6RGkaGYkx8vgSgNnfR6sFueUac6v8SYojCuxAEX/N3FDRJhbQ3bL9BenNBvmXGlUq0rOKqN8j/inQqkMtKL8T4xtiTVy/dYRUj1E6YcY1KxIJTaMwi6522rbmwHVlJklUJZ6Ze1N+urtReI+XUrQNdDyPOVemUyGG6t3FEMJUj1OJpmjlz4wKWzc=";

	//Environment URLS
	public static function envUrls()
	{
		$auth_url = "https://authenticator-sandbox.azampay.co.tz";
		$checkout_url = "https://sandbox.azampay.co.tz";
        
        //Base URLs for production
		if (azampay::$environment == "production") {
			$auth_url = "https://authenticator.azampay.co.tz";
		    $checkout_url = "https://checkout.azampay.co.tz";
			
		}

		return ["auth_url"=>$auth_url, "checkout_url"=>$checkout_url ];

	}
	//Authorisation token
	public static function authtoken()
	{


            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://authenticator-sandbox.azampay.co.tz/AppRegistration/GenerateToken',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS =>'{
              "appName": "'.azampay::$appName.'",
              "clientId": "'.azampay::$clientId.'",
              "clientSecret": "'.azampay::$clientSecret.'"
              }',
                CURLOPT_HTTPHEADER => array(
                  'Content-Type: application/json'
                ),
              ));

              $response = curl_exec($curl);
              $result = json_decode($response);

              curl_close($curl);
              return $result;

	}

	//MNO checkout
	public static function mnocheckout($accountNumber, $amount,  $currency,$provider)
	{         //UUID ID generator
             $externalId = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4));
		      $curl = curl_init();
              curl_setopt_array($curl, array(
                CURLOPT_URL => ''.azampay::envUrls()["checkout_url"].'/azampay/mno/checkout',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{
                "accountNumber": "'.$accountNumber.'",
                "additionalProperties": {
                  "property1": 878346737777,
                  "property2": 878346737777
                },
                "amount": "'.$amount.'",
                "currency": "'.$currency.'",
                "externalId": "'.$externalId.'",
                "provider": "'.$provider.'"
              }',
                CURLOPT_HTTPHEADER => array(
                  'Authorization: Bearer '.azampay::authtoken()->data->accessToken.'',
                  'Content-Type: application/json'
                ),
              ));

              $response = curl_exec($curl);
              $result = json_decode($response);
              curl_close($curl);
              
              //Return checkout link or json data
               return array($result, $externalId);
        }
	}

