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
                  <h1> Report Of Time Spent  </h1>
               </i>
            </center>
         </div>

        <br/> <br/> <br/> 
        <div>
                    
            <center>
             <table style="width:100%;"class="table table-striped">
                <tr>
                    <th>Page Name</th>
                    <th>Download Start </th> 
                    <th>Download Finished</th>
                    <th>The Result</th>
                    
                    
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
                        
                        $sql = "SELECT *  FROM the_results ";
                        $result = mysqli_query($conn, $sql);
                        
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_array($result)) {
                        
                                echo"<tr> <td>{$row['page_name']}</td> 
                                          <td>{$row['download_start']}</td>
                                          <td> {$row['download_finished']} </td> 
                                          <td>{$row['results']}</td>
                                         
                                        
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
                  ?>
    </body>
</html>