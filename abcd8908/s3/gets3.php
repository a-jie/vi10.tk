<?php
header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8"); 
require 'vendor/aws-autoloader.php';
// this will simply read AWS_ACCESS_KEY_ID and AWS_SECRET_ACCESS_KEY from env vars
$s3 = new Aws\S3\S3Client([
    'credentials' => [
                'key'    => 'p13wYLd2KWx6g5t8UxHMxS',
                'secret' => 'hA41Fn9Zve5vSfZctRnpddqyhnwgeGNLiiPxyo2rJs6J',
            ],
     'endpoint' => 'https://hb.bizmrg.com',
     'region'   => 'ru-msk',
     'version'  => 'latest',
]);
//$bucket = getenv('S3_BUCKET')?: die('No "S3_BUCKET" config var in found in env!');
if(isset($_POST['get_key'])){
    // Download the contents of the object.
    $result = $s3->getObject([
        'Bucket' => 'vi10tkdata',
        'Key'    => "data/".$_POST['get_key'],
    ]);
    
    // Print the body of the result by indexing into the result object.
    echo $result['Body'];
}