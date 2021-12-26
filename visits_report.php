<html>
    <head>
    <?php
     date_default_timezone_set('Asia/Baghdad');
     $time=time();
     $time_visits_beginning_printed =date('h:m:s A');
     $time_visits_beginning=date('s', $time);
      include("style.php");
      ini_set('mysql.connect_timeout',300);
      ini_set('default_socket_timeout',300);
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
                  <h1> Report Of Visiter </h1>
               </i>
            </center>
         </div>

        <br/> <br/> <br/> 
        <div>
                    
            <center>
             <table style="width:100%;"class="table table-striped">
          
                <?php 
                 displayimage();

                            function displayimage()
                            {
                            $servername = "localhost";
                            $username = "root";
                            $password = "12345";
                            $dbname = "my_project";

                            // Create connection
                            $conn = mysqli_connect( $servername, $username,$password);

                            mysqli_select_db($conn,"my_project");

                            $sql ="SELECT id_patient,name_patient,id_dr,name_dr,date_first_treatment,next_visiter,diagnosis,
                            image1,image2,image3,no_of_visit,id_material,name_material,no_use_materials from visiter ";
                                $result=mysqli_query($conn,$sql);
                                if (mysqli_num_rows($result) > 0) {

                                 echo" <tr>";
                                 echo" <th>Id Patient</th>";
                                 echo" <th>Name Patient</th> ";
                                 echo" <th>Id Doctor</th>";
                                 echo"  <th>Name Doctor</th>";
                                 echo"  <th>Date first tratment</th>"; 
                                 echo"  <th>Next visiter</th>";
                                 echo"  <th>Diagnosis</th> ";
                                
                                 echo" <th>No.of visit</th>";
                                 echo" <th>Id material</th>";
                                 echo" <th>Name material</th>";
                                 echo" <th>No.use materials</th>";
                                 echo" <th>Image1</th> ";
                                 echo" <th>Image2</th> ";
                                 echo" <th>Image3</th> ";
                                
                                 echo" </tr>";
                            

                                while ($row= mysqli_fetch_array( $result)) {
                                  
                                    echo"<tr> <td>{$row['id_patient']}</td> 
                                          <td>{$row['name_patient']}</td>
                                          <td> {$row['id_dr']} </td> 
                                          <td>{$row['name_dr']}</td>
                                         <td>{$row['date_first_treatment']}</td>
                                         <td>{$row['next_visiter']}</td>
                                         <td>{$row['diagnosis']}</td>
                                        
                                       
                                         <td>{$row['no_of_visit']}</td>
                                         <td>{$row['id_material']}</td>
                                         <td>{$row['name_material']}</td>
                                         <td>{$row['no_use_materials']}</td>
                                         <td><img  height='50' width='50' src='data:image;base64,".$row['image1']."'/></td>
                                         <td><img  height='50' width='50' src='data:image;base64,".$row['image2']."'/></td>
                                         <td><img  height='50' width='50' src='data:image;base64,".$row['image3']."'/></td>
                                     </tr>";
                                    
                                    } 
                                  } else {
                                       echo" <div class='container'>";
                                       echo"<div class='alert alert-danger'  alert-dismissible'>";
                                       echo" <button type='button' class='close' data-dismiss='alert'>&times;</button>";
                                       echo"<strong>Sorry! patients not found </strong> ";
                                       echo mysqli_error($conn) ;
                                       echo"</div>";
                                       echo"</div>";
                                    }
                                    $conn->close();

                                }
                    ?>
               
               
            
                
             
                </table>
                <hr>
                </center>
                <h5>History<?php echo" : ". date('Y/m/d');?> </h5>
                <?php  date_default_timezone_set('Asia/Baghdad')?>
                <h5>Time<?php echo" : ". date('h:i:s A ');?> </h5>
               
        </div>
        <?php
                  include("footer.php");
                  date_default_timezone_set('Asia/Baghdad');
                  $time_end=time();
                  $time_visits_finished_printed=date('h:m:s A');
                  $time_visits_finished=date('s',$time_end);
                  $sub=$time_visits_finished- $time_visits_beginning;
                  $servername = 'localhost:3306';
                           $username = 'root';
                           $password = '12345';
                           $dbname="my_project";
                           $conn = new mysqli($servername, $username, $password, $dbname);
                           if ($conn->connect_error) {
                              die("Connection failed: " . $conn->connect_error);
                           } 
                            $sql=" UPDATE the_results  SET download_start='$time_visits_beginning_printed' 
                                    ,download_finished='$time_visits_finished_printed',results='$sub'  where page_name='Report visits'";
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