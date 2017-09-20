<html>
    <link rel="stylesheet" href="stylesheet.css" type="text/css" />
    <body>
        <?php
        $points1=0;
        $points2=0;
        
        
        function suitpicker()
        {
            $num= rand(0,3);
            $suit = "spades";
            switch($num)
            {
                case 0:
                    $suit ="clubs";
                    break;
                case 1:
                    $suit ="diamonds";
                    break;
                case 2: 
                    $suit ="hearts";
                    break;
                case 3: 
                    $suit ="spades";
                    break;
                
            }
            return $suit;
        }
        
        
        function score($total)
        {
            echo '<div class = "right_column">',
             "<h3>Score: $total <h3>",
             '</div>';
             echo '<div class = "clear">' .'</div>';
        }
        
        function score2($total)
        {
            echo '<div class = "right_column">',
             "<h3>Score: $total <h3>",
             '</div>';
             echo '<div class = "clear">' .'</div>';
        }
        
        function winner($score1, $score2)
        {
            if($score1 > $score2)
            {
                echo "<h4>DEALER WON!</h4>";
            }
            else if($score1 < $score2)
            {
                echo "<h4>PLAYER WON!</h4>";
            }
            else {
                echo "<h4>TIE!</h4>";
            }
        }
    
    function addcards(array $players)
        {
        $value =0;
        for($i =0; $i <count($players["card"]); $i++)
        {
            $card = $players["card"][$i];
        
            $imgURL = "./cards/" .$card["suit"]."/".$card["value"].".png";
            
            if($card["value"] <=10)
            {
                $value += $card["value"];
            }
            else {
                $value += 10;
            }
            echo "<img src= ".$imgURL.">";
            
        }
        global $points1;
        $points1 += $value; //puts value into global points var
        score($points1);
        }
    
    function addcards2(array $players)
        {
        $value =0;
        for($i =0; $i <count($players["card"]); $i++)
        {
            $card = $players["card"][$i];
        
            $imgURL = "./cards/" .$card["suit"]."/".$card["value"].".png";
            
            if($card["value"] <=10)
            {
                $value += $card["value"];
            }
            else {
                $value += 10;
            }
            echo "<img src= ".$imgURL.">";
            
        }
        global $points2;
        $points2 += $value; //adds value to points2 global var
        score2($points2);
        }
    
        $player = array($p1, $p2);
        
        $p1 = array(
        "name" => "card_back", 
        "imgURL" => "./Abra.png",
        "card" => array(
            array(
            "suit" => suitpicker(),
            "value" => rand(1, 13)
            ),
            array(
                "suit" => suitpicker(),
                "value" => rand(1, 13)
                )
            
            )
            
        );
        
        //fills player 2
        $p2 = array(
        "name" => "card_back", 
        "imgURL" => "./Charmander.png",
        "card" => array(
            array(
            "suit" => suitpicker(),
            "value" => rand(1, 13)
            ),
            array(
                "suit" => suitpicker(),
                "value" => rand(1, 13)
                )
            
            )
            
        );
    
        echo "<h1>SIMPLE BLACKJACK</h1>";

    //picks the 
   
        echo '<div class = "left_column">' ."DEALER: <img src= ".$p1["imgURL"]." height = '120' width = '120'>",
        //displays the cards picked
        "<h2>HAND: </h2>",
        '</div>';
        echo '<div class= "clear">' .'</div>';
        
        echo '<div class = "left_column">' ,addcards($p1) .'</div>';
        
        
        
        echo '<div calss = "clear">' .'</div>';
        //player2
        echo '<div class = "right_column">' ."PLAYER: <img src= ".$p2["imgURL"]." height = '120' width = '120'>",
        //displays the cards picked
        "<h2>HAND: </h2>",
        '</div>';
        echo '<div class= "clear">' .'</div>';
        echo '<div class = "right_column">', addcards2($p2) .'</div>';
        echo '<div class = "clear">' .'</div>';
        
        echo '<div class= "clear"></div>';
        
        
        winner($points1, $points2);
        ?>
        
        
         <footer>
            <hr>
            CST 336. 2017&copy; Gutierrez <br />
            <strong> Diclaimer:</strong> Them information in this webpage is fictitous. <br />
            It is  used for academic purposes only. 
            <br />
            </footer>
    </body>
</html>