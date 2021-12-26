
<html id="top">
    <head>
    <?php
   include("style.php");
   ?>
      <?php
            $error_doctor_id="";
            $error_doctor_name="";
            $error_doctor_specialization="";
            $error_doctor_gender="";
            $error_doctor_address="";
            $error_doctor_email="";
            $error_doctor_phone_number="";
            $error_password_dr="";
           
            
         if(isset($_POST["Insert"])){
          if (!empty($_POST["id_dr"])&& isset($_POST["id_dr"])){
            if (!empty($_POST["name_dr"])&& isset($_POST["name_dr"])) {
              if (!empty($_POST["gender_dr"])&& isset($_POST["gender_dr"])) {
                if (!empty($_POST["address_dr"])&& isset($_POST["address_dr"])) {
                   if (!empty($_POST["phone_dr"])&& isset($_POST["phone_dr"])) {
                      if (!empty($_POST["email_dr"])&& isset($_POST["email_dr"])) {
                        if (!empty($_POST["specialization"])&& isset($_POST["specialization"])) {
                           if (!empty($_POST["password_dr"])&& isset($_POST["password_dr"])) {
                                
                           $servername = 'localhost:3306';
                           $username = 'root';
                           $password = '12345';
                           $dbname="my_project";
                           $conn = new mysqli($servername, $username, $password, $dbname);
                           if ($conn->connect_error) {
                              die("Connection failed: " . $conn->connect_error);
                           } 
                          $sql= "INSERT INTO doctor (id_dr,name_dr,gender_dr,address_dr,phone_dr,email_dr,specialization,password_dr)
                           VALUES('$_POST[id_dr]' ,'$_POST[name_dr]','$_POST[gender_dr]','$_POST[address_dr]',
                           '$_POST[phone_dr]','$_POST[email_dr]','$_POST[specialization]','$_POST[password_dr]')";
                           
                          if (mysqli_query($conn,$sql)) {
                              //echo "New record created successfully";
                              echo" <div class='container'>";
                              echo"<div  class='alert alert-success alert-dismissible'>";
                              echo" <button type='button' class='close' data-dismiss='alert'>&times;</button>";
                              echo"<strong>Success!</strong> ";
                              echo"The Add process completed successfully.";
                              echo"</div>";
                              echo"</div>";
                        }  else {
                             // echo "Error: " . $sql . "" . mysqli_error($conn);
                              echo" <div class='container'>";
                              echo"<div class='alert alert-danger'  alert-dismissible'>";
                              echo" <button type='button' class='close' data-dismiss='alert'>&times;</button>";
                              echo"<strong>Error!</strong> ";
                              echo mysqli_error($conn)."$sql" ;
                              echo"</div>";
                              echo"</div>";
                             // echo"5";
                           }
                           $conn->close();
                         
                        }else {
                           $error_password_dr="Pleses,Enter password";
                        }     
                           
                          }else {
                              $error_doctor_specialization="Please, Enter specialization of doctor";
                          
                        }
                        
                       }else {
                            $error_doctor_email="Please, Enter E-mail of doctor";
                      }
                      
                    }else {
                            $error_doctor_phone_number="Please, Enter phone number of doctor";
                   }
                   
                  } else {
                     
                       $error_doctor_address="Please, Enter address of doctor";
                }
                
              } else {
                      $error_doctor_gender="Please, Enter gender of doctor";
              }
              
           }else {
                    $error_doctor_name="Please, Enter name  of doctor";
            }
    
           }else {
                   $error_doctor_id="Please, Enter id of doctor";
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
                <h1>Add Information Of Doctor </h1>
            </i>
   </center>
         </div>

        <br/> <br/> 
            <form action = "<?php $_PHP_SELF ?>" method = "POST" class="box"> 
                <div style="float:left;"  class="borderofbutton" >
                     <div class="spaces_of_add">
                              <p>Doctor Id</p>
                                    <input type="text" name="id_dr" id="id_dr" placeholder="Enter id of doctor"  >
                                    <?php echo "<br><span style='color:red'>$error_doctor_id</span>";?>
                              <p>Doctor Name</p>
                                    <input type="text" name="name_dr" id="name_dr" placeholder="Enter Name ">
                                    <?php echo "<br><span style='color:red'>$error_doctor_name</span>";?>
                              <p>Doctor Gender</p>
                           
                                    <input type="text" name="gender_dr" id="gender_dr" placeholder="Enter Gender ">
                                    <?php echo "<br><span style='color:red'>$error_doctor_gender</span>";?>
                           <p>Doctor Address</p>
                           
                                    <input type="text" name="address_dr" id="address_dr" placeholder="Enter Address "/>
                                 <?php echo "<br><span style='color:red'>$error_doctor_address</span>";?> 
                     </div>              
               </div>

               <div style="float:right;" class="borderofbutton">
                        <div class="spaces_of_add">
                              <p>Doctor phone</p>
                              
                                          <input type="text" name="phone_dr" id="phone_dr" placeholder="Enter phone number ">      
                                          <?php echo "<br><span style='color:red'> $error_doctor_phone_number</span>";?>   
                              <p>Doctor Email</p>
                              
                                          <input type="text" name="email_dr" id="email_dr" placeholder="Enter Email ">
                                          <?php echo "<br><span style='color:red'> $error_doctor_email</span>";?>    
                                 <p>Doctor Specilization</p>
                                 
                                       <input type="text" name="specialization" id="specialization" placeholder="Enter specilization ">
                                       <?php echo "<br><span style='color:red'> $error_doctor_specialization</span>";?>
                                       <p>Password</p>
                                     <input type="text" name="password_dr" placeholder="Enter password doctor" />
                                     <?php echo "<br><span style='color:red'> $error_doctor_specialization</span>";?>
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
                
         </div>
     </body>
</html>