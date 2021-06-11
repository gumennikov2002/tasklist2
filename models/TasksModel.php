<?

    class TasksModel extends Model
    {

        public function showTasks()
        {
            $uid = $_SESSION['user']['id'];
            $query = "SELECT * FROM tasks WHERE user_id = $uid  ORDER BY id DESC";
            $result = array();
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $result[$row['id']] = $row;
            }
    
            return $result;	
        }

        public function checkTask()
        {
            $task_text = $_POST['task_text'];

            if(!empty($task_text))
            {
                $date = date('d.m.Y h:i', time());
                $uid = $_SESSION['user']['id'];
                $query = "INSERT INTO `tasks` (`id`, `user_id`, `text`, `status`, `created_at`) VALUES (NULL, '$uid', '$task_text', '0', '$date')";
                $stmt = $this->db->query($query);
                header('Location: /tasks');
            }
            else
            {
                $_SESSION['error'] = "Пустое поле";
                header('Location: /tasks/');
                return false;
            }
        }

        public function delTask()
        {
            $id = $_GET['task_id'];
            $uid = $_SESSION['user']['id'];
            $query = "DELETE FROM `tasks` WHERE `tasks`.`id` = $id AND `tasks`.`user_id` = $uid";
            $stmt = $this->db->query($query);
            header('Location: /tasks');
        }

        public function chStatus()
        {
            $id = $_GET['task_id'];
            $uid = $_SESSION['user']['id'];
            $status = $_GET['task_status'];
            
            if($status == 0)
            {
                $query = "UPDATE `tasks` SET `status` = '1' WHERE `tasks`.`id` = $id AND `user_id` = $uid;";
            }
            elseif($status == 1)
            {
                $query = "UPDATE `tasks` SET `status` = '0' WHERE `tasks`.`id` = $id AND `user_id` = $uid;";
            }

            $stmt = $this->db->query($query);
            header('Location: /tasks');
        }
    }

?>