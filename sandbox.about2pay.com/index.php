<?php
//include 'dbConnect.php';
include_once "config.php";
session_start();
$expireAfter = 5;
if(isset($_SESSION['last_action'])){
   $secondsInactive = time() - $_SESSION['last_action'];
   $expireAfterSeconds = $expireAfter * 60;
   if($secondsInactive >= $expireAfterSeconds){
       session_unset();
       session_destroy();
   }
}






$_SESSION['last_action'] = time();
  //header("Access-Control-Allow-Origin: https://tar.int.tlsag.net");
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
  header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
  include 'php/dbConnect.php';
  $data = json_decode(file_get_contents('php://input'), true);

  //$globalAppVersionUrl = "https://paymentgateway.tlsag.com/";
   // print_r($_POST);
if($data){//Without a form
    // MERCHANT DETAILS
	$m_uuid = $data['m_uuid'];
	$m_account_uuid = $data['m_account_uuid'];
	$m_tx_category_1 =$data['m_category_1'];
	$m_tx_category_2 =$data['m_category_2'];
	$m_tx_category_3 =$data['m_category_3'];
	$m_tx_site_reference =$data['m_site_reference'];
	$m_tx_site_name =$data['m_tx_site_name'];
	$m_tx_message =$data['m_tx_message'];
	$m_tx_cc_allowed = $data['m_card_allowed'];
	$m_tx_dc_allowed = $data['m_card_allowed'];
	$m_tx_ch_allowed = $data['m_chips_allowed'];
	$m_tx_mp_allowed = $data['m_mpass_allowed'];
	$m_tx_cd_allowed = $data['m_payat_allowed'];
	$m_tx_eft_allowed = $data['m_ieft_allowed'];
    $m_tx_ss_allowed = $data['m_mpass_allowed'];
    $m_tx_zp_allowed = $data['m_mpass_allowed'];
	$m_tx_trident_allowed = $data['m_trident_allowed'];
    // TRANSACTION
	$m_tx_id =$data['m_tx_id'];
	$m_tx_amount =$data['m_tx_amount'];
	$m_tx_currency =$data['m_tx_currency'];
	$m_tx_item_name =$data['m_tx_item_name'];
	$m_tx_item_description = $data['m_tx_item_description'];
	$m_tx_order_nr =$data['m_tx_order_nr'];
	$m_tx_invoice_nr =$data['m_tx_invoice_nr'];
	$m_tx_document_ref =$data['m_tx_document_ref'];
	$m_tx_due_date =$data['m_tx_due_date'];
	//BUYER
	$b_name =$data['b_name'];
	$b_surname =$data['b_surname'];
	$b_email =$data['b_email'];
	$b_mobile =$data['b_mobile'];
    //NOTIFICATION
	$m_return_url=$data['m_return_url'];
	$m_cancel_url=$data['m_cancel_url'];
	$m_pending_url=$data['m_pending_url'];
	$m_notify_url=$data['m_notify_url'];
	$m_back2shop_url=$data['m_back2shop_url'];
    $m_email_address=$data['m_email_address'];
	$m_passthrough=$data['m_passthrough'];
	//CHECKSUM
	$checksum=$data['checksum'];
}
else
{//Form post
 	// MERCHANT DETAILS
	//$myfile = file_put_contents('logs.txt', json_encode(json_decode($_POST)).PHP_EOL , FILE_APPEND | LOCK_EX);
	$m_uuid = $_POST['m_uuid'];
	$m_account_uuid = $_POST['m_account_uuid'];
	$m_tx_category_1 =$_POST['m_category_1'];
	$m_tx_category_2 =$_POST['m_category_2'];
	$m_tx_category_3 =$_POST['m_category_3'];
	$m_tx_site_reference =$_POST['m_site_reference'];
	$m_tx_site_name =$_POST['m_site_name'];
	$m_tx_message =$_POST['m_message'];
	$m_tx_cc_allowed = $_POST['m_card_allowed'];
	$m_tx_dc_allowed = $_POST['m_card_allowed'];
	$m_tx_ch_allowed = $_POST['m_chips_allowed'];
	$m_tx_eft_allowed = $_POST['m_ieft_allowed'];
	$m_tx_mp_allowed = $_POST['m_mpass_allowed'];
	$m_tx_cd_allowed = $_POST['m_payat_allowed'];
    $m_tx_ss_allowed = $_POST['m_mpass_allowed'];
    $m_tx_zp_allowed = $_POST['m_mpass_allowed'];
	$m_tx_trident_allowed = $_POST['m_trident_allowed'];
    // TRANSACTION
	$m_tx_id =$_POST['m_tx_id'];
	$m_tx_amount =$_POST['m_tx_amount'];
	$m_tx_currency =$_POST['m_tx_currency'];
	$m_tx_item_name =$_POST['m_tx_item_name'];
	$m_tx_item_description = $_POST['m_tx_item_description'];
	$m_tx_order_nr =$_POST['m_tx_order_nr'];
	$m_tx_invoice_nr =$_POST['m_tx_invoice_nr'];
	$m_tx_document_ref =$_POST['m_tx_document_ref'];
	$m_tx_due_date =$_POST['m_tx_due_date'];
	//BUYER
	$b_name =$_POST['b_name'];
	$b_surname =$_POST['b_surname'];
	$b_email =$_POST['b_email'];
	$b_mobile =$_POST['b_mobile'];
    //NOTIFICATION
	$m_return_url=$_POST['m_return_url'];
	$m_cancel_url=$_POST['m_cancel_url'];
	$m_pending_url=$_POST['m_pending_url'];
	$m_notify_url=$_POST['m_notify_url'];
	$m_back2shop_url=$_POST['m_back2shop_url'];
    $m_email_address=$_POST['m_email_address'];
	//CHECKSUM
	$checksum=$_POST['checksum'];
	$checksumu=$_POST['checksumu'];
	$m_passthrough=$_POST['m_passthrough'];
	$post=$_POST['post'];
}


    $m_ignore=$_GET['ignore'];






	//$checksuma = implode('_', $checksum_array);

