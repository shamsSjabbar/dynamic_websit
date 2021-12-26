<!doctype html>
<html  lang="en" id="top">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- this 6 tags for Accordion and the function belong it -->
    <title>jQuery UI Accordion - Default functionality</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- this 3 tag for   Collapsible -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script>
        $( function() {
            $( "#accordion" ).accordion();
        } );
  </script>
  <script>
        $(document).ready(function(){
        $("#hide").click(function(){
            $(this).hide();
        });
           $("#show").click(function(){
            $("#hide").show();
           // window.scrollTo(0,document.body.scrollHeight);
            
  });
        });
</script>
    <style type="text/css">  
      html{
          scroll-behavior: smooth;
          
      }
      body{
            background-color:white;
            padding-left: 20px;
            padding-right: 20px;
            margin-top: 10px;
            margin-bottom:10px; 
       

            }
           hr{
            border: 2px solid lavender;
            }
           .theamOfHeader{
            
        font-family: Georgia, 'Times New Roman', Times, serif;
        color:cornflowerblue;
             
            }
            .theamOfNameOfPages{
            
            font-family: Georgia, 'Times New Roman', Times, serif;
            color:mediumpurple;
                 
                }
           .borderofbutton{
            background-color:lavender;
            border: 10px solid gainsboro;
            
           }
           .spaces{
            margin-top:50px;
            margin-bottom: 100px;
            margin-right: 150px;
            margin-left: 80px;
            
           }
           .spaces_of_update{
            margin-top:50px;
            margin-bottom: 100px;
            margin-right: 300px;
            margin-left: 80px;
            
           }
           .spaces_of_add{
            margin-top:50px;
            margin-bottom: 100px;
            margin-right: 300px;
            margin-left: 80px;
            
           }
           .spaces_of_remove{
            margin-top:50px;
            margin-bottom: 100px;
            margin-right: 130px;
            margin-left: 80px;
            
           }

                .MyButton {
                    width: 300px;
                    padding: 20px;
                    cursor: pointer;
                    font-weight: bold;
                    font-size: 150%;
                    background: #3366cc;
                    color: #fff;
                    border: 1px solid #3366cc;
                    border-radius: 10px;
                }
                    .MyButton:hover {
                    color: #000;
                    background:#ffff00 ;
                    border: 1px solid #fff;
                }

               
                .box input[type="text"] {

                 border: none;
                 border-bottom: 1px solid #fff;
                 background: transparent;
                 outline: none;
                 height: 40px;
                 color:blueviolet;
                 font-size: 16px;

                }
                .box label {

                    border: none;
                    border-bottom: 1px solid #fff;
                    background: transparent;
                    outline: none;
                    height: 40px;
                    color:navy;
                    font-size: 16px;

                    }

                .box input[ value="Add"] {
                    width: 300px;
                    padding: 20px;
                    cursor: pointer;
                    font-weight: bold;
                    font-size: 150%;
                    background:orangered;
                    color: #fff;
                    border: 1px solid #3366cc;
                    border-radius: 10px;
                    
              
                }
                .box input[ value="Add"]:hover {
                    color: #000;
                    background:#ffff00 ;
                    border: 1px solid #fff;
                    align-items: center;
                }
                .box input[ value="Update"] {
                    width: 300px;
                    padding: 20px;
                    cursor: pointer;
                    font-weight: bold;
                    font-size: 150%;
                    background:limegreen;
                    color: #fff;
                    border: 1px solid #3366cc;
                    border-radius: 10px;
                    
              
                }
                .box input[ value="Update"]:hover {
                    color: #000;
                    background:#ffff00 ;
                    border: 1px solid #fff;
                    align-items: center;
                }
                .box input[ value="Add new photos"] {
                    width: 300px;
                    padding: 20px;
                    cursor: pointer;
                    font-weight: bold;
                    font-size: 150%;
                    background:limegreen;
                    color: #fff;
                    border: 1px solid #3366cc;
                    border-radius: 10px;
                    
              
                }
                .box input[ value="Add new photos"]:hover {
                    color: #000;
                    background:#ffff00 ;
                    border: 1px solid #fff;
                    align-items: center;
                }
                .box input[ value="Display All"] {
                    width: 300px;
                    padding: 20px;
                    cursor: pointer;
                    font-weight: bold;
                    font-size: 150%;
                    background:dodgerblue;
                    color: #fff;
                    border: 1px solid #3366cc;
                    border-radius: 10px;
                    
              
                }
                .box input[ value="Display All"]:hover {
                    color: #000;
                    background:#ffff00 ;
                    border: 1px solid #fff;
                    align-items: center;
                }
                .box input[ value="Search"] {
                    width: 300px;
                    padding: 20px;
                    cursor: pointer;
                    font-weight: bold;
                    font-size: 150%;
                    background:dodgerblue;
                    color: #fff;
                    border: 1px solid #3366cc;
                    border-radius: 10px;
                    
              
                }
                .box input[value="Search"]:hover {
                    color: #000;
                    background:#ffff00 ;
                    border: 1px solid #fff;
                    align-items: center;
                }
                .box input[ value="Remove"] {
                    width: 300px;
                    padding: 20px;
                    cursor: pointer;
                    font-weight: bold;
                    font-size: 150%;
                    background:red;
                    color: #fff;
                    border: 1px solid #3366cc;
                    border-radius: 10px;
                    
              
                }
                .box input[value="Remove"]:hover {
                    color: #000;
                    background:#ffff00 ;
                    border: 1px solid #fff;
                    align-items: center;
                }
                .box input[  type="file"] {
                    width: 150px;
                    padding: 15px;
                    cursor: pointer;
                    font-weight: bold;
                    font-size: 70%;
                    background:mediumpurple;
                    color: #fff;
                    border: 1px solid #3366cc;
                    border-radius: 10px;
                    
              
                }
                .box input[  type="file"]:hover {
                    color: #000;
                    background:#ffff00 ;
                    border: 1px solid #fff;
                    align-items: center;
                }
                
    </style>
    </head>
    </html>