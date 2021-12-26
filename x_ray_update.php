
<html id="top">
    <head>
    <?php
   include("style.php");
   ini_set('mysql.connect_timeout',300);
    ini_set('default_socket_timeout',300);

   ?>
 
       <?php

      
            
            $name1=" ";$image1=" "; $name2=" ";$image2=" "; $name3=" ";$image3=" ";

            if(isset($_POST["Update"])){
               if ((getimagesize($_FILES['image1']['tmp_name']) == FALSE) &&
               ( getimagesize($_FILES['image2']['tmp_name']) == FALSE)
               &&(getimagesize($_FILES['image3']['tmp_name']) == FALSE ) )
               {
                   echo"pleas select image.";
               }
               else{
                   if (!empty($_POST["name_patient"])&& isset($_POST["name_patient"])) {
                    
                   $image1=addslashes($_FILES['image1']['tmp_name']);
                   $name1=addslashes($_FILES['image1']['name']);
                   $image1=file_get_contents($image1);
                   $image1=base64_encode($image1);
                   $image2=addslashes($_FILES['image2']['tmp_name']);
                   $name2=addslashes($_FILES['image2']['name']);
                   $image2=file_get_contents($image2);
                   $image2=base64_encode($image2);
                   $image3=addslashes($_FILES['image3']['tmp_name']);
                   $name3=addslashes($_FILES['image3']['name']);
                   $image3=file_get_contents($image3);
                   $image3=base64_encode($image3);
         
                                                     
                    
                   saveimage($name1,$image1,$name2,$image2,$name3,$image3);
    
                                
                            }else {
                            $error_name_patient="Please, Enter the name of patient";
    
                            }
                        }
            }
            function saveimage($name1,$image1,$name2,$image2,$name3,$image3)
                {
                  
                             $servername = "localhost";
                             $username = "root";
                             $password = "12345";
                             $dbname = "my_project";
                                        
                             // Create connection
                             $conn = mysqli_connect( $servername, $username,$password);
                                        
                             mysqli_select_db($conn,"my_project");
                                                   
                            $sql = "UPDATE radiology SET id_employee='$_POST[id_employee]',name_employee='$_POST[name_employee]',
                                    the_picture_type='$_POST[the_picture_type]',date_picture='$_POST[date_picture]',image1='$image1',
                                    name1='$name1',image2='$image2',name2='$name2',image3='$image3',name3='$name3' 
                                    where name_patient='$_POST[name_patient]'";

                                                    
                                                        $result=mysqli_query($conn,$sql);
                                                    if ($result) {
                                                        echo" <div class='container'>";
                                                        echo"<div class='alert alert-success alert-dismissible'>";
                                                        echo" <button type='button' class='close' data-dismiss='alert'>&times;</button>";
                                                        echo"<strong>Success!</strong> ";
                                                        echo"The update process completed successfully.";
                                                        echo"</div>";
                                                        echo"</div>";
                                                     
                                                    } else {
                                                        echo" <div class='container'>";
                                                        echo"<div class='alert alert-danger'  alert-dismissible'>";
                                                        echo" <button type='button' class='close' data-dismiss='alert'>&times;</button>";
                                                        echo"<strong>Error!</strong> ";
                                                        echo mysqli_error($conn) ;
                                                        echo"</div>";
                                                        echo"</div>";
                                                                                                        
                                                    }
                                                   
                                                    $conn->close();
                                                  
                   
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
                <h1>Update Information Of X_Ray </h1>
            </i>
   </center>
         </div>
         <br/><br/> 
        
          
        <form action = "<?php $_PHP_SELF ?>" method = "POST"  enctype="multipart/form-data" class="box"> 
            <div class="container">
               <div class="row">
                  <div class="col-sm-10">
                        <label style='font-size:26px;'>selecter :</label>
                        <input type = 'text' name ='search_name' id = 'search_name' placeholder="Search here"/>
                           <input type = "submit" value ="search" name = "search" class=" btn btn-info "/>
                      <br/><br/> 
            </div> 
               </div> 
                  </div>                  


                  <?php
                                 if (isset($_POST["search"])) {
                                 
                                 
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
                                // echo"122";
                                 $sql = "SELECT * FROM  radiology where name_patient='$_POST[search_name]' limit 1";
                                 $result = mysqli_query($conn, $sql);
                                 
                                 // echo"1";
                                 
                                 if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    // echo"1";
                                    while($row = mysqli_fetch_assoc($result)) {
                                    
                                          
                                    
            ?>   

                <div style="float:left;"  class="borderofbutton" >
                     <div class="spaces_of_update">
                     
           
                     <p>Patient Id</p>      
                           <input type="text" name="id_patient" id="id_patient" placeholder="Enter id_patient" value="<?php echo $row["id_patient"];?>" >
                          
                     <p>Patient name</p>
                           <input type="text" name="name_patient" id="name_patient" placeholder="Enter Name " value="<?php echo $row["name_patient"];?>">
                        
                     <p>Employee Id</p>
                           <input type="text" name="id_employee" id="id_employee" placeholder="Enter Id of" value="<?php echo $row["id_employee"];?>">
                   
                     <p>Employee Name</p>
                        <input type="text" name="name_employee"  id="name_employee" placeholder="Enter Employee name " value="<?php echo $row["name_employee"];?>">
                  
                     <p>The picture type</p>  
                        <input type="text" name="the_picture_type" id="the_picture_type" placeholder="Enter Next Treatment " value="<?php echo $row["the_picture_type"];?>">
                        <br/><br/>
                     </div>              
               </div>

               <div style="float:right;" class="borderofbutton">
                        <div class="spaces_of_update">
                        <p>Date of picture</p>
                              <input type="text" name="date_picture" id="date_picture" placeholder="Enter next visit " value="<?php echo $row["date_picture"];?>">
                              <br/>
                                 <br/>
                           <p>The Picture 1</p>  
                                    <input type="file" name="image1" id="image1" placeholder="Enter the picture "value="<?php echo $row["image1"];?>">
                                    <br/> 
                           <p>The Picture 2</p>
                                  <input type="file" name="image2" id="image2" placeholder="Enter the picture "value="<?php echo $row["image2"];?>">
                                  <br/>
                           <p>The Picture 3</p>
                                 
                                 <input type="file" name="image3" id="image3" placeholder="Enter the picture "value="<?php echo $row["image3"];?>">
                                
                                
                                      
                                      
                        </div>                
                                       
               </div>

                        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                        <?php 
                        // }else {
                        //    echo "error 1";
                        // }  
                     //echo"13";
               
                              }
                           }
                                 mysqli_close($conn);
                              }
                              else {
                               echo" <div class='container' >";
                               echo"<div class='alert alert-success alert-dismissible' >";
                               echo" <button type='button' class='close' data-dismiss='alert' >&times;</button>";
                               echo"<strong >Hello!</strong> ";
                               echo"please enter patient name in search here.";
                               echo"</div>";
                               echo"</div>";
                                          }
               ?>
                        <center>
                             
                              <input type="submit" value="Update" name="Update"   class="boxinsert"/>  
                        </center>
                 </form>
               </div>
              
               <?php
                  include("footer.php");
                  ?>

    </body>
</html>
