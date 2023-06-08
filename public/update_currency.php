<?php

// Fetching JSON
$req_url = 'https://v6.exchangerate-api.com/v6/954aa5b6c7b8eb9edddd8eda/latest/INR';
$response_json = file_get_contents($req_url);

// Continuing if we got a result
if(false !== $response_json) {

    // Try/catch for json_decode operation
    try {

		// Decoding
		$response = json_decode($response_json);

		// Check for success
		if('success' === $response->result) {

			// YOUR APPLICATION CODE HERE, e.g.
		
		// encode array to json
		$json = json_encode( $response->conversion_rates);
		
		
		file_put_contents('/var/www/html/storage/app/currency.json', json_encode($response->conversion_rates));

		}

    }
    catch(Exception $e) {
        // Handle JSON parse error...
    }

}
?> 
