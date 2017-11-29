// JavaScript File

var x;
var y;
var a;
var b;
var c;
var background;
var element;
var poke;
var gend;
    
function pokemon(sel)
{
    poke = sel.options[sel.selectedIndex].text;
    
    if(poke == "Charmander")
    {
        element = "fire";
    }
    else if(poke == "Bulbasaur")
    {
        element = "Grass-type";
    }
    else if(poke == "Squirtle")
    {
        element = "water-type";
    }
    
    //document.write(poke);
    //alert(sel.options[sel.selectedIndex].text);
}

function getgender(sel)
{
    gend = sel.options[sel.selectedIndex].text;
}


function getData()
    {
            y = document.getElementsByName("firstName")[0].value;
          
            b = document.getElementsByName("level")[0].value;
            c = document.getElementsByName("background")[0].value;
           
           if(y == "" || b == "" || c == "" || poke =="" || gend =="" || element=="")
           {
               document.getElementById("demo").innerHTML += "Please clear page and fill out all fields";
           }
           //document.getElementById("demo").innerHTML = 5 + 6;
           else{
           document.getElementById("demo").innerHTML += "<h3> Your created Pokemon: </h3>";
           document.getElementById("demo").innerHTML += "<br/>";
           document.getElementById("demo").innerHTML += "<img src='imgs/" +poke +".png'" +"width = '150'>";
           document.getElementById("demo").innerHTML += "<br/>";
           document.getElementById("demo").innerHTML += 'Nickname: ' + y;
           document.getElementById("demo").innerHTML += "<br/>";
           document.getElementById("demo").innerHTML += 'Level: ' + b;
           document.getElementById("demo").innerHTML += "<br/>";
           document.getElementById("demo").innerHTML += "Gender: <img src='imgs/" + gend + ".png' width = '50'>";
           document.getElementById("demo").innerHTML += "<br/>";
           document.getElementById("demo").innerHTML += "Element: <img src='imgs/" + element + ".png' width = '50'>";
           
          
            
            background = "url('imgs/" + c + "')";
            document.body.style.backgroundImage = background;
           }
    
    }
//getData();
        x = "";
       // y = "";
       
//JQuery button
// Create listener for the replay button
$(document).ready(function(){
    $("form").submit(function(event){
        event.preventDefault();
        alert("Please fill out all fields");
    });
});


$("#sub").on("click", function() {
    $(document).ready(function(){
    $("form").submit(function(event){
        event.preventDefault();
        alert("Please fill out all fields");
    });
});
    getData();
});



$("#google").on('click', function(){
    
     window.location = "index.html";    
});