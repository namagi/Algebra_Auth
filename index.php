<?php
    require_once 'core/init.php';

    /*$db = DB::getInstance();
    echo '<pre>';
    var_dump(DB::getInstance());
    die();*/

    //$db = DB::getInstance()->query('select * from users where username = ?', array('aa'));
    //var_dump($db);
    //$db = DB::getInstance()->action('SELECT *', 'users', array('username', 'LIKE', '%pero%'));
    //$db = DB::getInstance()->get('*', 'users');
    //$db = DB::getInstance()->find(2, 'users');
    //$db = DB::getInstance()->delete('users', array('id', '=', 1));

    /*$db = DB::getInstance()->insert('users', [
        'username' => 'mirkozlikovski',
        'password' => 'qwe123',
        'salt' => 'sdgds',
        'name' => 'Mirko'
    ]
    );*/

    /*$db = DB::getInstance()->update('users', 1,
        [
            'username' => 'newusername',
            'name' => 'newname'
        ]
    );*/

//    $db = DB::getInstance()->get('*', 'users', array('name', 'RLIKE', "o$"));
//
//    //$db = DB::getInstance()->get('*', 'sessions', array('hash', 'IS NOT', NULL));
//
//    echo '<pre>';
//    var_dump($db);
//    die();

//    $db = DB::getInstance()->update('users', 1,
//        [
//            'username' => 'newusername',
//            'name' => 'newname'
//        ]
//    );
//
//    echo '<pre>';
//    var_dump($db);
//    die();



    Helper::getHeader('Algebra Auth', 'main-header');
?>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-6 col-md-offset-2 col-lg-offset-3">
            <div class="jumbotron">
                <div class="container">
                    <h1>Algebra auth</h1>
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
