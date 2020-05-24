<?php
require_once __DIR__.'/../views/view.php';

/**
 * Route requests to return the good information
 */
class Router
{
    /**
     * Routing function
     */
    public function route()
    {
        $view = new View();
        $view->display();
    }
}