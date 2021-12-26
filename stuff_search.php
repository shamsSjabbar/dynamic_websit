<html>

<head>
        <?php
        include("style.php");
        ?>
          
</head>
    <body>
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
                        <h1>Search Information Of Employee </h1>
                    </i>
        </center>
                </div>

                <br/> 
             <div>  
                <div class="borderofbutton">
                 <div class="spaces">
                      <form  action = "<?php $_PHP_SELF ?>" method = "POST" class="box">
        
                    <p>Name Employee</p>
                    <input type="text" name="name_employee" id="name_employee" placeholder="Enter Name Employee "><br/><br/>
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
                    
                        $sql = "SELECT * FROM stuffs where name_employee='$_POST[name_employee]'";
                        
                        $result = mysqli_query($conn, $sql);
                        
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            echo" <center>";
                            echo"  <table style='width:100%;'class='table table-striped'>";
                            echo"   <tr>";
                            echo"  <th>Id Employee</th>";
                            echo"<th>Name Employee</th>"; 
                            echo"  <th>Gender</th>";
                            echo" <th>Address</th>";
                            echo" <th>Phone </th>";
                            echo" <th>Email</th>";
                            echo"   <th>Type Employee</th>";
                            echo"  <th>Date Start</th> ";
                            echo"  <th>Date End</th> ";
                            echo"   <tr>";
                            while($row = mysqli_fetch_array($result)) {
                                echo"<tr> <td>{$row['id_employee']}</td> 
                                          <td>{$row['name_employee']}</td>
                                          <td> {$row['gender_employee']} </td> 
                                          <td>{$row['address_employee']}</td>
                                          <td>{$row['phone_employee']}</td>
                                          <td>{$row['email_employee']}</td> 
                                         <td>{$row['type_employee']}</td>
                                         <td>{$row['date_start']}</td>
                                         <td>{$row['date_end']}</td>
                                          
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
                                   
<!-- <div class="row">
         <div class="col-sm-4" >
         
         <button type="button" class=" btn btn-info " data-toggle="collapse" data-target="#demo"  ><h4 id="show">Help</h4></button>
         <div id="demo" class="collapse"><br/>
            <p  id="hide" >Enter Employee name in field   and click (Search) to Search the information.<br/>If you want to close the help, click on the text.<p>
          
         </div>
         </div>
         </div> -->
         </div>
    </body>

</html>