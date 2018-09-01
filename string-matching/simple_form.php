<?php
/**
 * Created by PhpStorm.
 * User: --
 * Date: 9/1/18
 * Time: 1:31 PM
 */

$q = @$_POST['q'] ? $_POST['q'] : @$_GET['q'];
?>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <br/>
        <form action="?module=search" method="get">
            <div class="input-group input-group-lg">
                <input class="form-control" type="text" name="q" value="<?=$q;?>">
                <input type="hidden" name="module" value="search" />
                <span class="input-group-btn">
                      <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-search"></i> Cari</button>
                    </span>
            </div>
        </form>
    </div>
</div>
