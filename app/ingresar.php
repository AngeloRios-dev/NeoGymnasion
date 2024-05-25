<?php
    // session_start();
    include "./includes/header.php";
?>


    <!-- Login form Begin -->
    <section class="container my-5 py-5 bg-light">
        <div class="row">
            <h2 class="text-center fw-bold my-5">Iniciar Sesi&oacute;n</h2>
            <?php
                if (isset($_SESSION["error_login"])) {
                    echo '<div class="alert alert-danger">' . $_SESSION["error_login"] . '</div>';
                    unset($_SESSION["error_login"]);
                }
            ?>
        </div>

        <div class="row">
            <div class="col-md-6 mx-auto">

                <form action="login.php" method="post" id="login">
                    <div class="row g-3">
        
                        <div class="col-12">
                          <label for="email" class="form-label">Email</label>
                          <input type="email" class="form-control" id="email" name="email">
                        </div>
        
                        <div class="col-12">
                            <label for="passwd" class="form-label">Contrase&ntilde;a</label>
                            <input type="password" class="form-control" id="passwd" name="password">
                        </div>
        
                        <div class="col-12">
                          <button type="submit" id="login" class="btn btn-primary" name="login">Iniciar Sesi&oacute;n</button>
                        </div>
        
                    </div>
                    
                  </form>
            </div>
        </div>
    </section> <!-- Login form End -->

<!-- Footer section Begin -->
<?php
    include $includesPath . "/footer.php";
?>
