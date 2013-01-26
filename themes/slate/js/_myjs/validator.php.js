/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * Credit goes to Thao LT for this library
 * 
 */

function checkExistAccount(){
            var old_account = "<?php echo substr($account_model->account_name,strrpos($account_model->account_name, '$', 0)+1);?>";
            if(jQuery("#PortalCustomerAccounts_account_name").val()!='' && $(this).val()!=old_account)
            {
                jQuery.ajax({
                    type: "POST",
                    data: "account="+$(this).val(),
                    url: "<?php echo $this->createUrl("esaleSalers/checkAccount");?>",
                    beforeSend: function(){
                        jQuery("#check_account").html("Kiểm tra tài khoản"); //show checking or loading image
                    },
                    success: function(data){
                        if(data != "0")
                        {
                            jQuery("#check_account").html("Tài khoản đã tồn tại");
                            return false;
                        }
                        else
                            {
                                jQuery("#check_account").html("");
                                return true;
                            }
                    }
                });
            }
        }


