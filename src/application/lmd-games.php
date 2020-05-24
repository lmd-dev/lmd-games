<?php
require_once __DIR__.'/../controllers/router.php';

/**
 * Server side application to manage client's requests
 */
class LMDGames
{
    private Router $router;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->router = new Router();

        $this->router->route();
    }
}