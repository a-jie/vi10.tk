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
if(isset($_POST['put_key'])){
    file_put_contents("temp.txt", $_POST['put']);
    $res = $s3->putObject([
        'Key'    => "data/".$_POST['put_key'],
        'Bucket' => 'vi10tkdata',
        'SourceFile'   => "temp.txt",
        'ACL' => 'public-read',
    ]);
}
