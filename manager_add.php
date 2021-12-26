
<html>
    <head>
    <?php
   include("style.php");
  

   ?>
      <?php
          $error_id_dr="";
          $error_name_dr="";
          $error_password_dr="";
      
         if(isset($_POST["Insert"])){
          //  echo"$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$";
          if (!empty($_POST["id_dr"])&& isset($_POST["id_dr"])) {
            if (!empty($_POST["name_dr"])&& isset($_POST["name_dr"])) {
              if (!empty($_POST["password_dr"])&& isset($_POST["password_dr"])) {
                
               $servername = 'localhost:3306';
               $Adminname = 'root';
               $password = '12345';
               $dbname="my_project";
               $conn = new mysqli($servername, $Adminname, $password, $dbname);
               if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
               } 
              $sql= "INSERT INTO manager (id_dr,name_dr,password_dr) VALUES
                   ('$_POST[id_dr]' ,'$_POST[name_dr]','$_POST[password_dr]')";
              
              if (mysqli_query($conn, $sql)) {
                  //echo "New record created successfully";
                  echo" <div class='container'>";
                  echo"<div  class='alert alert-success alert-dismissible'>";
                  echo" <button type='button' class='close' data-dismiss='alert'>&times;</button>";
                  echo"<strong>Success!</strong> ";
                  echo"The Add process completed successfully.";
                  echo"</div>";
                  echo"</div>";
               } else {
                  //echo "Error: " . $sql . "" . mysqli_error($conn);
                  echo" <div class='container'>";
                  echo"<div class='alert alert-danger'  alert-dismissible'>";
                  echo" <button type='button' class='close' data-dismiss='alert'>&times;</button>";
                  echo"<strong>Error!</strong> ";
                  echo mysqli_error($conn) ;
                  echo"</div>";
                  echo"</div>";
               }
               $conn->close();

              }else {
               $error_password_dr="Please, Enter password of use of Doctor";
              }
            }else {
               $error_name_dr="Please, Enter name  of Doctor";
            }
          } else {
            $error_id_dr="Please, Enter id of Doctor";
          }
         }
           
            
      ?>
      
    </head>

    <body>

    <div>
         <div  class="theamOfHeader">
            <center>
               <i>
                  <h1 >E-orthodontic center management system</h1>
               </i>
            </center>
         </div>
         <div class="theamOfNameOfPages">
         <center>
            <i>
                <h1>Add Information Of Manager </h1>
            </i>
   </center>
         </div>

        <br/> <br/> 

        <form action = "<?php $_PHP_SELF ?>" method = "POST" class="box"> 
                <div style="float:left;"  class="borderofbutton" >
                     <div class="spaces_of_add">
                            <p>Doctor Id</p>
                              <input type="text" name="id_dr" id="id_dr" placeholder="Enter Id doctor"  name = "insert">
                              <?php echo "<br><span style='color:red'>  $error_id_dr</span>";?>
                            <p>Doctor Name</p>
                               <input type="text" name="name_dr" id="name_dr" placeholder="Enter Name ">
                              <?php echo "<br><span style='color:red'> $error_name_dr</span>";?>
                           <p>Password </p>
                              <input type="text" name="password_dr" id="password_dr" placeholder="Enter password doctor ">
                              <?php echo "<br><span style='color:red'> $error_password_dr</span>";?>
                  
                   </div>              
               </div>
               <br/><br/><br/><br/><br/><br/>
                        <br/><br/>
                        <center>
                              <input type="submit" value="Add" name ="Insert"   class="boxinsert"/>  
                        </center>
         <form/> 
    <div/>
               <?php
                  include("footer.php");
                  ?>
                  <br/><br/><br/><br/>
                  <div class="row">
         <div class="col-sm-4">
         <button type="button" class=" btn btn-info " data-toggle="collapse" data-target="#demo"><h4 id="show">Help</h4></button>
         <div id="demo" class="collapse"><br/>
            <p id="hide">Fill out all the fields and click (Add) to add the information.If you want to close the help, click on the text.<p>
            
         </div>
         </div>
         </div>
         </div>
    </body>



</html>