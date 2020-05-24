<?php

include_once(__DIR__.'/database.php');

/**
 * Connector to LMD Database (singleton)
 */
class DatabaseLMD extends DataBase
{
    private static $handle = null;

	/**
	 * Constructor
	 */
	protected function __construct()
	{
        parent::__construct('localhost', 'lmd_videogames', 'root', '');
		parent::connect();
	}

    /**
     * Returns the unique instance of the connecter
     */
    public static function getInstance()
    {
        if(is_null(self::$handle))
            self::$handle = new DatabaseLMD();

        return self::$handle;
    }
}
?>