<?php

    @include_once ('/class.sqlHandler.userdb.php');
    
    if ($_REQUEST)
    {
        $values = explode(', ', $_REQUEST['parent_id']);
                
        if ($values[0] == "qualifications")
        {
            $query = "SELECT * FROM qualifications WHERE Qual_ID = ".$values[1].";";
            $values[0] = "qualification";
            
            $results = sqlHandler::getDB()->select($query);
        
            if(isset($results))
            {?>
                
                    <p>Qual Code:  <?php echo $results[0]['Qual_Code']; ?></p>
                    <p>Qual Level:  <?php echo $results[0]['Qual_Level']; ?></p>
                    <p>Qual Length:  <?php echo $results[0]['Qual_Length']; ?></p>
                    <p>Qual Ass_Date:  <?php echo $results[0]['Assessment_Date']; ?></p>
                    <p>Qual Ass_Type:  <?php echo $results[0]['Assessment_Type']; ?></p>
                
                    
                
            <?php	
        
            }
            else{echo '<label style="padding:7px;float:left; font-size:12px;">No Record Found !</label>';}
            
        }
        
        elseif ($values[0] == "unit")
        {
            $query = "SELECT * FROM unit WHERE Unit_ID = ".$values[1].";";
            $values[0] = "outcomes";
            
            $results = sqlHandler::getDB()->select($query);
            
            if(isset($results))
            {?>
                
                    <p>Unit Code: <?php echo $results[0]['Unit_Code']; ?></p>
                    <p>Unit Credit Value: <?php echo $results[0]['Unit_Credit_Value']; ?></p>
                
            <?php	
        
            }
            else{echo '<label style="padding:7px;float:left; font-size:12px;">No Record Found !</label>';}
        }
        elseif ($values[0] == "outcomes")
        {
            
            $query = "SELECT * FROM outcomes WHERE Outcome_ID = ".$values[1].";";
            $values[0] = "criteria";
            
            $results = sqlHandler::getDB()->select($query);
            
            if(isset($results))
            {?>
               
            <?php	
        
            }
            else{echo '<label style="padding:7px;float:left; font-size:12px;">No Record Found !</label>';}
            
        }
        else
        {
            echo '<label style="padding:7px;float:left; font-size:12px;">No Record Found !</label>';
        }
    }
?>
