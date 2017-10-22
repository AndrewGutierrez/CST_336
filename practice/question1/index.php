<!DOCTYPE html>
<?php
function displayTable()
{
    //echo $_GET['letter'];
    if(isset($_GET['submit'])) //makes sure the form is submitted
    {
        if($_GET['letter'] == $_GET['omit']) //if the letters are the same it shows an errr. DONT FORGET THE RETURN so the program ends
        {
            echo "<strong>ERROR THE CHOSEN LETTERS MUST BE DIFFERENT</strong>";
            return;
        }
        //echo"asdfghjkl";
        $letters = array();
        unset($letters);
        $letters = array();
        
        $arraySize = $_GET['tablesize']*$_GET['tablesize']; //gets how many letters should be diplayed
        
        $chosenletter;
        $searchletter=0;
        
            for($a=0; $a<=($arraySize); $a++)
            {
                $chosenletter = (string)chr(rand(65, 90)); //gets the random letter and converts it to a string
                
                if($chosenletter == $_GET['letter'] || $chosenletter == $_GET['omit']) //sees if the letter is the same as the search or omit one
                {
                    $searchletter =1;
                }
                
                if($searchletter==1) //if the letter was the same it deducts one so it will pick a new letter
                {
                    $a--;
                }
                else{
                    array_push($letters, $chosenletter); //puts the random letter in the array
                }
                $searchletter=0; //resets the same letter flag
            }
        $letters[$arraySize-rand(0,$arraySize)] = $_GET['letter']; //randomly puts the search letter into the array
        shuffle($letters);
        //echo $arraySize;
        
        
        $pop;
        echo "<table>";
        for($x=0; $x<$_GET['tablesize']; $x++) //makes the table based on the table size
        {
            echo "<tr>";
            for($y=0; $y<$_GET['tablesize']; $y++)//used to make the columns in the table
            {
                $pop = array_pop($letters); //gets the letter from the array field
                if($pop < 'H') //checks for the color changing of the letters
                {
                    $color ="red";
                }
                else if($pop >= 'H' && $pop < 'P')
                {
                    $color ="blue";
                }
                else {
                    $color = "green";
                }
                echo "<td style='color:$color'>" .$pop ."</td>"; //style is used to change the color of the letters
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}
    ?>
<html>
    <?php
        echo "<h1>Find the letter " .$_GET['letter'] ."</h1>";
        echo "<br><h2>Letter omitted " .$_GET['omit'] ."</h2>";
    ?>
    <form>
        Letter to look for: 
        <select name="letter"> 
        
            <!-- MAKE SURE TO INCLUDE A DEFAULT SELECTION WITH NO VALUE -->
          <option value="">---select one---</option>
          <?php
            for($i=65; $i<=90; $i++) // for loop to fill the options for all letters
            {
                echo "<option value= " .chr($i) .">"  .chr($i) ."</option>";
            }
          ?>
        </select>
        
        Letter to omit: 
        <select name="omit"> 
          <option value="">---select one---</option>
          <?php
            for($i=65; $i<=90; $i++)
            {
                echo "<option value= " .chr($i) .">"  .chr($i) ."</option>";
            }
          ?>
        </select>
        
        <br></br>
        
        Table size
        <select name="tablesize"> 
          <option value="">---select one---</option>
          <?php
            for($i=6; $i<=10; $i++)//fills the options for the table size
            {
                echo "<option value= " .$i .">"  .$i ." x " .$i ."</option>";
            }
          ?>
        </select>
        
        <!-- MAKE SURE SUBMIT IS EXACTLY AS BELOW -->
        <input type="submit" value="submit" name="submit">
        
    </form>
    
    <?php
        displayTable(); //displays the table
    ?>
    
    
</html>