<?php
	
	require './vendor/autoload.php';

	use Aws\Lambda\LambdaClient;

	$client = LambdaClient::factory([
    'version' => 'latest',
    // The region where you have created your Lambda
    'region'  => 'eu-west-1',
	]);

	$result = $client->invoke([
    	// The name your created Lamda function
    	'FunctionName' => 'trialwithSES',
	]);
 	var_dump($result->get('Payload'));


	echo 'Done';

?>