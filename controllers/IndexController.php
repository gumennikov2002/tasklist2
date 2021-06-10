<?php

class IndexController extends Controller
{

	private $pageTpl = '/views/main.tpl.php';


	public function __construct()
	{
		$this->model = new IndexModel();
		$this->view = new View();
	}


	public function index()
	{
		$this->pageData['title'] = "TASKLIST | Авторизация";

		if (!empty($_POST))
		{
			if(!$this->auth())
			{
				$this->pageData['error'] = "Неправильный логин или пароль";
			}
		}
		
		$this->view->render($this->pageTpl, $this->pageData);
	}

	public function auth()
	{
		if (!$this->model->checkUser())
		{
			return false;
		}
	}

}