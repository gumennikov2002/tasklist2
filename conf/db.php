<?
    class DB
    {
        const USER = "root";
        const PASS = "root";
        
        public static function connToDB()
        {
            $user = self::USER;
            $pass = self::PASS;

            $conn = new PDO('mysql:host=localhost;dbname=tasklist2', $user, $pass);;
            return $conn;
        }
    }
?>