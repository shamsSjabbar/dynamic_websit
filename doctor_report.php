<html>
    <head>
    <?php
    date_default_timezone_set('Asia/Baghdad');
    $time=time();
    $time_dr_beginning_printed =date('h:m:s A');
    $time_dr_beginning=date('s', $time);
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
                  <h1> Report Of Doctor </h1>
               </i>
            </center>
         </div>

        <br/> <br/> <br/> 
        <div>
                    
            <center>
             <table style="width:100%;"class="table table-striped">
                <tr>
                    <th>Id Doctor</th>
                    <th>Name Doctor</th> 
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Phone Number</th> 
                    <th>Email</th>
                    <th>Specialization</th> 
                    <th>Password</th> 
                    
                </tr>
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
                        
                        $sql = "SELECT *  FROM doctor ";
                        $result = mysqli_query($conn, $sql);
                        
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_array($result)) {
                        
                                echo"<tr> <td>{$row['id_dr']}</td> 
                                          <td>{$row['name_dr']}</td>
                                          <td> {$row['gender_dr']} </td> 
                                          <td>{$row['address_dr']}</td>
                                         <td>{$row['phone_dr']}</td>
                                         <td>{$row['email_dr']}</td>
                                         <td>{$row['specialization']}</td>
                                         <td>{$row['password_dr']}</td>
                                         
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
                //echo "0 results";
                echo" <div class='container'>";
                echo"<div class='alert alert-danger'  alert-dismissible'>";
                echo" <button type='button' class='close' data-dismiss='alert'>&times;</button>";
                echo"<strong>Sorry! Doctors are not found </strong> ";
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
                  $time_dr_finished_printed=date('h:m:s A');
                  $time_dr_finished=date('s',$time_end);
                  $sub=$time_dr_finished- $time_dr_beginning;
                  $servername = 'localhost:3306';
                           $username = 'root';
                           $password = '12345';
                           $dbname="my_project";
                           $conn = new mysqli($servername, $username, $password, $dbname);
                           if ($conn->connect_error) {
                              die("Connection failed: " . $conn->connect_error);
                           } 
                            $sql=" UPDATE the_results  SET download_start='$time_dr_beginning_printed' 
                                    ,download_finished='$time_dr_finished_printed',results='$sub'  where page_name='Report doctor'";
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