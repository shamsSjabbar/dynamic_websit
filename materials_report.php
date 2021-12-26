<html>
    <head>
    <?php
    date_default_timezone_set('Asia/Baghdad');
    $time=time();
    $time_materials_beginning_printed =date('h:m:s A');
    $time_materials_beginning=date('s', $time);
   include("style.php");
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
                  <h1> Report Of Materials </h1>
               </i>
            </center>
         </div>

        <br/> <br/> <br/> 
        <div>
                    
            <center>
             <table style="width:100%;"class="table table-striped">
             
                <?php 

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
                        
                        $sql = "SELECT *  FROM materials ";
                        $result = mysqli_query($conn, $sql);
                        
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                           echo" <tr>";
                           echo"<th>Id Material</th>";
                           echo"<th>name Material</th>";
                           echo" <th>Id Employee</th>";
                           echo" <th>Name Employee</th> ";
                           echo"  <th>cost</th>";
                           echo" <th>The Tatal No.</th> ";
                           echo" <th>Quantity Consumed</th> ";
                           echo"<th>The remaining</th>"; 
                           echo"   </tr>";
                            while($row = mysqli_fetch_array($result)) {
                        
                                echo"<tr> <td>{$row['id_material']}</td> 
                                          <td>{$row['name_material']}</td>
                                       
                                          
                                          <td>{$row['id_employee']}</td>
                                          <td>{$row['name_employee']}</td>
                                          <td>{$row['cost']}</td> 
                                          <td>{$row['the_total_amount']}</td>
                                          <td> {$row['quantity_consumed']} </td> 
                                          <td>{$row['the_remaining_amount']}</td>
                                          
                                           
                                     </tr>";
                               
            
                            }    
                    
                    ?>
               
        
                </table>
                <hr>
                </center>
                <h5>History<?php echo" : ". date('Y/m/d');?> </h5>
                <?php  date_default_timezone_set('Asia/Baghdad')?>
                <h5>Time<?php echo" : ". date('h:i:s A ');?> </h5>
                <?php
                
               
            } else {
                echo" <div class='container'>";
                echo"<div class='alert alert-danger'  alert-dismissible'>";
                echo" <button type='button' class='close' data-dismiss='alert'>&times;</button>";
                echo"<strong>Sorry! Items not found </strong> ";
                echo mysqli_error($conn) ;
                echo"</div>";
                echo"</div>";
            }
            
            mysqli_close($conn);
            ?>
        </div>
        <?php
                  include("footer.php");
                  date_default_timezone_set('Asia/Baghdad');
                  $time_end=time();
                  $time_materials_finished_printed=date('h:m:s A');
                  $time_materials_finished=date('s',$time_end);
                  $sub=$time_materials_finished- $time_materials_beginning;
                  $servername = 'localhost:3306';
                           $username = 'root';
                           $password = '12345';
                           $dbname="my_project";
                           $conn = new mysqli($servername, $username, $password, $dbname);
                           if ($conn->connect_error) {
                              die("Connection failed: " . $conn->connect_error);
                           } 
                            $sql=" UPDATE the_results  SET download_start='$time_materials_beginning_printed' 
                                    ,download_finished='$time_materials_finished_printed',results='$sub'  where page_name='Report materials'";
                          if (mysqli_query($conn,$sql)) {
                              //echo "New record created successfully";
                            //   echo" <div class='container'>";
                            //   echo"<div  class='alert alert-success alert-dismissible'>";
                            //   echo" <button type='button' class='close' data-dismiss='alert'>&times;</button>";
                            //   echo"<strong>Success!</strong> ";
                            //   echo"The Add process completed successfully.";
                            //   echo"</div>";
                            //   echo"</div>";
                        }  else {
                             // echo "Error: " . $sql . "" . mysqli_error($conn);
                            //   echo" <div class='container'>";
                            //   echo"<div class='alert alert-danger'  alert-dismissible'>";
                            //   echo" <button type='button' class='close' data-dismiss='alert'>&times;</button>";
                            //   echo"<strong>Error!</strong> ";
                            //   echo mysqli_error($conn)."$sql" ;
                            //   echo"</div>";
                            //   echo"</div>";
                             // echo"5";
                           }
                           $conn->close();
                  ?>
    </body>
</html>