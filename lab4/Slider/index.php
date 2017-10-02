<!DOCTYPE html>
<?php
    $backgroundImage="./img/sea.jpg";
    
    // API call goes here
    if(isset($_GET['keyword'])){
        include './api/pixabayAPI.php';
        $imageURLs = getImageURLs($_GET['keyword'], $_GET['layout']);
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
        //print_r($imageURLs);
        //echo "You searched for: " . $_GET['keyword'];
    }
?>    
<html>
    <heaed>
        <title>Image Carousel</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <style>
            @import url("./css/styles.css");
            body{
                background-image: url('<?=$backgroundImage?>');
                background-size: 100% 100%;
                background-attachment: fixed;
            }
        </style>
    </heaed>
    <body>
        <br/> <br />
        <?php
            if(!isset($imageURLs)){
                echo "<h2> Type a keyword to display a slidewhow <br /> with random images from Pixabay.com</h2>";
                
            }else{
                //display Carousel here
                /*
                for($i=0; $i < 5; $i++){
                    //echo "<img src='" . $imageURLs[rand(0, count($imageURLs))] . "' width='200' >";
                
                    do{
                        $randomIndex = rand(0, count($imageURLs));
                    }
                    while (!isset($imageURLs[$randomIndex]));
                    
                    echo "<img src='" . $imageURLs[$randomIndex] . "' width='200' >";
                    unset($imageURLs[$randomIndex]);
                }
                */
    ?>
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- indicators Here -->
        <ol class="carousel-indicators">
            <?php
                for($i = 0; $i < 7; $i++)
                {
                    echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                    echo ($i == 0)?" class='active'" : "";
                    echo "></li>";
                }
            ?>
        </ol>
        <!-- Wrapper for Images -->
        <div class="carousel-inner" role="listbox">
            <?php
                for($i=0; $i < 7; $i++)
                {
                    do{
                        $randomIndex = rand(0, count($imageURLs));
                    }while(!isset($imageURLs[$randomIndex]));
                    
                    echo '<div class="item ';
                    echo ($i == 0) ? "active" : "";
                    echo '">';
                    echo '<img src="' . $imageURLs[$randomIndex] . '">';
                    echo '</div>';
                    unset($imageURLs[$randomIndex]);
                }
            ?>
        </div>
        
        <!-- Controls Here -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!--<h1> I'm a regular HTML tag inside the PHP else statement!</h1>-->
    <?php
            } //end of the else statement
    ?>
        <br/>
        <!-- HTML form goes here! -->
        <form>
            <input type="text" name="keyword" placeholder="Keyword" value="<?=$_GET['keyword']?>"/>
           
            <input type="radio" id = 'lhorizontal' name="layout" value="horizontal"/>
            <label for = "Horizontal"></label><label for="lhorizontal" name ="layout" value = "horizontal">Horizontal</label>
            
            <input type="radio" id = 'lvertical' name="layout" value="vertical"/>
            <label for = "Vertical"></label><label for="lvertical" name ="layout" value = "vertical">Vertical</label>
            
            <br/>
            <select name="category">
              <option value = "">Select One</option>
              <option value="forest">Forest</option>
              <option value="sky">Sky</option>
              <option value="Ocean">Ocean</option>
              <option value="Otters">Otters</option>
              <option value="Bugs">Bugs</option>
            </select>
            <input type="submit" value="Submit"/>
        </form>
        <br/> <br />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
    </body>
</html>