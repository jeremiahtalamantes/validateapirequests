<?php

/**
 * 
 * MAIN.PHP
 * 
 * Sample code that will simulate instantiating a new client
 * and send a request with the apiSecret
 *  
 */

// Needs this to instantiate a new Client 
include 'client.php';

// Get the API Secret from an environment variable
$apiSecret = getenv('API_SECRET');

// Quick check to ensure we got the secret okay
if (!$apiSecret) {
    die("Environment variable API_SECRET is not set. Please set it to proceed.\n");
}

/**
 * IT IS BEST PRACTICE TO RETRIEVE A SECRET FROM A KEY VAULT OR ENVIRONMENT VARIABLE, BUT
 * FOR TESTING PURPOSES, COMMENT OUT LINES #16 AND LINES #19 TO #21. THEN UNCOMMENT
 * LINE #29.
 */

// $apiSecret = 'your api secret here for testing only';

/**
 * 
 */

// Initialize Client with the API secret and send a request
$client = new Client($apiSecret);
$client->sendRequest();

?>
