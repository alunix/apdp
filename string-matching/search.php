<?php
$post = strtoupper(@$_SERVER['REQUEST_METHOD'])=="POST";
$q = $post ? $_POST['q'] : $_GET['q'];

include STRING_MATCHING_DIR.'string-matching.lib.php';
include STRING_MATCHING_DIR.'simple_form.php';


if ($q) {


    ?>
    <br>
    <div class="box box-solid box-info">
    <div class="box-body">
    <table class="table table-bordered table-striped">
        <thead>
        <tr class="text-red">
            <th class="col-sm-2">Hasil Pencarian</th>
        </tr>
        </thead>

        <tbody>
        <?php
        // Tampilkan data dari Database
        $sql = "SELECT * FROM data_warga";
        $no=1;
        $tampil = _query($sql);
        $count = 0;

        while ($tampilkan = _fetch_array($tampil)) {
            $Kode = $tampilkan['id'];
            $nama = $tampilkan['nama'];
            $find = process_bmh($q, $nama);
            if ($find !== false) {
                ?>
                <tr>
                    <td><a href="?module=warga&aksi=detail_warga&id=<?php echo $tampilkan['id']; ?>"><?php echo $tampilkan['nama']; ?></a> </td>
                </tr>
                <?php
                $count++;
            }
        }
        ?>
        </tbody>
    </table>
   
   </div>
    </div>
    <?php

//    echo "Ditemukan $count data. Lama Pencarian $end s";



}