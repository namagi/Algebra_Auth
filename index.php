<?php
    require_once 'core/init.php';

    /*$db = DB::getInstance();
    echo '<pre>';
    var_dump(DB::getInstance());
    die();*/

    Helper::getHeader('Algebra Auth', 'main-header');
?>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-6 col-md-offset-2 col-lg-offset-3">
            <div class="jumbotron">
                <div class="container">
                    <h1>Algebra auth</h1>
                    <p>
                        <input type="text" name="name" id="name" placeholder=" Ime"></input>
                        <br />
                        <input type="text" name="pwd" id="pwd" placeholder=" Zaporče"></input>
                    </p>
                    <p>
                        <a class="btn btn-primary btn-lg" href="login.php" role=button>Sign in</a>
                        or
                        <a class="btn btn-primary btn-lg" href="register.php" role=button>Register</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

<?php
    Helper::getFooter('main-footer');
?>