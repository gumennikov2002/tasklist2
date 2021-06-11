<?

    class AuthController extends Controller
    {

        private $pageTpl = "/views/auth.tpl.php";

        public function __construct()
        {
            $this->model = new AuthModel();
            $this->view = new View();
        }

        public function Index()
        {

            $this->pageData['title'] = "Авторизация";

            $this->view->render($this->pageTpl, $this->pageData);

        }

        public function AuthCheck()
        {
            if (!$this->model->authCheck())
            {
                return false;
            }
        }

    }

?>