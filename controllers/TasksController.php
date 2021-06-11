<?

    class TasksController extends Controller
    {

        private $pageTpl = "/views/tasks.tpl.php";

        public function __construct()
        {
            $this->model = new TasksModel();
            $this->view = new View();
        }
    
        public function index()
        {
            if(!isset($_SESSION['user']))
            {
                header('Location: /');
            }

            $this->pageData['title'] = "TASKLIST | Задачи";

            $show_tasks = $this->model->showTasks();
            $this->pageData['showTasks'] = $show_tasks;
            
            $this->view->render($this->pageTpl, $this->pageData);
        }

        public function logout()
        {
            session_destroy();
            header('Location: /');
        }

        public function addTask()
        {
            if (!$this->model->checkTask())
            {
                return false;
            }
        }

        public function removeTask()
        {
            if(!$this->model->delTask())
            {
                return false;
            }
        }

        public function changeStatus()
        {
            if(!$this->model->changeStatus())
            {
                return false;
            }
        }

    }

?>