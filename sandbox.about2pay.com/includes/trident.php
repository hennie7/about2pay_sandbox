  <div style="text-align:center">
	<img src="images/trident.png" alt="" style="width:284px">
  </div>
         
          <div id="step1" trg="step1">
		       
                
               
            <ons-card id="loginFormHolder">
			 <div style="text-align:center">
				<p style="color:black"><b>Please enter your Trident&copy; details to log into your account</b></p>
				  </br>
                  <div id="chipsqr"></div>
                  <h1 id="chipscode"></h1>
                 
                </div>
              <form id="loginForm">
                  <ons-list>
                      <ons-list-item>
                          <input type="text" class="text-input" name="username" id="username" placeholder="Mobile Number" value="" style="width: 90%;">
                      </ons-list-item>
                  </ons-list>
                  <ons-list>
                      <ons-list-item style="height:30px">
                          <input type="password" class="text-input" name="password" id="password" placeholder="Pin" value="" style="width: 90%;">
                      </ons-list-item>
                  </ons-list>
                  <div style="text-align: center; margin-top: 30px;">
                      <ons-button onclick="handleLogin()" class="submitBtn" id="submitButton" style="cursor:pointer;width:100%;left:0;margin-left:0;background-color:#31ACF9;color:white;border:0;border-radius:25px;width:95%">
                          Login
                      </ons-button>
                </div>
				
                <a  href="#popup1" <b> * Forgot Password</b></a>
              </form>
			  <div id="popup1" class="overlay">
				<div class="popup">
					<h3>Forgot password :</h3>
					<a class="close" href="#">&times;</a>
					<div class="content" style="color:black">
						Please use your Trident Money Manager App on your smartphone to update your password.
					</div>
				</div>
			</div>
              <ons-row class="appLogosHolder">
                <p>Register a Trident® account by downloading the mobile app</p>
                <a href="https://www.tridentdigitalenterprises.com/fintech/#wooden">
                  <img src="images/appstores.png" alt="" class="appLogos">
                </a>
              </ons-row>
			  			<br/>
			 <div style="text-align:center">
				<button class="panelCloseBtn printHide" style="cursor:pointer;width:300px"  data-html2canvas-ignore onclick="changeChoice()">Back to payment options</button>
			 </div>
            </ons-card>

            <ons-card id="recoverFormHolder">
              <ons-list-title class="titleHeader">Recover Password</ons-list-title>
              <form id="recoverForm">
                  <p>Please supply a mobile number or email address to receive a reset code</p>
                  <ons-list>
                      <ons-list-item>
                        <label for="usernameRecover">Mobile number / Email address</label>
                          <input type="text" class="text-input" name="usernameRecover" id="usernameRecover" placeholder="" value="" style="width: 100%;">
                      </ons-list-item>
                  </ons-list>
                  <div style="text-align: center; margin-top: 30px;">
                      <ons-button  onclick="handleRecovery('sendCode')" style="cursor:pointer;background-color: #414959;" id="submitButtonRecovery" class="submitBtn">
                          Get Code
                        </ons-button>
                </div>
                <ons-list-title onclick="showLogin()" class="recoverTxt">Login</ons-list-title>
              </form>
            </ons-card>
            <ons-card id="recoverFormHolder2">
              <ons-list-title class="titleHeader">Verification</ons-list-title>
              <form id="recoverForm">
                  <p>Please supply the verification code sent to mobile number/email address ***2359</p>
                  <ons-list>
                      <ons-list-item>
                          <input type="text" pattern="^[0-9]$" maxlength="1" class="text-input" name="pin1" id="pin1" placeholder="" value="" style="width: 10%;">
                          <input type="text" pattern="^[0-9]$" maxlength="1" class="text-input" name="pin2" id="pin2" placeholder="" value="" style="width: 10%;">
                          <input type="text" pattern="^[0-9]$" maxlength="1" class="text-input" name="pin3" id="pin3" placeholder="" value="" style="width: 10%;">
                          <input type="text" pattern="^[0-9]$" maxlength="1" class="text-input" name="pin4" id="pin4" placeholder="" value="" style="width: 10%;">
                          <input type="text" pattern="^[0-9]$" maxlength="1" class="text-input" name="pin5" id="pin5" placeholder="" value="" style="width: 10%;">
                      </ons-list-item>
                  </ons-list>
                  <div style="text-align: center; margin-top: 30px;">
                      <ons-button  onclick="handleRecovery('verify')" style="cursor:pointer;background-color: #414959;" id="submitButtonRecovery" class="submitBtn">
                          Verify Code
                        </ons-button>
                  </div>
                  <ons-list-title onclick="alert('resending code')" class="recoverTxt">Resend Code</ons-list-title>
              </form>
            </ons-card>
            <ons-card id="recoverFormHolder3">
              <ons-list-title class="titleHeader">Passcode</ons-list-title>
              <form id="recoverForm">
                  <p>Create your unique passcode to be used for login and transaction authorisations</p>
                  <ons-list>
                      <ons-list-item>
                          <input type="text" pattern="^[0-9]$" maxlength="1" class="text-input" name="pass1" id="pass1" placeholder="" value="" style="width: 10%;">
                          <input type="text" pattern="^[0-9]$" maxlength="1" class="text-input" name="pass2" id="pass2" placeholder="" value="" style="width: 10%;">
                          <input type="text" pattern="^[0-9]$" maxlength="1" class="text-input" name="pass3" id="pass3" placeholder="" value="" style="width: 10%;">
                          <input type="text" pattern="^[0-9]$" maxlength="1" class="text-input" name="pass4" id="pass4" placeholder="" value="" style="width: 10%;">
                      </ons-list-item>
                  </ons-list>
                  <div style="text-align: center; margin-top: 30px;">
                      <ons-button  onclick="handleRecovery('update')" style="cursor:pointer;background-color: #414959;" id="submitButtonRecovery" class="submitBtn">
                          UPDATE
                        </ons-button>
                  </div>
              </form>
            </ons-card>
            <ons-card id="loggedInFormHolder" style="text-align: left;" >
              <!--<ons-button onclick="changeChoice()" class="submitBtnClose" style="cursor:pointer;color:white">
                   <button class="panelCloseBtn printHide" style="cursor:pointer;width:300px"  data-html2canvas-ignore onclick="changeChoice()">Back to payment options</button>
              </ons-button>
               <p style="color:black"><b>Welcome back</b></p>-->
              <div style="margin-bottom: 30px;">
              <table>
                <tr>
                  <td valign="top" style="padding-right: 20px;text-align:right">
                    <img id="userAvatar" src="images/ud.png" alt="" style="width:72px;" style="border-radius: 8px;">
                  </td>
                  <td>
                    <div id="avatarName" class="avatarName" style="color:black"></div>
                  </td>
                </tr>
                <tr>
                  <td style="color:black;text-align:right"><div class="curBal"><b>Current balance:</b></div></td>
                  <td style="color:black"><div id="curBal" class="right"></div></td>
                </tr>
                <tr>
                  <td><div class="pmtReq"  style="color:black;text-align:right">Payment requested:</div></td>
                  <td><div id="pmtReq" class="right" style="color:black">R <?php echo $_POST['m_tx_amount'] ?></div></td>
                </tr>
                <tr>
                  <td height="20px"></td>
                  <td></td>
                </tr>
                <tr>
                  <td colspan="2">
                    <span class="alert" style="color:black;border:0;background-color:#f8f8f8">Please note that transaction and daily limits might apply depending on your verification level and profile</span>
                  </td>
                </tr>
              </table>
              </div>
                <ons-row>
                  <ons-button  onclick="handleTransaction('approve')" style="cursor:pointer;background-color: rgb(72, 150, 241); text-align: center;border:0;" id="submitButtonRecovery" class="submitBtn">
                                  APPROVE
                            </ons-button>
                </ons-row>
				<br/>
			    <div style="text-align:center">
				   <button class="panelCloseBtn printHide" style="cursor:pointer;width:300px"  data-html2canvas-ignore onclick="changeChoice()">Back to payment options</button>
			    </div>
                </ons-card>
                <ons-card id="paymentAccepted" style="text-align: center;" >
              <p style="color:black"><b>Payment successful</b></p>
              <div style="margin-bottom: 30px; text-align: center;">
                <img src="images/chips-approved.png" alt="" style="max-width: 200px">
              </div>
              <ons-row>
                <ons-button  onclick="handleTransaction('approved')" style="cursor:pointer;background-color: rgb(72, 150, 241); text-align: center;" id="submitButtonRecovery" class="submitBtn">
                              CONTINUE
                        </ons-button>
              </ons-row>
                </ons-card>
                  <script>
                      function handleLogin() {
                              //var chipsData = data;
                              chipsR = "string";
							  chpsT="<?php echo $_POST['id'] ?>";
                              //chpsT=document.getElementById('chipscode').textContent;
                              console.log(chpsT);
							  var mobile=$('#username').val();
							  if (mobile.substring(0,1)=="0"){
								  mobile="+27"+mobile.substring(1);
							  } else if (!mobile.substring(0,1)=="+"){
							      alert("Invalid mobile number");
							  }
                            var chipsLog = {
                                "mobileNumber":""+mobile,
                                "pin":""+$('#password').val(),
                                "opt":"getCHIPSLogin"
                            }
                            $.ajax({
                                url: 'php/getClientPaymentMethods.php',
                                type: 'POST',
                                cache: false,
                                data: JSON.stringify(chipsLog),
                                dataType: 'json',
                                success: function (data) {
                                    console.info('chipslogin',data);
                                    var authData = data;
									if (data.code){
										if (data.code='00010') {alert(data.description);return;}
									}
                                    chpsTok = authData.jwttoken;
                                    var chipsULog = {
                                        "mobileNumber":""+$('#username').val(),
                                        "token":""+chpsTok,
                                        "opt":"getCHIPSUserDetails"
                                    }
                                    $.ajax({
                                        url: 'php/getClientPaymentMethods.php',
                                        type: 'POST',
                                        cache: false,
                                        data: JSON.stringify(chipsULog),
                                        dataType: 'json',
                                        success: function (data) {
                                            console.info('chipsusers',data);
											if (data.code){
												if (data.code='00010') {alert(data.description);return;}
											}
                                            var authUData = data;
                                            userAvatar = authUData.image;
                                            avatarName = authUData.displayName;
                                            chpsU     = authUData.accountUuid;
											//chpsU     = authUData.uuid;
                                            var chipsALog = {
                                                "uuid":""+authUData.uuid,
                                                "token":""+chpsTok,
                                                "opt":"getCHIPSUserAccount"
                                            }
                                            $.ajax({
                                                url: 'php/getClientPaymentMethods.php',
                                                type: 'POST',
                                                cache: false,
                                                data: JSON.stringify(chipsALog),
                                                dataType: 'json',
                                                success: function (data) {
                                                    console.info('chipsgetacc',data);
                                                    var authAData = data;
													if (data.code){
														if (data.code='00010') {alert(data.description);return;}
													}
                                                    curBal = authAData.values[0].availableBalanceAmount;
                                                    $('#userAvatar').attr('src', userAvatar);
                                                    $('#avatarName').html(avatarName);
                                                    $('#curBal').html(curBal);
                                                    $('#pmtReq').html(pmtReq);
                                                    $('#recoverFormHolder').css('display','none');
                                                    $('#recoverFormHolder2').css('display','none');
                                                    $('#recoverFormHolder3').css('display','none');
                                                    $('#loginFormHolder').css('display','none');
                                                    $('#loggedInFormHolder').css('display','block');
                                                },
												error: function(result, status, error) {
													alert(JSON.stringify(error));
												}
                                            });
                                        },
										error: function(result, status, error) {
											alert(JSON.stringify(error));
										}
                                    });
                                },
								error: function(result, status, error) {
									alert(JSON.stringify(error));
								}
                            });
                    }
                    function handleTransaction(e){
                      switch(e){
                        case "approve":
                            var txLog = {
                                "opt":"makeChipsPmt",
                                "description":"<?php echo $_POST['m_tx_item_description'] ?>",
                                "feeSponsorType": "PAYEE",
                                "amount":"<?php echo $_POST['m_tx_amount'] ?>",
                                "gratuityAmount": 0,
                                "payeeAccountUuid":"<?php echo $_POST['m_account_uuid'] ?>",
                                "payeeMessage": "string",
                                "payeeRefInfo":"<?php echo $_POST['m_tx_id'] ?>",
                                <?php if (strlen(trim($_POST['m_tx_site_name']))) echo '"payeeSiteName":"'.$_POST['m_tx_site_name'].'",'; else echo '"payeeSiteName":"x",'; ?>
                                "payeeSiteRefInfo":"<?php echo $_POST['m_tx_site_reference'] ?>",
                                "payerAccountUuid": ""+chpsU,
								<?php if (strlen(trim($_POST['category1']))) echo '"payerCategory1":"'.$_POST['category1'].'",'; else echo '"payerCategory1":"x",'; ?>
								<?php if (strlen(trim($_POST['category2']))) echo '"payerCategory2":"'.$_POST['category2'].'",'; else echo '"payerCategory2":"x",'; ?>
								<?php if (strlen(trim($_POST['category3']))) echo '"payerCategory3":"'.$_POST['category3'].'",'; else echo '"payerCategory3":"x",'; ?>
								<?php if (strlen(trim($_POST['m_tx_site_reference']))) echo '"payerRefInfo":"'.$_POST['m_tx_site_reference'].'",' ?>
                                "paymentDate": "2021-03-08",
                                "paymentType": "DEFAULT",
                                "requestId": ""+chpsTok,
                                "tokenId": ""+ chpsT,
                                "token": "" + chpsTok
                            }
                            $.ajax({
                                url: 'php/getClientPaymentMethods.php',
                                type: 'POST',
                                cache: false,
                                data: JSON.stringify(txLog),
                                dataType: 'json',
                                success: function (data) {
                                    console.info('bulk',txLog,data);
                                    var approvalData = data;
									window.location="./chips_result.php?return=<?php echo $_POST['m_return_url'] ?>&back2shop=<?php echo $_POST['m_back2shop_url'] ?>&cancel=<?php echo $_POST['m_cancel_url'] ?>&image=<?php echo urlencode($_POST['m_image']) ?>&currency=<?php echo $_POST['m_tx_currency'] ?>&notify=<?php echo $_POST['m_notify_url'] ?>&order=<?php echo $_POST['m_tx_order_nr'] ?>&invoice=<?php echo $_POST['m_tx_invoice_nr'] ?>&item=<?php echo $_POST['m_tx_item_name'] ?>&due=<?php echo $_POST['m_tx_due_date'] ?>&post=<?php echo $_POST['post'] ?>&tokenId=<?php echo $_POST['id'] ?>";
                                    //showAproval();
                                },
								error: function(result, status, error) {
									alert(JSON.stringify(error));
								}
                            });
                        break;
                        case "approved":
							//window.location="./chips_result.php?return=<?php echo $_POST['m_return_url'] ?>&currency=<?php echo $_POST['m_tx_currency'] ?>&notify=<?php echo $_POST['m_notify_url'] ?>&order=<?php echo $_POST['m_tx_order_nr'] ?>&invoice=<?php echo $_POST['m_tx_invoice_nr'] ?>&item=<?php echo $_POST['m_tx_item_name'] ?>&due=<?php echo $_POST['m_tx_due_date'] ?>&post=<?php echo $_POST['post'] ?>";
                        break;
                      }
                    }
                      function setInputFilter(textbox, inputFilter) {
                        ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
                          textbox.addEventListener(event, function() {
                            if (inputFilter(this.value)) {
                              this.oldValue = this.value;
                              this.oldSelectionStart = this.selectionStart;
                              this.oldSelectionEnd = this.selectionEnd;
                            } else if (this.hasOwnProperty("oldValue")) {
                              this.value = this.oldValue;
                              this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                            } else {
                              this.value = "";
                            }
                          });
                        });
                      }
                      setInputFilter( document.getElementById("pin1"), function(value) {
                        return /^\d*\.?\d*$/.test(value);
                      });
                      setInputFilter( document.getElementById("pin2"), function(value) {
                        return /^\d*\.?\d*$/.test(value);
                      });
                      setInputFilter( document.getElementById("pin3"), function(value) {
                        return /^\d*\.?\d*$/.test(value);
                      });
                      setInputFilter( document.getElementById("pin4"), function(value) {
                        return /^\d*\.?\d*$/.test(value);
                      });
                      setInputFilter( document.getElementById("pin5"), function(value) {
                        return /^\d*\.?\d*$/.test(value);
                      });
                      setInputFilter( document.getElementById("pass1"), function(value) {
                        return /^\d*\.?\d*$/.test(value);
                      });
                      setInputFilter( document.getElementById("pass2"), function(value) {
                        return /^\d*\.?\d*$/.test(value);
                      });
                      setInputFilter( document.getElementById("pass3"), function(value) {
                        return /^\d*\.?\d*$/.test(value);
                      });
                      setInputFilter( document.getElementById("pass4"), function(value) {
                        return /^\d*\.?\d*$/.test(value);
                      });
                      function handleRecovery( x ) {
                        switch(x){
                          case 'sendCode':
                            $('#recoverFormHolder').css('display','none');
                            $('#recoverFormHolder2').css('display','block');
                            $('#recoverFormHolder3').css('display','none');
                          break;
                          case 'verify':
                            $('#recoverFormHolder').css('display','none');
                            $('#recoverFormHolder2').css('display','none');
                            $('#recoverFormHolder3').css('display','block');
                          break;
                          case 'update':
                            alert('updating');
                            showLogin();
                          break;
                          case 'approve':
                            alert('Approved!');
                            showAproval();
                          break;
                          case 'approved':
                            alert('approved and redirect to URL');
                          break;
                          default:
                          break;
                        }
                      }
                      function gtAcc(x){
                        $('#recoverFormHolder').css('display','none');
                        $('#recoverFormHolder2').css('display','none');
                        $('#recoverFormHolder3').css('display','none');
                        $('#loginFormHolder').css('display','none');
                        $('#loggedInFormHolder').css('display','none');
                        $('#paymentAccepted').css('display','none');
                        $('#'+x).css('display','block');
                      }
                      function showPasRecover(){
                          $('#recoverFormHolder').css('display','block');
                          $('#loginFormHolder').css('display','none');
                      }
                      function showLogin(){
                        $('#recoverFormHolder').css('display','none');
                        $('#recoverFormHolder2').css('display','none');
                        $('#recoverFormHolder3').css('display','none');
                        $('#loginFormHolder').css('display','block');
                      }
                      function showAproval(){
                        $('#recoverFormHolder').css('display','none');
                        $('#recoverFormHolder2').css('display','none');
                        $('#recoverFormHolder3').css('display','none');
                        $('#loginFormHolder').css('display','none');
                        $('#loggedInFormHolder').css('display','none');
                        $('#paymentAccepted').css('display','block');
                      }
                  </script>
                  <style>
