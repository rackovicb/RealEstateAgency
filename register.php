<?php
require_once "app/config/config.php";
require_once "app/classes/User.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $user = new User();

    $created = $user->create($name, $username, $email, $password);

    if ($created) {
        $_SESSION['message']['type'] = "success";
        $_SESSION['message']['text'] = "Successfully registered account!";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['message']['type'] = "danger";
        $_SESSION['message']['text'] = "Unsuccessfully registered account!";
        header("Location: register.php");
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Agency</title>
</head>
<div class="container">
    <h1 class="mt-5 mb-3">Registration</h1>
    <form method="post" action="">
        <div class="form-group mb-3">
            <label for="name">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group mb-3">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group mb-3">
            <label for="email">Email address</label>
            <input type="text" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group mb-3">
            <label for="password">Password</label>
            <input type="text" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>

<body>
    <div class="container">

        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-<?php echo $_SESSION['message']['type']; ?> alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['message']['text']; ?>
            </div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>