<?php
    $thankyou=null;
    $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $admin_mail = 'd1@anchorid.com';
        $name=$_POST['name'];
        $email=$_POST['email'];
        $twitter_handle=$_POST['twitter_handle'];
        $question=$_POST['question'];
        $user_content = '';
	$user_content .='<table style="border:2px solid #cccccc;color:#cc2b33; margin:auto; width:500px;">
                        <tr>
                            <td cellspacing="0" cellpadding="0" style="background: #FBFBFB; color: #666; border-bottom:1px solid #ccc; padding-left:9px;padding-right:9px;line-height:30px;padding-top:3px;padding-bottom: 3px; font-family:arial,sans-serif;font-size:13px; ">
                                <b><img src="http://dev.clientreviews.info/AnchorID_v2/images/images/logo.png" style="float:left;" alt="AnchorID" width="150" height="38"></b>
                            </td>
                        </tr>';
        $user_content .= '<tr>
                            <td  cellspacing="0" cellpadding="0"  style="padding-left:15px;padding-right:15px;padding-top:10px;padding-bottom:10px;color:#666666;">
                                <p style="font-family:arial,sans-serif;font-size:13px;color:#666666;margin:0;padding-top:5px;padding-bottom:5px;padding-left:2px;padding-right:2px;">
                                    <b>Dear '.$name.'</b>
                                </p>
                                <p style="font-family:arial,sans-serif;font-size:13px;color:#666666;margin:0;padding-top:5px;padding-bottom:5px;padding-left:2px;padding-right:2px;">
                                    Thank You for contacting us. Our support team will contact you shortly.
                                </p>
                                <p style="font-family:arial,sans-serif;font-size:13px;color:#666666;margin:0;padding-top:5px;padding-bottom:5px;padding-left:2px;padding-right:2px;">
                                    Thanks
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td  cellspacing="0" cellpadding="0" style="background: #f2f2f2; padding-top:15px;padding-bottom:15px;padding-left:18px;padding-right:18px;font-family:arial,sans-serif; font-size:13px;color:#fff"></td>
                        </tr>
                    </table>';
        mail($email,'Support Request ',$user_content,$headers);
        $content = '';
        $content .= '<table style="border:2px solid #cccccc;color:#fff; margin:auto; width:500px;">
                        <tr>
                            <td cellspacing="0" cellpadding="0" style="background: #FBFBFB; color: #666; border-bottom:1px solid #ccc; padding-left:9px;padding-right:9px;line-height:30px;padding-top:3px;padding-bottom: 3px; font-family:arial,sans-serif;font-size:13px; ">
                                <b><img src="http://dev.clientreviews.info/AnchorID_v2/images/images/logo.png" style="float:left;" alt="AnchorID" width="150" height="38"></b>
                            </td>
                        </tr>
                        <tr>
                            <td  cellspacing="0" cellpadding="0"  style="padding-left:15px;padding-right:15px;padding-top:10px;padding-bottom:10px;color:#666666;">
                                <p style="font-family:arial,sans-serif;font-size:13px;color:#666666;margin:0;padding-top:5px;padding-bottom:5px;padding-left:2px;padding-right:2px;">
                                    <b>Dear Admin</b>
                                </p>
                                <p style="font-family:arial,sans-serif;font-size:13px;color:#666666;margin:0;padding-top:5px;padding-bottom:5px;padding-left:2px;padding-right:2px;">
                                    You received a support request with following details:
                                </p>
                                <table style="color:#666666;font-size:13px;font-family:arial,sans-serif;">
                                    <tr>
                                        <td cellspacing="0" cellpadding="0">
                                            <b>Name:</b>
                                        </td>
                                        <td>'.$name.'</td>
                                    </tr>
                                    <tr>
                                        <td cellspacing="0" cellpadding="0">
                                            <b>Email:</b>
                                        </td>
                                        <td>'.$email.'</td>
                                    </tr>';
        $content .= '<tr>
                        <td cellspacing="0" cellpadding="0">
                            <b>Do you have a Twitter handle? :</b>
                        </td>
                        <td>'.$twitter_handle.'</td>
                        </tr>
                        <tr>
                        <td cellspacing="0" cellpadding="0">
                            <b>Questions for us? :</b>
                        </td>
                        <td>'.$question.'</td>
                        </tr>
                        </table>
                        </td>
                    </tr>
                    <tr>
                        <td  cellspacing="0" cellpadding="0" style="background: #f2f2f2; padding-top:15px;padding-bottom:15px;padding-left:18px;padding-right:18px;font-family:arial,sans-serif; font-size:13px;color:#fff"></td>
                    </tr>
                    </table>';
        if(isset($_POST['email']) && !empty($_POST['email'])){
        	if(mail($admin_mail,'Support Request '.$name,$content,$headers)){
        	    $thankyou ='Thank You for Contacting Us';
        	}
        }
    echo $thankyou; 
    
?>