<?php

    // TODO - this is all broken. Need to install php mailer (use composer?)
    require 'PHPMailerAutoload.php';
    $mailer = new PHPMailer(true);

    // Config
    $subject = "dylanspurgin.com contact form";
    $to = "dylan@dylanspurgin.com";
    $origin = "http://dylanspurgin.com";

    // Parse request
    $json = file_get_contents('php://input');
    $request_object = json_decode($json);
    $from = '';
    $name = '';
    $message = '';

    if ($_SERVER['REQUEST_METHOD']==='OPTIONS') {
        // Respond to pre-flight requests
        header('Access-Control-Allow-Origin: '.$origin);
        header('Access-Control-Allow-Methods: POST, OPTIONS');
        http_response_code(204);
    } else {
        parseRequest($request_object);
        if (isValidRequest()) {
            sendEmail();
            sendSuccessResponse();
        } else {
            sendBadRequestResponse();
        }
    }

    function parseRequest ($request_object) {
        $from = filter_var($request_object->email, FILTER_SANITIZE_EMAIL);
        $name = $request_object->name;
        $message = $request_object->message;
    }

    function isValidRequest () {
        $valid = true;

        // Method must be POST
        if ($_SERVER['REQUEST_METHOD']!=='POST') {
            $valid = false;
        }

        // From Email must not be empty
        if (empty($from)) {
            $valid = false;
        }

        // Name and From fields must not contain newlines bro
        if (preg_match( "/[\r\n]/", $name ) || preg_match( "/[\r\n]/", $from ) ) {
            $valid = false;
        }

        return $valid;
    }

    function sendBadRequestResponse () {
        http_response_code(400);
    }

    function sendSuccessResponse () {
        $request = array('from' => $from, 'name' => $name, 'message' => $message);
        $result = array('result' => 'success', 'request' => $request);

        header('Content-Type: application/json');
        echo json_encode($result);
    }

    function sendEmail () {
        $headers = "From: $from";
        $body = $message;
        $send = mail($to, $subject, $body, $headers);
    }
?>
