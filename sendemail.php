<?php

// Define some constants
define( "RECIPIENT_NAME", "TREND" );
define( "RECIPIENT_EMAIL", "jenjih86@gmail.com" );


// Read the form values
$success = false;
$senderName = isset( $_POST['username'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['username'] ) : "";
$senderPhone = isset( $_POST['phone'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['phone'] ) : "";
$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
$senderCompany = $_POST['company'];
$senderPosition = isset( $_POST['position'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['position'] ) : "";
$senderSupplier = $_POST['supplier'];
$senderModel = isset( $_POST['model'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['model'] ) : "";
$message = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message'] ) : "";

// If all values exist, send the email
if ( $senderName && $senderEmail && $senderPhone && $message) {
  $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $headers = "From: " . $senderName . "";
  $msgBody = "Name: ". $senderName ."\r\n". "Email: ". $senderEmail . "\r\n". "Phone: ". $senderPhone  ."\r\n".  "Company: ". $senderCompany  ."\r\n".  "Position: ". $senderPosition  . "\r\n". "Supplier: ". $senderSupplier  . "\r\n". "Model: ". $senderModel  . "\r\n". "Message: " . $message . "";
  $success = mail( $recipient, $headers, $msgBody );

  //Set Location After Successsfull Submission
  header('Location: contact.html?message=Successfull');
}

else{
	//Set Location After Unsuccesssfull Submission
  	header('Location: contact.html?message=Failed');	
}

?>