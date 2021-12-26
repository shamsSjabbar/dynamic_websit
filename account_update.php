
<html>
    <head>
    <?php
   include("style.php");
  

   ?>
 
       <?php
        $total="";

         if(isset($_POST["Update"])){
              
            $servername = 'localhost:3306';
            $username = 'root';
            $password = '12345';
            $dbname="my_project";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
            }   
            $total=$_POST['total_amount'];
            $total=$total-($_POST['the_second_batch']+$_POST['the_third_batch']);
               if ($total<0) {
                  $total=0;
               }
               $sql=" UPDATE account SET id_employee='$_POST[id_employee]',name_employee='$_POST[name_employee]'
               ,total_amount= $total, the_second_batch='$_POST[the_second_batch]',the_third_batch='$_POST[the_third_batch]'
               WHERE name_patient='$_POST[name_patient]'";
         
         if (mysqli_query($conn, $sql)) {
              // echo "New record created successfully";
               echo" <div class='container'>";
               echo"<div class='alert alert-success alert-dismissible'>";
               echo" <button type='button' class='close' data-dismiss='alert'>&times;</button>";
               echo"<strong>Success!</strong> ";
               echo"The update process completed successfully.";
               echo"</div>";
               echo"</div>";
            } else {
               //echo "Error: " . $sql . "" . mysqli_error($conn);
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
                  <h1> Update Information Of Accont </h1>
               </i>
            </center>
         </div>

        <br/> <br/> <br/> 

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
                                 //echo"122";
                                 $sql = "SELECT * FROM account where name_patient='$_POST[search_name]' limit 1";
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
                           <input type="text" name="id_patient" id="id_patient" placeholder="Enter id of patient"  value="<?php echo $row["id_patient"];?>"/>
                       
                     <p>Patient name</p>
                        
                           <input type="text" name="name_patient" id="name_patient" placeholder="Enter Name " value="<?php echo $row["name_patient"];?>"/>     
                           
                     <p>Employee Id</p>
                    
                           <input type="text" name="id_employee" id="id_employee" placeholder="Enter id_Employee" value="<?php echo $row["id_employee"];?>"/>     
                          
                    <p>Employee Name</p>
                  
                           <input type="text" name="name_employee" id="name_employee" placeholder="Enter Name_Employee" value="<?php echo $row["name_employee"];?>"/>     
                           
                     </div>              
               </div>

               <div style="float:right;" class="borderofbutton">
                        <div class="spaces_of_update">
                        <p>The Total Amount</p>
                                  <input type="text" name="total_amount" id="total_amount" placeholder="Enter total amount" value="<?php echo $row["total_amount"];?>"/>
                             
                                <!-- <label for=""><?php //echo $row["total_amount"];?></label> -->

                           <p>The first batch</p>
                                       <!-- <label for=""><?php //echo $row["the_first_batch"];?></label> -->
                                  <input type="text" name="the_first_batch" id="the_first_batch" placeholder="Enter the first batch"  value="<?php echo $row["the_first_batch"];?>"/>     
                                 
                           <p>The second batch</p>
                                 <input type="text" name="the_second_batch" id="the_second_batch" placeholder="Enter the second batch " value="<?php echo $row["the_second_batch"];?>"/>
                                 
                        <p>The third batch</p>
                        
                                 <input type="text" name="the_third_batch" id="the_third_batch" placeholder="Enter the third batch " value="<?php echo $row["the_third_batch"];?>"/>
                                  
                                      
                        </div>                
                                       
               </div>

                        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                        <?php 
                        // }else {
                        //    echo "error 1";
                        // }  
                    // echo"13";
               
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
                        <center>
                             
                              <input type="submit" value="Update" name="Update"   class="boxinsert"/>  
                        </center>
                 </form>
               </div>
               <?php
                  include("footer.php");
                  ?>
    </body>

</html