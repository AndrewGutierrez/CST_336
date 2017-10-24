<?php
    
    $images = array();
    
    for($i=0; $i<52; $i++)
    {
        $x=floor($i/13);
        switch($x)
        {
            case 0:
                $suit = "clubs";
                break;
           case 1:
                $suit = "diamonds";
                break;
            case 2:
                $suit = "hearts";
                break;
            case 3:
                $suit = "spades";
                break;
        }
        
        
        $number= (string)(($i%13)+1);
        if($number == "0")
        {
            $number = "13";
        }
        
        $url = "<img src = ./cards/" .$suit ."/" .$number .".png>";
        
        //$url = "<img src = ./cards" ."clubs" ."/" ."1" .".png>";
        //array_push($images, $url);
        //echo "url: ";
        echo $url;
        echo "<br>";
        //echo  "img src = ./cards/" .$suit ."/" .$number .".png" ."<br>";
    }
    unset($image);
    
?>