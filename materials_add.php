
<html>
    <head>
    <?php
   include("style.php");
   ?>
      <?php
       $x;
           
            $error_id_material="";
            $error_name_material="";
            $error_id_doctor="";
            $error_name_doctor="";
            $error_id_patient="";
            $error_name_patient="";
            $error_id_employee="";
            $error_name_employee="";
            $error_cost="";
            $error_the_total_amount="";
            $error_quantity_consumed="";
            $quantity_consumed_db="";
            $error_the_remaining_amount="";
            $error_date_use="";
           $the_remaining_amount="";
         $no_fo_use_patient="";
         $quantity_consumed;
         if(isset($_POST["Insert"])){
          if (!empty($_POST['id_material'])&& isset($_POST['id_material'])){
            if (!empty($_POST['name_material'])&& isset($_POST['name_material'])) {
             if(!empty($_POST['id_employee'])&& isset($_POST['id_employee'])){
               if (!empty($_POST['name_employee'])&& isset($_POST['name_employee'])) {
                 if (!empty( $_POST['cost'])&& isset($_POST['cost'])) {
                   if (!empty( $_POST['the_total_amount'])&& isset($_POST['the_total_amount'])) {
                     // if (!empty( $_POST['quantity_consumed'])&& isset($_POST['quantity_consumed'])) {
                                       
                                                $servername = 'localhost:3306';
                                                $username = 'root';
                                                $password = '12345';
                                                $dbname="my_project";
                                                $conn = new mysqli($servername, $username, $password, $dbname);
                                                if ($conn->connect_error) {
                                                   die("Connection failed: " . $conn->connect_error);
                                                } 
                                               
                                                $sum=0;
                                                $sqlS= "SELECT no_use_materials as number_of_use FROM visiter WHERE name_material='$_POST[name_material]'";
                                                $sqlquantity="SELECT quantity_consumed FROM materials WHERE name_material='$_POST[name_material]'";
                                                $resultquantity = mysqli_query($conn, $sqlquantity);
                                                $resultS = mysqli_query($conn, $sqlS);
                                                
                                                if (mysqli_num_rows($resultS) > 0) {
                                                  // echo"is found";
                                          
                                                   while($rowS = mysqli_fetch_array($resultS)) {
                                                      $sum += $rowS['number_of_use'];}
                                                     // echo "the sum:".$sum;
                                                   }
                                                   if (mysqli_num_rows($resultquantity ) > 0) {
                                                      //echo"is found";
                                             
                                                      while($rowquantity = mysqli_fetch_array($resultquantity )) {
                                                         $quantity_consumed_db=$rowquantity['quantity_consumed']; }
                                                   }
                     
                                                   $quantity_consumed=$quantity_consumed_db+$sum;
                                                   //$quantity_consumed=0;
                                              //  echo $quantity_consumed;

                                                $the_remaining_amount=$_POST['the_total_amount']-$quantity_consumed;
                                             $sql= "INSERT INTO materials (id_material,name_material,id_employee,
                                                      name_employee,cost,the_total_amount,quantity_consumed,the_remaining_amount) 
                                                      VALUES( '$_POST[id_material]','$_POST[name_material]', '$_POST[id_employee]','$_POST[name_employee]',
                                                      '$_POST[cost]','$_POST[the_total_amount]',$quantity_consumed,'$the_remaining_amount')  ";
                                             
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
                                                
                              
                              // } else {
                              //    $error_the_remaining_amount="Please, Enter quantity consumed ";
                              //   }
                              } else {
                                 $error_the_total_amount="Please, Enter the total amount ";
                                }
                             } else {
                              $error_cost="Please, Enter cost ";
                             }
                             
                           } else {
                             $error_name_employee="Please, Enter name employee";
                           }
                           
                          }else {
                          $error_id_employee="Please, Enter id employee";
                        }
              
                    }else {
                        $error_name_material="Please, Enter name  of material";
                        }
                
                    }else {
                        $error_id_material="Please, Enter id of material";
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
                <h1>Add Information Of Materials </h1>
            </i>
   </center>
         </div>

        <br/> <br/> 
            <form action = "<?php $_PHP_SELF ?>" method = "POST" class="box"> 
            
                <div style="float:left;"  class="borderofbutton" >
                     <div class="spaces_of_add">
                     <p>Material Id</p>
                           <input type="text" name="id_material" id="id_material" placeholder="Enter id of material"   >
                           <?php echo "<br><span style='color:red'>$error_id_material</span>";?>
                     <p>Material Name</p>
                           <input type="text" name="name_material" id="name_material" placeholder="Enter Name of material">
                           <?php echo "<br><span style='color:red'>$error_name_material</span>";?>
                           <p>Employee id</p>
                      <input type="text" name="id_employee" id="id_employee" placeholder="Enter id of employee " / >
                      <?php echo "<br><span style='color:red'>  $error_id_employee </span>";?>   
                <p>Employee Name</p>
                      <input type="text" name="name_employee" id="name_employee" placeholder="Enter Name employee ">
                      <?php echo "<br><span style='color:red'>$error_name_employee</span>";?>
                     </div>              
               </div>

               <div style="float:right;" class="borderofbutton">
                 <div class="spaces_of_add">
                 
                <p>Cost</p>
                    <input type="text" name="cost" id="cost" placeholder="Enter cost ">
                    <?php echo "<br><span style='color:red'>$error_cost</span>";?>
                  
                <p>The total amount</p>
                      <input type="text" name="the_total_amount" id="the_total_amount" placeholder="Enter the total amount " >
                      <?php echo "<br><span style='color:red'>  $error_the_total_amount </span>";?>    
                <!-- <p>Quantity consumed</p>
                      <input type="text" name="quantity_consumed" id="quantity_consumed" placeholder="Enter quantity consumed "  >
                      <?php// echo "<br><span style='color:red'>  $error_quantity_consumed </span>";?>  -->
                      <br/><br/> <br/><br/><br/><br/><br/>
              
                        </div>                
                                       
               </div>
             <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                        <center>
                              <input type="submit" value="Add" name ="Insert"   class="boxinsert"/>  
                        </center>
                 </form>
               </div>

               <?php
                  include("footer.php");
                  ?>
    </body>
</html>
