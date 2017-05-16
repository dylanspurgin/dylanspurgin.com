<?php

    require  __DIR__ .'/../../vendor/autoload.php';

    // Config
    $emailConfig = new stdClass();
    $emailConfig->subject = "dylanspurgin.com contact form";
    $emailConfig->to = "dylan@dylanspurgin.com";
    $emailConfig->origin = "http://dylanspurgin.com";
    $emailConfig->server = "mail.dylanspurgin.com";
    $emailConfig->from = '';
    $emailConfig->name = '';
    $emailConfig->message = '';

    if ($_SERVER['REQUEST_METHOD']==='OPTIONS') {
        // Respond to pre-flight requests
        header('Access-Control-Allow-Origin: '.$emailConfig->$origin);
        header('Access-Control-Allow-Methods: POST, OPTIONS');
        http_response_code(204);
    } else {
        if (isValidRequest($emailConfig)) {
            if (sendEmail($emailConfig)) {
                sendSuccessResponse($emailConfig);
            } else {
                sendFailureResponse($emailConfig);
            }
        } else {
            sendBadRequestResponse();
        }
    }

    function isValidRequest ($emailConfig) {
        $valid = true;
        $json = file_get_contents('php://input');
        $request_object = json_decode($json);

        $emailConfig->from = filter_var($request_object->email, FILTER_SANITIZE_EMAIL);
        $emailConfig->name = $request_object->name;

        // An empty message is fine with me, but the mailer complains
        if (empty($request_object->message)) {
            $emailConfig->message = 'Message was empty';
        } else {
            $emailConfig->message = $request_object->message;
        }

        // Method must be POST
        if ($_SERVER['REQUEST_METHOD']!=='POST') {
            $valid = false;
        }

        // From Email must not be empty
        if (empty($emailConfig->from)) {
            $valid = false;
        }

        // Name and From fields must not contain newlines bro
        if (preg_match( "/[\r\n]/", $emailConfig->name ) || preg_match( "/[\r\n]/", $emailConfig->from ) ) {
            $valid = false;
        }

        return $valid;
    }

    function sendBadRequestResponse () {
        http_response_code(400);
    }

    function sendSuccessResponse ($emailConfig) {
        $request = array('from' => $emailConfig->from, 'name' => $emailConfig->name, 'message' => $emailConfig->message);
        $result = array('result' => 'success', 'request' => $request);

        header('Content-Type: application/json');
        echo json_encode($result);
    }

    function sendFailureResponse ($emailConfig) {
        http_response_code(500);
        $result = array('error message' => $emailConfig->errorMessage);
        echo json_encode($result);
    }

    function sendEmail ($emailConfig) {
        $mailer = new PHPMailer(true);
        $mailer->SMTPDebug = 3;                               // Enable verbose debug output

        // $mailer->isSMTP();                                      // Set mailer to use SMTP
        // $mailer->Host = $server;  // Specify main and backup SMTP servers
        // $mailer->SMTPAuth = true;                               // Enable SMTP authentication
        // $mailer->Username = 'user@example.com';                 // SMTP username
        // $mailer->Password = 'secret';                           // SMTP password
        // $mailer->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        // $mailer->Port = 587;                                    // TCP port to connect to

        $mailer->setFrom($emailConfig->from, $emailConfig->name);
        $mailer->addAddress($emailConfig->to);     // Add a recipient
        // $mailer->addReplyTo('info@example.com', 'Information');

        $mailer->isHTML(true);                                  // Set email format to HTML

        $mailer->Subject = $emailConfig->subject;
        $mailer->Body    = $emailConfig->message;
        $mailer->AltBody = $emailConfig->message;

        if($mailer->send()) {
            return true;
        } else {
            $emailConfig->errorMessage = 'Message could not be sent. Mailer Error: ' . $mailer->ErrorInfo;
            return false;
        }
    }
?>
