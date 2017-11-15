 <html> 
    <table border="1" width="600">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="color:orange">
      <td>1</td>
      <td>The page includes the basic form elements as in the Program Sample: Text boxes, Checkbox, radio buttons</td>
      <td width="20" align="center">3</td>
    </tr>
    <tr style="color:green">
      <td>2</td>
      <td>When accessing the webpage directly, a 3x3 table with random balls is displayed</td>
      <td width="20" align="center">10</td>
    </tr> 
    <tr style="color:green">
      <td>3</td>
      <td>The balls are NOT duplicated </td>
      <td align="center">5</td>
    </tr>    
	<tr style="color:orange">
      <td>4</td>
      <td>Even balls have a yellow background. The cue ball (the white ball) is even </td>
      <td align="center">5</td>
    </tr> 
    <tr style="color:orange">
      <td>5</td>
      <td>Odd balls have a green background</td>
      <td align="center">5</td>
    </tr>
    <tr style="color:green">
      <td>6</td>
      <td>The sum of ball values is displayed below the table</td>
      <td align="center">5</td>
    </tr>       
    <tr style="color:green">
      <td>7</td>
      <td>When submitting the form, a table with random balls is created using the custom number of rows and columns</td>
      <td align="center">10</td>
    </tr>  
    <tr style="color:green">
      <td>8</td>
      <td>There is validation for empty number of rows and columns, and rows and columns greater than 4  </td>
      <td align="center">5</td>
    </tr>  
    <tr style="color:#600000">
      <td>9</td>
      <td>When the  "Include the 8 ball" checkbox is checked, the 8 ball must be displayed within the table, in a random position </td>
      <td align="center">5</td>
    </tr>    
    <tr style="color:#600000">
      <td>10</td>
      <td>The balls are displayed in ascending order if "Ascending" is checked. </td>
      <td align="center">5</td>
    </tr>        
    <tr style="color:#600000">
      <td>11</td>
      <td>The balls are displayed in descending order if "Descending" is checked. </td>
      <td align="center">5</td>
    </tr> 
    <tr style="color:green">
      <td>12</td>
      <td>The total number of points of even and odd balls is properly displayed. </td>
      <td align="center">5</td>
    </tr>  
    <tr style="color:green">
      <td>13</td>
      <td>The right winner (even balls, odd balls, or tie) is displayed. </td>
      <td align="center">5</td>
    </tr>              
    <tr style="color:green">
      <td>14</td>
      <td>This rubric is properly included AND UPDATED (BONUS)</td>
      <td width="20" align="center">2</td>
    </tr>     
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center"><b></b></td>
    </tr> 
  </tbody></table>
</html>




