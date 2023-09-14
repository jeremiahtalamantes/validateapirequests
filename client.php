<?php

/**
 * 
 * CLIENT.PHP
 * 
 * Sample code used to make API
 * calls to the server
 * 
 */

// Include the ValidateAPIRequest class
require "validate.php";


class Client {

    // Properties
    private $apiSecret;

    // Constructor
    public function __construct($apiSecret) {
        $this->apiSecret = $apiSecret;
    }

    /**
     * This sends sample JSON encoded data
     */
    public function sendRequest() {
        $payload = json_encode([
            'action' => 'fetchData',
            'userId' => 42
        ]);

        $validator = new ValidateAPIRequest($this->apiSecret, $payload);
        $signature = $validator->generateSignature();

        // Simulate sending the payload and signature to the server
        include "server.php";
        $server = new Server($this->apiSecret);
        $server->receiveRequest($payload, $signature);
    }
}

?>
