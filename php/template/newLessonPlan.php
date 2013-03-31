<?php

@include('php/class.sqlHandler.userdb.php');

if(isset($_GET['SOW_ID']))
{
    $query = "SELECT * FROM schemeofwork WHERE SOW_ID = '".$_GET['SOW_ID']."';";
    
    $resultSOW = sqlHandler::getDB()->select($query);
    
    $query = "SELECT * FROM qualifications WHERE Qual_ID = '".$resultSOW[0]['Qual_ID']."';";
    
    $resultSelectedQual = sqlHandler::getDB()->select($query);
    
    $query = "SELECT * FROM unit WHERE Unit_ID= '".$resultSOW[0]['Unit_ID']."';";
    
    $resultSelectedUnit = sqlHandler::getDB()->select($query);
    
    $query = "SELECT * FROM outcomes WHERE Unit_ID = '".$resultSOW[0]['Unit_ID']."';";
    
    $resultOutcomes = sqlHandler::getDB()->select($query);
}

$query = "SELECT SOW_ID, SOW_Name, SOW_Create_Date FROM schemeofwork;";

$resultSOWList = sqlHandler::getDB()->select($query);

$query = "SELECT * FROM lessonplans WHERE SOW_ID = '".$_GET['SOW_ID']."';";

$resultLessonPlans = sqlHandler::getDB()->select($query);

if($resultSelectedQual[0]['Qual_Length'] > count($resultLessonPlans))
{
    $lengthOut = $resultSelectedQual[0]['Qual_Length'] - count($resultLessonPlans);
}
else
{
    $lengthOut = 0;
}

?>

<div class="container">
    <div class="span6">        
        <form action="newLessonPlan.php" method="get" class="form-horizontal">
            <fieldset>
                <legend>Select Scheme of Work</legend>
                <div class="control-group">
                    <label class="control-label">Scheme of Work</label>
                    <div class="controls">
                        <select name="SOW_ID" class="input-xlarge" onchange="this.form.submit()">
                            <option value="" selected="selected">Select Scheme of Work</option>
                            <?php 
                            foreach($resultSOWList as $row)
                            {?>
                            <option value="<?php echo $row['SOW_ID']; ?>">
                                <?php echo $row['SOW_Name'].',  '.$row['SOW_Create_Date']; ?></option>
                            <?php                            
                            }
                            ?> 
                        </select>
                    </div>
                </div>
            </fieldset>
        </form>
        <?php if ($_GET['SOW_ID'])
        {?>
        <legend><?php echo $resultSOW[0]['SOW_Name']; ?>SOW</br> Created: <?php echo $resultSOW[0]['SOW_Create_Date']; ?> </legend>  
          <a href="printSOW?SOW_ID=<?php echo $_GET['SOW_ID']; ?>" class="btn btn-success">Print SOW</a><p></p>
        <?php
        }?>        
        
        <legend>You have <?php echo $lengthOut; ?> lesson plans to create</legend>
        <p><a href="editPlan.php?SOW_ID=<?php echo $_GET['SOW_ID']; ?>" class="btn btn-primary">Create New Plan</a></p>
        
        <table class="table table-striped">
            <thread>
                <tr>
                    <td><h4>Existing Plans</h4></td><td></td><td></td>
                </tr>
            </thread>
            <?php
            foreach($resultLessonPlans as $row)
            {?>
            <tr>
                <td><?php echo $row['LP_Date'] ?></td>
                <td><a class ="btn btn-mini" href="editPlan.php?SOW_ID=<?php 
                    echo $_GET['SOW_ID']; ?>&LP_ID=<?php 
                    echo $row['LP_ID'];?>">Edit</a></td>
                <td><a class="btn btn-mini" href="php/printLessonPlan.php?SOW_ID=<?php 
                    echo $_GET['SOW_ID']; ?>&LP_ID=<?php
                    echo $row['LP_ID']; ?>">Print</a></td>
            </tr>
            <?php
            }?>
        </table>
    </div>

<div class="span5">
        <table class="table-condensed">
            <thread>
                <tr>
                    <td class="tdright"><h3>SOW Details</h3></td>
                </tr>
            </thread>
            <tr>
                <td class="tdright"><h4>Name:</h4></td>
                <td class="tdleft"><?php echo $resultSOW[0]['SOW_Name']; ?></td>
            </tr>
            <tr>
                <td class="tdright"><h4>Campus:</h4></td>
                <td class="tdleft"><?php echo $resultSOW[0]['SOW_Campus']; ?></td>
            </tr>
            <tr>
                <td class="tdright"><h4>Room Type:</h4></td>
                <td class="tdleft"><?php echo $resultSOW[0]['SOW_Room_Type']; ?></td>
            </tr>
            <tr>
                <td class="tdright"><h4>Room Number:</h4></td>
                <td class="tdleft"><?php echo $resultSOW[0]['SOW_Room_Number']; ?></td>
            </tr>
            <tr>
                <td class="tdright"><h4>Tutor Name:</h4></td>
                <td class="tdleft"><?php echo $resultSOW[0]['SOW_Tutor']; ?></td>
            </tr>
            <tr>
                <td class="tdright"><h4>TA:</h4></td>
                <td class="tdleft"><?php echo $resultSOW[0]['SOW_TA']; ?></td>
            </tr>
            <tr>
                <td class="tdright"><h4>Course Leader:</h4></td>
                <td class="tdleft"><?php echo $resultSOW[0]['SOW_Course_Leader']; ?></td>
            </tr>
            <tr>
                <td class="tdright"><h4>IV Name:</h4></td>
                <td class="tdleft"><?php echo $resultSOW[0]['SOW_IV_Name']; ?></td>
            </tr>
            <tr>
                <td class="tdright"><h4>Class Size:</h4></td>
                <td class="tdleft"><?php echo $resultSOW[0]['SOW_Class_Size']; ?></td>
            </tr>
        </table>

