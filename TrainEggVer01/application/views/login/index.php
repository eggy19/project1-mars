<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Log In</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo ('assets/admin/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?php echo ('assets/admin/') ?>css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

    <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">Login | Dev Train</div>
            <div class="card-body">
                <form method="POST" action="<?= base_url('login/proses') ?>">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="password" name="username" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
                            <label for="inputEmail">Username</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="required">
                            <label for="inputPassword">Password</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="remember-me">
                                Remember Password
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block">Masuk</button>
                </form>
                <div class="text-center">
                    <span class="d-block small mt-3">
                        <?php
                        if ($this->session->flashdata('warning') == TRUE) {
                            echo $this->session->flashdata('warning');
                        }
                        ?>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo ('assets/admin/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo ('assets/admin/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo ('assets/admin/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>