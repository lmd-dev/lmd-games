<?php
require_once __DIR__.'/../dao/dao-studio.php';

/**
 * View representing the page to display
 */
class View
{
    /**
     * Displays the content of the HTML page
     */
    function display()
    {        
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Video Games | Les Moulins du Dev</title>
            <link href="public/css/style.css" rel="stylesheet" />
        </head>
        <body>
            <div id="studios">
            <?php
                //Inserts studios in the sidebar
                $selectedStudio = null;
                $studios = DAOStudio::findAll();

                foreach($studios as $studio)
                {
                    echo '<a class="studio" href="?studio='.$studio->getId().'">'.$studio->getName().'</a>';

                    if(isset($_GET['studio']) && $studio->getId() == $_GET['studio'])
                        $selectedStudio = $studio;
                }
            ?>
            </div>
            <div id="games">
            <?php
                //Inserts games of the selected studio in the right section
                if($selectedStudio)
                {
                    $games = $selectedStudio->getGames();

                    foreach($games as $game)
                    {
                        echo '<div class="game"><div class="game-picture" style="background-image: url('.rawurldecode(urlencode($game->getPicture())).');"></div><div class="game-title">'.$game->getName().'</div><div class="game-release-year">'.$game->getReleaseYear().'</div></div>';

                        if(isset($_GET['studio']) && $studio->getId() == $_GET['studio'])
                            $selectedStudio = $studio;
                    }
                }
                else
                {
                    echo '<div id="start">Sélectionnez un studio de développement</div>';
                }
            ?>
            </div>
        </body>
        </html>
        <?php
    }
}