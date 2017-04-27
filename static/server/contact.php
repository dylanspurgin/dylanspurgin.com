<?php
    $json = file_get_contents('php://input');
    $request_object = json_decode($json);

    $to = "dylan@dylanspurgin.com";
    $from = filter_var($request_object->email, FILTER_SANITIZE_EMAIL);
    $name = $request_object->name;
    $message = $request_object->message;
    $request = array('from' => $from, 'name' => $name, 'message' => $message);

    if (preg_match( "/[\r\n]/", $name ) || preg_match( "/[\r\n]/", $email ) ) {
        // name or email contains newline. Seems spammy
        $result = array('result' => 'error');
    } else {
        $headers = "From: $from";
        $subject = "dylanspurgin.com contact form";
        $body = $message;
        $send = mail($to, $subject, $body, $headers);

        $result = array('result' => 'success', 'request' => $request);
    }

    header('Content-Type: application/json');
    echo json_encode($result);
?>
