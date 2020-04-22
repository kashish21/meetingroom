<?php
# Include the Autoloader (see "Libraries" for install instructions)
require 'vendor/autoload.php';
use Mailgun\Mailgun;
# Instantiate the client.
$mgClient = new Mailgun('67e3665ae6d39301ffb42237f51e6aa9');
$domain = "mailer.balance.business";
# Make the call to the client.
$result = $mgClient->sendMessage($domain, array(
	'from'    => 'Excited User <mailgun@gyangurucull.com>',
	'to'      => 'Baz <vishal@globalexcell.co.in>',
	'subject' => 'Hello',
	'text'    => 'Testing some Mailgun awesomness!'
));
?>