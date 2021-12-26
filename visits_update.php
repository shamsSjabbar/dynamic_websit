
<html id="top">
    <head>
    <?php
   include("style.php");
   ini_set('mysql.connect_timeout',300);
    ini_set('default_socket_timeout',300);

   ?>
 
       <?php

$error_name_dr="";
$remainder;
$error_of_remaining_amount="";
$the_remaining_amount;
$no_use_materials;
            $name1=" ";$image1=" "; $name2=" ";$image2=" "; $name3=" ";$image3=" ";

            if(isset($_POST["Update"])){
            
            
                   if (!empty($_POST["name_patient"])&& isset($_POST["name_patient"])) {
                    if (!empty($_POST["name_dr"])&& isset($_POST["name_dr"])) {
                  
         
                                                     
                    
                   saveimage();
                    }else {
                     $error_name_dr="Please, Enter the name of doctor";
                     }
                                
                            }else {
                            $error_name_patient="Please, Enter the name of patient";
    
                            }
                        
            }
            function saveimage()
                {
                  
                             $servername = "localhost";
                             $username = "root";
                             $password = "12345";
                             $dbname = "my_project";
                                        
                             // Create connection
                             $conn = mysqli_connect( $servername, $username,$password);
                                        
                             mysqli_select_db($conn,"my_project");
                                $sqlN="SELECT the_remaining_amount from materials WHERE name_material='$_POST[name_material]'" ;
                                 $resultN = mysqli_query($conn, $sqlN);
                                 if (mysqli_num_rows($resultN) > 0) {
                                               //    echo"is found";  
                                    while($rowN = mysqli_fetch_array($resultN)) {
                                       $the_remaining_amount=$rowN['the_remaining_amount'];
                                                     
                                                   }    
                                                }   
                                             if($the_remaining_amount < $_POST['no_use_materials'] )   { 
                                                $no_use_materials=0;
                                                 echo" <div class='container'>";
                                                 echo"<div class='alert alert-danger'  alert-dismissible'>";
                                                 echo" <button type='button' class='close' data-dismiss='alert'>&times;</button>";
                                                 echo"<strong>The quantity of the required material is not available with us only,the remanining are : </strong> ". $the_remaining_amount." items";
                                                 echo mysqli_error($conn) ;
                                                 echo"</div>";
                                                 echo"</div>";
                                                
                                             
                                             } else {
                                                $no_use_materials=$_POST['no_use_materials'];
                                               
                                                     }
                            $sql = "UPDATE visiter SET id_dr='$_POST[id_dr]',name_dr='$_POST[name_dr]',date_first_treatment='$_POST[date_first_treatment]',
                                    next_visiter='$_POST[next_visiter]',diagnosis='$_POST[diagnosis]',no_of_visit='$_POST[no_of_visit]',id_material='$_POST[id_material]',
                                    name_material='$_POST[name_material]', no_use_materials='$no_use_materials'
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
                <h1>Update Information Of Visiter </h1>
            </i>
   </center>
         </div>
         <br/><br/> 
        
          
        <form action = "<?php $_PHP_SELF ?>" method = "POST"  enctype="multipart/form-data" class="box"> 
            <div class="container">
               <div class="row">
                  <div class="col-sm-10">
                        <label style='font-size:26px;'>selecter :</label>
                        <input type = 'text' name ='search_name' id = 'search_name' placeholder="Search name patient"/>
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
                                 $sql = "SELECT * FROM visiter where name_patient='$_POST[search_name]' limit 1";
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
                           <input type="text" name="id_patient" id="id_patient" placeholder="Enter id_patient"   value="<?php echo $row["id_patient"];?>">
                        
                     <p>Patient name</p>
                           <input type="text" name="name_patient" id="name_patient" placeholder="Enter Name "  value="<?php echo $row["name_patient"];?>">
                         
                     <p>Doctor Id</p>
                           <input type="text" name="id_dr" id="id_dr" placeholder="Enter Id of doctor"  value="<?php echo $row["id_dr"];?>">
                          
                     <p>Doctor Name</p>
                        <input type="text" name="name_dr"  id="name_dr" placeholder="Enter Doctor name "  value="<?php echo $row["name_dr"];?>">
                       
                     <p>Treatment Began</p>  
                        <input type="text" name="date_first_treatment" id="date_first_treatment" placeholder="Enter Treatment Began " value="<?php echo $row["date_first_treatment"];?>"> 
                      
                     <p>Next visit</p>
                          <input type="text" name="next_visiter" id="next_visiter" placeholder="Enter next visit "  value="<?php echo $row["next_visiter"];?>">
                     
                      
                     </div>              
               </div>

               <div style="float:right;" class="borderofbutton">
                        <div class="spaces_of_update">
                             
                              
                      <p>Diagnosis</p>
                           <input type="text" name="diagnosis" id="diagnosis" placeholder="Enter Diagnosis " value="<?php echo $row["diagnosis"];?>">
                               
                           <p>Number of visit</p>
                                 
                                 <input type="text" name="no_of_visit" id="no_of_visit" placeholder="Enter Namber of visit " value="<?php echo $row["no_of_visit"];?>"> 
                           <p>id material</p>
                                 
                                 <input type="text" name="id_material" id="id_material" placeholder="Enter id material " value="<?php echo $row["id_material"];?>"> 
                           <p>Name material</p>
                                 
                                <input type="text" name="name_material" id="name_material" placeholder="Enter name material " value="<?php echo $row["name_material"];?>"> 
                                 <p>Number of use material</p>
                                 
                                 <input type="text" name="no_use_materials" id="no_use_materials" placeholder="Enter Namber of material " value="<?php echo $row["no_use_materials"];?>"> 
                               <?php echo $error_of_remaining_amount;?>
                                  <br/><br/><br/><br/> 
                                      
                                      
                        </div>                
                                       
               </div>

                        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
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
