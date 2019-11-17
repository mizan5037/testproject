<?php
require_once 'config.php';
require_once 'lib/database.php';
require_once 'lib/session.php';
require_once 'lib/functions.php';


//echo "works";


if (isset($_POST['submit'])) {

    $conn = db_connection();
    $sql = "SELECT * FROM users WHERE Username = '" . $_POST['user'] . "'";
    $result = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($result);
    //echo $sql;
    //print_r($result);
    $attempt = 'Failed';
    if ($_POST['pass'] == $result['Pass']) {
        $attempt = 'Success';
        set_ses('isLogged', true);
        set_ses('logInTime', time());
        set_ses('user', $result['Username']);
        set_ses('user_id', $result['UserID']);
        $token = md5(uniqid(rand(), true));
        set_ses('token', $token);
        loginlog('User: ' . $_POST['user'] . PHP_EOL . 'Attempt: ' . $attempt);
        nowlog('Login');
        if (isset($_GET['page'])) {
            nowgo('/index.php?page=' . $_GET['page']);
        } else {
            nowgo('/index.php');
        }
    }

    loginlog('User: ' . $_POST['user'] . PHP_EOL . 'Attempt: ' . $attempt . PHP_EOL . 'Tried Pass: ' . $_POST['pass']);
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login | Optima Inventory</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <!-- Additional tags here -->
    <!--Arbitrary HTML Tags-->
    <link href="<?= $path ?>/main.css" type="text/css" rel="stylesheet">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src"><span></span></div>
            </div>
        </div>
        <div class="app-main">
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-note2 icon-gradient bg-mean-fruit">
                                    </i>
                                </div>
                                <div>Optima Inventory
                                    <div class="page-title-subheading">Please Log in to continue.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-md-center">
                        <div class="col-md-4">
                            <?php if( isset($attempt) && $attempt === 'Failed'){ ?>
                            <div class="alert alert-danger alert-dismissible fade show main-card mb-3 card" role="alert">
                                <strong>Ops!</strong> You should enter valid details to login. <br>
                                <small>Please Try Again!!</small>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php } ?>
                            <div class="main-card mb-3 card">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Login</h5>
                                    <br>
                                    <form class="needs-validation" novalidate action="login.php<?php if (isset($_GET['page'])) {
                                                                                                    echo '?page=' . $_GET['page'];
                                                                                                } ?>" method="post">
                                        <div class="form-row">
                                            <div class="col-md-12 mb-3">
                                                <input type="text" class="form-control" id="validationTooltip01" name="user" placeholder="Username" required>
                                                <div class="invalid-tooltip">
                                                    Please Enter The Username
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <input type="password" class="form-control" id="validationTooltip02" name="pass" placeholder="Password" required>
                                                <div class="invalid-tooltip">
                                                    Please Enter the Password.
                                                </div>
                                            </div>
                                        </div>
                                        <input class="btn btn-primary" type="submit" name="submit" value="Login">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="app-wrapper-footer">
                    <div class="app-footer">
                        <div class="app-footer__inner">
                            <div class="app-footer-right">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <span style="cursor: auto;" class="nav-link">Developed by</span>
                                    </li>
                                    <li class="nav-item">
                                        <a href="http://www.optima-solution.com/" target="_blank" class="nav-link">
                                            Optima Sollution
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="/inventory/assets/scripts/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="/inventory/assets/scripts/main.js"></script>
    <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</body>

</html>