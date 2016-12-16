$(document).ready(function(){
   $("#container").css("height",$(window).height());
    
    $("#container-row").css("paddingTop",($(window).height()/2)-70+"px"); 
    
    $("#getPostcode").click(function(event){
        event.preventDefault();
                     $.ajax({type:"GET",
        url:"https://maps.googleapis.com/maps/api/geocode/xml?address="+encodeURIComponent($('#postcode').val())+"&key=AIzaSyB65x5YgCNg8XxLjJ3l382pAmr_48gCu-0",            
            dataType:"xml",
            success:xmlRslt,
            error:function(xhr){
                $("#displayFailure").show();
                                                  $("#displayFailure").html("<p>Sorry, An error occured: while connecting to the server</p>").fadeIn(); 
          
        }
    }); 
        var result = 0;
        function xmlRslt(data){
        
        $(data).find("address_component").each(function(){
            
            if($(this).find("type").text() == "postal_code"){
                
                    
                    $("#displayFailure").hide();
                                                        $("#displaySuccess").show();
                                                        $("#displaySuccess").html("<p> The post code you are looking for is <u><strong>"+$(this).find("long_name").text()+"</strong></u> </p>" ).fadeIn();
                result = 1;
                    
                }
                    
                
                    
            
        });
            if(result == 0){
                    $("#displaySuccess").hide();
                                                   $("#displayFailure").show();
                                                  $("#displayFailure").html("<p>Sorry, we couldn't find the post code for the address<u><strong> "+$('#postcode').val()+"</strong></u></p>").fadeIn();  
                    
                    
                }
        
    }     
        
        
    });
    
});

   
    
     

