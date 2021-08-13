<?php
 session_start();
    //foreach ($_POST as $key => $value)
    //    echo $key.'='.$value.'<br />';

  $trace = $_POST["LITE_MERCHANT_TRACE"];
	$uuid = $_POST["ECOM_RECEIPTTO_ONLINE_EMAIL"];


	//echo $trace;
	//echo "   ";
	//echo $uuid;
	// call payment request

	// get merchant data

	// route back to merchant website
?>
<body style="background-color:#f8f8f8">
<div style="text-align:center;width:600px;margin: 0px auto;border:1px solid gray">
<div style="width:100%;">
	   <img id="image" src="images/instaPay_2.png"  style="height:50px;display: block;margin-left: auto;margin-right: auto;"></img>
</div>
<br/>
 <img id="sf" style="height:200px" src="images/payment_complete.png"></img>

<br/>

<div id="content">
	<p>The payment process is complete</p>
	<p>You will be redirected back to the online shop in a few seconds.</p>
</div>


</div>

</body>
    <script src="js/jquery.min.js"></script>
	<script src="js/md5.min.js"></script>
<script>
    ordernr="<?php echo $_GET["order"] ?>";
	invoicenr="<?php echo $_GET["invoice"] ?>";
	itemname="<?php echo $_GET["item"] ?>";
	duedate="<?php echo $_GET["due"] ?>";
	returnurl="<?php echo $_GET["return"] ?>";
	notifyurl="<?php echo $_GET["notify"] ?>";
	post="<?php echo $_GET["post"] ?>";
    currency="<?php echo $_GET["currency"] ?>";
	//image="<?php echo $_GET["image"] ?>";
    //var imgid=document.getElementById("image");
	//imgid.src=image;
	
			var vars={
					"merchantTrace": "<?php echo $trace; ?>",
					"opt":"createPayment"
				};
				console.log(vars);
				t1=new Date().getTime();
     // setTimeout(function(){
				$.ajax({
						url:'php/getClientPaymentMethods.php',type: 'POST',cache: false,data: JSON.stringify(vars),contentType: 'application/json',dataType: 'json',
						success: function (data) {
							//alert(JSON.stringify(data));
							    t2=new Date().getTime();
							    console.log(t2-t1);
							    t1=t2;
								var reqOpt={
									tokenId:"<?php echo substr($trace,0,10) ?>",
									opt:"loadPaymentToken"
								};
								$.ajax({
									url:'php/getClientPaymentMethods.php',type: 'POST',cache: false,data: JSON.stringify(reqOpt),contentType: 'application/json',dataType: 'json',
									success: function (data) {
									    t2=new Date().getTime();
							            console.log(t2-t1);
							            t1=t2;
											console.log(data);
											var result={};
											result.paymentMethod="CARD";
											//***************START***********
											result.payeeOrderItemDescription=data.description;
											if (data.payee.category1) result.payeeCategory1=data.payee.category1;
											if (data.payee.category2) result.payeeCategory2=data.payee.category2;
											if (data.payee.category3) result.payeeCategory3=data.payee.category3;
											if (data.payee.siteName) result.payeeSiteName=data.payee.siteName;
											if (data.payee.siteRefInfo) result.payeeSiteReference=data.payee.siteRefInfo;
											if (data.payee.refInfo) result.payeeRefInfo=data.payee.refInfo;
											result.payeeOrderNr=ordernr;
											result.payeeAccountUuid=data.payee.accountUuid;
											result.payeeInvoiceNr=invoicenr;
											result.payeeOrderItemName=itemname;
											result.requestTokenId=data.tokenId;
											result.paymentAmount=data.amount;
											result.paymentCurrency=currency;
											result.paymentDateTime=new Date().toISOString();
											var amt=data.amount.toFixed(2);
											if (data.status=='COMPLETED'){
												result.paymentStatus=data.status;
												result.paymentType="RECEIPT";
												result.paymentSystemReference=data.systemRefInfo;
												result.paymentAmount=amt;
											}
											result.payerName=data.payer.name;
											result.payerSurname=data.payer.surname;
											result.payerEmail=data.payer.email;
											result.payerMobile=data.payer.mobile;
											result.requestAmount=amt;
											result.requestCurrency=currency;
											result.requestStatus=data.status;
											var amt2=amt.replace(/\D/g,'');
											var member={"m_account_uuid": result.payeeAccountUuid};
											$.ajax({
											  url:'php/getSecret.php',type: 'POST',cache: false,data: JSON.stringify(member),contentType: 'application/json',dataType: 'json',
											  success: function (data) {
											    t2=new Date().getTime();
							                    console.log(t2-t1);
							                    t1=t2;
												result.payeeUuid=data[0].m_uuid;
												var csa=[result.payeeUuid,result.payeeAccountUuid,result.payeeRefInfo,amt2,currency,data[0].secret];
												result.checksum=md5(csa.join('_'));											
												result.notifyurl=notifyurl;
												if (post=="true"){													
													$.ajax({
														url:"https://mygoldplus.herokuapp.com/"+notifyurl,type: 'POST',cache: false,data: JSON.stringify(result),contentType: 'application/json',
													success: function (data) {
															window.location=returnurl;
														},
														error: function(result, status, error) {
															alert( error);
														}
													});	
												} else {													
													$.ajax({
														url:"php/notifyResponse.php",type: 'POST',cache: false,data: JSON.stringify(result),contentType: 'application/json',
													success: function (data) {
													    t2=new Date().getTime();
							                            console.log(t2-t1);
							                            t1=t2;
													window.location=returnurl;
														},
														error: function(result, status, error) {
															alert( error);
														}
													});
												}
											  }
											});
											//**************END*****************
									}
								});
						},
						error: function(result, status, error) {
							console.log( 'something went wrong', status, error);
						}
					});
	//		}, 5000);
			

</script>
