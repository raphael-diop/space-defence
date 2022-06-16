<?php
require "fleet.php";
class Logic extends Fleet {
    Public $positions;
    public $abscissa;
    public $ordinate;
    public $ships;
    public $fleet;
    public $shipscoordonate;
    public $grid;

    function __construct() {
        parent::__construct();
    }

    public function myFleet(){
        return $this->fleet;
    }

    //this small function is to select all my 'workforces' all types mixed up. 
    public function search(){
        $this->ships = [];

        foreach ($this->fleet as $key1 => $value1) {
            foreach ($value1 as $key2 => $value2) {
                array_push($this->ships, $value2['workforce']);
            }
        }
        //Do to the foreach, i got an array with 5 subarrays (representing the types), so i use array_merge to create one big array
        //with all the ships so i can use in randomPos(), the fonction array_combine.
        $this->ships = array_merge($this->ships[0], $this->ships[1],$this->ships[2],$this->ships[3],$this->ships[4],$this->ships[5]);
        return $this->ships;
    }

    //this function as to purpose to generate random position for my ships.
    public function randomPos(){
        $this->positions = [];
        //cretion of a random position  for each of the ships in the data set.
        for($i=0; $i<50; $i++){
            $this->coord1 = mt_rand(10,99);
            $this->coord2 = mt_rand(10,99);


            array_push($this->positions,  "$this->coord1$this->coord2");
        }

        //Merge my Ships array and the position array, so i got one position for each ships  
        $this->ships = $this->search();
        $this->shipscoordonate = array_combine($this->ships, $this->positions);
        return $this->shipscoordonate;
    }

    
     //the purpose of this function is to create a grid and place the ships on the grid
     public function gridPosition(){
        
        //creation of a 2dimentionnal array.
        $columns = range(0,100,1);
        $rows = range(0,100,1);
        
        //getting the random coordonates of randomPos
        $addresses = $this->shipscoordonate;
  
        //displaying the 2D array in html 
        $html = "<table>
          <tr>
            <th></th>
            <th>".implode("</td><td>", $columns)."</th>
          </tr>\n";
        
        
        foreach($rows as $row){
          //displaying of the row
          $html .= "<tr><th>".$row."</th>\n";
          
          //displaying of the column 
          foreach($columns as $col){
              // in array allowed comparaison inbetween parameters, so i compare my $adresse with the intersect of $colum and $rows. 
              if(in_array($col.$row, $addresses)){
                foreach($addresses as $key => $address) {

                  if ($address == $col.$row) {
                    $cell_str = $key;
                     // the cell is fild with the ship name.
                    $html .= "<td>".$cell_str."</td>\n"; 
                  }

                }
              }
              else{
                $cell_str = "&nbsp;";
                // the cell is fild with the ship name.
                $html .= "<td>".$cell_str."</td>\n"; 
              } 
            
            
          }
        
          $html .= "</tr>\n";
        }
        
        $html .= "</table>\n";
        
        echo $html;
        }

      //this function calculate the distance between two points
      public function distance($x1,$y1,$x2,$y2) {
          return sqrt(pow($x1-$x2,2) + pow($y1 - $y2,2));
      }

      
     public function underAttack(){
        //Starting by splitting my array in two arrays (one for the offensive, the other for the support)
        $chunk = array_chunk($this->shipscoordonate,25,true);
        $offens = $chunk[0];
        $deffens = $chunk[1];

        $offensive = [];
        $defensive = [];
        $pair = [];
        $closestDistance = false;

        foreach($offens as $key => $value){
          $off = str_split($value,2);
          $offensive[] = $off;
        }
        foreach($deffens as $key => $value){
          $def = str_split($value,2);
          $defensive[] = $def;
        }

        //It start to loop on every Offensive ship. And for easch offensive ship possition i search th closest point 
        for($i = 0; $i < count($offensive); $i++){
          
          $coord = $offensive[$i];
          $points = $defensive;

          $closestDistance = false;

          //getting all the position $x and $y of all my Defensives ships.
          foreach($points as $point) {
             list($x,$y) = $point;

              // starting point on the first value of the tableau, it is not the search yet.  
              if($closestDistance === false) {
                  $closeserPoint = $point;
                  //calculation the distance inbetween starting point and Offensive sheep pointed by the for.
                  $closestDistance = $this->distance($x,$y,$coord[0],$coord[1]);
                  continue;
              }

              // If distance in any direction (x/y) bigger then my current closest distence algho still runs. 
              if(abs($coord[0] - $x) > $closestDistance) continue;
              if(abs($coord[1] - $y) > $closestDistance) continue;

              //WHen finding a distance who is closer then the current closestdistance, creation of a new distance. With closers point coordonates.
              $newDistance = $this->distance($x,$y,$coord[0],$coord[1]);
  
              //comparing newDistance created with last closestDistance stored, if new distance smaller, points get stored and use to creat a new closestDistance.
              //so the loop get more and more accurate. 
              if($newDistance < $closestDistance) {
                $closestDistance = $newDistance;
                $closestPoints = $point;
              }
          }

          //storage of all points in an array 
          foreach($closestPoints as $closestPoint) {
              $myPoints[] = $closestPoint;
          }              
        }

        //manipulation to change data format so i can use it on the grid 
        $myclosestShipscoord = implode($myPoints);

        //closest ship coordonates, key = offensive ships , value = position of the closest defensive ship
        $myclosestShipscoord  = str_split($myclosestShipscoord, 4);


        echo "<pre>";
          print_r($myclosestShipscoord); 
        echo "<pre>";
      
      }
          
      
}  

$fleet = new Logic();
$flotte = $fleet -> myFleet();

$randomPos = $fleet->randomPos();

$grid = $fleet->gridPosition();

$underAttack = $fleet ->underAttack();


echo '<pre>';
print_r($underAttack);
echo '<pre>';












