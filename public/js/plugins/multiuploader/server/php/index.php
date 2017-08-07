<?php
/*
 * jQuery File Upload Plugin PHP Example 5.14
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */
define('STORAGE_DIR', dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/storage');
error_reporting(E_ALL | E_STRICT);

$baseURL = 'http://' . (isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : 'froggle.local');

$brandID = (isset($_GET['brand_id'])) ? (int)$_GET['brand_id'] : 0;
$actionID = (isset($_GET['action_id'])) ? (int)$_GET['action_id'] : 0;
$imgID = (isset($_GET['img_id'])) ? (int)$_GET['img_id'] : 0;

require('UploadHandler.php');

if ($actionID) {
    $upload_handler = new UploadHandler([
        'upload_dir' => STORAGE_DIR . '/actions/'. $actionID . '/',
        'upload_url' => '/storage/actions/' . $actionID . '/',
    ]);
} elseif ($brandID) {
    $upload_handler = new UploadHandler([
        'upload_dir' => STORAGE_DIR . '/brands/'. $brandID . '/',
        'upload_url' => '/storage/brands/' . $brandID . '/',
    ]);
} elseif ($imgID) {
    $upload_handler = new UploadHandler([
        'upload_dir' => STORAGE_DIR . '/crop/tmpupload/',
        'upload_url' => $baseURL . '/storage/crop/tmpupload/',
    ]);
}
