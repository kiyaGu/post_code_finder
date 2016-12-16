<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Post Code Finder</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container" id="container">
    <div class="row" id="container-row">
       <div class="col-md-6 col-md-offset-3 center">
       <h1 class="text-primary">Find my Post Code</h1>
       <p class="lead" id="head">Enter the address for which you want to find the post code</p>
        
            <div class="form-group">
               <label for="city" class="marginRight">
                <input type="text" class="form-control marginRight" placeholder="E.g. 13 fake street, fake town" id="postcode"></label>
            </div>
            <button  class="btn btn-success" id="getPostcode" >Find my Post Code</button>      
       
        <div id="displaySuccess" class="marginTop alert alert-success"></div>
        <div id="displayFailure" class="marginTop alert alert-danger"></div>
       </div>
    </div>
    
</div>



<script>window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"><\/script>')
</script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
<script>
    $("#getPostcode").click(function(){
        
    $.ajax({type:"GET",
        url:"https://maps.googleapis.com/maps/api/geocode/xml?address="+encodeURIComponent($('#postcode').val())+"&key=AIzaSyB65x5YgCNg8XxLjJ3l382pAmr_48gCu-0",            
            dataType:"xml",
            success:xmlRslt,
            error:function(xhr){
            alert("An error occured: " + xhr.status + " " + xhr.statusText);
        }
    });   
    function xmlRslt(data){
        
        $(data).find("address_component").each(function(){
            
            if($(this).find("type").text() == "postal_code"){
                if($(this).text()=="")
                    $("#displaySuccess").html($(this).find("long_name").text());
                else
                  $("#displayfailure").html("Sorry, we couldn't find the post code for the address "+$('#postcode').val());  
            }
        });
        
    }
        });
    </script>
</body>
</html>
