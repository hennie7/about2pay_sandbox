		<div style="width:100%;">
			   <img src="<?php echo $_POST['m_image'] ?>"  style="height:50px;display: block;margin-left: auto;margin-right: auto;"></img>
		</div>
		<div class="span6" style="background-color:white;margin-right:10px;">
			  <div class="card" style="background-color:#f8f8f8;border-radius:10px;padding-left:10px;">
					<h3>Payment Request Details</h3>
					<div width="100%">
						<label style="width:150px;float:left;"><b>Requested By </b></label>
						<span style="display: block;overflow: hidden;" ><label><?php echo $_POST['m_name'] ?></label></span>
						<br/>
						<label style="width:150px;float:left"><b>Reference </b></label>
						<span style="display: block;overflow: hidden;"><label><?php echo $_POST['m_tx_id'] ?>&nbsp;</label></span>
						<br/>
						<label style="width:150px;float:left"><b>Due Date & Time </b></label>
						<span style="display: block;overflow: hidden;"><label><?php echo $_POST['m_tx_due_date'] ?>&nbsp;</label></span>
						<br/>
						<label style="width:150px;float:left"><b>Status </b></label>
						<span id="STATUS" style="display: block;overflow: hidden;"><label>Pending</label></span>
						<br/>
						
						<?php if ($_POST['m_tx_amount']>0) { ?>
						 <label style="width:150px;float:left"><b>Amount </b></label>
						 <span style="display: block;overflow: hidden;"><label>R <?php echo $_POST['m_tx_amount'] ?></label></span>
						<?php } else {?>
						 <label style="line-height:50px;display: table-cell;vertical-align: bottom;float:left;width:150px" for="m_tx_amount"><b>Amount</b></label>
						 <span  style="display: block;overflow: hidden;"><input style="width:250px" type="text" id="m_tx_amount" name="m_tx_amount" value="<?echo $_POST['m_tx_amount']?>"></span>
                        <?php } ?>
						<br/>
						<label style="width:150px;float:left"><b>Message </b></label>
						<span style="display: block;overflow: hidden;"><label><?php echo $_POST['m_tx_message'] ?>&nbsp;</label></span>
						<br/>
						<label style="width:150px;float:left"><b>Description </b></label>
						<span style="display: block;overflow: hidden;"><label><?php echo $_POST['m_tx_item_description'] ?>&nbsp;</label></span>
					</div>
			  </div>
			  <div class="card"  style="background-color:#f8f8f8;border-radius:10px;padding-left:10px;">
					<h3>Buyer Details</h3>

				<table width="100%">

								<!-- <img src="images/ud.png" alt="" width="130px" style="border-radius: 8px;" onclick="devOverride();"> -->
								<label style="line-height:50px;display: table-cell;vertical-align: bottom;float:left;width:150px" for="buyerName"><b>Name</b></label>
								<span  style="display: block;overflow: hidden;"><input style="width:250px" type="text" id="buyerName" name="buyerName" value="<?echo $_POST['name']?>"></span>
								<br/>
								<label style="line-height:50px;display: table-cell;vertical-align: bottom;float:left;width:150px" for="buyerSurname"><b>Surname</b></label>
								<span  style="display: block;overflow: hidden;"><input style="width:250px" type="text" id="buyerSurname" name="buyerSurname" value="<?echo $_POST['surname']?>"></span>
								<br/>
								<label style="line-height:50px;display: table-cell;vertical-align: bottom;float:left;width:150px" for="buyerMobile"><b>Mobile Number</b></label>
								<span  style="display: block;overflow: hidden;"><input style="width:250px" type="text" id="buyerMobile" name="buyerMobile" value="<?echo $_POST['mobile']?>"></span>
								<br/>
								<label style="line-height:50px;display: table-cell;vertical-align: bottom;float:left;width:150px" for="buyerEmail"><b>Email Address</b></label>
								<span  style="display: block;overflow: hidden;"><input style="width:250px" type="email" id="buyerEmail" name="buyerEmail" value="<?echo $_POST['email'] ?>"></span>

				</table>

		  </div>
		</div>
		<div class="span6" style="margin:1px">
		  <div class="card" id="paymentOptionHolder" style="background-color:#f8f8f8;border-radius:10px;">
        			<h3>Payment Options</h3>
					<a class='button' href='<?php echo $_POST["m_back2hop_url"] ?>'>Go back to shop</a>
					<p>Select your payment option and follow the onscreen prompts to complete the payment</p>
			<div id="paymentOptionButtonHolder">
				<div id="cdc" class="optBtn drinkcard-cc" style="cursor:pointer;background-color:#f8f8f8;display:inline-block;padding:10px 5px 10px 5px;">
					<!--<input type="radio" style="z-index:999;position:relative;top:17px;left:60px;" />-->
					<img src="images/debit.png" alt="" class="imgLogo" style="height:160px;width:200px;"></div>
				<div id="eft" class="optBtn drinkcard-cc" style="cursor:pointer;background-color:#f8f8f8;display:inline-block;padding:10px 5px 10px 5px;">
					<!--<input type="radio" style="z-index:999;position:relative;top:17px;left:60px;" />-->
					<img src="images/eft.png" alt="" class="imgLogo" style="height:160px;width:200px;"></div>
				<div id="masterpass" class="optBtn drinkcard-cc" style="cursor:pointer;background-color:#f8f8f8;display:inline-block;padding:10px 5px 10px 5px;">
					<!--<input type="radio" style="z-index:999;position:relative;top:17px;left:60px;" />-->
					<img src="images/masterpass.png" alt="" class="imgLogo" style="height:160px;width:200px;"></div>
				<div id="zapscan" class="optBtn drinkcard-cc" style="cursor:pointer;background-color:#f8f8f8;display:inline-block;padding:10px 5px 10px 5px;">
					<!--<input type="radio" style="z-index:999;position:relative;top:17px;left:60px;" />-->
					<img src="images/snapscan.png" alt="" class="imgLogo" style="height:160px;width:200px;"></div>
				<div id="chips" class="optBtn drinkcard-cc" style="cursor:pointer;background-color:#f8f8f8;display:inline-block;padding:10px 5px 10px 5px;">
					<img src="images/chips2.png" alt="" class="imgLogo" style="height:160px;width:200px;"></div>
				<div id="trident" class="optBtn drinkcard-cc" style="cursor:pointer;background-color:#f8f8f8;display:inline-block;padding:10px 5px 10px 5px;">
					<img src="images/trident2.png" alt="" class="imgLogo" style="height:160px;width:200px;"></div>
				<div id="cash" class="optBtn drinkcard-cc" style="cursor:pointer;background-color:#f8f8f8;display:inline-block;padding:10px 5px 10px 5px;">
					<!--input type="radio" style="z-index:999;position:relative;top:17px;left:60px;" />-->
					<img src="images/cash.png" alt="" class="imgLogo" style="height:160px;width:200px;"></div>
			</div>
			
			<br/>

			<p  style="font-size:12px;text-align:left">100% secure payments processes are followed by Trustlink and secured by the involved payment service provider. In order to protect your card from unauthorized use, Trustlink may request further proof of card ownership.</p>
		  </div>
        <div id="masterpassdetail" class="card paymentChoice" trg="masterpass">
				<h3>REDIRECTING TO MASTERPASS...</h3>
        </div>
        <div class="card paymentChoice" trg="eft">
        	<button class="panelCloseBtn" onclick="changeChoice()">back</button>
        	<h2>Instant EFT</h2>
			<iframe src="" frameborder="0" id="eftFrame" width="100%" height="800px"></iframe>
        </div>
	    <div id="chipspage" class="card paymentChoice" trg="chips" style="position: relative; color: #ccc"></div>
		<div id="tridentpage" class="card paymentChoice" trg="trident" style="position: relative; color: #ccc"></div>
		<div id="iveripage" class="card paymentChoice" trg="cdc" style="background-color:#f0f0f0">
			<?php include 'includes/iveriform.php';?>
		</div>
        <div id="zapscandetail" class="card paymentChoice" trg="zapscan">
               <h3>REDIRECTING TO SNAPSCAN ...</h3>
        </div>
		<div class="card paymentChoice" id="cashPayment" trg="cash"  style="background-color:#f8f8f8;border-radius:20px;">

		</div>

	    </div>