<?php
    
    $balls = array();
    
    for($i =0; $i <=15; $i++)
    {
         $url = "<img src = ./billardballs" ."/" .$i .".png>";
         array_push($balls, $url);
         //echo $url;
         //echo "<br>";
    }
    shuffle($balls);
    
    $even=0;
    $odd=0;
    
    if(!isset($_GET['submit']))
    {
        echo "<table>";
        for($x=0; $x<3; $x++) //makes the table based on the table size
        {
            echo "<tr>";
            for($y=0; $y<3; $y++)//used to make the columns in the table
            {
                 $pop = array_pop($balls);
                if($pop == "<img src = ../billardballs/0.png>")
                {
                   $total+=0;
                   $color ="yellow";
                   $even+=0;
                }
                else if($pop == "<img src = ./billardballs/1.png>")
                {
                   $total+=1;
                   $color ="green";
                   $odd+=1;
                }
                else if($pop == "<img src = ./billardballs/2.png>")
                {
                   $total+=2;
                   $color ="yellow";
                   $even+=2;
                }
                else if($pop == "<img src = ./billardballs/3.png>")
                {
                   $total+=3;
                   $color ="green";
                   $odd+=3;
                }
                else if($pop == "<img src = ./billardballs/4.png>")
                {
                   $total+=4;
                   $color ="yellow";
                   $even+=4;
                }
                else if($pop == "<img src = ./billardballs/5.png>")
                {
                   $total+=5;
                   $color ="green";
                   $odd+=5;
                }
                else if($pop == "<img src = ./billardballs/6.png>")
                {
                   $total+=6;
                   $color ="yellow";
                   $even+=6;
                }
                else if($pop == "<img src = ./billardballs/7.png>")
                {
                   $total+=7;
                   $color ="green";
                   $odd+=7;
                }
                else if($pop == "<img src = ./billardballs/8.png>")
                {
                   $total+=8;
                   $color ="yellow";
                   $even+=8;
                }
                else if($pop == "<img src = ./billardballs/9.png>")
                {
                   $total+=9;
                   $color ="green";
                   $odd+=9;
                }
                else if($pop == "<img src = ./billardballs/10.png>")
                {
                   $total+=10;
                   $color ="yellow";
                   $even+=10;
                }
                else if($pop == "<img src = ./billardballs/11.png>")
                {
                   $total+=11;
                   $color ="green";
                   $odd+=11;
                }
                else if($pop == "<img src = ./billardballs/12.png>")
                {
                   $total+=12;
                   $color ="yellow";
                   $even+=12;
                }
                else if($pop == "<img src = ./billardballs/13.png>")
                {
                   $total+=13;
                   $color ="green";
                   $odd+=13;
                }
                else if($pop == "<img src = ./billardballs/14.png>")
                {
                   $total+=14;
                   $color ="yellow";
                   $even+=14;
                }
                else if($pop == "<img src = ./billardballs/15.png>")
                {
                   $total+=15;
                   $color ="green";
                   $odd+=15;
                }
                echo "<td style='bgcolor=$color'>" .$pop ."</td>"; //style is used to change the color of the letters
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    
    $pop;
    $total;
    
        echo "<table>";
        for($x=0; $x<$_GET['rows']; $x++) //makes the table based on the table size
        {
            echo "<tr>";
            for($y=0; $y<$_GET['columns']; $y++)//used to make the columns in the table
            {
                $pop = array_pop($balls);
                if($pop == "<img src = ./billardballs/0.png>")
                {
                   $total+=0;
                   $color ="yellow";
                   $even+=0;
                }
                else if($pop == "<img src = ./billardballs/1.png>")
                {
                   $total+=1;
                   $color ="green";
                   $odd+=1;
                }
                else if($pop == "<img src = ./billardballs/2.png>")
                {
                   $total+=2;
                   $color ="yellow";
                   $even+=2;
                }
                else if($pop == "<img src = ./billardballs/3.png>")
                {
                   $total+=3;
                   $color ="green";
                   $odd+=3;
                }
                else if($pop == "<img src = ./billardballs/4.png>")
                {
                   $total+=4;
                   $color ="yellow";
                   $even+=4;
                }
                else if($pop == "<img src = ./billardballs/5.png>")
                {
                   $total+=5;
                   $color ="green";
                   $odd+=5;
                }
                else if($pop == "<img src = ./billardballs/6.png>")
                {
                   $total+=6;
                   $color ="yellow";
                   $even+=6;
                }
                else if($pop == "<img src = ./billardballs/7.png>")
                {
                   $total+=7;
                   $color ="green";
                   $odd+=7;
                }
                else if($pop == "<img src = ./billardballs/8.png>")
                {
                   $total+=8;
                   $color ="yellow";
                   $even+=8;
                }
                else if($pop == "<img src = ./billardballs/9.png>")
                {
                   $total+=9;
                   $color ="green";
                   $odd+=9;
                }
                else if($pop == "<img src = ./billardballs/10.png>")
                {
                   $total+=10;
                   $color ="yellow";
                   $even+=10;
                }
                else if($pop == "<img src = ./billardballs/11.png>")
                {
                   $total+=11;
                   $color ="green";
                   $odd+=11;
                }
                else if($pop == "<img src = ./billardballs/12.png>")
                {
                   $total+=12;
                   $color ="yellow";
                   $even+=12;
                }
                else if($pop == "<img src = ./billardballs/13.png>")
                {
                   $total+=13;
                   $color ="green";
                   $odd+=13;
                }
                else if($pop == "<img src = ./billardballs/14.png>")
                {
                   $total+=14;
                   $color ="yellow";
                   $even+=14;
                }
                else if($pop == "<img src = ./billardballs/15.png>")
                {
                   $total+=15;
                   $color ="green";
                   $odd+=15;
                }
                echo "<td bgcolor=" .$color .">" .$pop ."</td>"; //style is used to change the color of the letters
            }
            echo "</tr>";
        }
        echo "</table>";
        echo "total points: " .$total ."<br>";
        echo "Even points: " .$even ."<br>";
        echo "Odd points: " .$odd ."<br>";
        if($odd < $even)
        {
            echo "Even has won!" ."<br>";
        }
        else{
            echo "Odd has won!" ."<br>";
        }
        
?>
<html>
    <form>
        
        <input type="number" name="rows" placeholder="rows" min=1 max=4 required oninvalid="this.setCustomValidity('Please enter a number from 1-4)"
 oninput="setCustomValidity('')">Number of rows
        <br>
        <input type="number" name="columns" placeholder="columns" min=1 max=4 required oninvalid="this.setCustomValidity('Please enter a number from 1-4')"
 oninput="setCustomValidity('')">Number of columns
        <br>
        
        
        <input type="submit" value="submit" name="submit">
        
    </form>
</html>

<?php
    
    unset($balls);
    $total=0;

?>