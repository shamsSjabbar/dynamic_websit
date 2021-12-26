
<html>
    <head>
    <?php
   include("style.php");
   ?>
      <?php
            $error_Employee_id="";
            $error_Employee_name="";
            $error_Employee_gender="";
            $error_Employee_address="";
            $error_Employee_email="";
            $error_Employee_phone_number="";
            $error_Employee_type="";
            $error_Employee_date_start="";
            $error_Employee_date_end="";
           $pattron="/@/";
           $error_password_employee="";
         if(isset($_POST["Insert"])){
          if (!empty($_POST["id_employee"])&& isset($_POST["id_employee"])){
            if (!empty($_POST["name_employee"])&& isset($_POST["name_employee"])) {
              if (!empty($_POST["gender_employee"])&& isset($_POST["gender_employee"])) {
                if (!empty($_POST["address_employee"])&& isset($_POST["address_employee"])) {
                   if (!empty($_POST["phone_employee"])&& isset($_POST["phone_employee"])&&(strlen($_POST["phone_employee"])>=8)) {
                    if (!empty($_POST["email_employee"])&& isset($_POST["email_employee"])&&(strlen($_POST["email_employee"])>=8)&&preg_match($pattron,$_POST["email_employee"])) {
                      if (!empty($_POST["type_employee"])&& isset($_POST["type_employee"])) {
                         if (!empty($_POST["date_start"])&& isset($_POST["date_start"])) {
                             if (!empty($_POST["date_end"])&& isset($_POST["date_end"])) {
                              if (!empty($_POST["password_employee"])&& isset($_POST["password_employee"])) {
                                $servername = 'localhost:3306';
                                $username = 'root';
                                $password = '12345';
                                $dbname="my_project";
                                $conn = new mysqli($servername, $username, $password, $dbname);
                                if ($conn->connect_error) {
                                   die("Connection failed: " . $conn->connect_error);
                                } 
                               $sql= "INSERT INTO stuffs (id_employee,name_employee,gender_employee,address_employee, phone_employee,email_employee,type_employee,date_start,
                                       date_end,password_employee) VALUES('$_POST[id_employee]' ,'$_POST[name_employee]','$_POST[gender_employee]', '$_POST[address_employee]'
                                       ,'$_POST[phone_employee]','$_POST[email_employee]','$_POST[type_employee]','$_POST[date_start]','$_POST[date_end]','$_POST[password_employee]')";
                               
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
                                 $error_password_employee="Pleses,Enter password ";
                             }
                               }else {
                                $error_Employee_date_end="Please, Enter date end of Employee";
                               }
                             
                           } else {
                             $error_Employee_date_start="Please, Enter date start of Employee";
                           }
                           
                          }else {
                            $error_Employee_type="Please, Enter type of Employee";
                        }
                        
                       }else {
                      
                      $error_Employee_email="Please, Enter E-mail of Employee";
                      }
                      
                    }else {
                        $error_Employee_phone_number="Please, Enter phone number of Employee";
                   
                   }
                   
                  } else {
                    $error_Employee_address="Please, Enter address of Employee";
                 
                }
                
              }else{
                $error_Employee_gender="Please, Enter gander of Employee";
              } 
              
           }else {
              $error_Employee_name="Please, Enter name  of Employee";
            }
    
           }else {
            $error_Employee_id="Please, Enter id of Employee";
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
                <h1>Add Information Of Employee </h1>
            </i>
   </center>
         </div>

        <br/> <br/> 
            <form action = "<?php $_PHP_SELF ?>" method = "POST" class="box"> 
                <div style="float:left;"  class="borderofbutton" >
                     <div class="spaces_of_add">
                     <p> Employee Id</p>
                              <input type="text" name="id_employee" id="id_employee" placeholder="Enter id Employee" / >
                              <?php echo "<br><span style='color:red'>$error_Employee_id</span>";?>
                        <p> Employee Name</p>
                              <input type="text" name="name_employee" id="name_employee" placeholder="Enter Name "/>
                              <?php echo "<br><span style='color:red'>$error_Employee_name</span>";?>
                        <p> Employee Gander</p>     
                              <input type="text" name="gender_employee" id="gender_employee" placeholder="Enter gender employee"/>
                              <?php echo "<br><span style='color:red'> $error_Employee_gender</span>";?>
                        <p> Employee  Address</p>
                          
                              <input type="text" name="address_employee" id="address_employee" placeholder="Enter Address "/>
                              <?php echo "<br><span style='color:red'>$error_Employee_address</span>";?>
                              
                        <p> Employee phone</p> 
                                <input type="text" name="phone_employee" id="phone_employee" placeholder="Enter phone number "/>
                                <?php echo "<br><span style='color:red'>$error_Employee_phone_number</span>";?>  
                     </div>              
               </div>

               <div style="float:right;" class="borderofbutton">
                        <div class="spaces_of_add">
                          <p> Employee Email</p>
                              <input type="text" name="email_employee" id="email_employee" placeholder="Enter E-mail">      
                              <?php echo "<br><span style='color:red'> $error_Employee_email </span>";?>   
                          <p> Employee Type</p>
                                  <input type="text" name="type_employee" id="type_employee" placeholder="Enter Type ">
                                  
                                  <?php echo "<br><span style='color:red'>$error_Employee_type </span>";?>    
                        
                          <p>Employee Date start</p>
                                
                                  <input type="text" name="date_start" id="date_start" placeholder="Enter Date start ">
                                   <?php echo "<br><span style='color:red'>$error_Employee_date_start</span>";?>
                          <p>Employee Date end</p>
                                  <input type="text" name="date_end" id="date_end" placeholder="Enter Date end ">
                                  <?php echo "<br><span style='color:red'>$error_Employee_date_end</span>";?>
                           <p>Password</p>        
                            <input type="text" name="password_employee" placeholder="Enter your password"/>
                            <?php echo "<br><span style='color:red'>$error_password_employee</span>";?>
                        </div>                
                                       
               </div>
                        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
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