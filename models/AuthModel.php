<?


    class AuthModel extends Model
    {

        public function authCheck()
        {
            $login = $_POST['login'];
            $password = md5($_POST['password']);
            $date = date('d.m.Y h:i', time());

            if(!empty($login) and !empty($password))
            {
                //Продолжаем проверку
                $query = "SELECT * FROM users WHERE login = :login AND password = :password";
                $stmt = $this->db->prepare($query);
                $stmt->bindValue(":login", $login, PDO::PARAM_STR);
                $stmt->bindValue(":password", $password, PDO::PARAM_STR);
                $stmt->execute();
    
                $res = $stmt->fetch(PDO::FETCH_ASSOC);
                $id = $res[id];

                if(!empty($res))
                {
                    $_SESSION['user'] = [
                        'id' => $id,
                        'login' => $login
                    ];
                    header('Location: /tasks');
                }
                else
                { 
                    
                    $s_check_login = $this->db->prepare("SELECT * FROM users WHERE login = '$login'");
                    $s_check_login->execute();
                    $cl = $s_check_login->fetch(PDO::FETCH_ASSOC);

                    if($login == $cl['login'] and $password !== $cl['password'])
                    {
                        $_SESSION['error'] = "Неправильный логин или пароль";
                        header('Location: /Auth/');
                    }
                    
                    else
                    {

                         $sql_reg = "INSERT INTO `users` (`id`, `login`, `password`, `created_at`) VALUES (NULL, '$login', '$password', '$date')";
                        // echo $sql_reg;
                         $reg = $this->db->query($sql_reg);
                        if($reg)
                        {
                            header('Location: /Auth/');
                            $_SESSION['success'] = "Успешная регистрация! <br> Теперь вы можете выполнить вход.";
                        }
                        else
                        {
                            $_SESSION['error'] = "Ошибка серверного запроса";
                            header('Location: /Auth/');
                        }
                        
                    }
                }
            }
            else
            {
                $_SESSION['error'] = "Одно из полей оказалось пустым";
                header('Location: /Auth/');

            }
        }

    }

?>