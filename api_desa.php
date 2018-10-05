<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 9/11/18
 * Time: 3:22 PM
 */

include './define.php';
include BASE_DIR."inc/database.php";
include BASE_DIR."mysqli_connect.php";
include BASE_DIR."inc/desa_selector.php";

class Api_desa {
    public function provinsi() {
        return get_provinsi();
    }
    public function kabupaten() {
        $selected = @$_GET['selected'];
        if (!$selected) throw new Exception("Provinsi ID harus di set");
        return get_kabupaten($selected);
    }
    public function kecamatan() {
        $selected = @$_GET['selected'];
        if (!$selected) throw new Exception("Kabupaten ID harus di set");
        return get_kecamatan($selected);
    }
    public function desa() {
        $selected = @$_GET['selected'];
        if (!$selected) throw new Exception("Kecamatan ID harus di set");
        return get_desa($selected);
    }
}



try {
    $options = [
        'provinsi', 'kabupaten',
        'kecamatan', 'desa'
    ];
    $api_desa = new Api_desa();

    $selected = @$_GET['aksi'];
    if (!$selected) throw new Exception("Aksi tidak dipilih");
    if (!in_array($selected, $options)) throw new Exception("Aksi Tidak ada");

    $data = call_user_func_array(array($api_desa, $selected), array());

    $message = "Berhasil mengambil data";

    $output = array(
        'status' => 1,
        'message' => $message,
        'data' => $data
    );

} catch (Exception $e) {
    $output = array(
        'status' => 0,
        'message' => $e->getMessage(),
        'data' => []
    );
}

header("Content-Type:application/json");
echo json_encode($output);
exit(1);

