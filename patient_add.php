
<html>
    <head>
    <?php
   include("style.php");
   ?>
      <?php
        $error_id_patient="";
        $error_name_patient="";
        $error_age_patient="";
        $error_gender_patient="";
        $error_address_patient="";
        $error_email_patient="";
        $error_phone_patient="";
        $error_blood_type="";
        $error_date_first_treatment="";
        $error_id_dr="";
        $error_name_dr="";
        $error_id_employee="";
        $error_name_employee="";
         if(isset($_POST["Insert"])){
         if (!empty($_POST["id_patient"])&& isset($_POST["id_patient"])) {
            if (!empty($_POST["name_patient"])&& isset($_POST["name_patient"])) {
               if(!empty($_POST["age_patient"])&& isset($_POST["age_patient"])){
               if (!empty($_POST["gender_patient"])&& isset($_POST["gender_patient"])) {
                 if (!empty($_POST["address_patient"])&& isset($_POST["address_patient"])) {
                    if (!empty($_POST["email_patient"])&& isset($_POST["email_patient"])) {
                      if (!empty($_POST["phone_patient"])&& isset($_POST["phone_patient"])) {
                         if (!empty($_POST["blood_type"])&& isset($_POST["blood_type"])) {
                            if (!empty($_POST["date_first_treatment"])&& isset($_POST["date_first_treatment"])) {
                               if (!empty($_POST["id_dr"])&& isset($_POST["id_dr"])) {
                                  if (!empty($_POST["name_dr"])&& isset($_POST["name_dr"])) {
                                     if (!empty($_POST["id_employee"])&& isset($_POST["id_employee"])) {
                                       if (!empty($_POST["name_employee"])&& isset($_POST["name_employee"])) {
                                          # code...


                                          $servername = 'localhost:3306';
                                          $username = 'root';
                                          $password = '12345';
                                          $dbname="my_project";
                                          $conn = new mysqli($servername, $username, $password, $dbname);
                                          if ($conn->connect_error) {
                                             die("Connection failed: " . $conn->connect_error);
                                          } 
                                         $sql= "INSERT INTO patient (id_patient,name_patient,gender_patient,age_patient,address_patient,
                                        email_patient,  phone_patient,blood_type, date_first_treatment,id_dr,name_dr,
                                         id_employee,name_employee) VALUES('$_POST[id_patient]' ,'$_POST[name_patient]','$_POST[gender_patient]',
                                         '$_POST[age_patient]', '$_POST[address_patient]','$_POST[email_patient]','$_POST[phone_patient]',
                                         '$_POST[blood_type]','$_POST[date_first_treatment]',
                                               '$_POST[id_dr]', '$_POST[name_dr]','$_POST[id_employee]','$_POST[name_employee]')";
                                         
                                         if (mysqli_query($conn, $sql)) {
                                           //  echo "New record created successfully";
                                             echo" <div class='container'>";
                                             echo"<div  class='alert alert-success alert-dismissible'>";
                                             echo" <button type='button' class='close' data-dismiss='alert'>&times;</button>";
                                             echo"<strong>Success!</strong> ";
                                             echo"The Add process completed successfully.";
                                             echo"</div>";
                                             echo"</div>";
                                          } else {
                                           //  echo "Error: " . $sql . "" . mysqli_error($conn);
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
                                          $error_name_employee="Please, Enter Employee name";
                                       }
                                       
                                     }else {
                                       $error_id_employee="Please, Enter Employee id";
                                     }
                                  }else {
                                    $error_name_dr="Please, Enter doctor name ";
                                  }
                               }else {
                                 $error_id_dr="Please, Enter doctor id  ";
                               }
                            }else {
                              $error_date_first_treatment="Please, Enter the first date start treatment";
                            }

                         }else {
                           $error_blood_type="Please, Enter blood type";
                         }
                      }else {
                        $error_phone_patient="Please, Enter  patient phone number";
                      }
                    }else {
                     $error_email_patient="Please, Enter the patient email";
                    }
                 }else {
                  $error_address_patient="Please, Enter the  patient address";
                 }
               }else {
                  $error_gender_patient="Please, Enter the gender";
               }
            }else {
               $error_age_patient="Please, Enter the Age";
            }
            }else {
               $error_name_patient="Please, Enter the name";
            }
         }else {
            $error_id_patient="Please, Enter the id";
         }
           
            }
      ?>
 
            
    </head>
    <body>
    <div class="row">
         <div class="col-sm-4">
         <button type="button" class=" btn btn-info " data-toggle="collapse" data-target="#demo"><h4 id="show">Help</h4></button>
         <div id="demo" class="collapse"><br/>
            <p id="hide">Fill out all the fields and click (Add) to add the information.If you want to close the help, click on the text.<p>
            
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
                <h1>Add Information Of patient </h1>
            </i>
   </center>
         </div>

        <br/> 
            <form action = "<?php $_PHP_SELF ?>" method = "POST" class="box"> 
                <div style="float:left;"  class="borderofbutton" >
                     <div class="spaces_of_add">
                     <p>Patient Id</p>      
                              <input type="text" name="id_patient" id="id_patient" placeholder="Enter id patient"/>
                              <?php echo "<br><span style='color:red'> $error_id_patient</span>";?>
                     <p>Patient name</p>
                              <input type="text" name="name_patient" id="name_patient" placeholder="Enter Name "/>
                              <?php echo "<br><span style='color:red'>$error_name_patient</span>";?>
                     <p>Patient Age</p>
                              <input type="text" name="age_patient" id="age_patient" placeholder="Enter Age "/>
                              <?php echo "<br><span style='color:red'> $error_age_patient</span>";?>      
                     <p>Patient Gender</p>
                              <input type="text" name="gender_patient" id="gender_patient" placeholder="Enter Gender "/>
                              <?php echo "<br><span style='color:red'>$error_gender_patient</span>";?>
                     <p>Patient Address</p> 
                           <input type="text" name="address_patient" id="address_patient" placeholder="Enter Address "/>
                           <?php echo "<br><span style='color:red'> $error_address_patient </span>";?>
                     <p>Patient Email</p>
                           <input type="text" name="email_patient"  id="email_patient" placeholder="Enter Email "/>
                           <?php echo "<br><span style='color:red'>$error_email_patient</span>";?>
                     <p>Patient Phone </p>   
                           <input type="text" name="phone_patient" id="phone_patient" placeholder="Enter phone number "/>
                           <?php echo "<br><span style='color:red'>$error_phone_patient</span>";?>
                     </div>              
               </div>

               <div style="float:right;" class="borderofbutton">
                        <div class="spaces_of_add">
                        <p>Blood Type</p>
                           <input type="text" name="blood_type" id="blood_type" placeholder="Enter Blood Type">
                           <?php echo "<br><span style='color:red'>$error_blood_type</span>";?>
                        <p>Date First Treatment</p>
                           <input type="text" name="date_first_treatment" id="date_first_treatment" placeholder="Enter Start Treatment "> 
                           <?php echo "<br><span style='color:red'>$error_date_first_treatment</span>";?>          
                        <p>Doctor Id</p>
                           <input type="text" name="id_dr" id="id_dr" placeholder="Enter Doctor id">
                           <?php echo "<br><span style='color:red'>$error_id_dr</span>";?>
                        <p>Doctor Name </p>
                           <input type="text" name="name_dr" id="name_dr" placeholder="Enter Doctor name ">
                           <?php echo "<br><span style='color:red'> $error_name_dr</span>";?>
                        <p>Employee Id</p>
                                 
                                 <input type="text" name="id_employee" id="id_employee" placeholder="Enter id Employee ">
                                 <?php echo "<br><span style='color:red'>$error_id_employee</span>";?>
                        <p>Employee Name</p>
                                 
                                 <input type="text" name="name_employee" id="name_employee" placeholder="Enter Name Employee ">
                                 <?php echo "<br><span style='color:red'>$error_name_employee</span>";?>
                                       <br/><br/><br/>
                        </div>                
                                       
               </div>
                        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                        <center>
                              <input type="submit" value="Add" name ="Insert"   class="boxinsert"/>  
                        </center>
                 </form>
               </div>

               <?php
                  include("footer.php");
                  ?>


         </div>
    </body>
</html>