<?php


class Main_Controller extends Controller {

    function action_index()
    {
        $this->view->generate('index', 'main');
    }
}