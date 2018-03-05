<?php
require_once 'core/init.php';

Helper::getHeader('Algebra Auth | Sign in', 'main-header');

if (Input::exists())
{
}

?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-lg-6 col-md-offset-2 col-lg-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Sign in</h3>
            </div>
            <div class="panel-body">
                <form method="POST">
                    <div class="form-group">
                        <label for="username">Name</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Name" autofocus="autofocus">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                        <p style="margin-top:0.5em; float:right;"><a href="register.php">Register</a> if you do not have an account</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
Helper::getFooter('main-footer');
?>
