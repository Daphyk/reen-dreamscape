<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $message = $_POST['message'];

  $to = 'kendid07@gmail.com';
  $subject = 'New Contact Form Submission';
  $emailBody = "Name: $name\n";
  $emailBody .= "Email: $email\n";
  $emailBody .= "Mobile: $mobile\n";
  $emailBody .= "Message: $message\n";

  $headers = "From: $email\r\n";
  $headers .= "Reply-To: $email\r\n";

  if (mail($to, $subject, $emailBody, $headers)) {
    http_response_code(200);
    echo json_encode(['message' => 'Email sent successfully.']);
  } else {
    http_response_code(500);
    echo json_encode(['message' => 'Failed to send the email.']);
  }
} else {
  http_response_code(405);
  echo json_encode(['message' => 'Method Not Allowed']);
}
?>
