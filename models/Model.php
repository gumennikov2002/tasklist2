<?

    class Model
    {
        protected $db = NULL;

        public function __construct()
        {
            $this->db = DB::connToDB();
            
        }
    }

?>