

				     <br/>

  					<img src="images/payAt.png" style="height:160px;width:200px" alt="Pay At Logo">



  					<hr>
					<h3 style="color: #2b2b2b;">Steps to make a cash in store payment</h3>
  					<ol  style="text-align:left">
  						<li>Locate and go to a <b>Pay@</b> pay point that is most convenient for you.</li>
  						<li>Inform the cashier that you want to do a <b>Pay@</b> cash payment transaction.</li>
  						<li>Present the unique payment code to the cashier and the amount to be paid. </li>
  						<li>Make the payment and make sure to get the receipt from the cashier</li>
  					</ol>

  					<!-- <canvas id="canvasTarget" width="300" height="200"></canvas>  -->
            <br/>
            <div id="sotreLogos">
              <img src="images/cashPartners.png" alt="" width="100%">
            </div>
		
            <div class="card" id="cashPmtReq" style="background-color:#f0f0f0">
              <h2>Payment Request Details</h2>
              <!-- The below will be populated bia the API -->
              <table width="100%">
                <tr>
                  <td valign="top" style="padding-right: 20px;">
                    <!-- <img src="<? echo $logoUrl ?>" alt="<?php echo $mName ?>" width="130px"> -->
                    <img src="images/logos/retailer.png" alt="Retailer" width="130px">
                  </td>
                  <td>
				    <input type="hidden" id="payattoken" value="">
                    <input type="hidden" id="m-id" value="<?php echo $m_uuid; ?>">
                    <label for="reqBy">Requested By:</label>
                    <input type="text" id="reqBy" name="reqBy" value="<?php echo $_POST['m_name'] ?>" disabled="">

                    <label for="reqAmount">Amount</label>
                    <input type="text" id="reqAmount" name="reqAmount" value="<?php echo $_POST['m_tx_amount'] ?>" disabled="" style="font-weight: bold;">


                    <label for="reqDescription">Description</label>
                    <input type="text" id="reqDescription" name="reqDescription" value="<?php echo $_POST['m_tx_item_description'] ?>" disabled="">


                    <label for="reqReference">Reference</label>
                    <input type="text" id="reqReference" name="reqReference" value="<?php echo $_POST['m_tx_site_reference'] ?>" disabled="">

                    <label for="reqExpiry">Expiry Date & Time</label>
                    <input type="text" id="reqExpiry" name="reqExpiry" value="<?php echo $_POST['m_tx_due_date'] ?>" disabled="">

                    <label for="reqExpiry">Message</label>
                    <input type="text" id="reqExpiry" name="reqExpiry" value="<?php echo $_POST['m_tx_message'] ?>" disabled="">
                  </td>
                </tr>
              </table>

            </div>
			<br/>
			 <div class="barcodeHolder">
  				  	<div id="barcodeTarget" class="barcodeTarget"></div>
            </div>
            <br/>
            <div class="cashNavBtns">
    		  <button id="printBtn" style="cursor:pointer;background-color:peru;color:white;width:220px;border-radius:15px;border:0" class="printHide submitCashBtn" data-html2canvas-ignore onclick="handlePrint('print')">
                <span class="material-icons">
                  print
                </span>
                  Print or Download
              </button>
    		<!--			<button id="downloadBtn" style="cursor:pointer;background-color:peru;color:white;width:120px;border-radius:15px;border:0" class="printHide submitCashBtn" data-html2canvas-ignore onclick="handlePrint('download')">
                  <span class="material-icons">
                    archive
                  </span>
                  Download
              </button>

              <button id="emailBtn" style="cursor:pointer;background-color:peru;color:white;width:120px;border-radius:15px;border:0" class="printHide submitCashBtn" data-html2canvas-ignore onclick="handlePrint('email')">
                  <span class="material-icons">
                    email
                  </span>
                  Email
              </button>-->
              <button id="doneBtn" style="cursor:pointer;background-color:peru;color:white;width:220px;border-radius:15px;border:0" class="printHide submitCashBtn" data-html2canvas-ignore onclick="RESULT()">
                  <span class="material-icons">
                    done
                  </span>
                  Done
              </button>
              <a id="dlBtn">Download</a>

            </div>
            <br/>
			<button class="panelCloseBtn printHide" style="cursor:pointer;width:300px;" data-html2canvas-ignore onclick="changeChoice()">Back to payment options</button>
			
			
			<script>
			function RESULT(){
				var token=document.getElementById("payattoken");
				console.log(token,token.value);
				var url="./payatresult.php?return=<?php echo $_POST['m_return_url'] ?>&image=<?php echo urlencode($_POST['m_image']) ?>&currency=<?php echo $_POST['m_tx_currency'] ?>&notify=<?php echo $_POST['m_notify_url'] ?>&order=<?php echo $_POST['m_tx_order_nr'] ?>&invoice=<?php echo $_POST['m_tx_invoice_nr'] ?>&item=<?php echo $_POST['m_tx_item_name'] ?>&due=<?php echo $_POST['m_tx_due_date'] ?>&tokenId="+token.value+"&post=<?php echo $_POST['post'] ?>";
				console.log(url);
				window.location=url;
			}
			</script>