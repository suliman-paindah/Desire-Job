<?php  include './templates/header.php';?>

<div class="container">
        <h2>Please Login</h2>
        <form action="login_check.php" class="login-form" method="post">

            <div class="form-control">
                <input type="text" required id="email" name="email">
                <label>Email</label>
            </div>
            <div class="form-control">
                <input type="password"required id="password" name="password">
                <label>Password</label>
            </div>
            <input type="submit" class="btn" value="Send" name="submit">
            <p class="text">Don't have an account?<a href="./register.php">Register</a></p>
        </form>
    </div>
    <?php include './templates/footer.php'; ?>
   