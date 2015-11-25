<?php
require 'vendor/autoload.php';
$s3 = new Aws\S3\S3Client([
    'version' => 'latest',
        'region'  => 'us-west-2'
]);

$dbbackup = uniqid("databasebackup",false);
$result = $s3->createBucket([
    'ACL' => 'public-read',
    'Bucket' => $dbbackup,
]);

$rds = new Aws\Rds\RdsClient([
    'version' => 'latest',
    'region'  => 'us-west-2'
]);
$result = $rds->describeDBInstances([
    'DBInstanceIdentifier' => 'ITMO544AravindDb',
]);
 $endpoint = $result['DBInstances'][0]['Endpoint']['Address'];
echo $endpoint;
$link = mysqli_connect($endpoint,"aravind","password","ITMO544AravindDb") or die("Error " . mysqli_error($link));
$loc = '/tmp/';
$bkfname = uniqid("DbBackup", false);
$fullbkfname = $bkfname . '.' . 'sql';
$dbbackupfile=$loc . $fullbkfname;
echo $dbbackupfile;
exec("mysqldump --user=aravind --password=password --host=$endpoint ITMO544AravindDb > $dbbackupfile");
$result = $s3->putObject([
    'ACL' => 'public-read',
    'Bucket' => $dbbackup,
    'Key' => $fullbkfname,
    'SourceFile' => $dbbackupfile,
    ]);

?>
