<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once dirname(__FILE__).'/../vendor/autoload.php';


$transport = (new Swift_SmtpTransport('smtp.mailgun.org', 587))
  ->setUsername('postmaster@sandboxcda632bb57bb4a28a5eba2f44b8492e1.mailgun.org')
  ->setPassword('') //55623b8eb3d8e0213afae544d5ed1679-ef80054a-bdfa3e44
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Wonderful Subject'))
  ->setFrom(['emir@shfy.io' => 'Emir'])
  ->setTo(['emir.beba@stu.ibu.edu.ba'])
  ->setBody('Here is the message itself')
  ;

// Send the message
$result = $mailer->send($message);

print_r($result);
?>
