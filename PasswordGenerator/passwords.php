<html>
    <body>
        <?php
            $letters = array('a', 'b', 'c', 'd','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',
            '1','2','3','4','5','6','7','8','9');
            shuffle($letters);
            
            echo "<table>";
            
            for($y=0; $y < 25; $y++)
            {
                echo '<tr>';
                shuffle($letters);
                $num = rand(5,10);
               
                $chosen= "";
                $good = false;
                $numcount =0;
                while($good == false)
                {
                    $numcount=0;
                    $password = array();
                    for($i = 0; $i < $num; $i++)
                    {
                        shuffle($letters);
                        $chosen = array_pop($letters);
                        array_push($password, $chosen);
                        array_push($letters, $chosen);
                    }
                    for($x=0; $x < sizeof($password); $x++)
                    {
                        if($password[$x] >= 1 && $password[$x] <= 9)
                        {
                            $numcount++;
                        }
                       
                    }
                    if($numcount <= 3)
                    {
                             $good = true;
                    }
                    if($good==true)
                    {
                        echo "<td>";
                        echo $y ."      password: ";
                        for($x=0; $x < sizeof($password); $x++)
                        {
                            echo $password[$x];
                        }
                        echo "</td>";
                    }
                    
                }
                
                echo "</tr>";
            }
            echo "</table>";
        ?>
    </body>
</html>