<?php
require_once __DIR__.'/game.php';

class Studio
{
    //Id of the studio in database
    private int $id;
    public function getId(): int { return $this->id; }
    
    //Name of the studio
    private string $name;
    public function getName(): string { return $this->name; }

    //Collection of games developed by the studio
    private array $games;
    public function getGames(): array { return $this->games; }
    public function setGames(array $games) { $this->games = $games; }

    /**
     * Constructo
     * @param $data Initialisating data
     */
    public function __construct(array $data = null)
    {
        $this->id = 0;
        $this->name = "";
        $this->games = [];

        $this->fromArray($data);
    }

    /**
     * Imports data from array
     * @param $data data to import
     */
    public function fromArray(array $data)
    {
        if($data)
        {
            $this->id = isset($data['id']) ? $data['id'] : $this->id;
            $this->name = isset($data['name']) ? $data['name'] : $this->name;

            if(isset($data['games']))
            {
                $this->games = array_map(function (array $item) { return new Game($item); }, $data['games']);
            }
        }
    }

    /**
     * Exports data to array
     */
    public function toArray() : array
    {
        return array(
            'id' => $this->id,
            'name' => $this->name,
            'games' => array_map(function(Game $item) { return $item->toArray(); }, $this->games)
        );
    }
}