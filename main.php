<?php
    require_once('game_class.php');
    require_once('player_class.php');

    $game = new Game(4);
    $game -> run();
?>