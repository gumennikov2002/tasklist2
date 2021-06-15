<?include('header.tpl.php');?>
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
            <form method='POST' action='AuthCheck'>
                <input type='text' placeholder='Логин' name='login' class='form-control mt-3'>
                <input type='password' placeholder='Пароль' name='password' class='form-control mt-1'>
                <input type='submit' value='Войти' class='btn btn-success mt-2'>
                <? if(!empty($_SESSION['error'])) : ?>
                    <div class="alert alert-danger mt-2 custom-alert">
                        <? echo $_SESSION['error']; unset($_SESSION['error']);?>
                    </div>
                <? endif; ?>

                <? if(!empty($_SESSION['success'])) : ?>
                    <div class="alert alert-success mt-2 custom-alert">
                        <? echo $_SESSION['success']; unset($_SESSION['success']);?>
                    </div>
                <? endif; ?>
            </form>
            </div>
        </center>
    </body>
</html>