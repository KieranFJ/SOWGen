<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


    @include_once('/class.sqlHandler.userdb.php');
    
    class formLoader
    {
        public static function loadScheme()
        {
            $query = "SELECT Qual_ID, Qual_Name FROM qualifications;";
            
            $results = sqlHandler::getDB()->select($query);
            
            foreach($results as $out)
            {
                echo "<option value=\"".$out['Qual_ID']."\">".$out['Qual_Name']."</option>";
            }
        }
        
        public static function loadChild()
        {
            if ($_REQUEST)
            {
                $id = $_REQUEST['parent_id'];
                
                $query = "SELECT Unit_Name FROM unit WHERE Qual_ID = ".$id;
                
                $results = sqlHandler::getDB()->select($query);
                
                if(mysql_num_rows($results) > 0)
                    
                {
                    echo "<select name=\"sub_catagory\" class=\"parent\">
                        <option value=\" selected=\"selected\">-- Sub --</option>";
                        
                        while ($rows = $results)
                        {
                            echo "<option value=\"".$rows['Unit_Name'].">".$rows['Unit_Name']."</option>";
                        
                        }
                    echo "</select>";

                }
                else
                {
                    echo '<label>No Record Found</label>';
                
                }
            }
        }
    }
?>
