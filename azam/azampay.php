<?php

    include('api.php');

    // This is to ensure browser does not timeout after 30 seconds
    ini_set('max_execution_time', 300);
    set_time_limit(300);

    // Public key on the API listener used to encrypt keys
    $public_key = 'MIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEAszE+xAKVB9HRarr6/uHYYAX/RdD6KGVIGlHv98QKDIH26ldYJQ7zOuo9qEscO0M1psSPe/67AWYLEXh13fbtcSKGP6WFjT9OY6uV5ykw9508x1sW8UQ4ZhTRNrlNsKizE/glkBfcF2lwDXJGQennwgickWz7VN+AP/1c4DnMDfcl8iVIDlsbudFoXQh5aLCYl+XOMt/vls5a479PLMkPcZPOgMTCYTCE6ReX3KD2aGQ62uiu2T4mK+7Z6yvKvhPRF2fTKI+zOFWly//IYlyB+sde42cIU/588msUmgr3G9FYyN2vKPVy/MhIZpiFyVc3vuAAJ/mzue5p/G329wzgcz0ztyluMNAGUL9A4ZiFcKOebT6y6IgIMBeEkTwyhsxRHMFXlQRgTAufaO5hiR/usBMkoazJ6XrGJB8UadjH2m2+kdJIieI4FbjzCiDWKmuM58rllNWdBZK0XVHNsxmBy7yhYw3aAIhFS0fNEuSmKTfFpJFMBzIQYbdTgI28rZPAxVEDdRaypUqBMCq4OstCxgGvR3Dy1eJDjlkuiWK9Y9RGKF8HOI5a4ruHyLheddZxsUihziPF9jKTknsTZtF99eKTIjhV7qfTzxXq+8GGoCEABIyu26LZuL8X12bFqtwLAcjfjoB7HlRHtPszv6PJ0482ofWmeH0BE8om7VrSGxsCAwEAAQ==';

    // Create Context with API to request a SessionKey
    $context = new APIContext();
    // Api key
    $context->set_api_key('6bc4157dbee34d409118e0978dc6dd17');
    // Public key
    $context->set_public_key($public_key);
    // Use ssl/https
    $context->set_ssl(true);
    // Method type (can be GET/POST/PUT)
    $context->set_method_type(APIMethodType::GET);
    // API address
    $context->set_address('uat.openapi.m-pesa.com');
    // API Port
    $context->set_port(443);
    // API Path
    $context->set_path('/sandbox/ipg/v2/vodacomTZN/getSession/');

    // Add/update headers
    $context->add_header('Origin', '*');

    // Parameters can be added to the call as well that on POST will be in JSON format and on GET will be URL parameters
    // context->add_parameter('key', 'value');

    // Create a request object
    $request = new APIRequest($context);

    // Do the API call and put result in a response packet
    $response = null;

    try {
        $response = $request->execute();
    } catch(exception $e) {
        echo 'Call failed: ' . $e->getMessage() . '<br>';
    }

    if ($response->get_body() == null) {
        throw new Exception('SessionKey call failed to get result. Please check.');
    }

    // Display results
    echo $response->get_status_code() . '<br>';
    echo $response->get_headers() . '<br>';
    echo $response->get_body() . '<br>';

    // Decode JSON packet
    $decoded = json_decode($response->get_body());

    // The above call issued a sessionID which can be used as the API key in calls that needs the sessionID
    $context = new APIContext();
    $context->set_api_key($decoded->output_SessionID);
    $context->set_public_key($public_key);
    $context->set_ssl(true);
    $context->set_method_type(APIMethodType::POST);
    $context->set_address('uat.openapi.m-pesa.com');
    $context->set_port(443);
    $context->set_path('/sandbox/ipg/v2/vodafoneGHA/c2bPayment/singleStage/');

    $context->add_header('Origin', '*');

    $context->add_parameter('input_Amount', '10');
    $context->add_parameter('input_Country', 'GHA');
    $context->add_parameter('input_Currency', 'GHS');
    $context->add_parameter('input_CustomerMSISDN', '000000000001');
    $context->add_parameter('input_ServiceProviderCode', '000000');
    $context->add_parameter('input_ThirdPartyConversationID', 'asv02e5958774f7ba228d83d0d689761');
    $context->add_parameter('input_TransactionReference', 'T1234C');
    $context->add_parameter('input_PurchasedItemsDesc', 'Shoes');

    $request = new APIRequest($context);

    // SessionID can take up to 30 seconds to become 'live' in the system and will be invalid until it is
    sleep(30);

    $response = null;

    try {
        $response = $request->execute();
    } catch(exception $e) {
        echo 'Call failed: ' . $e->getMessage() . '<br>';
    }

    if ($response->get_body() == null) {
        throw new Exception('API call failed to get result. Please check.');
    }

    echo $response->get_status_code() . '<br>';
    echo $response->get_headers() . '<br>';
    echo $response->get_body() . '<br>';

?>