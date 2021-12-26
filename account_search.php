<html>

<head>
        <?php
        include("style.php");
        ?>
          
</head>
    <body>
    <div class="row">
         <div class="col-sm-4">
         <button type="button" class=" btn btn-info " data-toggle="collapse" data-target="#demo" style="float: left;"><h4 id="show">Help</h4></button>
         <div id="demo" class="collapse"><br/>
            <p id="hide" style="float: left;">Enter patient name in field   and click (Search) to Search the information.<br/>If you want to close the help, click on the text.<p>
            
         </div>
         </div>
         </div>
        <div>
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
                        <h1>Search Information Of Account </h1>
                    </i>
        </center>
                </div>

                <br/> 
             <div>  
                <div class="borderofbutton">
                 <div class="spaces">
                      <form  action = "<?php $_PHP_SELF ?>" method = "POST" class="box">
                    <p>Name Patient</p>
        
                    <input type="text" name="name_patient" id="name_patient" placeholder="Enter Name "><br/><br/>
                    <div><button type="submith" value="Search" name="Search"  class="btn btn-primary">Search</button></div>
                    </div>      
                    </div>  
                    <br/><br/><br/>
                    <?php
                        if(isset($_POST["Search"])){
                           
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
                    
                        $sql = "SELECT * FROM account where name_patient='$_POST[name_patient]'";
                        
                        $result = mysqli_query($conn, $sql);
                        
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            echo" <center>";
                            echo"  <table style='width:100%;'class='table table-striped'>";
                            echo"   <tr>";
                            echo"  <th>Id Patient</th>";
                            echo"<th>Name Patient</th>"; 
                            echo"  <th>Id Employee</th>";
                            echo" <th>Name Employee</th>";
                            echo" <th>Total amount</th>";
                            echo"   <th>The first batch</th>";
                            echo"  <th>the second batch</th> ";
                            echo"   <th>the third batch</th>";

                            echo"   <tr>";
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
                            
                            <table/>
                            <center>
                            <hr>
                                <?php 
                                            
                                        } else {
                                            echo" <center>";
                                            echo" <div class='container'>";
                                            echo"<div class='col-sm-12'>";
                                            echo"<div class='alert alert-danger'  alert-dismissible'>";
                                            echo" <button type='button' class='close' data-dismiss='alert'>&times;</button>";
                                            echo"<strong>Sorry! This name is not available in the database. </strong> ";
                                            echo"</div>";
                                            echo"</div>";
                                            echo" </div> ";
                                            echo" </center>";
                                        }
                                        
                                        mysqli_close($conn);
                                       }
                                        ?>    
                </form>
                
             </div> 
                <br/> <br/>
                <?php
                  include("footer.php");
                  ?>
                 
                 

         </div>
    </body>

</html>