
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
            $sql=" UPDATE stuffs SET gender_employee='$_POST[gender_employee]',address_employee='$_POST[address_employee]'
            ,phone_employee='$_POST[phone_employee]',email_employee='$_POST[email_employee]',type_employee='$_POST[type_employee]'
           , date_start='$_POST[date_start]', date_end='$_POST[date_end]',password_employee='$_POST[password_employee]' WHERE name_employee='$_POST[name_employee]'";
     
         
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
                <h1>Update Information Of stuffs </h1>
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
                                 $sql = "SELECT * FROM stuffs where name_employee='$_POST[search_name]' limit 1";
                                 $result = mysqli_query($conn, $sql);
                                 
                                 // echo"1";
                                 
                                 if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    // echo"1";
                                    while($row = mysqli_fetch_assoc($result)) {
                                    
                                          
                                    
            ?>   

                <div style="float:left;"  class="borderofbutton" >
                     <div class="spaces_of_update">
                     <p> Employee Id</p>
                              <input type="text" name="id_employee" id="id_employee" placeholder="Enter id Employee" value="<?php echo $row["id_employee"];?>" / >
                        <p> Employee Name</p>
                              <input type="text" name="name_employee" id="name_employee" placeholder="Enter Name " value="<?php echo $row["name_employee"];?>"/>
                        <p> Employee Gander</p>     
                              <input type="text" name="gender_employee" id="gender_employee" placeholder="Enter gender employee" value="<?php echo $row["gender_employee"];?>"/>
                        <p> Employee  Address</p>
                              <input type="text" name="address_employee" id="address_employee" placeholder="Enter Address " value="<?php echo $row["address_employee"];?>"/>
                              
                        <p> Employee phone</p> 
                                <input type="text" name="phone_employee" id="phone_employee" placeholder="Enter phone number " value="<?php echo $row["phone_employee"];?>"/>  
                                
                     </div>              
               </div>

               <div style="float:right;" class="borderofbutton">
                        <div class="spaces_of_update">
                        <p> Employee Email</p>
                              <input type="text" name="email_employee" id="email_employee" placeholder="Enter E-mail" value="<?php echo $row["email_employee"];?>"/>      
                          <p> Employee Type</p>
                                  <input type="text" name="type_employee" id="type_employee" placeholder="Enter Type " value="<?php echo $row["type_employee"];?>"/>
                          <p>Employee Date start</p>
                                  <input type="text" name="date_start" id="date_start" placeholder="Enter Date start " value="<?php echo $row["date_start"];?>"/>
                          <p>Employee Date end</p>
                                  <input type="text" name="date_end" id="date_end" placeholder="Enter Date end " value="<?php echo $row["date_end"];?>"/>
                          <p>Password</p>        
                                  <input type="text" name="password_employee" placeholder="Enter your password"value="<?php echo $row["password_employee"];?>"/>
                        </div>                
                                       
               </div>

                        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
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
                               echo"please enter employee name in search here.";
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

    </body>
</html>
