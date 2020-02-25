 <?php
   
	$name = htmlspecialchars($_POST['name']);
	$emailvariable = htmlspecialchars($_POST['email']);
    $to      = 'thomas@latoilenumerique.fr';
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
	
	$titlemessage = "Message depuis le site la Toile Numérique";
	
	$message = "<html>
	<head>
	<title>{$titlemessage}</title>
	</head>
	<body>
	<p>Message depuis le site la Toile Numérique</p>
	<table>
	<tr>
	<th>{$name}</th>
	<th>{$emailvariable}</th>
	</tr>
	<tr>
	<td>{$subject}</td>
	<tr>
	<p>{$message}</p>
	</tr>
	</table>
	</body>
	</html>
	";

	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// More headers
	$headers .= "From: ". $emailvariable . "\r\n";
	if (empty($subject)) {
		echo "aucun mesage à envoyé";
	}
	else {
		$subject = $titlemessage . ": ". $subject;
		if(mail($to,$subject,$message,$headers) == true) /* envoi du mail */
			echo "success";
	}

 ?>