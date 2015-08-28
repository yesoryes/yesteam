<?php
    // My modifications to mailer script from:
    // http://blog.teamtreehouse.com/create-ajax-contact-form
    // Added input sanitizing to prevent injection

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
        $name = strip_tags(trim($_POST["name"]));
				$name = str_replace(array("\r","\n"),array(" "," "),$name);
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
		$phone = trim($_POST["phone"]);
        $message = trim($_POST["message"]);

        // Check that data was sent to the mailer.
        if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Oops! There was a problem with your submission. Please complete the form and try again.";
            exit;
        }

        // Set the recipient email address.
        // FIXME: Update this to your desired email address.
        $recipient = "rajunarain@gmail.com";

        // Set the email subject.
        $subject = "New contact from $name";

        // Build the email content.
		$email_content = '<table width="442" border="0" cellspacing="0" cellpadding="0" bgcolor="#ebebeb" style="overflow:hidden; border:1px solid #000; font-family:"Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, sans-serif">
		<tr>
		<td style="text-align:center; font-size:25px; text-transform:uppercase; padding:20px 0 10px; background:#36424a; color:#fff; ">Enquiry</td>
		</tr>
		<tr>
		<td style="padding:30px; font-size: 20px; color:#454545;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td style="padding:10px 0;">Name  :</td>
			<td>$name</td>
		  </tr>
		  <tr>
			<td style="padding:10px 0;">Email  :</td>
			<td>$email</td>
		  </tr>
		  <tr>
			<td style="padding:10px 0;">Ph.No :</td>
			<td>$phone</td>
		  </tr>
		  <tr>
			<td style="padding:10px 0;">Detail :</td>
			<td bgcolor="#fff" style="color:#000; width: 310px; padding: 5px;">$message</td>
		  </tr>
		</table></td>
		</tr>
	</table>';

        // Build the email headers.
        $email_headers = "From: $name <$email>";

        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            echo "Thank You! Your message has been sent.".$recipient;
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't send your message.";
        }

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }

?>
