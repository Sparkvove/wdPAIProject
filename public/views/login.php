<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>Login</title>
</head>
<body>
    <div class ="container">
        <div class ="login-logo">
            <img src="public/img/logo.svg">
        </div>
        <div class="login-container">
        <form class="form-login" action="login" method="POST">
            <div class="messages">
                <?php if (isset($messages)){
                    foreach ($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>
            <input name="email" type="text" placeholder="email@email.com">
            <input name="password" type="password" placeholder="password">
            <button type="submit" class="button-login" >LOGIN</button>
        </form>
        </div>
    </div>
</body>
</html>