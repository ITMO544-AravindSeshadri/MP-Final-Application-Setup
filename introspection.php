<?php
require 'vendor/autoload.php';
#$s3 = new Aws\S3\S3Client([
#    'version' => 'latest',
#        'region'  => 'us-west-2'
#]);

#$dbbackup = uniqid("DatabaseBackup",false);
#$result = $s3->createBucket([
#    'ACL' => 'public-read',
#    'Bucket' => $dbbackup,
#]);

#$result = $s3->putObject([
#    'ACL' => 'public-read',
#    'Bucket' => $dbbackup,
#    'Key' => $filename,
#    'SourceFile' => $uploadfile,
#    ]);
#$url=$result['ObjectURL'];
#print_r($url);
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
$dbbackupfile=$loc . uniqid('DbBackup') . '.' . 'sql';
echo $dbbackupfile;
exec("mysqldump --user=aravind --password=password --host=$endpoint ITMO544AravindDb > $dbbackupfile");

#$sql = "SELECT * INTO OUTFILE '$dbbackupfile' FROM MP1";
#mysql_select_db('ITMO544AravindDb');
#mysql_query($sql, $link);
#$link->close;



#echo "Hi";
?>
