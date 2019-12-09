<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/views/style/login.css">

    <title>Main</title>
</head>
<body>
    <div class="main-login">
        <div class="center">
           <div class="logo">
            <img src="/views/img/logo-login.png">
               <h2>Medical city</h2>
           </div>
            <div class="form-input">
                <form method="post" action="/login/handler/">
                    <ul>
                        <li>
                            <input type="text" name="login" placeholder="Login" autocomplete="off" autofocus>
                        </li>
                        <li>
                            <input type="password" name="password" placeholder="Password" autocomplete="off">
                        </li>
                        <li>
                            <input type="submit" name="button">
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</body>
</html>v