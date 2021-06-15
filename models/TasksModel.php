<?

    class TasksModel extends Model
    {

        public function showTasks($uid)
        {
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

        public function checkTask($task_text, $uid)
        {

            if(!empty($task_text))
            {
                $date = date('d.m.Y h:i', time());
                $query = "INSERT INTO `tasks` (`id`, `user_id`, `text`, `status`, `created_at`) VALUES (NULL, '$uid', '$task_text', '0', '$date')";
                $stmt = $this->db->query($query);
            }
        }

        public function delTask($id, $uid)
        {
            $query = "DELETE FROM `tasks` WHERE `tasks`.`id` = :id AND `tasks`.`user_id` = :uid";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(":uid", $uid, PDO::PARAM_STR);
            $stmt->bindValue(":id", $id, PDO::PARAM_STR);
            $stmt->execute();
        }

        public function chStatus($id, $uid, $status)
        {   
            if($status == 0)
            {
                $query = "UPDATE `tasks` SET `status` = '1' WHERE `tasks`.`id` = :id AND `user_id` = :uid;";

            }
            elseif($status == 1)
            {
                $query = "UPDATE `tasks` SET `status` = '0' WHERE `tasks`.`id` = :id AND `user_id` = :uid;";
            }

            $stmt = $this->db->prepare($query);
            $stmt->bindValue(":uid", $uid, PDO::PARAM_STR);
            $stmt->bindValue(":id", $id, PDO::PARAM_STR);
            $stmt->execute();
        }
    }

?>