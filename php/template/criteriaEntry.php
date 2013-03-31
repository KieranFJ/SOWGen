<?php

@include('php/class.sqlHandler.userdb.php');

if (isset($_GET['Qual_ID']))
{
    $qualID = $_GET['Qual_ID'];

    $query = "SELECT * FROM qualifications WHERE Qual_ID = ".$qualID.";";

    $result = sqlHandler::getDB()->select($query);

    $query = "SELECT * FROM unit WHERE Qual_ID = ".$qualID.";";

    $resultUnits = sqlHandler::getDB()->select($query);
}
if (isset($_GET['Outcome_ID']))
{
    $query = "SELECT * FROM outcomes WHERE Unit_ID= ".$_GET['Unit_ID'].";";
    
    $resultOutcomes = sqlHandler::getDB()->select($query);
}

$query = "SELECT * FROM qualifications;";

$resultQuals = sqlHandler::getDB()->select($query);

?>
<div class="container">
    <div class="span6">
        <form action="criteriaentry.php" method="submit" class="form-horizontal">
            <fieldset>
                <legend>Qualification: <?php echo $result[0]['Qual_Name']; ?></legend>
                <div class="control-group">
                    <label class="control-label">Qual Name:</label>
                    <div class="controls">
                        <input type="hidden" name="Qual_ID" value="<?php echo $qualID ?>"></input>
                        <select name ="Qual_ID" class="input-xlarge" onchange="this.form.submit()">
                        <option value="" selected="selected" >--- Select Qual ---</option>
                        <?php
                        foreach ($resultQuals as $row)
                        {?>
                            <option value="<?php echo $row['Qual_ID']; ?>"><?php echo $row['Qual_Name']; ?></option> 
                        <?php
                        }?>
                    </select>
                    </div>
                </div>
                
            </fieldset>
        </form>
        <form action="criteriaentry.php" method="submit" class="form-horizontal">
            <fieldset>
                <legend>
                <?php 
                if (isset($_GET['Unit_ID']))
                {
                    $query = "SELECT * FROM unit WHERE Unit_ID = ".$_GET['Unit_ID'].";";

                    $resultUnit = sqlHandler::getDB()->select($query);

                    $query = "SELECT * FROM outcomes WHERE Unit_ID = ".$_GET['Unit_ID'].";";

                    $resultOutcomes = sqlHandler::getDB()->select($query);

                    echo "Unit: ".$resultUnit[0]['Unit_Name'];

                }
                else
                {
                    echo "Unit: Select a Unit";    
                }
                ?>
                </legend>
                <div class="control-group">
                    <label class="control-label">Unit:</label>
                    <div class="controls">
                        <input type="hidden" name="Qual_ID" value="<?php echo $qualID ?>"></input>
                        <select name="Unit_ID" class="input-xlarge" onchange="this.form.submit()">
                            <option value="" selected="selected" >--- Select Unit ---</option>
                                <?php
                                foreach ($resultUnits as $row)
                                {?>
                                    <option value="<?php echo $row['Unit_ID']; ?>"><?php echo $row['Unit_Name']; ?></option> 
                                <?php
                                }?>
                        </select>
                    </div>
                </div>
            </fieldset>
        </form> 
        <form action="criteriaentry.php" method="submit" class="form-horizontal">
            <fieldset>
                <legend>
                 <?php
                    if (isset($_GET['Outcome_ID']))
                    {
                        $query = "SELECT * FROM outcomes WHERE Outcome_ID = ".$_GET['Outcome_ID'].";";

                        $resultOutcome = sqlHandler::getDB()->select($query);

                        $query = "SELECT * FROM criteria WHERE Outcome_ID= ".$_GET['Outcome_ID'].";";

                        $resultCriteria = sqlHandler::getDB()->select($query);

                        echo "Outcome: ".$resultOutcome[0]['Outcome_Name'];
                    }
                    else
                    {
                        echo "Outcome: Select an Outcome";
                    }

                    $x = 0;
                    ?>
                </legend>
                <div class="control-group">
                    <label class="control-label">Unit:</label>
                    <div class="controls">
                        <input type="hidden" name="Qual_ID" value="<?php echo $qualID ?>"></input>
                        <input type="hidden" name="Unit_ID" value="<?php echo $_GET['Unit_ID']; ?>"></input>
                        <select name ="Outcome_ID" class="input-xlarge" onchange="this.form.submit()">
                            <option value="" selected="selected" >--- Select Outcome ---</option>
                            <?php
                            foreach ($resultOutcomes as $row)
                            {?>
                                <option value="<?php echo $row['Outcome_ID']; ?>"><?php echo $row['Outcome_Type']." ".$row['Outcome_Name']; ?></option> 
                            <?php
                            }?>
                        </select>
                    </div>
            </fieldset>
        </form>        
        <form action="php/criteriaSubmit.php" method="post" class="form-horizontal">
            <fieldset>
                <legend>New Outcome</legend>
                <div class="control-group">                
                    <label class="control-label">New Criteria Type</label>
                    <div class="controls">
                        <input type ="text" class="input-xlarge" name="Criteria_Type[]"></input>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">New Criteria Name</label>
                    <div class="controls">
                        <textarea class="input-xlarge" name="Criteria_Description[]"></textarea>
                    </div>
                </div>                
            </fieldset>
            <legend>Existing Criteria</legend>
            <?php
            foreach($resultCriteria as $row)
            {?> 
            <div class="form-horizontal">
                <fieldset>
                    <div class="control-group">                        
                        <label class="control-label">Criteria Type</label>
                        <div class="controls">
                            <input type ="text" class="input-xlarge" value="<?php echo $row['Criteria_Type']?>"name="Criteria_Type[]"></input>
                        </div>
                    </div>
                    <div class="control-group">                        
                        <label class="control-label">Criteria Name</label>
                        <div class="controls">
                            <textarea class="input-xlarge" name="Criteria_Description[]"><?php echo $row['Criteria_Description']?></textarea>
                        </div>
                    </div>
            </div>
            <?php }?>
            <div class="form-actions">
                <input type="hidden" name="Unit_ID" value="<?php echo $_GET['Unit_ID'];?>"></input>
                <input type="hidden" name="Qual_ID" value="<?php echo $_GET['Qual_ID']; ?>"></input>
                <input type="hidden" name="Outcome_ID" value="<?php echo $_GET['Outcome_ID']; ?>"></input>
                <button type="submit" value="Submit" class="btn btn-primary">Submit</button>
            </div>
        </form>        
    </div>
