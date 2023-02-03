<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php require 'components/style.html' ?>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="card col-lg-10">
                    <h2 class="py-5 text-center">LOGIN</h2>
                    <div class="card-body  d-flex align-items-center  justify-content-around  py-5">
                        <img src="assets/svg/login/undraw_login.svg" class="col-12 col-md-6 col-lg-6" alt="image">
                        <div class="col-12 col-md-4 col-lg-4">

                            <form action="backend/checklogin.php" method="POST">
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" name="email" class="form-control form-control-lg" placeholder="Inserisci l'email" />
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Inserisci la password" />
                                </div>

                                <!-- Submit button -->
                                <button type="submit" name="loginform" class="btn btn-success btn-lg btn-block">Sign in</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type=" text/javascript " src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.js "></script>

</body>

</html>