//NON iVeri - I will change to read from database



//TOKEN ID
$m_tokenId=$_GET['tokenId'];

if (strlen(trim($m_tokenId))===0) {
	$_SESSION[ 'm_tx_due_date' ] = $m_tx_due_date;
	$_SESSION[ 'm_tx_item_name' ] = $m_tx_item_name;
	$_SESSION[ 'm_tx_item_description' ] = $m_tx_item_description;
	$_SESSION[ 'm_tx_message' ] = $m_tx_message;
	$_SESSION[ 'm_tx_invoice_nr' ] = $m_tx_invoice_nr;
	$_SESSION[ 'm_tx_order_nr' ] = $m_tx_order_nr;
	$_SESSION[ 'm_notify_url' ] = $m_notify_url;
	$_SESSION[ 'm_return_url' ] = $m_return_url;
	$_SESSION[ 'm_tx_currency' ] = $m_tx_currency;
	$_SESSION[ 'm_cancel_url' ] = $m_cancel_url;
	$_SESSION[ 'm_back2shop_url' ] = $m_back2shop_url;
	//IF NO TOKEN CHECK IF REQUIRED VALUES IS PASSED
	if (!strlen(trim($m_uuid))) {echo "m_uuid is required";return;}
	if (!strlen(trim($m_account_uuid))) {echo "m_account_uuid is required";return;}
	if (!strlen(trim($checksum))) {echo "checksum is required";return;}
	if (!strlen(trim($m_tx_id))) {echo "m_tx_id is required";return;}
	if ($m_tx_currency!=='ZAR') {echo "m_tx_currency should be set to ZAR";return;}
	if (!strlen(trim($m_tx_amount))) {echo "m_tx_amount is required";return;}
	if (!strlen(trim($m_tx_item_name))) {echo "m_tx_item_name is required";return;}
	if (!strlen(trim($m_tx_item_description))) {echo "m_tx_item_description is required";return;}
	if (!strlen(trim($m_notify_url))) {echo "m_notify_url is required";return;}
	if (!strlen(trim($m_return_url))) {echo "m_return_url is required";return;}
	/*$result2 = $db->query("SELECT * FROM `merchants` WHERE `m_uuid` = '".$m_uuid."'");
	if($result2){
		$emparray = array();
		while($row =$result2->fetch_assoc())
		{
			$emparray[] = $row;
		}
	} else {
	   echo '{"error":"'. mysqli_error($db).'"}';return;
	}
	$checksum_array = array($m_uuid,$m_account_uuid,$m_tx_id,preg_replace('/\D/', '',number_format((float)$m_tx_amount,2)),$m_tx_currency,$emparray[0]['secret']);
	$checksumau=implode('_', $checksum_array);
    $checksuma = md5($checksumau);*/
} else {
	if (strlen($m_tokenId)!==10) {
		echo "m_tokenId should have a length of 10 charaters";return;
	} else {
		$m_notify_url=$BASEURL."php/notifyDefault.php";
		$m_return_url=$BASEURL."result.php";
		
	}
}


