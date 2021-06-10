<html>
    <head>
        <title><? echo $pageData['title']; ?></title>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <header>
            <div class="container-fluid bg-header">
                <div class="container d-flex justify-content-between">
                    <div class="logo">
                        <b>TASK LIST</b>
                    </div>
                    <div class="reg-links mt-1">
                        <b>Авторизация</b>
                    </div>
                </div>
            </div>
        </header>
        <center>
            <div class='container mt-120 custom-input'>
            <h2>Авторизация</h2>
            <form method='POST'>
                <input type='text' placeholder='Логин' name='login' class='form-control mt-3'>
                <input type='password' placeholder='Пароль' name='password' class='form-control mt-1'>
                <input type='submit' value='Войти' class='btn btn-success mt-2'>
                <? if(!empty($pageData['error'])) : ?>
                    <div class="alert alert-danger mt-2 custom-alert">
                        <? echo $pageData['error']; ?>
                    </div>
                <? endif; ?>
            </form>
            </div>
        </center>
    </body>
</html>