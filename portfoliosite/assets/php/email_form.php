<?php
    // Only process POST requests.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
        $goto_after_mail = "http://www.lhidalgo.com/#contact";
        $name = strip_tags(trim($_POST["name"]));
        $name = str_replace(array("\r","\n"),array(" "," "),$name);
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $subject = strip_tags(trim($_POST["subject"]));
        $message = strip_tags($_POST["message"]);
        

        // Set the recipient email address.
        $recipient = "laurenhidalgo.design@gmail.com";

        // Build the email content.
        $date .="' on ".date("d/m/Y")." at ".date("H:i")."\n\n";
        $body .= "From: $name <$email>\n";
        $body .= "Subject: $subject\n";
        //$body .= "Message:\n".clean_string($message)."\n";
        $email_body .= "You have received a new message from the user $name.\n".
        "Here is the message:\n $message".

        // Build the email headers.
        $email_headers = "From: lauren@lhidalgo.com";
        $email_headers = "Reply-To: $name <$email>";

        mail($recipient, $date, $body, $email_body, $email_headers);

        // Send the email.
        //if (mail($recipient, $subject, $body, $email_headers)) {
         //header("Location: ".$goto_after_mail);
            //print "<p class='success'>Mail Sent.</p>";
        //}else{
            //print "<p class='error'>Problem in Sending Mail.</p>";
        //}
    }
?>