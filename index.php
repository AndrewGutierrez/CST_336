<!DOCTYPE html>
<html>
  <head>
    <style>
* {
    box-sizing: border-box;
}

body {
    background-color: #f1f1f1;
    padding: 20px;
    font-family: Arial;
}

/* Center website */
.main {
    max-width: 1000px;
    margin: auto;
}

h1 {
    font-size: 50px;
    word-break: break-all;
    text-align: center;
}

h2{
  text-align:center;
}

.row {
    margin: 8px -16px;
}

/* Add padding BETWEEN each column */
.row,
.row > .column {
    padding: 8px;
}

/* Create four equal columns that floats next to each other */
.column {
    float: left;
    width: 25%;
}

/* Clear floats after rows */ 
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Content */
.content {
    background-color: white;
    padding: 10px;
}

/* Responsive layout - makes a two column-layout instead of four columns */
@media (max-width: 900px) {
    .column {
        width: 50%;
    }
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media (max-width: 600px) {
    .column {
        width: 100%;
    }
}
</style>
  </head>
    <body>
        <!-- MAIN (Center website) -->
<div class="main">

<h1>Andrew Gutierrez CST 336</h1>
<hr>

<h2>PORTFOLIO</h2>

<!-- Portfolio Gallery Grid -->
<div class="row">
  <div class="column">
    <div class="content">
      <img src="pictures/Lab_1.png" alt="Lab 1" style="width:100%" width="42" height="150">
      <h3>Lab 1</h3>
      <p>Simple about me website page
          <br>
          <a href="lab1/index.html">Lab 1</a>
      </p>
    </div>
  </div>
  <div class="column">
    <div class="content">
    <img src="pictures/Homework_1.png" alt="Homework 1" style="width:100%" width="42" height="150">
      <h3>Homework 1</h3>
      <p>Basic website about ciphers
        <br>
        <a href="homework1/index.html">Homework 1</a>
      </p>
    </div>
  </div>
  <div class="column">
    <div class="content">
    <img src="pictures/Lab_2.png" alt="Lab 2" style="width:100%" width="42" height="150">
      <h3>Lab 2</h3>
      <p>Slot machine
        <br>
        <a href="lab2/777/index.php">Lab 2</a>
      </p>
    </div>
  </div>
  <div class="column">
    <div class="content">
    <img src="pictures/Homework_2.png" alt="Homework 2" style="width:100%" width="42" height="150">
      <h3>Homework 2</h3>
      <p>Black Jack
        <br>
        <a href="homework2/index.php">Homework 2</a>
      </p>
    </div>
  </div>
  <div class="column">
    <div class="content">
    <img src="pictures/Homework_3.png" alt="Homework 3" style="width:100%" width="42" height="150">
      <h3>Homework 3</h3>
      <p>Pokemon generator
        <br>
        <a href="homework3/index.php">Homework 3</a>
      </p>
    </div>
  </div>
  <div class="column">
    <div class="content">
    <img src="pictures/Lab_4.png" alt="Lab 4" style="width:100%" width="42" height="150">
      <h3>Lab 4</h3>
      <p>Image Carousel
        <br>
        <a href="lab4/Slider/index.php">Lab 4</a>
      </p>
    </div>
  </div>
  <div class="column">
    <div class="content">
    <img src="pictures/Lab_5.png" alt="Lab 5" style="width:100%" width="42" height="150">
      <h3>Lab 5</h3>
      <p>Device database search
        <br>
        <a href="lab5/index.php">Lab 5</a>
      </p>
    </div>
  </div>
  <div class="column">
    <div class="content">
    <img src="pictures/Lab_6.png" alt="Lab 6" style="width:100%" width="42" height="150">
      <h3>Lab 6</h3>
      <p>Student/Falculty database
        <br>
        <a href="lab6/index.php">Lab 6</a>
      </p>
    </div>
  </div>
  <div class="column">
    <div class="content">
    <img src="pictures/Lab_7.png" alt="Lab 7" style="width:100%" width="42" height="150">
      <h3>Lab 7</h3>
      <p>Hangman using javascript
        <br>
        <a href="lab7/hangman/index.html">Lab 7</a>
      </p>
    </div>
  </div>
  <div class="column">
    <div class="content">
    <img src="pictures/Group_proj.png" alt="Group Project" style="width:100%" width="42" height="150">
      <h3>Group Project</h3>
      <p>Computer part database
        <br>
        <a href="groupproj/grouptest.php">Group Project</a>
      </p>
    </div>
  </div>
  <div class="column">
    <div class="content">
    <img src="pictures/Homework_4.png" alt="Homework 4" style="width:100%" width="42" height="150">
      <h3>Homework 4</h3>
      <p>Javascript Pokemon generator
        <br>
        <a href="assignment4/index.html">Homework 4</a>
      </p>
    </div>
  </div>
  <div class="column">
    <div class="content">
    <img src="pictures/Lab_8.png" alt="Lab 8" style="width:100%" width="42" height="150">
      <h3>Lab 8</h3>
      <p>Ajax call practice
        <br>
        <a href="lab8/index.html">Lab 8</a>
      </p>
    </div>
  </div>
  <div class="column">
    <div class="content">
    <img src="pictures/Final_proj.png" alt="Final Project" style="width:100%" width="42" height="150">
      <h3>Final Project</h3>
      <p>Movie database search
        <br>
        <a href="FinalProject/login.php">Final Project</a>
      </p>
    </div>
  </div>
<!-- END GRID -->
</div>
<!--
<div class="content">
  <img src="/w3images/p3.jpg" alt="Bear" style="width:100%">
  <h3>Some Other Work</h3>
  <p>Lorem ipsum dolor sit amet, tempor prodesset eos no. Temporibus necessitatibus sea ei, at tantas oporteat nam. Lorem ipsum dolor sit amet, tempor prodesset eos no.</p>
  <p>Lorem ipsum dolor sit amet, tempor prodesset eos no. Temporibus necessitatibus sea ei, at tantas oporteat nam. Lorem ipsum dolor sit amet, tempor prodesset eos no.</p>
</div>
-->
<!-- END MAIN -->
</div>
        
    </body>
</html>

<!--
    https://www.w3schools.com/howto/howto_css_portfolio_gallery.asp
    use thumbnails instead of actual png
-->