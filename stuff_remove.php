
<html>
    <head>
    <?php
   include("style.php");
   ?>
      <?php
           
           $error_Employee_name="";
           
           
         
         if(isset($_POST["Delete"])){
         
            if (!empty($_POST["name_employee"])&& isset($_POST["name_employee"])) {

                      $servername = 'localhost:3306';
            $username = 'root';
            $password = '12345';
            $dbname="my_project";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
            } 
            $sql = "DELETE FROM stuffs WHERE name_employee='$_POST[name_employee]' limit 1";

            if (mysqli_query($conn, $sql)&& mysqli_affected_rows($conn)>0) {
              // echo "Record deleted successfully";
               echo" <div class='container'>";
               echo"<div  class='alert alert-success alert-dismissible'>";
               echo" <button type='button' class='close' data-dismiss='alert'>&times;</button>";
               echo"<strong>Success!</strong> ";
               echo"The deleted  process completed successfully.";
               echo"</div>";
               echo"</div>";
            } else {
              // echo "Error deleting record: " . mysqli_error($conn);
            //  echo "Error deleting record: " . mysqli_error($conn);
              echo" <div class='container'>";
              echo"<div class='alert alert-danger'  alert-dismissible'>";
              echo" <button type='button' class='close' data-dismiss='alert'>&times;</button>";
              echo"<strong>Error! This item can not delete it </strong> ". mysqli_error($conn);
             // echo mysqli_error($conn) ;
              echo"</div>";
              echo"</div>";
            }

               
         
            $conn->close();
             
           }else {
                    $error_Employee_name="Please, Enter name  of Employee";
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
                        <h1>Remov Information Of Employee </h1>
                      </i>
                     </center>
            </div>
         
        
            <form action = "<?php $_PHP_SELF ?>" method = "POST" class="box"> 
                    <div  class="borderofbutton" >
                         <div class="spaces_of_remove">
                             <input type="submit" value="Remove"  name="Delete"  style="float:right;" class="boxinsert"  /> 
                             <p> Employee Name</p>
                             <input type="text" name="name_employee" id="name_employee" placeholder="Enter Name ">
                             <?php echo "<br><span style='color:red'>$error_Employee_name</span>";?>
                         </div>              
                    </div>
            </form>
        </div>

               <?php
                  include("footer.php");
                  ?>
                  
<div class="row">
         <div class="col-sm-4">
         <button type="button" class=" btn btn-info " data-toggle="collapse" data-target="#demo"><h4 id="show">Help</h4></button>
         <div id="demo" class="collapse"><br/>
            <p id="hide">Enter Employee name in filed   and click (Remove) to Remove the information.<br/>If you want to close the help, click on the text.<p>
            
         </div>
         </div>
         </div>
         </div>

     </body>
</html>