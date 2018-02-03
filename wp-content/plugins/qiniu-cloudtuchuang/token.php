<?php



require_once 'vendor/autoload.php';

use Qiniu\Auth;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;

$accessKey = addslashes($_GET['accessKey']);
$secretKey = addslashes($_GET['secretKey']);



$auth = new Auth($accessKey, $secretKey);

$bucket = addslashes($_GET['bucket']);

$prefix = addslashes($_GET['prefix']);

$opts = array(
	        'saveKey'    => $prefix . '/$(fname)'
            );

$token = $auth->uploadToken($bucket, null, 3600, $opts);

$tokenobj = array('uptoken' => $token);
echo json_encode($tokenobj);
?>