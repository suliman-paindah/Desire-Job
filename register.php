<?php  include './templates/header.php';?>
<?php include './backend/libraries/DBconn.php' ?>
<div class="container">
        <h2>Registration Form</h2>
        <form action="#" class="login-form" method="post">
            <div class="form-control">
                <input type="text" required id="first-name" name="first-name">
                <label>First Name</label>
            </div>

             <div class="form-control">
                <input type="text" required id="last-name" name="last-name">
                <label>Last Name</label>
            </div>

            <div class="form-control">
                <input type="text" required id="email" name="email">
                <label>Email</label>
            </div>

            <div class="form-control">
                <input type="password"required id="password" name="password">
                <label>Password</label>
            </div>

              <div class="form-control">
                <input type="confirm-password"required id="confirm-password" name="confirm-password">
                <label>Confirm Password</label>
            </div>

            <div class="form-control">
                <input type="text" required id="role" name="role">
                <label>Role</label>
            </div>

             <input type="submit" class="btn" value="Send" name="register-submit">
          
        </form>
    </div>
    <?php include './templates/footer.php' ?>
    <?php 
  
    $database = new Database();
    $connection = $database->getConnection();

    // data from form
       $firstName = $_POST['first-name'];
        $lastName = $_POST['last-name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm-password'];
        $role = $_POST['role'];

       $data = array(
        'first_name' => $firstName,
        'last_name' => $lastName,
        'email' => $email,
        'password'=> $password,
        'confirm_password'=> $confirm,
        'role'=> $role
    );

   
    if ($database->insert('users', $data)) {
        echo '<p class="insert">Insert success</p>';
    } else {
        echo "Failed to insert record!";
    }
     ?>