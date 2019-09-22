<?php

class Control {
	  
	    public int $X;
      public int $Y;
     
      protected $actualCoordinates = array(); 
      protected string $actualOrientation;  //North, South, East, West

      
      public function __construct($initialCoordinates, $InitialOrientation)
      {
      
        $this->actualCoordinates = $initialCoordinates;
        $this->actualOrientation = $initialOrientation;
      }

      public function move_rover($actualCoordinates, $actualOrientation, $movement) {
       
         $X = $actualCoordinates[0];
         $Y = $actualCoordinates[1];

        switch ($actualOrientation) {

        case "North": 
                if ($movement == "f") {
                   $Y = $Y + 1;
                }
                else
                  { $Y = $Y - 1; }

        break;

        case "South": 
                if ($movement == "f") {
                   $Y = $Y - 1;
                }
                else
                  { $Y = $Y + 1; }

        break;

         case "East": 
                if ($movement == "f") {
                   $X = $X + 1;
                }
                else
                 { $X = $X - 1; }

        break;

        case "West": 
                if ($movement == "f") {
                   $X = $X - 1;
                }
                else
                 { $X = $X + 1; }

        break;

        $actualCoordinates[0] = $X;
        $actualCoordinates[1] = $Y;
    
      }
      
      
}  // End Function move_rover

    public function turn_rover($actualOrientation, $turn) {
      // turn is type of turn
      if ($turn == "l") {

        switch ($actualOrientation) {
          case 'North':
               $actualOrientation = "West";
            break;
          
           case "South": 
                 $actualOrientation = "East";
            break;

           case "East": 
                 $actualOrientation = "North";
           break;

           case "West": 
                 $actualOrientation = "South";
           break;  
        }
      }

      elseif ($turn == "r") {
        
        switch ($actualOrientation) {
          case 'North':
               $actualOrientation = "East";
            break;
          
           case "South": 
                 $actualOrientation = "West";
            break;

           case "East": 
                 $actualOrientation = "South";
           break;

           case "West": 
                 $actualOrientation = "North";
           break;  
        }

      }

    }  //End Function turn_rover 
}  // end Class

      public function Process(array $commands) {
             foreach ($commands as $value) {
               
               switch ($value) {
                 case 'f':
                     move_rover($actualCoordinates, $actualOrientation, "f") 
                 break;
                 
                 case 'b':
                     move_rover($actualCoordinates, $actualOrientation, "b") 
                 break;

                 case 'l':
                    turn_rover($actualOrientation, "l"); 
                 break;

                 case 'r':
                    turn_rover($actualOrientation, "r"); 
                 break;   
               }
             }
      }

      public $initialCoordinates = array(); 
      public String $InitialOrientation;

      $initialCoordinates = [0,0];
      $InitialOrientation = "North";

      public $commands = array(); // array of command characters
      $commandProcessor = new Control(array $initialCoordinates, String $InitialOrientation);

      $afterPosition = $commandProcessor->Process($commands);





?>