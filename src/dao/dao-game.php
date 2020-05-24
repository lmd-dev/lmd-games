<?php
require_once __DIR__.'/database-lmd.php';
require_once __DIR__.'/../models/studio.php';
require_once __DIR__.'/../models/game.php';

/**
 * DAO responsible for the games
 */
class DAOGames
{
    /**
     * Returns all the games found in the database for the given studio
     */
    static function find(Studio $studio): array
    {
        $games = array();

        $query = "SELECT * FROM game WHERE studio = :studio ORDER BY releaseYear DESC, name ASC;";
        $parameters = array(array('name' => ':studio', 'value' => $studio->getId(), 'type' => 'int'));
        $results = null;

        $db = DatabaseLMD::getInstance();

        if($db->get($query, $results, $parameters))
        {
            foreach($results as $result)
            {
                $games[] = new Game($result);
            }
        }

        return $games;
    }
}