
<html id="top">
    <head>
    <?php
   include("style.php");
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
            } 
          
                $sql=" UPDATE patient SET gender_patient='$_POST[gender_patient]',
                age_patient='$_POST[age_patient]',address_patient='$_POST[address_patient]',phone_patient='$_POST[phone_patient]'
            ,blood_type='$_POST[blood_type]',date_first_treatment='$_POST[date_first_treatment]', id_dr='$_POST[id_dr]',
            name_dr='$_POST[name_dr]',id_employee='$_POST[id_employee]' WHERE name_patient='$_POST[name_patient]'";
      
         
         if (mysqli_query($conn, $sql)) {
            echo" <div class='container'>";
            echo"<div class='alert alert-success alert-dismissible'>";
            echo" <button type='button' class='close' data-dismiss='alert'>&times;</button>";
            echo"<strong>Success!</strong> ";
            echo"The update process completed successfully.";
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
                <h1>Update Information Of patient </h1>
            </i>
   </center>
         </div>
         <br/><br/> 
        
            <form action = "<?php $_PHP_SELF ?>" method = "POST" class="box"> 
            <div class="container">
               <div class="row">
                  <div class="col-sm-10">
                        <label style='font-size:26px;'>selecter :</label>
                        <input type = 'text' name ='search_name' id = 'search_name' placeholder="Search here"/>
                           <input type = "submit" value ="search" name = "search" class=" btn btn-info "/>
                      <br/><br/> 
            </div> 
               </div> 
                  </div>                  


                  <?php
                                 if (isset($_POST["search"])) {
                                 
                                 
                                 $servername = "localhost:3306";
                                 $username = "root";
                                 $password = "12345";
                                 $dbname = "my_project";
                                 
                                 // Create connection
                                 $conn = mysqli_connect($servername, $username, $password, $dbname);
                                 // Check connection
                                 if (!$conn) {
                                    die("Connection failed: " . mysqli_connect_error());
                                 }
                                // echo"122";
                                 $sql = "SELECT * FROM patient where name_patient='$_POST[search_name]' limit 1";
                                 $result = mysqli_query($conn, $sql);
                                 
                                 // echo"1";
                                 
                                 if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    // echo"1";
                                    while($row = mysqli_fetch_assoc($result)) {
                                    
                                          
                                    
            ?>   

                <div style="float:left;"  class="borderofbutton" >
                     <div class="spaces_of_update">
                     
                     <p>Patient Id</p>      
                              <input type="text" name="id_patient" id="id_patient" placeholder="Enter id patient" value="<?php echo $row["id_patient"];?>"/>
                     <p>Patient name</p>
                              <input type="text" name="name_patient" id="name_patient" placeholder="Enter Name " value="<?php echo $row["name_patient"];?>"/>
                     <p>Patient Age</p>
                              <input type="text" name="age_patient" id="age_patient" placeholder="Enter Age " value="<?php echo $row["age_patient"];?>"/>      
                     <p>Patient Gender</p>
                              <input type="text" name="gender_patient" id="gender_patient" placeholder="Enter Gender "   value="<?php echo $row["gender_patient"];?>"/>
                     <p>Patient Address</p> 
                           <input type="text" name="address_patient" id="address_patient" placeholder="Enter Address " value="<?php echo $row["address_patient"];?>"/>
                     <p>Patient Email</p>
                           <input type="text" name="email_patient"  id="email_patient" placeholder="Enter Email " value="<?php echo $row["email_patient"];?>"/>
                     <p>Patient Phone </p>   
                           <input type="text" name="phone_patient" id="phone_patient" placeholder="Enter phone number " value="<?php echo $row["phone_patient"];?>"/>
                     </div>              
               </div>

               <div style="float:right;" class="borderofbutton">
                        <div class="spaces_of_update">
                        <p>Blood Type</p>
                           <input type="text" name="blood_type" id="blood_type" placeholder="Enter Blood Type" value="<?php echo $row["blood_type"];?>"/>
                        <p>Date First Treatment</p>
                           <input type="text" name="date_first_treatment" id="date_first_treatment" placeholder="Enter Start Treatment " value="<?php echo $row["date_first_treatment"];?>"/>         
                        <p>Doctor Id</p>
                           <input type="text" name="id_dr" id="id_dr" placeholder="Enter Doctor id" value="<?php echo $row["id_dr"];?>"/>
                        <p>Doctor Name </p>
                           <input type="text" name="name_dr" id="name_dr" placeholder="Enter Doctor name " value="<?php echo $row["name_dr"];?>"/>
                        <p>Employee Id</p>
                                 <input type="text" name="id_employee" id="id_employee" placeholder="Enter id Employee " value="<?php echo $row["id_employee"];?>"/>
                        <p>Employee Name</p>
                                 <input type="text" name="name_employee" id="name_employee" placeholder="Enter Name Employee " value="<?php echo $row["name_employee"];?>"/>
                                       <br/><br/><br/><br/>
                        </div>                
                                       
               </div>

                       
                        <?php 
                        // }else {
                        //    echo "error 1";
                        // }  
                     //echo"13";
               
                              }
                           }
                                 mysqli_close($conn);
                              }
                              else {
                               echo" <div class='container' >";
                               echo"<div class='alert alert-success alert-dismissible' >";
                               echo" <button type='button' class='close' data-dismiss='alert' >&times;</button>";
                               echo"<strong >Hello!</strong> ";
                               echo"please enter patient name in search here.";
                               echo"</div>";
                               echo"</div>";
                                          }
               ?>
                <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                <br/><br/><br/><br/><br/> <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                        <center>
                             
                              <input type="submit" value="Update" name="Update"   class="boxinsert"/>  
                        </center>
                 </form>
               </div>
              
               <?php
                  include("footer.php");
                  ?>

    </body>
</html>
