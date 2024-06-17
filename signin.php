<!DOCTYPE html>
<html>
<head>
    <title>Connexion / Inscription</title>
    <meta charset="UTF-8">
    <style>
        body {
            background-color: #333;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-form {
            background-color: #333;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 100%;
        }

        .login-form h2 {
            color: #D10024;
            text-align: center;
        }

        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 3px;
            background-color: #555;
            color: #fff;
        }

        .login-form input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 3px;
            background-color: #D10024;
            color: #fff;
            cursor: pointer;
        }

        .login-form input[type="submit"]:hover {
            background-color: #cc0000;
        }

        .login-form p {
            text-align: center;
            color: #00f;
        }

        .login-form a {
            color: #fff;
            text-decoration: none;
        }

        .login-form .separator {
            margin-bottom: 20px;
            text-align: center;
            color: #fff;
        }

        .login-form .separator:before,
        .login-form .separator:after {
            content: "";
            display: inline-block;
            vertical-align: middle;
            width: 45%;
            border-top: 1px solid #fff;
        }

        .login-form .separator:before {
            margin-right: 5%;
        }

        .login-form .separator:after {
            margin-left: 5%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-form">
            <h2>Connexion</h2>
            <form action="login.php" method="post">
                <input type="text" name="username" placeholder="Nom d'utilisateur" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <input type="submit" value="Connexion">
            </form>
            <p class="separator">ou</p>
            <h2>Inscription</h2>
            <form action="register.php" method="post">
                <input type="text" name="username" placeholder="Nom d'utilisateur" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <input type="submit" value="S'inscrire">
            </form>
        </div>
    </div>
</body>
</html>
