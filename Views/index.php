<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login</title>
    <link href="<?php echo base_url; ?>Assets/css/styles.css" rel="stylesheet" />
    <script src="<?php echo base_url; ?>Assets/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form id="frmLogin">
                                        <div class="form-group">
                                            <label class="small mb-1 ml-1" for="user"><i class="fas fa-user"></i> Usuario</label>
                                            <input class="form-control py-4" id="user" name="user" type="text" placeholder="Ingrese Usuario" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1 ml-1" for="password"><i class="fas fa-key"></i> Contraseña</label>
                                            <input class="form-control py-4" id="password" name="password" type="password" placeholder="Ingrese Contraseña" />
                                        </div>
                                        <!-- TODO
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                                <label class="custom-control-label" for="rememberPasswordCheck">Recordar Contraseña</label>
                                            </div>
                                        </div>
                                            -->
                                        <div class="alert alert-danger text-center d-none" id="alert" role="alert">

                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <!--TODO
                                                <a class="small" href="password.html">Olvidaste tu contraseña?</a>
                                            -->
                                            <button class="btn btn-primary" type="submit" onclick="frmLogin(event)">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <!--TODO
                                <div class="card-footer text-center">
                                    <div class="small"><a href="register.html">Necesitas una cuenta? Creala!</a></div>
                                </div>
                            </div>
                            -->
                            </div>
                        </div>
                    </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <a class="text-muted text-decoration-none" href="https://github.com/FelipeBurboa" target="_blank">
                            <div class="text-muted"> <i class="fab fa-github"></i> Visita mi github <?php echo date("Y"); ?></div>
                        </a>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="<?php echo base_url; ?>Assets/js/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url; ?>Assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url; ?>Assets/js/scripts.js"></script>
    <script>
        const base_url = "<?php echo base_url; ?>";
    </script>
    <script src="<?php echo base_url; ?>Assets/js/functions.js"></script>
</body>

</html>