?>
<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>Trustlink</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">body {padding-top: 0px;padding-bottom: 60px;}</style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script>var globalAppVersionUrl = "<?php echo $globalAppVersionUrl ?>";</script>
  </head>
  <body>
    <div id="spinner" class="loading" style="display:none">Loading&#8230;</div>
    <div class="container">
  	  <div class="row"  id="paymentform"></div>
      <div id="previewImage"></div>
      <hr style="margin:0">
      <footer><p style="display:inline;line-height:40px;">Powered by © Trustlink 2020</p><img src="images/instaPay_2.png"  style="vertical-align: top;height:30px;float:right"></img><footer>
    </div>
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>
    <script type="text/javascript" src="js/jquery-barcode.js"></script>
	<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/130527/qrcode.js'></script>
    <script type="text/javascript" src="js/html2canvas.js"></script>
	<script src="js/md5.min.js"></script>
	<script src="js/html2pdf.bundle.min.js"></script>
	<!--<script src='https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.0/jspdf.min.js'></script>-->
	<script>
    $(document).ready(function(){
    	$('#paymentOptionHolder').show();
		<?php echo('tokenId="'.$m_tokenId.'";');  ?>

		<?php echo('checksum="'.$checksum.'";');  ?>

		<?php echo('checksuma="'.$checksuma.'";');  ?>

		<?php echo('checksumu="'.$checksumu.'";');  ?>

		<?php echo('checksumau="'.$checksumau.'";');  ?>

		<?php echo('ignore="'.$m_ignore.'";');  ?>





		<!-- GLOBAL PARAMETERS POSTED TO LOAD DIVS - If TokenId LOAD FROM TOKEN-->
		pars={
			"id":"<?php echo $m_tokenId ?>",
			"m_uuid":"<?php echo $m_uuid ?>",
			"m_account_uuid":"<?php echo $m_account_uuid ?>",
			"m_tx_id": "<?php echo $m_tx_id ?>",
			"m_tx_amount": "<?php echo $m_tx_amount ?>",
			"m_tx_currency": "<?php echo $m_tx_currency ?>",
			"m_tx_item_name": "<?php echo $m_tx_item_name ?>",
			"m_tx_item_description": "<?php echo $m_tx_item_description ?>",
			"t_key": "<?php echo $t_key ?>",
			"m_tx_order_nr": "<?php echo $m_tx_order_nr ?>",
			"m_tx_invoice_nr": "<?php echo $m_tx_invoice_nr ?>",
			"m_name": "<?php echo $m_name ?>",
			"m_tx_site_reference": "<?php echo $m_tx_site_reference ?>",
			"m_tx_due_date": "<?php echo $m_tx_due_date ?>",
			"m_tx_message": "<?php echo $m_tx_message ?>",
			"m_return_url": "<?php echo $m_return_url ?>",
			"m_cancel_url": "<?php echo $m_cancel_url ?>",
			"m_notify_url": "<?php echo $m_notify_url ?>",
			"m_back2hop_url": "<?php echo $m_back2shop_url ?>",
			"m_tx_cc_allowed": "<?php echo $m_tx_cc_allowed ?>",
			"m_tx_dc_allowed": "<?php echo $m_tx_dc_allowed ?>",
			"m_tx_eft_allowed": "<?php echo $m_tx_eft_allowed ?>",
			"m_tx_ch_allowed": "<?php echo $m_tx_ch_allowed ?>",
			"m_tx_mp_allowed": "<?php echo $m_tx_mp_allowed ?>",
			"m_tx_cd_allowed": "<?php echo $m_tx_cd_allowed ?>",
			"m_tx_ss_allowed": "<?php echo $m_tx_ss_allowed ?>",
			"m_tx_zp_allowed": "<?php echo $m_tx_zp_allowed ?>",
			"m_tx_trident_allowed": "<?php echo $m_tx_trident_allowed ?>",
			"m_passthrough": "<?php echo $m_passthrough ?>",
			"BASEURL":"<?php echo $BASEURL ?>",
			"TARAPI":"<?php echo $TARAPI ?>",
			"post":"<?php echo $post; ?>",
			"name": "<?php echo $b_name ?>","surname": "<?php echo $b_surname ?>","email": "<?php echo $b_email ?>","mobile": "<?php echo $b_mobile ?>",
			<?php
			if($m_tx_category_1) echo('"category1": "'.$m_tx_category_1.'",');
			if($m_tx_category_2) echo('"category2": "'.$m_tx_category_2.'",');
			if($m_tx_category_3) echo('"category3": "'.$m_tx_category_3.'",');
			if($m_tx_site_name)  echo('"siteName": "'.$m_tx_site_name.'",');
			if($m_tx_site_reference) echo('"siteRefInfo": "'.$m_tx_site_reference.'",');
			if($m_tx_site_reference) echo('"documentUrl": "'.$m_tx_site_reference.'"');
			if($m_tx_invoiceUrl) echo('"documentUrl": "'.$m_tx_invoiceUrl.'"');
			?>
		};
//927b55ce-73c6-4e2e-bcc5-c90cbf7369d1_efb6f531-786a-4cad-b7f2-91bb24202d57_29d31b27-2bbf-488d-93fd-7724cc87f3b2_7648_cetude
		if (!tokenId){
			//GET SECRET FROM DB
			var member={"m_account_uuid": "<?php echo $m_account_uuid ?>"};
			$.ajax({
              url:'https://about2pay.lantador.com/sandbox/getSecret.php',type: 'POST',cache: false,data: JSON.stringify(member),contentType: 'application/json',dataType: 'json',
              success: function (data) {
				    console.log("DATA",data);

					var namt=Number(pars.m_tx_amount);
					var amt=namt.toFixed(2);
					var amt2=amt.replace(/\D/g,'');
					var secret=data[0].secret;
					console.log(secret);
					var csa=[pars.m_uuid,pars.m_account_uuid,pars.m_tx_id,amt2,pars.m_tx_currency,secret];
					console.log(csa.join('_'));
					var checksuma=md5(csa.join('_'));
                    console.log(csa.join('_')+' '+checksuma+' '+checksum);
					if (checksum!==checksuma){
						if (ignore!=='ignore') {
							alert("INVALID REQUEST");
							return;
						}
					}
					getURL();
				},
				error: function(result, status, error) {
					alert( "Cannot get credentials");return;
				}
			});
		} else {
			var vars={
					"tokenId": "<?php echo $m_tokenId ?>",
					"opt":"getDataFromToken"
				};
		    // READ DATA FROM Payment Gateway DB TOKEN
			$.ajax({
			  url:'https://about2pay.lantador.com/sandbox/getToken.php',type: 'POST',cache: false,data: JSON.stringify(vars),contentType: 'application/json',dataType: 'json',
			  success: function (data) {
				console.log("TOKENDATA",data);
				if (Array.isArray(data)){
				  if (data.length>0) {
				   pars.m_tx_due_date=data[0].m_tx_due_date;
				   pars.m_tx_item_name=data[0].m_tx_item_name;
				   pars.m_tx_item_description=data[0].m_tx_item_description;
				   pars.m_tx_message=data[0].m_tx_message;
				   pars.m_tx_invoice_nr=data[0].m_tx_invoice_nr;
				   pars.m_tx_order_nr=data[0].m_tx_order_nr;
				   if (data[0].m_notify_url.length>0) pars.m_notify_url=data[0].m_notify_url;
				   if (data[0].m_return_url.length>0) pars.m_return_url=data[0].m_return_url;
				   pars.m_tx_cc_allowed=data[0].m_tx_cc_allowed;
				   pars.m_tx_dc_allowed=data[0].m_tx_dc_allowed;
				   pars.m_tx_eft_allowed=data[0].m_tx_eft_allowed;
				   pars.m_tx_ch_allowed=data[0].m_tx_ch_allowed;
				   pars.m_tx_mp_allowed=data[0].m_tx_mp_allowed;
				   pars.m_tx_cd_allowed=data[0].m_tx_cd_allowed;
				   pars.m_tx_ss_allowed=data[0].m_tx_ss_allowed;
				   pars.m_tx_zp_allowed=data[0].m_tx_zp_allowed;
				   if (data[0].m_tx_trident_allowed) pars.m_tx_trident_allowed=data[0].m_tx_trident_allowed;
				  }
				}
				//..THEN READ DATA FROM TAR TOKEN
					$.ajax({
								url:'https://about2pay.lantador.com/sandbox/getClientPaymentMethods.php',type: 'POST',cache: false,data: JSON.stringify(vars),contentType: 'application/json',dataType: 'json',
								success: function (data) {
									console.log(data);
									pars.m_account_uuid=data.payee.accountUuid;
									pars.m_tx_due_date=data.dueDate;
									pars.m_tx_id=data.payee.refInfo;
									pars.m_tx_amount=data.amount;
									pars.m_tx_item_description=data.description;
									pars.m_tx_site_reference=data.payee.siteRefInfo;
									//pars.m_uuid=data.uuid;
									pars.tx_id=data.payee.refInfo;
									pars.name=data.payer.name;
									pars.surname=data.payer.surname;
									pars.email=data.payer.email;
									pars.mobile=data.payer.mobileNumber;
									pars.requestId=data.requestId;
									//..GET m_uuid from m_account_uuid
									var member={"m_account_uuid": pars.m_account_uuid};
									$.ajax({
									  url:'https://about2pay.lantador.com/sandbox/getSecret.php',type: 'POST',cache: false,data: JSON.stringify(member),contentType: 'application/json',dataType: 'json',
									  success: function (data) {
									   pars.m_uuid=data[0].m_uuid;
									   //.. THEN GET MERCHANT DATA FROM TAR and LOAD PAGE INFO
									   getURL();
									  }
									});
								},
								error: function(result, status, error) {
									alert( "Not being able to get request info");return;
								}
							});
		  },
		  error: function(result, status, error) {
			alert( "Not being able to get request info from database");return;
			}
			});
		}
    });
	function getURL(){
		
		
	    var vars={
			m_uuid:pars.m_uuid,
			opt:"getMerchantData"
		};
		console.log(vars);
		$.ajax({
			url:'https://about2pay.lantador.com/sandbox/getClientPaymentMethods2.php?opt=getMerchantData&m_uuid='+pars.m_uuid,type: 'GET',cache: false,data: JSON.stringify(vars),contentType: 'application/json',dataType: 'json',
			success: function (data) {
				console.log(JSON.stringify(data));
				pars.m_name=data.name;
				if (data.hasOwnProperty("image")) pars.m_image=data.image;
				console.log(pars,"PARS");
				$('#paymentform').load("includes/paymentform.php", pars,function( response, status, xhr ) {
					$("#paymentform").show();
					if (pars.m_tx_cd_allowed=="false"||pars.m_tx_cd_allowed=="no") $('#cash').css('display','none');
					if (pars.m_tx_ch_allowed=="false"||pars.m_tx_ch_allowed=="no") $('#chips').css('display','none');
					if (pars.m_tx_dc_allowed=="false"||pars.m_tx_dc_allowed=="false"||pars.m_tx_cc_allowed=="no"||pars.m_tx_cc_allowed=="no") $('#cdc').css('display','none');
					if (pars.m_tx_mp_allowed=="false"||pars.m_tx_mp_allowed=="no") $('#masterpass').css('display','none');
					if (pars.m_tx_mp_allowed=="false"||pars.m_tx_mp_allowed=="no") $('#zapscan').css('display','none');
					if (pars.m_tx_eft_allowed=="false"||pars.m_tx_eft_allowed=="no") $('#eft').css('display','none');
					if (pars.m_tx_trident_allowed=="false"||pars.m_tx_trident_allowed=="no") $('#trident').css('display','none'); else $('#trident').css('display','inline-block');
					    <!-- CLICK ON PAYMENT OPTION-->
						if (pars.m_passthrough){
							curSelected = pars.m_passthrough;
								if (curSelected=="eft"){
									var s=document.getElementById("spinner");s.style.display="block";
									getEftIframe('eft');
								} else if (curSelected=="chips"){
									getCHIPS("chips");
								} else if (curSelected=="trident"){
									getCHIPS("trident");
								} else {
									includeDivs(curSelected);// LOAD SELECTED OPTION DIV
								}
								$(".paymentChoice[trg='"+curSelected+"']").show();
						} else {
							$('.optBtn').on('click',function (e) {
								$('#paymentOptionHolder').hide();
								curSelected = this.id;
								if (curSelected=="eft"){
									var s=document.getElementById("spinner");s.style.display="block";
									getEftIframe('eft');
								} else if (curSelected=="chips"){
									getCHIPS("chips");
								} else if (curSelected=="trident"){
									getCHIPS("trident");
								} else {
									includeDivs(curSelected);// LOAD SELECTED OPTION DIV
								}
								$(".paymentChoice[trg='"+curSelected+"']").show();
							});
						}
					});



			},
			error: function(result, status, error) {
        console.log(error);
				alert( 'Cannot get merchant data '+JSON.stringify(error));return;
			}
		});
	}
