<?

    class IndexModel extends Model
    {

        public function checkUser()
        {

            $login = $_POST['login'];
            $password = md5($_POST['password']);

            $query = "SELECT * FROM users WHERE login = :login AND password = :password";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(":login", $login, PDO::PARAM_STR);
            $stmt->bindValue(":password", $password, PDO::PARAM_STR);
            $stmt->execute();

            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            $id = $res[id];

            if (!empty($res))
            {
                проверки
                $_SESSION['user'] = [
                    'id' => $id,
                    'login' => $login
                ];
                header('Location: /tasks');
            }
            else
            {
                return false;
            }

        }

    }

?>