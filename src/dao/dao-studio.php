<?php
require_once __DIR__.'/database-lmd.php';
require_once __DIR__.'/dao-game.php';
require_once __DIR__.'/../models/studio.php';

/**
 * DAO responsible for studios
 */
class DAOStudio
{
    /**
     * Returns all studios found in the database
     */
    static function findAll(): array
    {
        $studios = array();

        $query = "SELECT * FROM studio ORDER BY name ASC;";
        $results = null;        
    
        $db = DatabaseLMD::getInstance();

        if($db->get($query, $results))
        {
            foreach($results as $result)
            {
                $studio = new Studio($result);

                $studio->setGames(DAOGames::find($studio));

                $studios[] = $studio;
            }
        }

        return $studios;
    }
}