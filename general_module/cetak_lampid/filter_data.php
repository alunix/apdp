<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 9/22/18
 * Time: 1:13 PM
 */

$_SESSION['selected_desa'] = $_POST['selected_desa'];
$_SESSION['format_type'] = $_POST['format_type'];

echo sprintf('<script>window.location.href = "%s"</script>', moduleUrlByLevel('cetak/lampid'));
