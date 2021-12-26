<html>
    <head>
    <?php
    date_default_timezone_set('Asia/Baghdad');
    $time=time();
    $time_account_beginning_printed =date('h:m:s.u A',microtime(true));
    $time_account_beginning=date('s', $time);
    $time_account_millisecond_start=DateTime::createFromFormat('U.u', microtime(true));
    //echo"$time_account_millisecond_start";
   // $now = DateTime::createFromFormat('U.u', microtime(true));
   // echo $time_account_millisecond_start->format('s.u');
    //
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
                  <h1> Report Of Account </h1>
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
                    <th>Id Employee</th>
                    <th>Name Employee</th>
                    <th>Total amount</th> 
                    <th>The first batch</th>
                    <th>the second batch</th> 
                    <th>the third batch</th>
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
                        
                        $sql = "SELECT *  FROM account ";
                        $result = mysqli_query($conn, $sql);
                        
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_array($result)) {
                        
                                echo"<tr> <td>{$row['id_patient']}</td> 
                                          <td>{$row['name_patient']}</td>
                                          <td> {$row['id_employee']} </td> 
                                          <td>{$row['name_employee']}</td>
                                         <td>{$row['total_amount']}</td>
                                         <td>{$row['the_first_batch']}</td>
                                         <td>{$row['the_second_batch']}</td>
                                         <td>{$row['the_third_batch']}</td>  
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
                echo"<strong>Sorry! accounts not found </strong> ";
                echo mysqli_error($conn) ;
                echo"</div>";
                echo"</div>";
            }
            
            mysqli_close($conn);
            ?>
    
    <?php
                  include("footer.php");
                  ?>
    </body>
</html>