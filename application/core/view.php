<?php

class View {

    static public $template_layout_path = 'application/views/layout/';

    function generate($view, $layout, $data = null)
    {
        include View::$template_layout_path.$layout.'.php';
    }
}