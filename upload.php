<?php
	
	require './vendor/autoload.php';
	use Aws\Sns\Message;
	use Aws\Sns\MessageValidator;
	
	use Aws\S3\S3Client;
	use Aws\Exception\AwsException;
	use Aws\S3\Exception\S3Exception;


	$bucketName = 'sea-bucket';
	$IAM_KEY = 'AKIAXDSDYIGMFY2IQZBK';
	$IAM_SECRET = '7FutvYK2bS9ZTszxV1va/Qp/DipTA20b2PFLWPQ6';
	$endpoint = $_POST["email"];
	$endpoint = str_replace('@', '*', $endpoint);

	// Connect to AWS
	try {
		$s3 = S3Client::factory(
			array(
				'credentials' => array(
					'key' => $IAM_KEY,
					'secret' => $IAM_SECRET
				),
				'version' => 'latest',
				'region'  => 'us-east-1'
			)
		);
	} catch (Exception $e) {
		die("Error: " . $e->getMessage());
	}
	$objectname = $endpoint . '-' . $_FILES["fileToUpload"]['name'];
	
	$keyName = 'test_example1/' . basename($objectname);
	$pathInS3 = 'https://s3.us-east-1.amazonaws.com/' . $bucketName . '/' . $keyName;

	// Add it to S3
	try {
		// Uploaded:
		$file = $_FILES["fileToUpload"]['tmp_name'];

		$s3->putObject(
			array(
				'Bucket'=>$bucketName,
				'Key' =>  $keyName,
				'SourceFile' => $file,
				'StorageClass' => 'REDUCED_REDUNDANCY'
			)
		);

	} catch (S3Exception $e) {
		die('Error:' . $e->getMessage());
	} catch (Exception $e) {
		die('Error:' . $e->getMessage());
	}
	
	
	echo 'Check your email!';
	

?>
