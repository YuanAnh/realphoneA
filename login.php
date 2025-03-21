<?php
include('./Config/ketnoi.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['user'] = $result->fetch_assoc();
        header("Location: index.php"); // Redirect to homepage
        exit();
    } else {
        $error_message = "Sai tên đăng nhập hoặc mật khẩu!";
    }
}
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/login_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
</head>

<body class="body">
    <div class="login-page">
        <div class="form">
            <?php if(isset($error_message)): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
            <?php endif; ?>

            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <lottie-player
                    src="https://assets4.lottiefiles.com/datafiles/XRVoUu3IX4sGWtiC3MPpFnJvZNq7lVWDCa8LSqgS/profile.json"
                    background="transparent" speed="1" style="justify-content: center;" loop autoplay>
                </lottie-player>
                <input type="text" id="username" name="username" placeholder="&#xf007;  username" required />
                <input type="password" id="password" name="password" placeholder="&#xf023;  password" required />
                <i class="fas fa-eye" onclick="show()"></i>
                <br>
                <br>
                <button type="submit">LOGIN</button>
            </form>

            <form class="login-form">
                <button type="button" onclick="window.location.href='signup.php'">SIGN UP</button>
            </form>
        </div>
    </div>

    <script>
    function show() {
        var password = document.getElementById("password");
        var icon = document.querySelector(".fas")

        if (password.type === "password") {
            password.type = "text";
        } else {
            password.type = "password";
        }
    };
    </script>
</body>

</html>