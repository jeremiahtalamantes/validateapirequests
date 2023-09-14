<?php

/**
 * 
 * SERVER.PHP
 * 
 * Sample code used to receive and validate
 * incoming API calls
 * 
 */

// Include the ValidateAPIRequest class
require "validate.php";

class Server {

    // Properties
    private $apiSecret;

    // Constructor
    public function __construct($apiSecret) {
        $this->apiSecret = $apiSecret;
    }

    /**
     * Methods
     */
    
    public function receiveRequest($payload, $receivedSignature) {
        $validator = new ValidateAPIRequest($this->apiSecret, $payload);

        if ($validator->validateSignature($receivedSignature)) {
            echo "API request is valid. Processing payload...\n";
            $this->processPayload(json_decode($payload, true));
        } else {
            echo "API request is invalid. Rejecting...\n";
        }
    }

    private function processPayload($decodedPayload) {
        // Simulate some server-side logic
        echo "Processing action: " . $decodedPayload['action'] . "\n";
        echo "User ID: " . $decodedPayload['userId'] . "\n";
    }
}

?>
