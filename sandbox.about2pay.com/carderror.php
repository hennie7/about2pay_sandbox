<?php
    //foreach ($_POST as $key => $value)
    //    echo $key.'='.$value.'<br />';

  $trace = $_POST["LITE_MERCHANT_TRACE"];
	$uuid = $_POST["ECOM_RECEIPTTO_ONLINE_EMAIL"];
	$status=$_POST["LITE_PAYMENT_CARD_STATUS"];


	//$return=$_GET['return'];
  $message="Unknown error";
	if ($status=="3") $message="Hot card";
	if ($status=="4") $message="Denied";
  if ($status=="5") $message="Please call";
	if ($status=="9"||$status=="1") $message="Unable to process the transaction";
  if ($status=="255") $message="Cancelled";
	// call payment request

	// get merchant data

	// route back to merchant website
?>
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
<body style="font-face:Arial">
  <div style="text-align:center;width:600px;margin: 0px auto;border:1px solid gray">
  <div style="width:100%;">
	   <img id="image" src="images/instaPay_2.png"  style="height:50px;display: block;margin-left: auto;margin-right: auto;"></img>
  </div>
    <br/>
    <img style="height:200px" src="images/payment_failed.png"></img>
    <br/>
		<p>ERROR.</p>
		<p>Something went wrong with the card payment </p>
		<p>The following error was returned by the bank:</p>
    <h1>Error code <?php echo $status ?>: <?php echo $message ?></h1>

  </div>
	<div style="text-align:center">
			<a class="button" href=index.php?tokenId=<?php echo substr($trace,0,10) ?>>Please choose another payment method</a>
	</div>
</body>
