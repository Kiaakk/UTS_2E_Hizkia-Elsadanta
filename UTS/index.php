<?php
session_start();
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $errors = [];
    
    if(empty($username) || empty($password)) {
        $errors[] = "Harus terisi";
    }
    
    if(strlen($password) < 5) {
        $errors[] = "Password minimal 5 karakter";
    }
    
    if(!preg_match('/[0-9]/', $password)) {
        $errors[] = "Password harus terdiri dari huruf dan angka";
    }
    
    if(empty($errors)) {
        if($username === "Hizkia" && $password === "Kiakganteng123") {
            $_SESSION['username'] = $username;
            header("Location: home.php");
            exit();
        } else {
            $errors[] = "Username atau password salah";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login - ABC Hotel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styleLogin.css">
    </head>
    <body class="bg-imageKia">
        <div class="containerKia">
            <div class="row justify-content-center min-vh-100 align-items-center">
                <div class="col-md-6 col-lg-4">
                    <div class="cardKia">
                        <div class="card-body">
                            <h3 class="text-center mb-4">HOTEL SASA</h3>
                            
                            <?php if(isset($errors) && !empty($errors)): ?>
                                <div class="alert alert-danger">
                                    <?php foreach($errors as $error): ?>
                                        <p class="mb-0"><?php echo $error; ?></p>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <form method="POST" action="" id="loginFormKia">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <button type="submit" name="login" class="btn btn-login w-100">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            <p>&copy; 2024 Sasa Hotel. All Rights Reserved.</p>
        </footer>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="script.js"></script>
    </body>
</html>