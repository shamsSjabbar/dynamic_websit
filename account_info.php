
<html>
    <head>
    <?php
   include("style.php");
  

   ?>
      
    <body>
    <div class="row">
         <div class="col-sm-4">
         <button type="button" class=" btn btn-info " data-toggle="collapse" data-target="#demo"><h4 id="show">Help</h4></button>
         <div id="demo" class="collapse"><br/>
            <p id="hide">1.if you need add new account click  on (Add).<br/>
                        2.if you need update on old accounts click  on (Update).<br/>
                        3.if you need remove any  account click (Remove).<br/>
                        4.if you need search any account click (Search).<br/>
                        5.if you end from job  click (Log out).<br/>
                        6.If you want to close the help, click on the text.
            <p>
            
         </div>
         </div>
         </div>
        <div>
          <center>
              <i>
                <h1 class="theamOfHeader">E-orthodontic center management system</h1>
              </i>
         </center>
       </div>
       <div>
       <center>
         <i>
          <h1 class="theamOfNameOfPages">Account Information</h1>
         </i>
       </center> 
       </div>
  
        <div  class="borderofbutton">
           <div class="spaces">
              <center>
                   <input type="button" value="Add"  style="float: left;" onclick="window.location.href='account_add.php'"  class="MyButton"/>
                   <input type="button" value="Update"    onclick="window.location.href='account_update.php'"  class="MyButton"/> 
                   <input type="button" value="Remove" style="float:right;"onclick="window.location.href='account_remove.php'"  class="MyButton"/>
                   <br/><br/><br/>
                   <input type="button" value="Search"  style="float: left;" onclick="window.location.href='account_search.php'"  class="MyButton"/>
                   <input type="button" value="Log out" style="float:right;" onclick="window.location.href='adminstative.php'"  class="MyButton"/>
             </center> 
            </div>
       </div>
       
         </div>
         <?php
                  include("footer.php");
                  ?>

    </body>

</html