<?php


class User_Controller extends Controller {

    function __construct()
    {
        $this->model = new User_Model();
        $this->view = new View();
    }

    function action_index()
    {
        $this->view->generate('user/join', 'main');
    }

    function action_join()
    {
        $data = $_POST;

        if ($_POST && isset($_POST['submit']) && $_POST['submit'] === "JOIN")
        {
            $errors = $this->model->validation($_POST);

        }


        //$data = $this->model->get_data();

        $data['errors'] = $errors;

        $this->view->generate('user/join', 'main', $data);
    }
}