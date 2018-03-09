<?php
require_once 'core/init.php';

$user = new User();
if ($user->check()) {
    Redirect::to('dashboard');
}

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
               'min' => 2,
           ),
           'confirm_password' => array(
               'required' => true,
               'matches' => 'password',
           ),
       ));

       if ($validation->getPassed()) {
           $salt = Hash::salt(32);
           $password = Hash::make(Input::get('password'), $salt);

           try {
               $user->create(array(
                   'username' => Input::get('username'),
                   'password' => $password,
                   'salt' => $salt,
                   'name' => Input::get('name')
               ));

           } catch (Exception $e) {
               Session::flash('danger', $e->getMessage());
               Redirect::to('register');
           }

           Session::flash('success', 'You are registered successfuly');
           Redirect::to('login');
       }
    }
}

require_once 'notifications.php';

?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-lg-6 col-md-offset-2 col-lg-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Create account</h3>
            </div>
            <div class="panel-body">
                <form method="post">
                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                    <div class="form-group <?php echo ($validate->hasError('name')) ? 'has-error' : '' ?>" >
                        <label for="name">Name *</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" autofocus="autofocus">
                        <?php echo ($validate->hasError('name')) ? '<p class="text-danger">' . $validate->hasError('name') . '</p>' : '' ?>
                    </div>
                    <div class="form-group <?php echo ($validate->hasError('username')) ? 'has-error' : '' ?>" >
                        <label for="username">Username *</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="User name">
                        <?php echo ($validate->hasError('username')) ? '<p class="text-danger">' . $validate->hasError('username') . '</p>' : '' ?>
                    </div>
                    <div class="form-group <?php echo ($validate->hasError('password')) ? 'has-error' : '' ?>" >
                        <label for="password">Password *</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        <?php echo ($validate->hasError('password')) ? '<p class="text-danger">' . $validate->hasError('password') . '</p>' : '' ?>
                    </div>
                    <div class="form-group <?php echo ($validate->hasError('confirm_password')) ? 'has-error' : '' ?>" >
                        <label for="confirm_password">Confirm your precious password *</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm password">
                        <?php echo ($validate->hasError('confirm_password')) ? '<p class="text-danger">' . $validate->hasError('confirm_password') . '</p>' : '' ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" title="Register. Create. Whatever.">Register</button>
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
