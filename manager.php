
<html>

<?php
      session_start();
            if (isset($_SESSION['user_name'])) {
                  # code...
            }
            else {
                  header("Location : Home_page.php");
            }
            include("style.php");
?>
    <body>
       <div>
      
            <center>
                  <i>
                  <h1 class="theamOfHeader">E-orthodontic center management system</h1>
                  </i>
            </center>
            <div>
                  <center>
                  <i>
                  <h1 class="theamOfNameOfPages">Manager</h1>
                  </i>
                 </center>
            </div>
            <div  class="borderofbutton">
            <div class="spaces">
            <center>
                        <input type="button" value="Stuff"  style="float: left;" onclick="window.location.href='stuff_info.php'"  class="MyButton"/> 
                        <input type="button" value="Admin" onclick="window.location.href='manager_info.php'"  class="MyButton"/>
                        <input type="button" value="doctor"  style="float:right; " onclick="window.location.href='doctor_info.php'"  class="MyButton"/>
                        <br/><br/><br/>
                       
                        <input type="button" value="logout"   onclick="window.location.href='log_in_manager.php'"  class="MyButton"/>
                        <br/><br/><br/>
            </center> 

            </div>
            

      </div>
      
      </div>




      <?php
                  include("footer.php");
                  ?>
      </body>     
</html>