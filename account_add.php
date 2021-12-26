
<html>
    <head>
    <?php
   include("style.php");
  

   ?>
      <?php 
            $error_id_patient="";
            $error_name_patient="";
            $error_id_employee="";
            $error_name_employee="";
            $error_total_amount="";
            $error_the_first_batch="";
            $error_the_second_batch="";
            $error_the_third_batch="";
          
         if(isset($_POST["Insert"])){
            if (!empty($_POST['id_patient'])&& isset($_POST['id_patient'])&& trim($_POST['id_patient'])) {
               if (!empty($_POST['name_patient'])&& isset($_POST['name_patient'])&& trim($_POST['name_patient'])) {
                if (!empty($_POST['id_employee'])&& isset($_POST['id_employee'])&& trim($_POST['id_employee'])) {
                  if (!empty($_POST['name_employee'])&& isset($_POST['name_employee'])&& trim($_POST['name_employee'])) {
                     if (!empty($_POST['total_amount'])&& isset($_POST['total_amount'])&& trim($_POST['total_amount'])) {
                        if (!empty($_POST['the_first_batch'])&& isset($_POST['the_first_batch'])&& trim($_POST['the_first_batch'])){
                           if (isset($_POST['the_second_batch'])) {
                              if (isset( $_POST['the_third_batch'])) {
                                 

                                    $servername = 'localhost:3306';
                                    $username = 'root';
                                    $password = '12345';
                                    $dbname="my_project";
                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                    if ($conn->connect_error) {
                                       die("Connection failed: " . $conn->connect_error);
                                    } 
                                    $total=$_POST['total_amount'];
                                    $total=$total-($_POST['the_first_batch']+$_POST['the_second_batch']+$_POST['the_third_batch']);
                                 $sql= "INSERT INTO account (id_patient,name_patient,id_employee,name_employee,total_amount,the_first_batch,the_second_batch,the_third_batch)
                                    VALUES('$_POST[id_patient]' ,'$_POST[name_patient]','$_POST[id_employee]','$_POST[name_employee]',
                                    '$total','$_POST[the_first_batch]', '$_POST[the_second_batch]','$_POST[the_third_batch]')";
                                 
                                 if (mysqli_query($conn, $sql)) {
                                      // echo "New record created successfully";
                                       echo" <div class='container'>";
                                       echo"<div  class='alert alert-success alert-dismissible'>";
                                       echo" <button type='button' class='close' data-dismiss='alert'>&times;</button>";
                                       echo"<strong>Success!</strong> ";
                                       echo"The Add process completed successfully.";
                                       echo"</div>";
                                       echo"</div>";
                                    } else {
                                      // echo "Error: " . $sql . "" . mysqli_error($conn);
                                       echo" <div class='container'>";
                                       echo"<div class='alert alert-danger'  alert-dismissible'>";
                                       echo" <button type='button' class='close' data-dismiss='alert'>&times;</button>";
                                       echo"<strong>Error!</strong> ";
                                       echo mysqli_error($conn) ;
                                       echo"</div>";
                                       echo"</div>";
                                    }
                                    $conn->close();
                              } else {
                                 $error_the_third_batch="Please, Enter The third batch";
                              }
                              
                           } else {
                              $error_the_second_batch="Please, Enter The second batch";
                           }
                           
                        } else {
                           $error_the_first_batch="Please, Enter The first batch";
                        }
                        
                     } else {
                        $error_total_amount="Please, Enter The total amount";
                     }
                     
                  } else {
                     $error_name_employee="Please, Enter Name of Employee";
                  }
                   
                } else {
                  $error_id_employee="Please, Enter id of Employee";
                }
                
               }else {
                  $error_name_patient="Please, Enter name  of patient";
               }
            }else {
               $error_id_patient="Please, Enter id of patient";
            }
         
            
            }
      ?>
       <?php

         if(isset($_POST["Update"])){
              
            $servername = 'localhost:3306';
            $username = 'root';
            $password = '12345';
            $dbname="my_project";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
            }   $total=$_POST['total_amount'];
            $total=$total-($_POST['the_first_batch']+$_POST['the_second_batch']+$_POST['the_third_batch']);
               $sql=" UPDATE account SET id_patient='$_POST[id_patient]',id_employee='$_POST[id_employee]',name_employee='$_POST[name_employee]'
               ,total_amount= $total,the_first_batch='$_POST[the_first_batch]',
               the_second_batch='$_POST[the_second_batch]',the_third_batch='$_POST[the_third_batch]' WHERE name_patient='$_POST[name_patient]'";
         
         if (mysqli_query($conn, $sql)) {
               echo "New record created successfully";
            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }
            $conn->close();
            }
         ?>
        
            <?php
          if(isset($_POST["Delete"])){
           
            }
         ?>
            
    </head>

    <body>
    <div class="container">
         <div class="row">
         <div class="col-sm-4">
         <button type="button" class=" btn btn-info " data-toggle="collapse" data-target="#demo"><h4 id="show">Help</h4></button>
         <div id="demo" class="collapse"><br/>
            <p id="hide">Fill out all the fields and click (Add) to add the information.<br/>If you want to close the help, click on the text.<p>
            </div>
         </div>
         </div>
         </div>
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
                  <h1> Add Information Of Accont </h1>
               </i>
            </center>
         </div>

        <form action = "<?php $_PHP_SELF ?>" method = "POST" class="box"> 
                <div style="float:left;"  class="borderofbutton" >
                     <div class="spaces_of_add">
                     <p>Patient Id</p>    
                           <input type="text" name="id_patient" id="id_patient" placeholder="Enter id of patient" >
                           <?php echo "<br><span style='color:red'>$error_id_patient</span>";?>
                     <p>Patient name</p>
                        
                           <input type="text" name="name_patient" id="name_patient" placeholder="Enter Name ">     
                           <?php echo "<br><span style='color:red'>$error_name_patient</span>";?>
                     <p>Employee Id</p>
                    
                           <input type="text" name="id_employee" id="id_employee" placeholder="Enter id_Employee">     
                           <?php echo "<br><span style='color:red'>$error_id_employee</span>";?>
                    <p>Employee Name</p>
                  
                           <input type="text" name="name_employee" id="name_employee" placeholder="Enter Name_Employee">     
                           <?php echo "<br><span style='color:red'>$error_name_employee</span>";?>      

                     </div>              
               </div>

               <div style="float:right;" class="borderofbutton">
                        <div class="spaces_of_add">
                        <p>The Total Amount</p>
                                 <input type="text" name="total_amount" id="total_amount" placeholder="Enter total amount"/>
                                 <?php echo "<br><span style='color:red'> $error_total_amount</span>";?>
                           <p>The first batch</p>
                        
                                 <input type="text" name="the_first_batch" id="the_first_batch" placeholder="Enter the first batch"/>    
                                 <?php echo "<br><span style='color:red'>$error_the_first_batch</span>";?>
                           <p>The second batch</p>
                                 <input type="text" name="the_second_batch" id="the_second_batch" placeholder="Enter the second batch "/>
                                 <?php echo "<br><span style='color:red'>$error_the_second_batch</span>";?>
                        <p>The third batch</p>
                        
                                 <input type="text" name="the_third_batch" id="the_third_batch" placeholder="Enter the third batch "/>
                                 <?php echo "<br><span style='color:red'>$error_the_third_batch</span>";?>  
                        </div>                
                                       
               </div>
                        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                        <center>
                              <input type="submit" value="Add" name ="Insert"   class="boxinsert"/>  
                        </center>
                 </form>
               </div>

               <?php
                  include("footer.php");
                  ?>
              
         

    </body>

</html