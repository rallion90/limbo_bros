<?php

	require '../vendor/autoload.php';
	use PayPal\Api\Amount;
	use PayPal\Api\Details;
	use PayPal\Api\Payment;
	use PayPal\Api\PaymentExecution;
	use PayPal\Api\Transaction;

	if(isset($_GET['success']) && $_GET['success'] == 'true'){

		$apiContext = new \PayPal\Rest\ApiContext(
	        new \PayPal\Auth\OAuthTokenCredential(
	            'AQTwAvDxqrsEWy1l7DhQ49gRF-E-mygfvqe5rsdZpAXQwjLVUB5ZSfl8_OFAZlc_DFb3DZPfn5_jcDWn',
	            'EBkm03IA73Drp4MjeLjgZpkmXTXtWfDFBaKTGNcuhQSfKvoDMa6xgkAFW__CQTvhesbSGYrhvUC9t1bs'
	        )
    	);

		$paymentId = $_GET['paymentId'];
    	$payment = Payment::get($paymentId, $apiContext);

    	$execution = new PaymentExecution();
    	$execution->setPayerId($_GET['PayerID']);

    	$transaction = new Transaction();
	    $amount = new Amount();
	    $details = new Details();

	    $details->setShipping(2.2)
	        ->setTax(1.3)
	        ->setSubtotal(17.50);

	    $amount->setCurrency('USD');
    	$amount->setTotal(21);
    	$amount->setDetails($details);
    	$transaction->setAmount($amount);

    	$execution->addTransaction($transaction);

    	$result = $payment->execute($execution, $apiContext);

    	return $payment;
	}