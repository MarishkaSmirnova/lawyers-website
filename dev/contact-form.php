<?php
@session_start();
$error = '';
$errorflag = 0;
$myemail = 'jeff@jefflinlaw.com';


if(isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['message'])){

    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $email_address = trim($_POST['email']);
    $message = trim($_POST['message']);

    if($name == '' || !preg_match('/^[A-Za-z\x{00C0}-\x{00FF}][A-Za-z\x{00C0}-\x{00FF}\'\-]+([\ A-Za-z\x{00C0}-\x{00FF}][A-Za-z\x{00C0}-\x{00FF}\'\-]+)*/u', $name)
    ){
        $errorflag++;
        $error = $error . "<p class='error'>Please enter your name.</p>";
        $_SESSION['errormessage'] = $error;
    }
    if($phone == '' || !preg_match('%^[+]?[0-9()/ -]*$%', $phone)
    ){
        $errorflag++;
        $error = $error . "<p class='error'>Please enter your phone number.</p>";
        $_SESSION['errormessage'] = $error;

    }
    if($email_address == '' || !preg_match(
        "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
        $email_address) || !filter_var($email_address,FILTER_VALIDATE_EMAIL)){
        $errorflag++;
        $error = $error . "<p class='error'>Please enter a valid email address.</p>";
        $_SESSION['errormessage'] = $error;
    }
    if($message == ''){
        $errorflag++;
        $error = $error . "<p class='error'>Please enter your message.</p>";
        $_SESSION['errormessage'] = $error;

    }
    if($errorflag > 0){
        header("location: contact.php"); 
        die();
    }else{
            $to = $myemail;
            $email_body = "Name: $name \n ".
            "Email: $email_address\n Please do not reply to this message. \n Message: \n $message\n";
            $headers = "From: noreply@jefflinlaw.com\n";
            $headers .= "Reply-To: $email_address\n";
            $headers .= "Cc: $email_address";
            mail($to,$email_body,$headers);
            //redirect to the 'thank you' page
            $_SESSION['success'] = "<p class='thankyou'>Thank you! Your message sent.</br>I will get back to you shortly.</p>";
            header('Location: contact.php');
            die();
    }
}else{
    $error = $error . "<p class='error'>Something went wrong! Please try again.</p>";
    $_SESSION['errormessage'] = $error;
    header("location: contact.php"); 
    die();
}

?>