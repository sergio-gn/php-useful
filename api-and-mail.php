<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Your Zapier Webhook URL
    $zapierWebhookUrl = 'https://hooks.zapier.com/hooks/catch/648979879/67987897'; // Replace with your actual webhook URL

    // Collect data from your form (replace 'name', 'email', etc. with your actual form field names)
    $postData = array(
        'name' => $_POST['name'],
        'phone' => $_POST['phone'],
        'email' => $_POST['email'],
    );

    // Send data to Zapier
    $ch = curl_init($zapierWebhookUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
    ));

    $response = curl_exec($ch);

    // Close the cURL session, but don't check for errors yet
    curl_close($ch);

    // Send the email independently
    $to = 'email@example.com.au';
    $subject = 'New Form';
    $message = 'New Form:' . PHP_EOL . PHP_EOL;
    $message .= 'Name: ' . $_POST['name'] . PHP_EOL;
    $message .= 'Phone: ' . $_POST['phone'] . PHP_EOL;
    $message .= 'Email: ' . $_POST['email'] . PHP_EOL;

    $headers = 'admin@sender.com.au';

    $mailSuccess = mail($to, $subject, $message, $headers);

    if ($mailSuccess) {
        header("Location: https://example.com.au/thank-you/");
        exit;
    } else {
        header("Location: https://example.com.au/");
    }
}
?>
