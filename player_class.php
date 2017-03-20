<?php

class Player {
    var $dicecount = 6;
    var $diceArr;
    var $oriDiceArr;
    var $num;
    var $passDiceCount;
    
  function __construct($playerNum){
      $this->num = $playerNum;
  }

  function throwDice(){
      $this->diceArr = array();
      
      for($i=1;$i <= $this->dicecount;$i++){
          $this -> diceArr[] = rand(1,6);
      }
  }
    
  function processDice(){
      $this->oriDiceArr = $this->diceArr;
      $penalti = 0;
      while(in_array(6,$this ->diceArr)){
          $position = array_search(6,$this->diceArr);
          unset($this->diceArr[$position]);
          $this -> dicecount = $this->dicecount - 1;
      }
      
      while(in_array(1,$this ->diceArr)){
          $position = array_search(1,$this->diceArr);
          unset($this->diceArr[$position]);
          $this -> dicecount = $this->dicecount - 1;
          $penalti += 1;
      }
      return $penalti;
  }
    
  function addDiceCount($penalti){
      $this->dicecount += $penalti;
      $this->passDiceCount = $penalti;
  }

    
  function toString_Ori(){
      echo "Player ". $this->num." - ".implode(",",$this->oriDiceArr);
      echo "<br />";
  }
    
  function toString(){
      for($i=0;$i<$this->passDiceCount;$i++){
          $this -> diceArr[] = 1;
      }
      echo "Player ".$this->num." - ".implode(",",$this->diceArr);
      echo "<br />";
  }
    
  function isWinner(){
      return ($this -> dicecount == 0 ? true : false);
  }
}

?>