<?php 
include('../pages/includes/config.php');
error_reporting(0);
ini_set('display_errors', 0);

if(isset($_POST['submit'])) {
 require '../phpemail/PHPMailerAutoload.php';
 require '../phpemail/credential.php';
 $username = $_POST['email'];

 $validate = mysqli_query($conn,"SELECT password FROM tbl_login WHERE username = '$username' ");

 if (mysqli_num_rows($validate)>0) {
  $rowv = mysqli_fetch_array($validate);
  $password = $rowv['password'];
 $body_message = '<h1><strong>Password Retireve</strong></h1><br>';
 $body_message .= '<b>Your Password is  : ' . $password .'<br>';

      $mail = new PHPMailer;
      // $mail->SMTPDebug = 4;                               // Enable verbose debug output

      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'secure174.servconfig.com';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'noreply@fas.calabarzon.dilg.gov.ph';                 // SMTP username
      $mail->Password = 'KzyXfZJ(!p*W';                           // SMTP password
      $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 465;                                    // TCP port to connect to


      $mail->setFrom('noreply@andsolar.com', 'CleanerMailer');
      // $mail->addAddress('charlesodi1324@gmail.com','eddie@andsolarenergy.com','alex@andsolarenergy.com');     // Add a recipient
      $mail->addAddress('charlesodi1324@gmail.com');     // Add a recipient

      $mail->addReplyTo(EMAIL);
      // print_r($_FILES['file']); exit;
      for ($i=0; $i < count($_FILES['file']['tmp_name']) ; $i++) { 
        $mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);    // Optional name
      }
      $mail->isHTML(true);                                  // Set email format to HTML

      $date = date('F d Y');
      $mail->Subject = 'Password Retireve';
      $mail->Body    = $body_message;
      $mail->AltBody = 'Password Retireve';


    if(!$mail->send()) {
     echo 'Message could not be sent.';
     echo 'Mailer Error: ' . $mail->ErrorInfo;
   } else {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Check Your Email for your Password');
      window.location.href = '../';
      </SCRIPT>");
  }


 }else{
  
 }


}