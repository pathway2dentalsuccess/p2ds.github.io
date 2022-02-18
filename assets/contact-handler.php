<?php
    $secretKey = "6LeVtYYeAAAAAEN5hAd88EhmPOqz0WKh_5X1_Ip7";
    $responseKey = $_POST['g-recaptcha-response'];
    $UserIP = $_SERVER['REMOTE_ADDR'];
    $url = "https://google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$UserIP";

    $response = file_get_contents($url);
    $response = json_decode($response);

    if ($response -> success) {
        $name = $_POST['name'];
        $user_email = $POST['email'];
        $message = $_POST['message'];

        $email_from = 'pathwaytodentalsuccess@gmail.com';
        $email_subject = "New Message From Website";
        $email_body = "User Name: $name.\n".
                        "User Email: $user_email.\n".
                            "User Message: $message.\n";

        $to = "pathwaytodentalsuccess@gmail.com";
        $headers = "From: $email_from \r\n";
        $headers .= "Reply-To: $user_email \r\n";

        header("Location: contactMe.html");

        mail($to,$email_subject,$email_body,$headers);
        echo "Message sent Successfully";
    }
    else {
        echo "<span>Invalid Captcha. Please try again.</span>";
    }

?>