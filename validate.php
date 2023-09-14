<?php

/**
 * VALIDATE.PHP
 * 
 * Class that validates the incoming
 * API request
 * 
 */

class ValidateAPIRequest {

    // Properties
    private $apiSecret;
    private $apiPayload;

    // Constructor
    public function __construct($apiSecret, $apiPayload) {
        $this->apiSecret = $apiSecret;
        $this->apiPayload = $apiPayload;
    }


    /**
     * Methods 
     */

     // Generates signature using PHP function HASH_HMAC
     // with SHA256
    public function generateSignature() {
        return hash_hmac('sha256', $this->apiPayload, $this->apiSecret, false);
    }

    // This valides the signature when received
    public function validateSignature($receivedSignature) {
        $calculatedSignature = $this->generateSignature();
        return hash_equals($calculatedSignature, $receivedSignature);
    }
}

?>
