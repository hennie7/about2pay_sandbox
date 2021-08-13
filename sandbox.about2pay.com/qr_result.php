<?php
    session_start();
	//echo $_SESSION["tokenId"];
    //foreach ($_POST as $key => $value)
    //    echo $key.'='.$value.'<br />';
	// GET STATUS from EFT / Masterpass


	// call payment request

	// get merchant data

	// route back to merchant website
?>
<html>
<style>
body {
 font-family: Arial, Helvetica, sans-serif;
 font-size: 16px;
}
.button {
    width: 215px;
    height: 25px;
    background: white;
	text-decoration : none;
    padding: 10px;
    text-align: center;
	border: 1px solid gray;
    border-radius: 5px;
    color: black;
    font-weight: bold;
    line-height: 25px;
}
</style>

<body style="background-color:#f8f8f8">
<div style="text-align:center">
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
    success="<?php echo $_GET["status"] ?>";
	pppp=localStorage.getItem("pars");
	pars=JSON.parse(pppp);
    console.log(pars);
    ordernr=pars.m_tx_order_nr;
	invoicenr=pars.m_tx_invoice_nr;
	itemname=pars.m_tx_item_name;
	duedate=pars.m_tx_due_date;
	//tokenId="<?php echo $_SESSION["tokenId"] ?>";
	tokenId=localStorage.getItem("tokenid");
	returnurl=pars.m_return_url;
	cancelurl=pars.m_cancel_url;
	notifyurl=pars.m_notify_url;
	back2shopurl=pars.m_back2shop_url;
	currency=pars.m_tx_currency;
	//image="<?php echo $_SESSION["m_image"] ?>";
	//var imgid=document.getElementById("image");
	//imgid.src=image;
	//console.log(success,image);
	if (success!=="SUCCESS"){
		var imageid=document.getElementById("sf");
	    imageid.src="images/payment_failed.png";
		var content=document.getElementById("content");
		var C="<p>The payment process have failed.<p><a class='button' href='index.php?tokenId="+tokenId+"'>Try another payment option</a><br/></br/>";
		if (back2shopurl.length) C+="<a class='button' href='"+back2shopurl+"'>Go back to shop</a>";
	    content.innerHTML=C;
		//return;
	} else {
		setTimeout(function(){
			var reqOpt={
				tokenId:tokenId,
				opt:"loadPaymentToken"
			};
					$.ajax({
						url:'php/getClientPaymentMethods.php',type: 'POST',cache: false,data: JSON.stringify(reqOpt),contentType: 'application/json',dataType: 'json',
						success: function (data) {
								//document.getElementById("demo").innerHTML = reqOpt.tokenId+" "+data.status+" OrderId:"+localStorage.getItem("m_tx_invoice_nr");
								//console.log(localStorage.getItem("m_tx_invoice_nr"));
								var result={};
								result.paymentMethod="MASTERPASS";
								//*******************START
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
								if (data.status=='COMPLETED'){
									result.paymentStatus=data.status;
									result.paymentType="RECEIPT";
									result.paymentSystemReference=data.systemRefInfo;
								}
								result.payerName=data.payer.name;
								result.payerSurname=data.payer.surname;
								result.payerEmail=data.payer.email;
								result.payerMobile=data.payer.mobile;
								var amt=data.amount.toFixed(2);
								result.paymentAmount=amt;
								result.requestAmount=amt;
								result.requestCurrency=currency;
								result.requestStatus=data.status;
								var amt2=amt.replace(/\D/g,'');
								var member={"m_account_uuid": result.payeeAccountUuid};
								$.ajax({
								  url:'php/getSecret.php',type: 'POST',cache: false,data: JSON.stringify(member),contentType: 'application/json',dataType: 'json',
								  success: function (data) {
									result.payeeUuid=data[0].m_uuid;
									var csa=[result.payeeUuid,result.payeeAccountUuid,result.payeeRefInfo,amt2,currency,data[0].secret];
									result.checksum=md5(csa.join('_'));											
									result.notifyurl=notifyurl;										
										$.ajax({
											url:"php/notifyResponse.php",type: 'POST',cache: false,data: JSON.stringify(result),contentType: 'application/json',
										success: function (data) {
												window.location=returnurl;
											},
											error: function(result, status, error) {
												console.log( 'something went wrong', JSON.stringify(status), JSON.stringify(error));
											}
										});
								  }
								});
								//*************END
						}
					});
		}, 2000);
	}
</script>
