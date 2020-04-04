<?php
	require '../vendor/autoload.php';

	use PayPal\Api\Amount;
	use PayPal\Api\Details;
	use PayPal\Api\Item;
	use PayPal\Api\ItemList;
	use PayPal\Api\Payer;
	use PayPal\Api\Payment;
	use PayPal\Api\RedirectUrls;
	use PayPal\Api\Transaction;

	if(!isset($_SESSION['shopping_cart'])){
		echo '<script>window.location.href="../shop/index.php";</script>';
	}


	$apiContext = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
            'AQTwAvDxqrsEWy1l7DhQ49gRF-E-mygfvqe5rsdZpAXQwjLVUB5ZSfl8_OFAZlc_DFb3DZPfn5_jcDWn',
            'EBkm03IA73Drp4MjeLjgZpkmXTXtWfDFBaKTGNcuhQSfKvoDMa6xgkAFW__CQTvhesbSGYrhvUC9t1bs'
        )
    );

	foreach($_SESSION['shopping_cart'] as $keys => $values){
		$payer = new Payer();
		$payer->setPaymentMethod("paypal");

		$item1 = new Item();
		$item1->setName($values['product_name'])
		    ->setCurrency('USD')
		    ->setQuantity($values['product_quantity'])
		    //->setSku("123123") // Similar to `item_number` in Classic API
		    ->setPrice($values['product_price']);
		

		$itemList = new ItemList();
		$itemList->setItems(array($item1));

		$details = new Details();
		$details->setSubtotal($values['product_price'] * $values['product_quantity']);

		$amount = new Amount();
		$amount->setCurrency("USD")
		    ->setTotal($values['product_price'] * $values['product_quantity'])
		    ->setDetails($details);

		$transaction = new Transaction();
		$transaction->setAmount($amount)
		    ->setItemList($itemList)
		    ->setDescription("Payment description")
		    ->setInvoiceNumber(uniqid());


		$redirectUrls = new RedirectUrls();
		$redirectUrls->setReturnUrl("http://localhost:8080/limbo_bros/payment/ExecutePayment.php?success=true")
		    ->setCancelUrl("http://localhost:8080/limbo_bros/shop/index.php?success=false");

		$payment = new Payment();
		$payment->setIntent("sale")
		    ->setPayer($payer)
		    ->setRedirectUrls($redirectUrls)
		    ->setTransactions(array($transaction));
	}

	try {
	    $payment->create($apiContext);
	} catch (Exception $ex) {
		echo $ex;
	}	

	$approvalUrl = $payment->getApprovalLink();

	header("Location: {$approvalUrl}");

	//return $payment;

?>	