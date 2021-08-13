<?php
    include './config.php';
    session_start();
    $BASIC="YWQ5NzQ1OGItMGU3Ny00MWQzLWIwNTMtZTI4ZDVmYmUxNTZhOmYyZTU3ZmU5LTFjYjAtNGJjNC1hYjQzLWE2NWE4NzI0YmRjZA==";
    $ECOMAPI='https://tar.sandbox.tlsag.net/api/v1.0/ecom/';
    //$BASIC="NzY5YzkyYmYtYzcyNS00MTRmLTk3NDItY2M4YjVhNzhhODFmOjM0MjYzYzgxLTU3ZTUtNDUyZS1iZmRiLWY2NzJlYWE0MGJmZg==";
	// test API
	//header("Access-Control-Allow-Origin: https://tar.qa.tlsag.net");
	//header("Access-Control-Allow-Origin: https://trustlink-gateway.azurewebsites.net");
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
	header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

	$data = json_decode(file_get_contents('php://input'), true);

	$optStep 	= $_GET['opt'];

	$ch = curl_init();



	switch ($optStep) {
		case 'getPaymentURL':
			echo "<script>console.log('getPaymentURL');</script>";
			# Obtain a URL with reference so that it can be sent as a payment request

			$postRequest = '{
				  "amount":"'.$data['m_tx_amount'].'",
				  "description":"'.$data['m_tx_item_description'].'",
				  "payee": {
				    "accountUuid": "'.$data['t_uuid'].'",
				    "refInfo": "'.$data['m_tx_order_nr'].'",
				    "category1": "'.$data['m_tx_category_1'].'",
				    "category2": "'.$data['m_tx_category_2'].'",
				    "category3": "'.$data['m_tx_category_3'].'",
				    "siteName": "'.$data['m_tx_site_name'].'",
				    "siteRefInfo": "'.$data['m_tx_site_reference'].'",
				    "documentUrl": "'.$data['m_tx_invoiceUrl'].'"
				  },
				  "payer": {
				    "name": "'.$data['b_name'].'",
				    "surname": "'.$data['b_surname'].'",
				    "email": "'.$data['b_email'].'",
				    "mobileNumber": "'.$data['b_mobile'].'"
				  },
				  "payment": {
				    "options": {
				      "creditCard": '.$data['creditCard'].',
				      "debitCard": '.$data['debitCard'].',
				      "instantEft": '.$data['instantEft'].',
				      "chipsPmt": '.$data['chipsPmt'].',
				      "masterpass": '.$data['masterpass'].',
				      "cashDeposit": '.$data['cashDeposit'].'
				    },
				    "dueDate": "'.date("Y-m-d") .'",
				    "expiryTime": ""
				  },
				  "requestId": "'.uniqid().'"
				}';


			curl_setopt($ch, CURLOPT_URL, $ECOMAPI.'payments/requests');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postRequest );

			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			    'Authorization: Basic '.$BASIC,
			    'Content-Type: application/json'
			));

			$getOpts 	= curl_exec($ch);
		break;
		case 'loadPaymentToken':

			# Obtain a URL with reference so that it can be sent as a payment request

			curl_setopt($ch, CURLOPT_URL, $ECOMAPI.'payments/requests/'.$data['tokenId']);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			    'Authorization: Basic '.$BASIC
			));

			$getOpts 	= curl_exec($ch);
		break;
		case 'getPaymentMethods':
			$member 	= $data['member'];

			// getting the payment options activated for the merchant
			curl_setopt($ch, CURLOPT_URL, $ECOMAPI.'members/'.$member);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			    'Authorization: '.$BASIC
			));


			// we return all options
			$getOpts 	= curl_exec($ch);
		break;

		case 'getPaymentToken':

			// gets token, REQUIRES DATA
			curl_setopt($ch, CURLOPT_URL, $ECOMAPI.'payments/requests');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


			$postRequest = [
				'amount'=>''.$data['amount'],
				'description'=>''.$data['description'],
				'payee'=>$data['payee'],
				'payer'=>$data['payer'],
				'payment'=>[
					'options'=>[
						'creditCard'=> true,
						'debitCard'=> true,
						'instantEft'=> true,
						'chipsPmt'=> true,
						'masterpass'=> true,
						'cashDeposit'=> true
					],
					'dueDate'=>''.$data['dueDate'],
					'expiryTime'=>''.$data['expiryTime']
				],
				'requestId'=>''.$data['requestId']
			];
			/*$postRequest = [
				'amount'=>''.$data['amount'],
				'description'=>''.$data['description'],
				'payee'=>$data['payee'],
				'payer'=>$data['payer'],
				'payment'=>[
					'options'=>[
						'cashDeposit'=>''.$data['cashDeposit']
					],
					'dueDate'=>''.$data['dueDate'],
					'expiryTime'=>''.$data['expiryTime']
				],
				'requestId'=>''.$data['requestId']
			];*/

			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postRequest) );

			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			    'Authorization: Basic '.$BASIC,
			    'Content-Type: application/json'
			));

			$getOpts = curl_exec($ch);
		break;
        case 'getDataFromToken':
			curl_setopt($ch, CURLOPT_URL, $ECOMAPI.'payments/requests/'.$data['tokenId']);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			    'Authorization: Basic '.$BASIC,
			    'Content-Type: application/json'
			));
			$getOpts = curl_exec($ch);
		break;
		case 'getMerchantData':
			curl_setopt($ch, CURLOPT_URL, $ECOMAPI.'members/'.$_GET['m_uuid']);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			    'Authorization: Basic '.$BASIC,
			    'Content-Type: application/json'
			));
			$getOpts = curl_exec($ch);
			//$DEC=json_decode($getOpts);

			//$_SESSION[ "m_image" ] = $DEC->image;
		break;
		case 'getQRPaymentToken':

			curl_setopt($ch, CURLOPT_URL, $ECOMAPI.'payments/requests');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			$payee = $data['payee'];


			$postRequest = [
				'amount'=>''.$data['amount'],
				'description'=>''.$data['description'],
				'payee'=>$data['payee'],
				'payer'=>$data['payer'],
				'payment'=>[
					'options'=>[
						'masterpass'=> true
					],
					'dueDate'=>''.$data['dueDate'],
					'expiryTime'=>''.$data['expiryTime']
				],
				'requestId'=>''.$data['requestId']
			];

			//echo 'console.log(' . json_encode($postRequest) . ');';



			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postRequest) );

			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			    'Authorization: Basic '.$BASIC,
			    'Content-Type: application/json'
			));

			$getOpts = curl_exec($ch);
		break;
        case 'createPayment':

			curl_setopt($ch, CURLOPT_URL, $ECOMAPI.'payments/card');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            //$_SESSION["tokenId"]=$data['tokenId'];
			$postRequest = [
				'merchantTrace'=>$data['merchantTrace']
			];

			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postRequest) );

			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			    'Authorization: Basic '.$BASIC,
			    'Content-Type: application/json'
			));

			$getOpts = curl_exec($ch);
		break;


		/*case 'cashPayment':

			// die('Not here');
            $_SESSION["tokenId"]=$data['tokenId'];
			$cashPmtOpts =[
                'tokenId' => $data['tokenId'],
                'requestId' => $data['requestId'],
                'methodType' => $data['methodType'],
                'redirectUrl' => $data['redirectUrl']
        	];


			curl_setopt($ch, CURLOPT_URL, $TARAPI.'payments/methods');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($cashPmtOpts) );

			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			    'Authorization: Basic '.$BASIC,
			    'Content-Type: application/json'
			));

			$getOpts = curl_exec($ch);
		break;

		case 'getQRCodeIframe':

			// die('Not here');
            $_SESSION["tokenId"]=$data['tokenId'];
			$cashPmtOpts =[
                'tokenId' => $data['tokenId'],
                'requestId' => $data['requestId'],
                'methodType' => $data['methodType'],
                'redirectUrl' => $data['redirectUrl']
        	];

			curl_setopt($ch, CURLOPT_URL, $TARAPI.'payments/methods');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($cashPmtOpts) );
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			    'Authorization: Basic '.$BASIC,
			    'Content-Type: application/json'
			));

			$getOpts = curl_exec($ch);


		break;*/

		case 'getEFTPaymentToken':
			// gets token, REQUIRES DATA

			curl_setopt($ch, CURLOPT_URL, $ECOMAPI.'payments/requests');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			$payee = $data['payee'];
			$payer = $data['payer'];

			$postRequest = [
				'amount'=>''.$data['amount'],
				'description'=>''.$data['description'],
				'payee'=>[
					'accountUuid'=>''.$payee['accountUuid'],
					'refInfo'=>''.$payee['refInfo'],
					'category1'=>''.$payee['category1'],
					'category2'=>''.$payee['category2'],
					'category3'=>''.$payee['category3'],
					'siteName'=>''.$payee['siteName'],
					'siteRefInfo'=>''.$payee['siteRefInfo'],
					'documentUrl'=>''.$payee['documentUrl']
				],
				'payer'=>[
					'name'=>''.$payer['name'],
					'surname'=>''.$payer['surname'],
					'email'=>''.$payer['email'],
					'mobileNumber'=>''.$payer['mobileNumber'],
				],
				'payment'=>[
					'options'=>[
						'instantEft'=> true
					],
					'dueDate'=>''.$data['dueDate'],
					'expiryTime'=>''.$data['expiryTime']
				],
				'requestId'=>''.$data['requestId']
			];

			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postRequest) );

			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			    'Authorization: Basic '.$BASIC,
			    'Content-Type: application/json'
			));

			$getOpts = curl_exec($ch);
		break;
		case 'getCHIPS':
		 $_SESSION["tokenId"]=$data['tokenId'];
			$cashPmtOpts =[
                'tokenId' => $data['tokenId'],
                'requestId' => $data['requestId'],
                'methodType' => $data['methodType'],
                'redirectUrl' => $data['redirectUrl']
        	];
            curl_setopt($ch, CURLOPT_URL, $TARAPI.'payments/methods');
			//curl_setopt($ch, CURLOPT_URL, $TARAPI.'payments/methods?tokenId='.$data['tokenId'].'&requestId='.$data['requestId'].'&methodType='.$data['methodType'].'&redirectUrl='.$data['redirectUrl']);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($cashPmtOpts) );
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			    'Authorization: Basic '.$BASIC_CHIPS,
			    'Content-Type: application/json'
			));

			$getOpts = curl_exec($ch);
		break;
		case 'getQRCodeIframe':
		case 'cashPayment':
		case 'getEftIframe':
			// die('Not here');
            $_SESSION["tokenId"]=$data['tokenId'];
			$cashPmtOpts =[
                'tokenId' => $data['tokenId'],
                'requestId' => $data['requestId'],
                'methodType' => $data['methodType'],
                'redirectUrl' => $data['redirectUrl']
        	];
            curl_setopt($ch, CURLOPT_URL, $TARAPI.'payments/methods');
			//curl_setopt($ch, CURLOPT_URL, $TARAPI.'payments/methods?tokenId='.$data['tokenId'].'&requestId='.$data['requestId'].'&methodType='.$data['methodType'].'&redirectUrl='.$data['redirectUrl']);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($cashPmtOpts) );
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			    'Authorization: Basic '.$BASIC,
			    'Content-Type: application/json'
			));

			$getOpts = curl_exec($ch);
		break;



		case 'getCHIPSPaymentToken':
			// gets token, REQUIRES DATA


			//window.location='http://paymentgateway.tlsag.com/test.php';
			//curl_setopt($ch, CURLOPT_URL, 'http://paymentgateway.tlsag.com/test.php');
			curl_setopt($ch, CURLOPT_URL, $ECOMAPI.'payments/requests');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			$payee = $data['payee'];
			$payer = $data['payer'];

			$postRequest = [
				'amount'=>''.$data['amount'],
				'description'=>''.$data['description'],
				'payee'=>$data['payee'],
				'payer'=>$data['payer'],
				'payment'=>[
					'options'=>[
						'chipsPmt'=> true
					],
					'dueDate'=>''.$data['dueDate'],
					'expiryTime'=>''.$data['expiryTime']
				],
				'requestId'=>$data['requestId']
			];


			/*$postRequest = '{
				"amount":"'.$data['amount'].'",
				"description":"'.$data['description'].'",
				"payee":{
					"accountUuid":"'.$payee['accountUuid'].'",
					"refInfo":"'.$payee['refInfo'].'",
					"category1":"'.$payee['category1'].'",
					"category2":"'.$payee['category2'].'",
					"category3":"'.$payee['category3'].'",
					"siteName":"'.$payee['siteName'].'",
					"siteRefInfo":"'.$payee['siteRefInfo'].'",
					"documentUrl":"'.$payee['documentUrl'].'"
				},
				"payer":{
					"name":"'.$payer['name'].'",
					"surname":"'.$payer['surname'].'",
					"email":"'.$payer['email'].'",
					"mobileNumber":"'.$payer['mobileNumber'].'"
				},
				"payment":{
					"globalPmtOpts":{
						"chipsPmt":true
					},
					"dueDate":"'.$data['dueDate'].'",
					"expiryTime":"'.$data['expiryTime'].'"
				},
				"requestId":"'.uniqid().'"
			}';*/

			curl_setopt($ch, CURLOPT_POSTFIELDS, $postRequest );

			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			    'Authorization: Basic '.$BASIC,
			    'Content-Type: application/json'
			));

			$getOpts = curl_exec($ch);

		break;

		/*case 'getCHIPS':
			// die('Not here');
            $_SESSION["tokenId"]=$data['tokenId'];
			$cashPmtOpts =[
                'tokenId' => $data['tokenId'],
                'requestId' => $data['requestId'],
                'methodType' => $data['methodType'],
                'redirectUrl' => $data['redirectUrl']
        	];

			curl_setopt($ch, CURLOPT_URL, $TARAPI.'payments/methods');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($cashPmtOpts) );
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			    //'Authorization: Basic OTk5OTk5OTktMDAwMi0wMDA0LTAwMDAtMDAwMDAwMDAwMDAwOmI0ZmQzYjIwLThiYjgtNDNkYi1iMGM4LTJkMWVmMzE0MTk2eQ==',
				'Authorization: Basic '.$BASIC_CHIPS,
			    'Content-Type: application/json'
			));

			$getOpts = curl_exec($ch);
		break;*/

		case 'getCHIPSLogin':

			// POST User Access
			$chipsLogOpts =[
                'mobileNumber' => $data['mobileNumber'],
                'pin' => $data['pin']
        	];




            curl_setopt($ch, CURLOPT_URL, $TARAPI.'members/login');
			//curl_setopt($ch, CURLOPT_URL, 'https://tar.qa.tlsag.net/api/v1.0/users/login');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// POST DATA
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($chipsLogOpts) );
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			    //'Authorization: Basic OTk5OTk5OTktMDAwMi0wMDA0LTAwMDAtMDAwMDAwMDAwMDAwOmI0ZmQzYjIwLThiYjgtNDNkYi1iMGM4LTJkMWVmMzE0MTk2eQ==',
				'Authorization: Basic OTk5OTk5OTktMDAwMi0wMDA0LTAwMDAtMDAwMDAwMDAwMDAwOmI0ZmQzYjIwLThiYjgtNDNkYi1iMGM4LTJkMWVmMzE0MTk2eQ==',
			    'Content-Type: application/json'
			));
			$getOpts = curl_exec($ch);
		break;

		case 'getCHIPSUserDetails':

			// GET User details
			curl_setopt($ch, CURLOPT_URL, $TARAPI.'members/mobile/'.$data['mobileNumber']);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			    'Authorization: Bearer '.$data['token'],
			    'Content-Type: application/json'
			));

			$getOpts = curl_exec($ch);
		break;

		case 'getCHIPSUserAccount':

			// GET Account details
			//curl_setopt($ch, CURLOPT_URL, 'https://tar.qa.tlsag.net/api/v1.0/accounts/'.$data['uuid']);
			curl_setopt($ch, CURLOPT_URL, $TARAPI.'accounts?memberUuid='.$data['uuid']);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			    'Authorization: Bearer '.$data['token'],
			    'Content-Type: application/json'
			));

			$getOpts = curl_exec($ch);
		break;

		case 'makeChipsPmt':
			/*$postRequest = '{
				"description":"'.$data['description'].'",
				"feeSponsorType": "NONE",
				"amount":"'.$data['amount'].'",
				"gratuityAmount": 0,
				"payeeAccountUuid":"'.$data['payeeAccountUuid'].'",
				"payeeMessage": "'.$data['payeeMessage'].'",
				"payeeRefInfo":"'.$data['payeeRefInfo'].'",
				"payeeSiteName":"'.$data['payeeSiteName'].'",
				"payeeSiteRefInfo":"'.$data['payeeSiteRefInfo'].'",
				"payerAccountUuid":"'.$data['payerAccountUuid'].'",
				"payerCategory1":"'.$data['payerCategory1'].'",
				"payerCategory2":"'.$data['payerCategory2'].'",
				"payerCategory3":"'.$data['payerCategory3'].'",
				"payerRefInfo": "'.$data['payerRefInfo'].'",
				"paymentDate": "'.date("Y-m-d") .'",
				"paymentType": "BULK",
				"requestId": "'.$data['requestId'].'",
				"tokenId": "'.$data['tokenId'].'"
			}';*/
			$postRequest = '{
				"description":"'.$data['description'].'",
				"feeSponsorType": "PAYEE",
				"amount":"'.$data['amount'].'",
				"gratuityAmount": 0,
				"payerCategory1":"'.$data['payerCategory1'].'",
				"payerCategory2":"'.$data['payerCategory2'].'",
				"payerCategory3":"'.$data['payerCategory3'].'",
				"payeeSiteName":"'.$data['payeeSiteName'].'",
				"payeeAccountUuid":"'.$data['payeeAccountUuid'].'",
				"payeeMessage": "'.$data['payeeMessage'].'",
				"payeeRefInfo":"'.$data['payeeRefInfo'].'",
				"payeeSiteRefInfo":"'.$data['payeeSiteRefInfo'].'",
				"payerAccountUuid":"'.$data['payerAccountUuid'].'",
				"payerRefInfo": "'.$data['payerRefInfo'].'",
				"paymentDate": "'.date("Y-m-d") .'",
				"paymentType": "DEFAULT",
				"requestId": "'.$data['tokenId'].'",
				"tokenId": "'.$data['tokenId'].'"
			}';
			// GET Account details
			curl_setopt($ch, CURLOPT_URL, $TARAPI.'payments');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postRequest );

			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			    'Authorization: Bearer '.$data['token'],
			    'Content-Type: application/json'
			));

			$getOpts = curl_exec($ch);
		break;

		default:
			# code...
		break;
	}



	curl_close($ch);

	//$jsonArrayResponse = json_decode($getOpts);

	echo $getOpts;


?>
