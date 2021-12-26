<html>

<head>
        <?php
        include("style.php");
        ini_set('mysql.connect_timeout',300);
        ini_set('default_socket_timeout',300);
        ?>
          
</head>
    <body>

    <div class="row">
         <div class="col-sm-4" >
         
         <button type="button" class=" btn btn-info " data-toggle="collapse" data-target="#demo"  ><h4 id="show">Help</h4></button>
         <div id="demo" class="collapse"><br/>
            <p  id="hide" >Enter patient name in field   and click (Search) to Search the information.<br/>If you want to close the help, click on the text.<p>
          
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
                        <h1>Search Information Of X_Ray </h1>
                    </i>
        </center>
                </div>

                <br/> 
             <div>  
                <div class="borderofbutton">
                 <div class="spaces">
                      <form  action = "<?php $_PHP_SELF ?>" method = "POST" class="box">
        
                    <p>Name patient</p>
                    <input type="text" name="name_patient" id="name_patient" placeholder="Enter Name "><br/><br/>
                    <div><button type="submith" value="Search" name="Search"  class="btn btn-primary">Search</button></div>
                    </div>      
                    </div>  
                    <br/><br/><br/>
                    <?php
                       
                      
                       
                            function displayimage()
                            {
                               
                            $servername = "localhost";
                            $username = "root";
                            $password = "12345";
                            $dbname = "my_project";

                            // Create connection
                            $conn = mysqli_connect( $servername, $username,$password);

                            mysqli_select_db($conn,"my_project");

                            $sql ="SELECT id_patient,name_patient,id_employee,name_employee,the_picture_type,date_picture,
                                        image1,image2,image3 from radiology where name_patient='$_POST[name_patient]'";
                                $result=mysqli_query($conn,$sql);
                                if (mysqli_num_rows($result) > 0) {
                                echo" <center>";
                                echo"  <table style='width:100%;'class='table table-striped'>";
                                echo"   <tr>";
                                echo" <th>Id Patient</th>";
                                echo" <th>Name Patient</th>"; 
                                echo" <th>Id Employee</th>";
                                echo" <th>Name Employee</th>";
                                echo"<th>The picture type</th> ";
                                echo" <th>Date picture</th>";
                                echo" <th>Image1</th>";
                                echo" <th>Image2</th>";
                                echo" <th>Image3</th>";
                              
                                echo"   <tr>";
                                while ($row= mysqli_fetch_array( $result)) {
                                  
                                    echo"<tr> <td>{$row['id_patient']}</td> 
                                          <td>{$row['name_patient']}</td>
                                          <td> {$row['id_employee']} </td> 
                                          <td>{$row['name_employee']}</td>
                                         <td>{$row['the_picture_type']}</td>
                                         <td>{$row['date_picture']}</td>
                                       
                                         <td><img  height='50' width='50' src='data:image;base64,".$row['image1']."'/></td>
                                         <td><img  height='50' width='50' src='data:image;base64,".$row['image2']."'/></td>
                                         <td><img  height='50' width='50' src='data:image;base64,".$row['image3']."'/></td>
                                        
                                     </tr>";
                                     
                                    } 
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
                                    
                                    $conn->close();
                                }
                                
                            ?>
                            
                          
                                <?php 
                                 if(isset($_POST["Search"])){
                                    displayimage();
                                            
                                 }
                                       
                                        ?>   
                                          <table/>
                            <center>
                            <hr> 
                </form>
                
             </div> 
                <br/> <br/>
                <?php
                  include("footer.php");
                  ?>
                                                         

         </div>
    </body>

</html>