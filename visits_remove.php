
<html>
    <head>
    <?php
   include("style.php");
   ?>
      <?php
           
           $error_name_patient="";
           $error_name_dr="";
           
         
         if(isset($_POST["Delete"])){
         
            if (!empty($_POST["name_patient"])&& isset($_POST["name_patient"])) {
               if (!empty($_POST["name_dr"])&& isset($_POST["name_dr"])) {
                $servername = 'localhost:3306';
                $username = 'root';
                $password = '12345';
                $dbname="my_project";
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                   die("Connection failed: " . $conn->connect_error);
                } 
                $sql = "DELETE FROM visiter WHERE name_patient='$_POST[name_patient]' and name_dr='$_POST[name_dr]'";
    
                if (mysqli_query($conn, $sql)&& mysqli_affected_rows($conn)>0) {
                   //echo "Record deleted successfully";
                     echo" <div class='container'>";
                     echo"<div  class='alert alert-success alert-dismissible'>";
                     echo" <button type='button' class='close' data-dismiss='alert'>&times;</button>";
                     echo"<strong>Success!</strong> ";
                     echo"The deleted  process completed successfully.";
                     echo"</div>";
                     echo"</div>";
                } else {
                 //  echo "Error deleting record: " . mysqli_error($conn);
                   echo" <div class='container'>";
                   echo"<div class='alert alert-danger'  alert-dismissible'>";
                   echo" <button type='button' class='close' data-dismiss='alert'>&times;</button>";
                   echo"<strong>Error! This item is not found</strong> ";
                   echo mysqli_error($conn) ;
                   echo"</div>";
                   echo"</div>";
                }
    
                   
             
                $conn->close();
               }else {
                  $error_name_dr="Please, Enter the name of doctor";
                  }
             
           }else {
                     $error_name_patient="Please, Enter the name of patient";
      
               }
         }
      ?>
            
    </head>

   <body>

      <div id="top">
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
                        <h1>Remove Information Of Visiter </h1>
                      </i>
                     </center>
            </div>
         
        
            <form action = "<?php $_PHP_SELF ?>" method = "POST" class="box"> 
                    <div  class="borderofbutton" >
                         <div class="spaces_of_remove">
                             <input type="submit" value="Remove"  name="Delete"  style="float:right;" class="boxinsert"  /> 
                             <p>Patient name</p>
                             <input type="text" name="name_patient" id="name_patient" placeholder="Enter Name patient ">
                             <?php echo "<br><span style='color:red'>  $error_name_patient</span>";?>
                             <p>Doctor name</p>
                             <input type="text" name="name_dr" id="name_dr" placeholder="Enter Name doctor ">
                             <?php echo "<br><span style='color:red'>  $error_name_dr</span>";?>
                         </div>              
                    </div>
            </form>
        </div>

               <?php
                  include("footer.php");
                  ?>

     </body>
</html>