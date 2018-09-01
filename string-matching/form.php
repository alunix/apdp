<?php
/**
 * Created by PhpStorm.
 * User: --
 * Date: 9/1/18
 * Time: 12:49 PM
 */

$q = @$_POST['q'] ? $_POST['q'] : @$_GET['q'];
?>
<!-- search form -->
<form action="?module=search" method="post" class="sidebar-form">
    <div class="input-group">
        <input type="hidden" name="module" value="search">
        <input type="text" name="q" class="form-control" placeholder="Pencarian..." value="<?=$q;?>"/>
        <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
    </div>
</form>
<!-- /.search form -->
