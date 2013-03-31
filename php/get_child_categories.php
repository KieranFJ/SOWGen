<?php

    @include_once ('/class.sqlHandler.userdb.php');
    
    if ($_REQUEST)
    {

        $values = explode(', ', $_REQUEST['parent_id']);
        
        if ($values[0] == "qualifications")
        {
            $query = "SELECT Unit_Name, Unit_ID FROM unit WHERE Qual_ID = ".$values[1].";";
            $values[0] = "unit";

            $results = sqlHandler::getDB()->select($query);

            if(isset($results))
            {?>
                
                    <select name="sub_category" class="parent">
                    <option value="" selected="selected">-- Sub Category --</option>
                    <?php
                    foreach ($results as $rows)
                    {?>
                            <option value="<?php echo $values[0].", ".$rows['Unit_ID'];?>"><?php echo $rows['Unit_Name'];?></option>
                    <?php
                    }?>
                    </select>
                
            <?php	

            }
            else{echo '<label style="padding:7px;float:left; font-size:12px;">No Record Found !</label>';}

        }

        elseif ($values[0] == "unit")
        {
            $query = "SELECT Outcome_ID, Outcome_Name FROM outcomes WHERE Unit_ID = ".$values[1].";";
            $values[0] = "outcomes";

            $results = sqlHandler::getDB()->select($query);

            if(isset($results))
            {?>                
                    <select name="sub_category" class="parent">
                    <option value="" selected="selected">-- Sub Category --</option>
                    <?php
                    foreach ($results as $rows)
                    {?>
                            <option value="<?php echo $values[0].", ".$rows['Outcome_ID'];?>"><?php echo $rows['Outcome_Name'];?></option>
                    <?php
                    }?>
                    </select>
                </div
            <?php	

            }
            else{echo '<label style="padding:7px;float:left; font-size:12px;">No Record Found !</label>';}
        }
        elseif ($values[0] == "outcomes")
        {

            $query = "SELECT Criteria_ID, Criteria_Description FROM criteria WHERE Outcome_ID = ".$values[1].";";
            $values[0] = "criteria";

            $results = sqlHandler::getDB()->select($query);

            if(isset($results))
            {?>
                
                    <select name="sub_category" class="parent">
                    <option value="" selected="selected">-- Sub Category --</option>
                    <?php
                    foreach ($results as $rows)
                    {?>
                            <option value="<?php echo $values[0].", ".$rows['Criteria_ID'] ;?>"><?php echo $rows['Criteria_Description'];?></option>
                    <?php
                    }?>
                    </select>
                
            <?php	

            }
            else{echo '<label style="padding:7px;float:left; font-size:12px;">No Record Found !</label>';} 
            
        }
        else
        {
            //echo '<label style="padding:7px;float:left; font-size:12px;">No Record Found !</label>';
        }
    }
?>
