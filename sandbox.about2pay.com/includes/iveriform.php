			<button class="panelCloseBtn" onclick="changeChoice()">back</button>
			    <h2>Wait ...</h2>

	<form name="Form1" method="post" action="https://portal.nedsecure.co.za/Lite/Authorise.aspx" id="Form1">
	 <!--<input type="hidden" name="Lite_Merchant_ApplicationID" id="Lite_Merchant_ApplicationID" value="{B8369873-5E2F-47F7-9FBE-9857D9C7A6FB}" />-->

     <!-- TEST -->
	 <<input type="hidden" name="Lite_Merchant_ApplicationID" id="Lite_Merchant_ApplicationID" value="{38ED016D-A1BC-41F8-89A4-B19CA93FEE7A}" />
	  <!-- LIVE -->
	 <!--<input type="hidden" name="Lite_Merchant_ApplicationID" id="Lite_Merchant_ApplicationID" value="{EAC5A1E6-0889-48C4-8936-3247ABF630B2}" />-->
	 <!--<input type="hidden" name="Lite_Merchant_ApplicationID" id="Lite_Merchant_ApplicationID" value="CFEDFD6B-6033-4233-A512-330D97EDF7A6" />-->
        <table class="clsQuery" cellspacing="0" align="center" border="0">
          <tr>
            <td class="clsQuery" align="left" colspan="2">
              <input name="Ecom_BillTo_Online_Email" type="hidden" value="<?php echo $_POST['email'] ?>" maxlength="50" id="Ecom_BillTo_Online_Email" class="clsInputReadOnlyText" />
            </td>
          </tr>

          <tr>
		    <td><input type="hidden" readonly="readonly" class="clsInputReadOnlyText" name="MerchantReference" id="MerchantReference" value="<?php echo $_POST['m_tx_id'] ?>" /></td>
            <td><input type="hidden" readonly="readonly" class="clsInputReadOnlyText" name="Lite_Order_LineItems_Product_1" id="Lite_Order_LineItems_Product_1" value="<?php echo $_POST['m_tx_item_description'] ?>" /></td>
            <td><input type="hidden" readonly="readonly" class="clsInputReadOnlyText" name="Lite_Order_LineItems_Quantity_1" id="Lite_Order_LineItems_Quantity_1" value="1"</td>
            <td><input type="hidden" readonly="readonly" class="clsInputReadOnlyText" name="Lite_Order_LineItems_Amount_1" id="Lite_Order_LineItems_Amount_1" value="<?php echo $_POST['m_tx_amount']*100 ?>" /></td>
          </tr>
            <td class="clsQuery" align="left" style="border: 0px solid black;" colspan="2">
              <input name="Lite_Order_Amount" readonly="readonly" type="hidden" value="<?php echo $_POST['m_tx_amount']*100 ?>" maxlength="10" id="Lite_Order_Amount" style="font-weight: bold; font-size: 12px;" class="clsInputReadOnlyText" />
            </td>
          </tr>
          <tr>
            <td id="iveributton" class="clsInformation" align="center" style="display:none;border-bottom: 0px solid black;" colspan="3">
                <input type="submit" name="buttonSubmit" value="Pay with card" id="Submit1" class="clsButton" style="width:175px;height:40px;border-radius:20px;background-color:#41bcf9;border:0" />
            </td>
          </tr>
        </table>
		  <input name="Lite_Transaction_Token" readonly="readonly" type="hidden" value="<?php echo $_POST['m_tx_id'] ?>" maxlength="20" id="Lite_Transaction_Token" class="clsInputReadOnlyText" />
		  <input name="Lite_Merchant_Trace" readonly="readonly" type="hidden" value="<?php echo $_POST['m_tx_id'] ?>" maxlength="20" id="Lite_Merchant_Trace" class="clsInputReadOnlyText" />
		  <input name="Ecom_ConsumerOrderID" readonly="readonly" type="hidden" value="<?php echo $_POST['m_tx_id'] ?>" maxlength="20" id="Ecom_ConsumerOrderID" class="clsInputReadOnlyText" />
		  <input type="hidden" name="Ecom_ReceiptTo_Online_Email" id="Ecom_Payment_Card_Type" value="<?php echo $_POST['m_uuid'] ?>" />
          <input type="hidden" name="Ecom_Payment_Card_Protocols" id="Ecom_Payment_Card_Protocols" value="iVeri" />
          <input type="hidden" name="Lite_ConsumerOrderID_PreFix" id="Lite_ConsumerOrderID_PreFix" value="LITE" />
          
		  <input type="hidden" name="Lite_Website_Successful_Url" id="Lite_Website_Successful_Url" value="https://sandbox.about2pay.com/cardresult.php?return=<?php echo $_POST['m_return_url'] ?>&back2shop=<?php echo $_POST['m_back2shop_url'] ?>&image=<?php echo urlencode($_POST['m_image']) ?>&currency=<?php echo $_POST['m_tx_currency'] ?>&notify=<?php echo $_POST['m_notify_url'] ?>&order=<?php echo $_POST['m_tx_order_nr'] ?>&invoice=<?php echo $_POST['m_tx_invoice_nr'] ?>&item=<?php echo $_POST['m_tx_item_name'] ?>&due=<?php echo $_POST['m_tx_due_date'] ?>&post=<?php echo $_POST['post'] ?>" />
		     
		  <input type="hidden" name="Lite_Website_Successful_Url2" id="Lite_Website_Successful_Url2" value="https://examples.iveri.net/Lite/Result.asp" />
          <input type="hidden" name="Lite_Website_Fail_Url" id="Lite_Website_Fail_Url" value="https://sandbox.about2pay.com/cardresult.php/carderror1.php" />
          <input type="hidden" name="Lite_Website_Error_Url" id="Lite_Website_Error_Url" value="https://sandbox.about2pay.com/cardresult.php/index.php" />
          <input type="hidden" name="Lite_Website_Trylater_Url" id="Lite_Website_Trylater_Url" value="https://sandbox.about2pay.com/cardresult.php/index.php" />
		  
		  <!--<input type="hidden" name="Lite_Website_Successful_Url" id="Lite_Website_Successful_Url" value="https://examples.iveri.net/Lite/Result.asp" />
          <input type="hidden" name="Lite_Website_Fail_Url" id="Lite_Website_Fail_Url" value="https://examples.iveri.net/Lite/Result.asp" />
          <input type="hidden" name="Lite_Website_Error_Url" id="Lite_Website_Error_Url" value="https://examples.iveri.net/Lite/Result.asp" />
          <input type="hidden" name="Lite_Website_Trylater_Url" id="Lite_Website_Trylater_Url" value="https://examples.iveri.net/Lite/Result.asp" /> -->
		  
		  
      </form>