.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
  margin: 70px auto;
  padding: 20px;
  background: #f8f8f8;
  border-radius: 5px;
  width: 30%;
  position: relative;
  transition: all 5s ease-in-out;
}

.popup h2 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}
.popup .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: black;
}
.popup .close:hover {
  color: #06D85F;
}
.popup .content {
  max-height: 30%;
  overflow: auto;
  color:red;
}
                      .page--full_bg__background {
                          background-size: contain;
                          background-repeat: no-repeat;
                          background-color: black;
                      }
                      .titleHeader {
                        font-family: Arial;
                        background: rgb(0,25,95);
                        color: #2b2b2b;
                        display: block;
                        padding: 10px;
                        margin-bottom: 20px;
                      }
                      .list-title{
                          color: #f8bc44;
                          margin-bottom: 15px;
                      }
                      #loginFormHolder{
                          display: block;
                      }
                      #loggedInFormHolder{
                          display: none;
                      }
                      .recoverTxt{
                          margin-top: 35px;
                        font-size: 12px;
                        color: #596d84;
                        border: 1px solid #66717d;
                        padding: 5px 18px;
                        border-radius: 8px;
                        cursor: pointer;
                      }
                      .submitBtn{
                        background-color: white;
                        width: 120px;
                        display: block;
                        padding: 15px;
                        border-radius: 8px;
                        border: 0;
                        color: #2b2b2b;
                        text-transform: uppercase;
                        position: relative;
                        font-family: Arial;
                        left: 50%;
                        margin-left: -77px;
                        margin-bottom: 30px;
                      }
                      .submitCashBtn{
                        background-color: #414959;
                        width: 120px;
                        display: inline-grid; 
                        padding: 15px;
                        border-radius: 8px;
                        border: 1px solid grey;
                        color: #2b2b2b;
                        text-transform: uppercase;
                        position: relative;
                        font-family: Arial;
                        margin: 0px 5px 30px 5px;
                      }
                      .submitBtnClose {
                        background-color: rgb(30,31,26);
                        display: block;
                        padding: 10px;
                        border-radius: 8px 0px 8px 0px;
                        border: 1px solid rgb(142,135,125);
                        color: #2b2b2b;
                        text-transform: uppercase;
                        position: absolute;
                        top: 0px;
                        left: 0px;
                        font-family: Arial;
                        font-size: 12px;
                      }
                      #recoverFormHolder{
                          display: none;
                      }
                      #recoverFormHolder2{
                          display: none;
                      }
                      #recoverFormHolder3{
                          display: none;
                      }
                      #paymentAccepted{
                        display: none;
                      }
                      .alert{
                        background: rgb(115, 115, 115);
                        color: #2b2b2b;
                        text-align: center;
                
                        display: block;
                        padding: 10px 0px;
                        font-family: Arial;
                        border-radius: 8px;
                      }
                      .chipsLogo{
                        background: white;
                        padding: 20px;
                        border-radius: 8px;
                  
                        position: relative;
                        margin-top: 30px;
                      }
                      .imgLogo{
                        width: 125px;
                        border-radius: 8px;
                        display: block;
                        position: relative;
                        left: 50%;
                        margin-left: -65px;
                        margin-top: 10px;
                        margin-bottom: 20px;
                      }
                      .appLogosHolder{
                        text-align: center;
                        color: #2b2b2b;
                        margin-top: 30px;
                        display: block;
                      }
                      .appLogos{
                        width: 80%;
                        max-width: 300px;
                        border-radius: 3px;
                      }

                      #sotreLogos{
                        margin-top: 20px;
                        margin-bottom: 20px;
                      }
                  </style>
              </div>
