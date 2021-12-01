<?php
 ini_set("SMTP", "mail.ewayits.com");
    ini_set("sendmail_from", "test123@gmail.com");

    $message = "The mail message was sent with the following mail setting:\r\nSMTP = aspmx.l.google.com\r\nsmtp_port = 25\r\nsendmail_from = YourMail@address.com";

    $headers = "From: test123@gmail.com";


   echo mail("abhishek8joshi@gmail.com", "Testing", $message, $headers);
   