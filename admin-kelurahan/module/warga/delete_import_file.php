<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 2/20/19
 * Time: 10:46 PM
 */
ob_get_clean();
$file_id = @$_GET['file_id'];
if ($file_id) {
    $file = _getOneData("uploaded_file", "id='$file_id'");
    if ($file) {
        $file_location = BASE_DIR.$file['lokasi_file'];
        if (is_file($file_location)) unlink($file_location);
        $delete = _deleteData("uploaded_file", "id='$file_id'");
    }
    redirectJs(moduleUrlByLevel('warga', 'aksi=import'));
}
die();