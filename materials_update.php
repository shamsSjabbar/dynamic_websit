
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

             //get quantity_consumed_db from database
             $quantity_consumed_db=0;
            $sqlQ="SELECT quantity_consumed as quantity_consumeds FROM materials WHERE name_material='$_POST[name_material]'";
            $resultQ = mysqli_query($conn, $sqlQ);
                                 if (mysqli_num_rows($resultQ) > 0) {
                                             //  echo"is found";  
                                while($rowQ = mysqli_fetch_array($resultQ)) {
                                  $quantity_consumed_db= $rowQ['quantity_consumeds'];
                                 }
                                                                            
                                    }
                                    //echo "db".$quantity_consumed_db;
                  $sum=0;
                  $sqlS= "SELECT no_use_materials as number_of_use FROM visiter WHERE name_material='$_POST[name_material]'";
                          $resultS = mysqli_query($conn, $sqlS);
                                 if (mysqli_num_rows($resultS) > 0) {
                                               //    echo"is found";  
                                    while($rowS = mysqli_fetch_array($resultS)) {
                                             $sum += $rowS['number_of_use'];}
                                                     // echo "the sum:".$sum;
                                                   }
                     
                                                     // echo "/sum/".$sum;
                                            
                                 $quantity_consumed=$quantity_consumed_db+$sum;
                                // echo "quantity_consumed/".$quantity_consumed;
                   $the_remaining_amount=$_POST['the_total_amount']-$quantity_consumed;
                   if($the_remaining_amount<0){
                     $the_remaining_amount=0;
                   }
                     if($quantity_consumed>$_POST['the_total_amount']){
                        $quantity_consumed=0;
                        $the_remaining_amount=$_POST['the_total_amount'];
                     }
                     
                    $sql=" UPDATE materials SET id_employee='$_POST[id_employee]', 
                    name_employee='$_POST[name_employee]',cost= '$_POST[cost]',the_total_amount='$_POST[the_total_amount]',
                    quantity_consumed='$quantity_consumed',the_remaining_amount='$the_remaining_amount' where name_material='$_POST[name_material]'";
         
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
                <h1>Update Information Of Materials </h1>
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
                                 $sql = "SELECT * FROM materials where name_material='$_POST[search_name]' limit 1";
                                 $result = mysqli_query($conn, $sql);
                                 
                                 // echo"1";
                                 
                                 if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    // echo"1";
                                    while($row = mysqli_fetch_assoc($result)) {
                                    
                                          
                                    
            ?>   

                <div style="float:left;"  class="borderofbutton" >
                     <div class="spaces_of_update">
                     
                     <p>Material Id</p>
                           <input type="text" name="id_material" id="id_material" placeholder="Enter id of material" value="<?php echo $row["id_material"];?>" />
                           <!-- <label name="id_material" id="id_material"><?php// echo $row["id_material"];?></label> -->
                     <p>Material Name</p>
                           <input type="text" name="name_material" id="name_material" placeholder="Enter Name of material" value="<?php echo $row["name_material"];?>" />
                           <!-- <label name="name_material" id="name_material"><?php// echo $row["name_material"];?></label> -->
                     <p>Employee id</p>
                                       
                                <input type="text" name="id_employee" id="id_employee" placeholder="Enter id of employee " value="<?php echo $row["id_employee"];?>" />
                            
                     <p>Employee Name</p>
                                <input type="text" name="name_employee" id="name_employee" placeholder="Enter Name employee "value="<?php echo $row["name_employee"];?>" />
                           
                                              
                     </div>              
               </div>

               <div style="float:right;" class="borderofbutton">
                        <div class="spaces_of_update">
                           
                            <p>Cost</p>
                                <input type="text" name="cost" id="cost" placeholder="Enter cost "value="<?php echo $row["cost"];?>" />
                            <p>The total amount</p>
                              
                                 <input type="text" name="the_total_amount" id="the_total_amount" placeholder="Enter the total amount " value="<?php echo $row["the_total_amount"];?>" />
                                 <!-- <label for="" name="the_total_amount"><?php// echo $row["the_total_amount"];?></label> -->
                            <!-- <p>Quantity consumed</p>
                               <input type="text" name="quantity_consumed" id="quantity_consumed" placeholder="Enter quantity consumed " value="<?php //echo $row["quantity_consumed"];?>" /> -->
                                     <br/> <br/> <br/> <br/><br/><br/><br/><br/>   
                        </div>                
                                       
               </div>

                       
                        <?php 
                        
               
                              }
                           }
                                 mysqli_close($conn);
                              }
                              else {
                               echo" <div class='container' >";
                               echo"<div class='alert alert-success alert-dismissible' >";
                               echo" <button type='button' class='close' data-dismiss='alert' >&times;</button>";
                               echo"<strong >Hello!</strong> ";
                               echo"please enter material name in search here.";
                               echo"</div>";
                               echo"</div>";
                                          }
               ?>
                        
                         <br/><br/><br/><br/><br/><br/><br/><br/><br/>
                         <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                         <br/><br/><br/><br/><br/>
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
