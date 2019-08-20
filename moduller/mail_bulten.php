<?php
$mail = $_POST['deger'];
if ( filter_var( $mail, FILTER_VALIDATE_EMAIL ) == true ) {

	$ekle = $db->prepare( "INSERT INTO mail SET mail=:mail" );
	$basarili = $ekle->execute( array( "mail" => $mail ) );
	if ( $basarili ) {
		echo "Siteme abone oldunuz yeni gönderilerden haberdar olacaksınız.";
	} else {
		echo "Bu email ile zaten önceden kayıt oldunuz.";
	}

} else {
	echo "Email düzgün formatta değil.";
}


?>