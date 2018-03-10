<?php

$sess = Session::all();
foreach ($sess as $key => $value) {
    switch ($key) {
        case 'success':
        case 'danger':
        case 'warning':
        case 'info':
?>

<div class="row">
    <div class="col-md-12">
        <div class="alert alert-<?php echo $key ?> alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong><?php echo ($key === 'danger') ? 'Error' : ucfirst($key); ?></strong> <?php echo $value ?>
        </div>
    </div>
</div>
<?php
            Session::delete($key);
            break;
        default:
    }
}
