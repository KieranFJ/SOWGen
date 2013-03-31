    <div class="span5">
        <table>          
            <tr>
                <td class="tdright"><h4>Code:</h4></td><td class="tdleft"><?php echo $result[0]['Qual_Code']; ?></td>
            </tr>
            <tr>
                <td class="tdright"><h4>Level:</h4></td><td class="tdleft"><?php echo $result[0]['Qual_Level']; ?></td>
            </tr>  
            <tr>
                <td class="tdright"><h4>Weeks:</h4></td><td class="tdleft"><?php echo $result[0]['Qual_Length']; ?></td>
            </tr>   
            <tr>
                <td class="tdright"><h4>Exam Board:</h4></td><td class="tdleft"><?php echo $result[0]['Exam_Board_ID']; ?></td>
            </tr>  
            <tr>
                <td class="tdright"><h4>Assessment Date:</h4></td><td class="tdleft"><?php echo $result[0]['Assessment_Date']; ?></td>
            </tr>   
            <tr>
                <td class="tdright"><h4>Assessment Type:</h4></td><td class="tdleft"><?php echo $result[0]['Assessment_Type']; ?></td>
            </tr>
            <?php
            foreach ($resultUnit as $row)
            {?>
                <tr>
                    <td class="tdright"><h4><?php echo $row['Unit_Code']; ?>:</h4></td><td class="tdleft"><?php echo $row['Unit_Name']; ?></td>
                </tr><?php
            }?>
            
        </table>
    </div>
</div>