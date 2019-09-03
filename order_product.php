<?php

//require_once "Mail.php";
//require_once('Mail/mime.php');

if( 
	isset($_POST['contactFrmSubmit']) && !empty($_POST['name']) && !empty($_POST['email']) && 
	( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) && !empty($_POST['message']) 
	&& !empty($_POST['telp'])
  ) {   
	
	
    // Submitted form data
    $name   = $_POST['name'];
    $email  = $_POST['email'];
    $message= $_POST['message'];
	$telp= $_POST['telp'];
    
    /*
     * Send email to admin
     */
    $to     = 'ernaemcha@yahoo.com';
    $subject= 'Pemesanan bunga di bungadiva';
    
    $html_body = '
    <h4>Ada pemesan baru di bungadiva, Berikut detailnya.</h4>
    <table cellspacing="0" style="width: 300px; height: 200px;">
        <tr>
            <th>Name:</th><td>'.$name.'</td>
        </tr>
        <tr style="background-color: #e0e0e0;">
            <th>Email:</th><td>'.$email.'</td>
        </tr>
		<tr style="background-color: #e0e0e0;">
            <th>Telp:</th><td>'.$telp.'</td>
        </tr>
        <tr>
            <th>Message:</th><td>'.$message.'</td>
        </tr>
    </table>';
    
    // Set content-type header for sending HTML email
	$headers = 'MIME-Version: 1.0' . "\r\n" .
				'Content-type:text/html;charset=UTF-8' . "\r\n" .
				'From: admin@drugvisions.com' . "\r\n" . 
				'Reply-To: admin@drugvisions.com' . "\r\n" . 
				'X-Mailer: PHP/' . phpversion();
	
	
	//with pear
	/*$headers = array(
		'From' => $email,
		'To' => $to,
		'Subject' => $subject
	);*/
	
	
	// Creating the Mime message
	// with pear
	/*$crlf = "\r\n";
	$mime = new Mail_mime($crlf);
	$mime->setHTMLBody($html_body);
	$body = $mime->get();
	$headers = $mime->headers($headers);*/
    
    // Additional headers    
	//$headers .= 'From: CodexWorld<sender@example.com>' . "\r\n";
	
	//With Pear
	//$server = 'ssl://smtp.gmail.com';
	//$port 	= '465';
	//$username = 'aristhuoracle@gmail.com';
	//$password = 'choirul03';
	/*$server = 'mail.drugvisions.com';
	$port 	= '465';
	$username = 'admin@drugvisions.com';
	$password = 'zq(RP)J&,6zN';
	
	$smtp = Mail::factory('smtp', array(
        'host' => $server,
        'port' => $port,
        'auth' => true,
        'username' => $username,
        'password' => $password
    ));*/
	
    
    // Send email
    if(mail($to,$subject,$html_body,$headers)){
        $status = 'ok';
    }else{
        $status = 'err';
    }
	
	//with pear
	/*$mail = $smtp->send($to, $headers, $body);
	if (PEAR::isError($mail)) {
		$status = '<p>err: ' . $mail->getMessage() . '</p>';
	} else {
		$status = 'ok';
	}*/

	// Output status
    echo $status;die;
}
?>