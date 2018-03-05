<?php
require_once 'core/init.php';

Helper::getHeader('Algebra Auth | Create account', 'main-header');

$validate = new Valiadation();

if (Input::exists()) {
    if (Token::check(Input::get('token')))
    {
       $validation = $validate->check(array(
           'name' => array(
               'required' => true,
               'min' => 2,
               'max' => 255,
           ),
           'username' => array(
               'required' => true,
               'min' => 2,
               'max' => 255,
               'unique' => 'users',
           ),
           'password' => array(
               'required' => true,
               'min' => 8,
           ),
           'confirm_password' => array(
               'required' => true,
               'matches' => 'password',
           ),
       ));
       echo '<pre>';
       var_dump($validation);
       echo '</pre>';
    }
}

?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-lg-6 col-md-offset-2 col-lg-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Create account</h3>
            </div>
            <div class="panel-body">
                <form method="POST">
                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" autofocus="autofocus">
                    </div>
                    <div class="form-group">
                        <label for="username">Username *</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="User name">
                    </div>
                    <div class="form-group">
                        <label for="password">Password *</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm your precious password *</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" title="Register. Create. Whatever.">Do it!</button>
                        <p style="margin-top:0.5em; float:right;"><a href="login.php">Sign in</a> if you have an account</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
Helper::getFooter('main-footer');
?>
