<?php

class Game{
    
    var $playerCount;
    var $players = [];
    var $winners = [];
    var $round = 1;

    function __construct($playerNum){
        $this -> playerCount = $playerNum;
        for($i=1;$i<=$playerNum;$i++){
            $this -> players[] = new player($i);
        }
    }

    function run(){

        while(count($this -> winners) == 0){
            echo "Round ".$this -> round;
            for($j=0;$j<count($this -> players);$j++){
                $this -> players[$j] -> throwDice();
                $penalti = $this -> players[$j] -> processDice();

                if($this -> players[$j] -> isWinner() && $j != 0){
                    array_push($this -> winners,"Player ".$this -> players[$j]->num);
                }
                if($j + 1 == count($this -> players)){
                    if($penalti == 0 && $this -> players[0] -> isWinner()){
                        array_push($this -> winners,"Player ".$this -> players[0]->num);
                    }
                    $this -> players[0] -> addDiceCount($penalti);
                }
                else{
                    $this -> players[$j+1] -> addDiceCount($penalti);
                }
            }

            $this -> printDiceResults();

            echo "<br>";

            $this -> printRoundResults();

            echo "<br><hr>";

            $this -> round++;
        }

        $this -> getWinner();
    }

    function printDiceResults(){
        echo "<br><b><u>After Dice Rolled:</u></b><br>";

        foreach($this -> players as $player){
            $player -> toString_Ori();
        }
    }

    function printRoundResults(){
        echo "<b><u>After Rolled Modified:</u></b><br>";

        foreach($this -> players as $player){
            $player -> toString();
        }
        
    }

    function getWinner(){
        echo "Winner is ".implode(", ",$this -> winners);
    }




}



?>