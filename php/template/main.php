<?php
@include ('php/class.sqlHandler.userdb.php');
?>
http://www.99points.info/2010/12/n-level-dynamic-loading-of-dropdowns-using-ajax-and-php/
    <div class="container">      
        <div id="show_sub_categories">            
                <select name="search_category" class="parent">
                <option value="" selected="selected">-- Categories --</option>
                <?php
                $query = "select Qual_Name , Qual_ID from qualifications";		

                $results = sqlHandler::getDB()->select($query);

                foreach ($results as $rows)
                {?>
                        <option value="qualifications, <?php echo $rows['Qual_ID'];?>"><?php echo $rows['Qual_Name'];?></option>
                <?php
                }?>
                </select>
           
	</div>
            <div id="show_parent_info" class="info">
               
            </div>
            
    </div>


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="js/bootstrap.min.js"></script>

