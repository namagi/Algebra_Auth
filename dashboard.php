<?php
require_once 'core/init.php';

$user = new User();
if (!$user->check()) {
    Redirect::to('login');
}

Helper::getHeader('Algebra Auth | Dashboard', 'main-header');

require_once 'notifications.php';
?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-lg-6 col-md-offset-2 col-lg-offset-3">
        <h1>Welcome | Willkommen | Benvenuti</h1>
        <h2>to magnificent dashboard, <?php echo Session::get('username') ?></h2>
        <a href="logout.php" class="btn btn-primary">Logout</a>
    </div>
</div>

<?php
Helper::getFooter('main-footer');
