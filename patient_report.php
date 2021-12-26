<html>
    <head>
    <?php
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
                  <h1> Report Of Patients </h1>
               </i>
            </center>
         </div>

        <br/> <br/> <br/> 
        <div>
                    
            <center>
             <table style="width:100%;"class="table table-striped">
                <tr>
                    <th>Id Patient</th>
                    <th>Name Patient</th>
                    <th>Gender patient</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Email</th> 
                    <th>Phone </th> 
                    <th>Blood Type</th>
                    <th>Date first treatment</th>
                    <th>Id Doctor</th>
                    <th>Name Doctor</th> 
                    <th>Id Employee</th>
                    <th>Name Employee</th>
                   
                
                   
                    
                   
                   
                    
                   
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
                        
                        $sql = "SELECT *  FROM patient";
                        $result = mysqli_query($conn, $sql);
                        
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_array($result)) {
                        
                                echo"<tr> <td>{$row['id_patient']}</td> 
                                          <td>{$row['name_patient']}</td>
                                          <td> {$row['gender_patient']} </td> 
                                          <td>{$row['age_patient']}</td>
                                          <td>{$row['address_patient']}</td>
                                          <td>{$row['email_patient']}</td>
                                          <td>{$row['phone_patient']}</td>
                                          <td>{$row['blood_type']}</td>
                                          <td>{$row['date_first_treatment']}</td>
                                          <td>{$row['id_dr']}</td> 
                                          <td>{$row['name_dr']}</td> 
                                          <td>{$row['id_employee']}</td>
                                          <td> {$row['name_employee']} </td> 
                                           
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
               // echo "0 results";
               echo" <div class='container'>";
               echo"<div class='alert alert-danger'  alert-dismissible'>";
               echo" <button type='button' class='close' data-dismiss='alert'>&times;</button>";
               echo"<strong>Sorry! Patients are not found </strong> ";
               echo mysqli_error($conn) ;
               echo"</div>";
               echo"</div>";
            }
            
            mysqli_close($conn);
            ?>
        </div>
        <?php
                  include("footer.php");
                  ?>
    </body>
</html>