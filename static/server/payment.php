<?php
    require  __DIR__ .'/vendor/autoload.php';

    $origin = 'https://dylanspurgin.com';
    $statement_descriptor = 'DYLANSPURGIN.COM';

    $dotenv = new Dotenv\Dotenv(__DIR__.'/../../');
    $dotenv->load();

    $stripeSecretKey = getenv('STRIPE_SECRET_KEY');

    if ($_SERVER['REQUEST_METHOD']==='OPTIONS') {
        // Respond to pre-flight requests
        header('Access-Control-Allow-Origin: '.$origin);
        header('Access-Control-Allow-Methods: POST, OPTIONS');
        http_response_code(204);
    } else {
        Stripe\Stripe::setApiKey($stripeSecretKey);
        $error = '';
        $success = '';
        try {
            $chargeRequest = parseRequest();
            $charge = Stripe\Charge::create($chargeRequest);
            sendSuccessResponse($charge);
        }
        catch (Exception $e) {
            sendFailureResponse($e->getMessage());
        }
    }

    function parseRequest () {
        global $statement_descriptor;
        $json = file_get_contents('php://input');
        $request_object = json_decode($json);

        if (!isset($request_object->stripeToken)) {
            throw new Exception("The Stripe Token was not generated correctly");
        }

        return array("amount" => $request_object->amount,
                     "statement_descriptor" => $statement_descriptor,
                     "description" => $request_object->description,
                     "receipt_email" => $request_object->email,
                     "currency" => "usd",
                     "metadata" => array("from" => $request_object->name),
                     "card" => $request_object->stripeToken);
    }

    function sendSuccessResponse ($charge) {
        $result = array('result' => 'success', 'charge' => $charge);

        header('Content-Type: application/json');
        echo json_encode($result);
    }

    function sendFailureResponse ($error) {
        http_response_code(500);
        $result = array('result' => 'error', 'message' => $error);
        echo json_encode($result);
    }


?>
