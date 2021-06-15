<?
    include('header.tpl.php');
    $ulogin = (explode(":", $_SESSION['user']['login']))[1];
?>
    <body>
        <header>
            <div class="container-fluid bg-header">
                <div class="container d-flex justify-content-between">
                    <div class="logo">
                        <b>TASK LIST</b>
                    </div>
                    <div class="reg-links mt-1">
                        <b>Добро пожаловать, <?=$ulogin."!";?></b>
                        <a href="/tasks/logout">(Выйти)</a>
                    </div>
                </div>
            </div>
        </header>
 <div class="container mt-4">
    <form method="POST" action="/tasks/addTask">
        <div class="d-flex">
            <input type="text" name="task_text" class="form-control form-task-control" placeholder="Задача">
            <input class="btn btn-success btn-radiused" name="submit" type="submit" value="+">
        </div>
        <?
        
            if(isset($_SESSION['error']))
            {
                echo "
                <div class='mt-3 alert alert-danger'>".$_SESSION['error']."</div>
                ";
                unset($_SESSION['error']);
            }
        
        ?>
    </form>
    <?
        foreach($pageData['showTasks'] as $key => $value)
        {
            switch($value['status'])
            {
                case '0' : $status = "Готов";
                case '0' : $btn_status = "success";
                break;
                case '1' : $status = "Не готов";
                case '1' : $btn_status = "warning";
            }
            echo "
            <div class='card mt-3'>
            <div class='card-body'>
                <div class='card-text'>
                    ".$value['text']."
                </div>
                <div class=''>
                    <a class='btn btn-danger mt-2 fr' href='/tasks/removeTask/?task_id=".$value['id']."'>Удалить</a>
                    <a class='btn btn-".$btn_status." mt-2 fr' href='/tasks/changeStatus/?task_id=".$value['id']."&task_status=".$value['status']."'>".$status."</a>
                </div>
            </div>
            </div>
            
            ";
        }
    ?>
</div>