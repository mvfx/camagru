<?php


class Config_Controller extends Controller {


    function action_setup()
    {
        $this->view->generate('setup/install', 'main');
    }
}