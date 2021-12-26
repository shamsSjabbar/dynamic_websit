
<html id="top">
    <head>
    <?php
   include("style.php");
   ?>
      <?php
           
           $error_name_patient="";
           
           
         
         if(isset($_POST["Delete"])){
         
            if (!empty($_POST['name_patient'])&& isset($_POST['name_patient'])) {
                    
                    $servername = 'localhost:3306';
                    $username = 'root';
                    $password = '12345';
                    $dbname="my_project";
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    } 
                    $sql = "DELETE FROM account WHERE name_patient='$_POST[name_patient]' limit 1";

                    if (mysqli_query($conn, $sql)&& mysqli_affected_rows($conn)>0) {
                     echo" <div class='container'>";
                              echo"<div  class='alert alert-success alert-dismissible'>";
                              echo" <button type='button' class='close' data-dismiss='alert'>&times;</button>";
                              echo"<strong>Success!</strong> ";
                              echo"The deleted  process completed successfully.";
                              echo"</div>";
                              echo"</div>";
                    } else {
                     echo" <div class='container'>";
                     echo"<div class='alert alert-danger'  alert-dismissible'>";
                     echo" <button type='button' class='close' data-dismiss='alert'>&times;</button>";
                     echo"<strong>Error! This item  is not found </strong> ";
                     echo mysqli_error($conn) ;
                     echo"</div>";
                     echo"</div>";
                    }
                    $conn->close();                         
           }else {
            $error_name_patient="Please, Enter name  of patient";
         }
         }
      ?>
            
    </head>

   <body>

      <div >
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
                        <h1>Remov Information Of account </h1>
                      </i>
                     </center>
            </div>
         
        
            <form action = "<?php $_PHP_SELF ?>" method = "POST" class="box"> 
                    <div  class="borderofbutton" >
                         <div class="spaces_of_remove">
                             <input type="submit" value="Remove"  name="Delete"  style="float:right;" class="boxinsert"  /> 
                             <p>Patient name</p>
                             <input type="text" name="name_patient" id="name_patient" placeholder="Enter Name ">     
                             <?php echo "<br><span style='color:red'>$error_name_patient</span>";?>
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
            <p id="hide">Enter patient name in filed   and click (Remove) to Remove the information.<br/>If you want to close the help, click on the text.<p>
            
         </div>
         </div>
         </div>
         </div>

     </body>
</html>