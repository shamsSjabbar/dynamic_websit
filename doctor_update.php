
<html id="top">
    <head>
    <?php
   include("style.php");
   ?>
 <?php
         
            $a=time();
          
            $sacond=date('s,m',$a);

             echo ("the first ".$sacond."<br>");
        

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
               $sql=" UPDATE doctor SET gender_dr='$_POST[gender_dr]' ,address_dr='$_POST[address_dr]'
              ,phone_dr='$_POST[phone_dr]',email_dr='$_POST[email_dr]', specialization='$_POST[specialization]',password_dr='$_POST[password_dr]'
              where name_dr='$_POST[name_dr]'";
         
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
                <h1>Update Information Of Doctor </h1>
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
                                 $sql = "SELECT * FROM doctor where name_dr='$_POST[search_name]' limit 1";
                                 $result = mysqli_query($conn, $sql);
                                 
                                 // echo"1";
                                 
                                 if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    // echo"1";
                                    while($row = mysqli_fetch_assoc($result)) {
                                    
                                          
                                    
            ?>   

                <div style="float:left;"  class="borderofbutton" >
                     <div class="spaces_of_update">
                     
           
                              <p>Doctor Id</p>
                                    <input type="text" name="id_dr" id="id_dr" placeholder="Enter id of doctor" value="<?php echo $row["id_dr"];?>" />
                                   
                              <p>Doctor Name</p>
                                    <input type="text" name="name_dr" id="name_dr" placeholder="Enter Name " value="<?php echo $row["name_dr"];?>"/>
                                    
                              <p>Doctor Gender</p>
                           
                                    <input type="text" name="gender_dr" id="gender_dr" placeholder="Enter Gender " value="<?php echo $row["gender_dr"];?>"/>
                                   
                           <p>Doctor Address</p>
                           
                                    <input type="text" name="address_dr" id="address_dr" placeholder="Enter Address "value="<?php echo $row["address_dr"];?>"/>
                                
                     </div>              
               </div>

               <div style="float:right;" class="borderofbutton">
                        <div class="spaces_of_update">
                              <p>Doctor phone</p>
                              
                                          <input type="text" name="phone_dr" id="phone_dr" placeholder="Enter phone number " value="<?php echo $row["phone_dr"];?>"/>      
                                             
                              <p>Doctor Email</p>
                              
                                          <input type="text" name="email_dr" id="email_dr" placeholder="Enter Email " value="<?php echo $row["email_dr"];?>"/>
                                         
                                 <p>Doctor Specilization</p>
                                 
                                       <input type="text" name="specialization" id="specialization" placeholder="Enter specilization " value="<?php echo $row["specialization"];?>"/>
                               <p>Password</p>
                                     <input type="text" name="password_dr" placeholder="Enter password doctor" value="<?php echo $row["password_dr"];?>"/>
                        </div>                
                                       
               </div>

                        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
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
                               echo"please enter doctor name in search here.";
                               echo"</div>";
                               echo"</div>";
                                          }
               ?>
                        <center>
                             
                              <input type="submit" value="Update" name="Update"   class="boxinsert"/>  
                        </center>
                 </form>
               </div>
              
               <?php
                  include("footer.php");
                  ?>
                   <?php
                  if (isset($_POST["Update"])){
                  $a1=time();
               
                  $sacond1=date('s ,m',$a1);
                  
                  echo ($sacond1);
                  $sub=$sacond1-$sacond;
                  echo("<br>"."the sub:".$sub);
                  }
            ?>

    </body>
</html>
