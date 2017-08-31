<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.

Practicing ajax calls with help of you-tube tutorial from Awa Melvine;
My modification: php OOP and other styling;
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>My Second chatbox</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>        
        <style>
            body{
                background-color: #cccccc;
            }
            #wrapper{
                width: 50%;
                height: auto;
                margin: 10px auto;
                background: #999999;
                border: 1px solid black;
            }
            
            #chat_form{
                width: 50%;
                height: auto;
                margin: 50px auto;
                background: #ffffff;
                padding: 10px;
                border: 1px solid black;
            }
            
            #chat_form li{
                list-style-type: none;
                margin: 5px;
            }
            
            input[type=text], textarea{
                width: 80%;
            }
        </style>    
    </head>
    <body>

        <div id="wrapper">
            <div id="display_area">
                
            </div>
            <div id="chat_form">
                <li>Name: </li> 
                <li><input type="text" id="name"></li>
                <li>Comment: </li>
                <li><textarea id="comment"></textarea></li>
                <li><input type="submit" id="submit_comment" value="send"></li>
            </div>           
        </div>       
    </body>
</html>


<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">

$(document).ready(function(){
    displayDataFromDB();
   //alert('jquery functions!');
   $("#submit_comment").click(function(){
       
    var name = $("#name").val();
    var comment = $("#comment").val();
   
   $.ajax({
      url: "server.php",
      async: false,
      type: "POST",
      data: {
          "done": 1,
          "name" : name,
          "comment": comment
      },
      success: function(data){
          displayDataFromDB();
          $("#name").val('');
          $("#comment").val('');
          
      }
   });
   });
});

function displayDataFromDB(){
    $.ajax({
        url: "server.php",
        type: "POST",
        async: false,
        data:{
            "display": 1
        },
        success: function(d){
            $("#display_area").html(d);
        }
    });
    
}

</script>
