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
            $uid = $_SESSION['user']['id'];

            if(!isset($_SESSION['user']))
            {
                header('Location: /');
            }

            $this->pageData['title'] = "TASKLIST | Задачи";

            $show_tasks = $this->model->showTasks($uid);
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
            $uid = $_SESSION['user']['id'];
            $task_text = $_POST['task_text'];
            if (!$this->model->checkTask($task_text, $uid))
            {
                header('Location: /tasks');
                return false;
            }
            else
            {
                $_SESSION['error'] = "Пустое поле";
                header('Location: /tasks23/');
            }
        }

        public function removeTask()
        {
            $id = $_GET['task_id'];
            $uid = $_SESSION['user']['id'];
            if(!$this->model->delTask($id, $uid))
            {
                header('Location: /tasks');
                return false;
            }
        }

        public function changeStatus()
        {
            $id = $_GET['task_id'];
            $uid = $_SESSION['user']['id'];
            $status = $_GET['task_status'];

            if(!$this->model->chStatus($id, $uid, $status))
            {
                header('Location: /tasks');
                return false;
            }
        }

    }

?>