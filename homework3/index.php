<!DOCTYPE html>
<html>
    <?php
    if(!isset($_GET['image']))
    {
        $background = "imgs/grass.png";
    }
    else {
        $background = "imgs/";
        $background .= $_GET['background'];
    }
    

    function getElementType()
    {
        if($_GET['image'] == "Charmander.png")
        {
            echo "<img src='" ."imgs/" ."fire.png" ."'width= '75'>";
        }
        else if($_GET['image'] == "Bulbasaur.png")
        {
            echo "<img src='" ."imgs/" ."Grass-type.png" ."'width= '75'>";
        }
        else if($_GET['image'] == "Squirtle.png")
        {
            echo "<img src='" ."imgs/" ."water-type.png" ."'width= '75'>";
        }
    }
    
    function getData()
    {
        if(isset($_GET['image']))
        {
           //$background = $_GET['background'];
            echo "Created Pokemon:";
            echo "<br/>";
            echo "<img src='" ."imgs/" . $_GET['image'] ."'width= '150'>" ."<br/>";
            echo "Nickname: " . $_GET['firstName'] . "<br/>";
            echo "Gender: " ."<img src='" ."imgs/" . $_GET['gender'] . '.png' ."'width= '50'>" ."<br/>";
            echo "Level: " . $_GET['level'] . "<br/>";
            echo "<br/> " ."Element Type: " ."<br/>" ."<br/>";
            echo getElementType();
        }
    }
    ?>
    
    <head>
        <h1>Pokemon Generator</h1>
        <link rel="stylesheet" href="styles.css">
       <style>
       body{
            background-image: url(<?=$background?>);
            background-size:100%;
            background-repeat: no-repeat;
       }
       </style>
    </head>
    <body>
        <br/> <br/> <br/>
        <h2>Fill out to create your pokemon</h2>
        <div class ="formpage">
            <form>
                Pokemon's name: 
                <input type="text" name="firstName" placeholder="NAME" required oninvalid="this.setCustomValidity('Please enter the name')"
 oninput="setCustomValidity('')"/>
                <br/>
                
                <label for="male">Male</label>
                <input type="radio" name="gender" id="male" value="male" required><br>
                
                <label for="female">Female</label>
                <input type="radio" name="gender" id="female" value="female"><br>
                
                Level
                <input type="number" name="level" min="0" max="100" required oninvalid="this.setCustomValidity('Please enter the level')"
 oninput="setCustomValidity('')"><br>
                
                Chosen Pokemon
                <select name="image" required oninvalid="this.setCustomValidity('Please choose a pokemon')" oninput="setCustomValidity('')">
                    <option value ="">Select</option>
                    <option value ="Charmander.png">Charmander</option>
                    <option value ="Bulbasaur.png">Bulbasaur</option>
                    <option value ="Squirtle.png">Squirtle</option>
                </select>
                
                <br/>
                Background
                <select name="background" required oninvalid="this.setCustomValidity('Please choose a background')" oninput="setCustomValidity('')">
                    <option value ="">Select</option>
                    <option value ="grass.png">Forest</option>
                    <option value ="city.jpeg">City</option>
                    <option value ="beach.jpeg">Beach</option>
                </select>
                <br/>
                <input type="submit" value="Submit"/>
            </form>
            <div class="clearboth"></div>
        </div>
        <div class="data">
            <?php
            getData();
            ?>
        </div>
    </body>
</html>