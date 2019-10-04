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

        $data = $this->model->get_data();

        $this->view->generate('user/join', 'main');
    }
}