//LOAD DIV OF OPTION SELECTED
	function includeDivs(x){
        if (x=="cdc"){
				$('#iveripage').load("https://about2pay.lantador.com/sandbox/iveriform.php", pars,function( response, status, xhr ) {
					iVeri('');
					$(".paymentChoice[trg='"+x+"']").show();
				});
		}
		else if (x=="cash"){
				$('#cashPayment').load("https://about2pay.lantador.com/sandbox/payat.php", pars,function( response, status, xhr ) {
					generateBarcode('barcode');
					$(".paymentChoice[trg='"+x+"']").show();
				});
		}
		else if (x=="masterpass"){
				//$('#masterpassdetail').load("includes/masterpass.php", pars,function( response, status, xhr ) {
					console.log("masterpass");
					var s=document.getElementById("spinner");s.style.display="block";
					getQRCodeIframe(x);
					//$(".paymentChoice[trg='"+x+"']").show();
				//});
		}
		else {
		  //$('#zapscandetail').load("includes/snapscan.php", pars,function( response, status, xhr ) {
			console.log("snap");
			getQRCodeIframe(x);
			//$(".paymentChoice[trg='"+x+"']").show();
		  //});
		}
	}
    	function changeChoice()
    	{
        $('.printHide').css('display','inline-block');
    		$('.paymentChoice').hide();
    		$('#paymentOptionHolder').show();
    	}
		//PARAMETERS FOR TOKEN REQUEST
	    function RQ(){
		  var surname=$("#buyerSurname").val();
		  if (surname==="") surname="x";
		  return {
          "amount": "<?php echo $m_tx_amount ?>",
          "opt": "getPaymentToken",
          "description": "<?php echo $m_tx_item_description ?>",
          "payee": {
            "accountUuid": "<?php echo $m_account_uuid ?>",
            "refInfo": "<?php echo $m_tx_id ?>",
			      "documentUrl": pars.m_return_url,
            <?php
              if($m_tx_category_1) echo('"category1": "'.$m_tx_category_1.'",');
              if($m_tx_category_2) echo('"category2": "'.$m_tx_category_2.'",');
              if($m_tx_category_3) echo('"category3": "'.$m_tx_category_3.'",');
              if($m_tx_site_name)  echo('"siteName": "'.$m_tx_site_name.'",');
              if($m_tx_site_reference) echo('"siteRefInfo": "'.$m_tx_site_reference.'",');
              //if($m_tx_site_reference) echo('"documentUrl": "'.$m_tx_site_reference.'",');
              if($m_tx_invoiceUrl) echo('"documentUrl": "'.$m_tx_invoiceUrl.'"');
            ?>
          },
          "payer": {"name": $("#buyerName").val(),"surname": surname,"email": $("#buyerEmail").val(),"mobileNumber": $("#buyerMobile").val()},
          "payment": {
            "options":{"cashDeposit" : "true"},
            "dueDate": "2099-03-15",
            "expiryTime": "2099-03-15T10:00:00+02:00"
          },
          "requestId": "string"
        };
		}
    // ADD A TOKEN IN DATABASE
    function addTrx(){
      console.log("PARS",pars);
      $.ajax({
       url:'php/addToken.php',type: 'POST',cache: false,data: JSON.stringify(pars),contentType: 'application/json',dataType: 'json',
       success: function (data) {
         console.log("TRX",data);
       },
       error: function(result, status, error) {
         console.log( 'something went wrong', JSON.stringify(status), JSON.stringify(error));
         }
     });
	}
		<!-- iVeri PAYMENT -->
		function iVeri(x){
			if (tokenId){
				var tokeninput=document.getElementById("Lite_Transaction_Token");
				tokeninput.value=tokenId+pars.m_tx_id+Math.floor(Math.random()*900+100);
				var tokeninput2=document.getElementById("Lite_Merchant_Trace");
				tokeninput2.value=tokenId+pars.m_tx_id+Math.floor(Math.random()*900+100);
				var merchref=document.getElementById("MerchantReference");
				merchref.value=tokenId+pars.m_tx_id+Math.floor(Math.random()*900+100);
				var errorurl=document.getElementById("Lite_Website_Error_Url");
				errorurl.value=pars.BASEURL+"carderror.php?tokenId="+tokenId;
				var laterurl=document.getElementById("Lite_Website_Trylater_Url");
				laterurl.value=pars.BASEURL+"carderror.php?tokenId="+tokenId;
				var failurl=document.getElementById("Lite_Website_Fail_Url");
				failurl.value=pars.BASEURL+"carderror.php?tokenId="+tokenId;
				var form1=document.getElementById("Form1");
				console.log(form1);
				form1.submit();
			} else {
				var reqOpt=RQ();
				console.log(reqOpt);
				$.ajax({
					url:'https://about2pay.lantador.com/sandbox/getClientPaymentMethods.php',type: 'POST',cache: false,data: JSON.stringify(reqOpt),contentType: 'application/json',dataType: 'json',
					success: function (data) {
						console.log("TOKEN",data);
						var tokenData = data;
						pars.id=tokenData.tokenId;
						addTrx();
						localStorage.setItem("tokenid", tokenData.tokenId);
						var tokeninput=document.getElementById("Lite_Transaction_Token");
						tokeninput.value=tokenData.tokenId+pars.m_tx_id;
						var tokeninput2=document.getElementById("Lite_Merchant_Trace");
						tokeninput2.value=tokenData.tokenId+pars.m_tx_id;
						var merchref=document.getElementById("MerchantReference");
						merchref.value=tokenData.tokenId+pars.m_tx_id;
						var errorurl=document.getElementById("Lite_Website_Error_Url");
						errorurl.value=pars.BASEURL+"carderror.php?tokenId="+tokenData.tokenId;
						var laterurl=document.getElementById("Lite_Website_Trylater_Url");
						laterurl.value=pars.BASEURL+"carderror.php?tokenId="+tokenData.tokenId;
						var failurl=document.getElementById("Lite_Website_Fail_Url");
						failurl.value=pars.BASEURL+"carderror.php?tokenId="+tokenData.tokenId;
						var form1=document.getElementById("Form1");
						form1.submit();
					},
					error: function(result, status, error) {
						alert( 'Cannot get card request data');return;
					}
				});
			}
		}
		<!-- GENERATE BARCODE (PayAt) (Get token if empty)-->
    	function generateBarcode(x){
			var value;
			if (tokenId){
				    var tokeninput=document.getElementById("payattoken");
					tokeninput.value=tokenId;
					var pmtOpts ={
						"tokenId": "<?php echo $m_tokenId ?>",
						"requestId": pars.requestId,
						"methodType": "CASH_DEPOSIT",
						"redirectUrl": pars.BASEURL+"payat_result.php",
						"opt": "cashPayment"
					  };
					  BarCode(pmtOpts);
			} else {
				var reqOpt=RQ();
				reqOpt.notifyUrl=pars.BASEURL+"notify.php";
				$.ajax({
					url:'https://about2pay.lantador.com/sandbox/getClientPaymentMethods.php',type: 'POST',cache: false,data: JSON.stringify(reqOpt),contentType: 'application/json',dataType: 'json',
					success: function (data) {
					  console.info('cashdep',data);
					  var tokenData = data;
					  pars.id=tokenData.tokenId;
					  var tokeninput=document.getElementById("payattoken");
					  tokeninput.value=pars.id;
					  localStorage.setItem("tokenid", tokenData.tokenId);
					  var pmtOpts ={
						"tokenId": tokenData.tokenId,
						"requestId": tokenData.requestId,
						"methodType": "CASH_DEPOSIT",
						"redirectUrl": pars.BASEURL+"payat_result.php",
						"opt": "cashPayment"
					  };
					  BarCode(pmtOpts);
					},
					error: function(result, status, error) {
						alert( 'Cannot get Pay At request data');return;
					}
				});
			}
    	}
		function BarCode(pmtOpts){
			$.ajax({
					url:'https://about2pay.lantador.com/sandbox/getClientPaymentMethods.php',type: 'POST',cache: false,data: JSON.stringify(pmtOpts),contentType: 'application/json',dataType: 'json',
					success: function (data) {
					console.info('cashdeposit',data);
					var barcodeData = data;
					value = barcodeData.cashDepositRefInfo;
					console.log('value',value);
					var btype = 'code128';
					var renderer = 'css'; //css  bmp  svg  canvas;
					var settings = {
						output:renderer,
						barWidth: 2,
						barHeight: 50,
						moduleSize: 8,
						showHRI: true,
						addQuietZone: true,
						marginHRI: 5,
						bgColor: "#FFFFFF",
						color: "#000000",
						fontSize: 12,
						output: "css",
						posX: 0,
						posY: 0
					}
               	    value = {code:value, rect: true};
					$("#barcodeTarget").html("").show().barcode(value, btype, settings);
					},
					error: function(result, status, error) {
						alert( 'Cannot fetch barcode');return;
					}
				});
		}
		function getCHIPS(x){
			if (tokenId){
				pars.id="<?php echo $m_tokenId ?>";
				loadCHIPS(x);
			} else {
				var reqOpt=RQ();
				console.log(reqOpt);
				$.ajax({
					url:'https://about2pay.lantador.com/sandbox/getClientPaymentMethods.php',type: 'POST',cache: false,data: JSON.stringify(reqOpt),contentType: 'application/json',dataType: 'json',
					success: function (data) {
                         pars.id=data.tokenId;
						 console.log(data,pars);
                         loadCHIPS(x);
                    },
					error: function(result, status, error) {
						alert( 'Cannot load CHIPS form');return;
					}
				});
			}
		}
		function loadCHIPS(x){
			$('#'+x+'page').load("https://about2pay.lantador.com/sandbox/"+x+".php", pars,function( response, status, xhr ) {
					$(".paymentChoice[trg='"+x+"']").show();
				});
		}


		<!-- LOAD INSTANT EFT FRAME (Get token if empty)-->
		function getEftIframe(x){
			if (tokenId){
				var mstOpts ={
						  "tokenId": "<?php echo $m_tokenId ?>",
						  "requestId": pars.requestId,
						  "methodType": "INSTANT_EFT",
						  "redirectUrl": pars.BASEURL+"eft_result.php",
						  "opt": "getEftIframe"
						};
				EFT(mstOpts);
			} else {
				var reqOpt=RQ();
				console.log(reqOpt);
				reqOpt.payment.options.eft=true;
				reqOpt.payment.options.cashdeposit=false;
				$.ajax({
					url:'https://about2pay.lantador.com/sandbox/getClientPaymentMethods.php',type: 'POST',cache: false,data: JSON.stringify(reqOpt),contentType: 'application/json',dataType: 'json',
					success: function (data) {
					    $('#paymentOptionHolder').hide();
						console.info('eft',data);
						var tokenData = data;
						localStorage.setItem("tokenid", tokenData.tokenId);
						var methodType;
						var mstOpts ={
						  "tokenId": tokenData.tokenId,
						  "requestId": tokenData.requestId,
						  "methodType": "INSTANT_EFT",
						  "redirectUrl": pars.BASEURL+"eft_result.php",
						  "opt": "getEftIframe"
						};
						EFT(mstOpts);
					},
					error: function(result, status, error) {
						var s=document.getElementById("spinner");s.style.display="none";
						alert( 'Cannot load EFT data');return;
					}
			});
			}
        }
	  function EFT(mstOpts){
		  $.ajax({	  url: 'https://about2pay.lantador.com/sandbox/getClientPaymentMethods.php',type: 'POST',cache: false,data: JSON.stringify(mstOpts),contentType: 'application/json',dataType: 'json',
					  success: function (data) {
						var s=document.getElementById("spinner");s.style.display="none";
						console.info('inst_eft',data);
						pars.id=data.tokenId;
						addTrx();
						localStorage.setItem("tokenid", data.tokenId);
						var retData = data;
						$('#'+curSelected+'Frame').on("load", function() {
							var iFrameID = document.getElementById(curSelected+'Frame');
							if(iFrameID) {
							  iFrameID.height = "";
							  iFrameID.height = (100 + iFrameID.contentWindow.document.body.scrollHeight) + "px";
							  iFrameID.width = "100%";
							}
						});
						if (retData.tokenId) window.location.href = retData.paymentUrl+'&tokenid='+retData.tokenId; else {alert( 'Cannot load EFT form');return;}
					    },
						error: function(result, status, error) {
							var s=document.getElementById("spinner");s.style.display="none";
							alert( 'Cannot load EFT form');return;
						}
				  });
	  }

	  <!-- CREATE masterpass QR code -->
	  function getQRCodeIframe(x){
		if (tokenId){
			//$('#'+x+'qr').qrcode({width: 300,height: 300,text: tokenId});
			var mstOpts ={
					  "tokenId": tokenId,
					  "requestId": tokenId,
					  "methodType": "MASTERPASS",
					  "redirectUrl": pars.BASEURL+"qr_result.php",
					  "opt": "getQRCodeIframe"
					}
		    QRCode(mstOpts);
	    } else {
			var reqOpt=RQ();
			reqOpt.payment.options.masterpass=true;
			reqOpt.payment.options.cashdeposit=false;
			$.ajax({
				url:'https://about2pay.lantador.com/sandbox/getClientPaymentMethods.php',type: 'POST',cache: false,data: JSON.stringify(reqOpt),contentType: 'application/json',dataType: 'json',
				success: function (data) {
					console.log("TOKEN",data);
					var tokenData = data;
					localStorage.setItem("tokenid", tokenData.tokenId);
					localStorage.setItem("pars", JSON.stringify(pars));
					console.log(tokenData,pars);
					//$('#'+x+'qr').qrcode({width: 250,height: 250,text: tokenData.tokenId});
                    //document.getElementById(x+'code').textContent=tokenData.tokenId;
					var mstOpts ={
					  "tokenId": tokenData.tokenId,
					  "requestId": tokenData.requestId,
					  "methodType": "MASTERPASS",
					  "redirectUrl": pars.BASEURL+"qr_result.php",
					  "opt": "getQRCodeIframe"
					}
				    QRCode(mstOpts);
				},
				error: function(result, status, error) {
					var s=document.getElementById("spinner");s.style.display="none";
					alert( 'Cannot load masterpass data');return;
				}
			});
		}
      }
	function QRCode(mstOpts){
		 $.ajax({
                  url: 'https://about2pay.lantador.com/sandbox/getClientPaymentMethods.php',type: 'POST',cache: false,data: JSON.stringify(mstOpts),contentType: 'application/json',dataType: 'json',
                  success: function (data) {
					var s=document.getElementById("spinner");s.style.display="none";
                    console.info('req2',data,curSelected);
					//$('#qrcode').qrcode({width: $('.qr-size').val(),height: $('.qr-size').val(),text: $('.qr-url').val()});
                    var retData = data;
					pars.id=data.tokenId;
					addTrx();
                    $('#'+curSelected+'Frame').on("load", function() {
                        var iFrameID = document.getElementById(curSelected+'Frame');
                        if(iFrameID) {
                          iFrameID.height = "";
                          iFrameID.height = (100 + iFrameID.contentWindow.document.body.scrollHeight) + "px";
                          iFrameID.width = "100%";
                        }
                    });
					if (retData.paymentUrl) window.location.href = retData.paymentUrl; else {alert( 'Cannot load masterpass form');return;}
					},
					error: function(result, status, error) {
						var s=document.getElementById("spinner");s.style.display="none";
						alert( 'Cannot load masterpass form');return;
					}
              });
	}
	<!-- UTILITY FUNCTIONS-->
    function showConfig1D(){
        $('.config .barcode1D').show();
        $('.config .barcode2D').hide();
    }
    function showConfig2D(){
        $('.config .barcode1D').hide();
        $('.config .barcode2D').show();
    }
    function clearCanvas(){
        var canvas = $('#canvasTarget').get(0);
        var ctx = canvas.getContext('2d');
        ctx.lineWidth = 1;
        ctx.lineCap = 'butt';
        ctx.fillStyle = '#FFFFFF';
        ctx.strokeStyle  = '#000000';
        ctx.clearRect (0, 0, canvas.width, canvas.height);
        ctx.strokeRect (0, 0, canvas.width, canvas.height);
    }
	function handlePrint(x){
        switch(x){
		  case 'email':
		  case 'print':
          case 'download':
			const element = document.getElementById("cashPayment");
			html2pdf().from(element).toPdf().get('pdf').then(function (pdf) {
				window.open(pdf.output('bloburl'), '_blank');
			});
          break;
          default:
          break;
        }
	}
      var globalPmtOpts = {}
      function devOverride(){
          $('#cash,#chips,#eft,#cdc,#masterpass,#zapscan').css('display','inline-block');
      }
      $('#eftFrame').on("load", function() {
          var iFrameID = document.getElementById('eftFrame');
          if(iFrameID) {
            iFrameID.height = "";
            iFrameID.height = (100 + iFrameID.contentWindow.document.body.scrollHeight) + "px";
            iFrameID.width = "100%";
          }
      });
      var getCanvas; // global variable
      var chpsTok;
      var userAvatar;
      var avatarName;
      var curBal;
      var chipsR;
      var chpsT;
      var chpsU;
      var pmtReq = "<?php echo $m_tx_amount ?>";
      var optedLink = '<h2>Masterpass Payment Options</h2> <p>Scan the QRCODE.</p> <div id="paymentOptionButtonHolder"> <div id="masterpass" class="optBtn">Etc</div> <div id="eft" class="optBtn">Instant EFT</div> </div>';
      var curSelected;
    </script>
</body>
</html>
