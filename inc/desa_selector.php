<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 9/11/18
 * Time: 3:11 PM
 */

if (!function_exists('get_provinsi')) {
    function get_provinsi() {
        $sql = "SELECT * FROM daerah_provinsi";
        $datas = _fetchMultipleFromSql($sql);
        return $datas;
    }
}
if (!function_exists('get_kabupaten')) {
    function get_kabupaten($provinsi_id) {
        $sql = "SELECT * FROM daerah_kabupaten where provinsi_id='$provinsi_id' ";
        $datas = _fetchMultipleFromSql($sql);
        return $datas;
    }
}
if (!function_exists('get_kecamatan')) {
    function get_kecamatan($kabupaten_id) {
        $sql = "SELECT * FROM daerah_kecamatan where kabupaten_id='$kabupaten_id' ";
        $datas = _fetchMultipleFromSql($sql);
        return $datas;
    }
}
if (!function_exists('get_desa')) {
    function get_desa($kecamatan_id) {
        $sql = "SELECT * FROM daerah_desa where kecamatan_id='$kecamatan_id' ";
        $datas = _fetchMultipleFromSql($sql);
        return $datas;
    }
}
if (!function_exists('get_detail_provinsi')) {
    function get_detail_provinsi($provinsi_id) {
        $sql = "SELECT * FROM daerah_provinsi where id='$provinsi_id' ";
        $datas = _fetchOneFromSql($sql);
        return $datas;
    }
}
if (!function_exists('get_detail_kabupaten')) {
    function get_detail_kabupaten($kabupaten_id) {
        $sql = "SELECT * FROM daerah_kabupaten where id='$kabupaten_id' ";
        $datas = _fetchOneFromSql($sql);
        return $datas;
    }
}
if (!function_exists('get_detail_kecamatan')) {
    function get_detail_kecamatan($kecamatan_id) {
        $sql = "SELECT * FROM daerah_kecamatan where id='$kecamatan_id' ";
        $datas = _fetchOneFromSql($sql);
        return $datas;
    }
}
if (!function_exists('get_detail_desa')) {
    function get_detail_desa($id) {
        $sql = "SELECT * FROM daerah_desa where id='$id' ";
        $datas = _fetchOneFromSql($sql);
        return $datas;
    }
}

if (!function_exists('optionLoop')) {
    function optionLoop($datas, $selectedId = false) {
        $text = [sprintf("<option value='' selected='selected'>--Pilih Salah Satu--</option>")];
        foreach ($datas as $data) {
            $text[] = sprintf("<option value='%s' %s>%s</option>",
                $data['id'],
                $data['id'] == $selectedId ? " selected='selected' " : "",
                $data['name']
            );
        }
        return implode("", $text);
    }
}

if (!function_exists('load_scripts')) {
    function load_scripts() {
        ?>
        <script>
            function changeProvinsi(event, element, next_target) {
                event.preventDefault();
                var currentSelected = $(element).find('option:selected').val();
                var url = "<?=BASE_URL;?>/api_desa.php?aksi=kabupaten&selected="+currentSelected
                $.ajax({
                    url:url,
                    success:function (data) {

                        var status = data.status;
                        var message = data.message;

                        if (status) {
                            var kabupatens = data.data;
                            var text = kabupatens.reduce(function (acc, kabupaten) {
                                return acc+"<option value='"+kabupaten.id+"'>"+kabupaten.name+"</option>";
                            }, "<option value='' selected='selected'>--Pilih Salah Satu--</option>");
                            $(next_target).html(text);
                        } else {
                            alert(message);
                        }

                    }
                })
            }
            function changeKabupaten(event, element, next_target) {
                event.preventDefault();
                var currentSelected = $(element).find('option:selected').val();
                var url = "<?=BASE_URL;?>/api_desa.php?aksi=kecamatan&selected="+currentSelected
                $.ajax({
                    url:url,
                    success:function (data) {

                        var status = data.status;
                        var message = data.message;

                        if (status) {
                            var kecamatans = data.data;
                            var text = kecamatans.reduce(function (acc, kecamatan) {
                                return acc+"<option value='"+kecamatan.id+"'>"+kecamatan.name+"</option>";
                            }, "<option value='' selected='selected'>--Pilih Salah Satu--</option>");
                            $(next_target).html(text);
                        } else {
                            alert(message);
                        }

                    }
                })
            }

            function changeKecamatan(event, element, next_target) {
                event.preventDefault();
                var currentSelected = $(element).find('option:selected').val();
                var url = "<?=BASE_URL;?>/api_desa.php?aksi=desa&selected="+currentSelected
                $.ajax({
                    url:url,
                    success:function (data) {

                        var status = data.status;
                        var message = data.message;

                        if (status) {
                            var desas = data.data;
                            var text = desas.reduce(function (acc, desa) {
                                return acc+"<option value='"+desa.id+"'>"+desa.name+"</option>";
                            }, "<option value='' selected='selected'>--Pilih Salah Satu--</option>");
                            $(next_target).html(text);
                        } else {
                            alert(message);
                        }

                    }
                })
            }
        </script>
        <?php
    }
}