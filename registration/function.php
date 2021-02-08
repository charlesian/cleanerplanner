<?php 
include('../pages/includes/config.php');
error_reporting(0);
ini_set('display_errors', 0);

if(isset($_POST['submit'])) {
 require '../phpemail/PHPMailerAutoload.php';
 require '../phpemail/credential.php';
 $first_name = $_POST['first_name'];
 $last_name = $_POST['last_name'];
 $username = $_POST['email'];
 $password = $_POST['password'];
 $subscription = $_GET['subscription'];
 $code = $_GET['code'];

 $validate = mysqli_query($conn,"SELECT password FROM tbl_login WHERE username = '$username' ");

if ($first_name == '' || $last_name == '' || $username == '' || $password == '' || $subscription == '' || $code == '' ) {

 if (mysqli_num_rows($validate)<0) {
  $rowv = mysqli_fetch_array($validate);
  $password = $rowv['password'];
 $body_message = '<h1><strong>Confirm Your Account</strong></h1><br>';
 $body_message .= '<b>Click Here to Validate your Account  : <a href="http://localhost/confirm/?token="eyJpc3MiOiJ0b3B0YWwuY29tIiwiZXhwIjoxNDI2NDIwODAwLCJodHRwOi8vdG9wdGFsLmNvbS9qd3RfY2xhaW1zL2lzX2FkbWluIjp0cnVlLCJjb21wYW55IjoiVG9wdGFsIiwiYXdlc29tZSI6dHJ1ZX0eyJpc3MiOiJ0b3B0YWwuY29tIiwiZXhwIjoxNDI2NDIwODAwLCJodHRwOi8vdG9wdGFsLmNvbS9qd3RfY2xhaW1zL2lzX2FkbWluIjp0cnVlLCJjb21wYW55IjoiVG9wdGFsIiwiYXdlc29tZSI6dHJ1ZX0"&username=$username&password=$password&subscription=$subscription&first_name=$first_name&last_name=$last_name&code=$code">CONFIRM YOUR ACCOUNT</a> ' . $password .'<br>';
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


      $mail->setFrom('noreply@andsolar.com', 'Confirm Your Account');
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
      window.alert('Check Your Email to Confirm Your Account');
      window.location.href = '../';
      </SCRIPT>");
  }


 }else{
  echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('This Email is Already Registered!');
      </SCRIPT>");
 }
}else{
   echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('This Email is Already Registered!');
      </SCRIPT>");
}

}