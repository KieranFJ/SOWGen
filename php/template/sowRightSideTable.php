
        <table class="table-condensed">
            <thread>
                <tr>
                    <td class="tdright"><h3>Qualification</h3></td>
                </tr>
            </thread>
            <tr>
                <td class="tdright"><h4>Qual Name:</h4></td>
                <td class="tdleft"><?php echo $resultSelectedQual[0]['Qual_Name']?></td>
            </tr>
            <tr>
                <td class="tdright"><h4>Qual Code:</h4></td>
                <td class="tdleft"><?php echo $resultSelectedQual[0]['Qual_Code']?></td>
            </tr>
            <tr>
                <td class="tdright"><h4>Qual Level:</h4></td>
                <td class="tdleft"><?php echo $resultSelectedQual[0]['Qual_Level']?></td>
            </tr>
            <tr>
                <td class="tdright"><h4>Qual Length:</h4></td>
                <td class="tdleft"><?php echo $resultSelectedQual[0]['Qual_Length']?></td>
            </tr>
            <tr>
                <td class="tdright"><h4>Assess Date:</h4></td>
                <td class="tdleft"><?php echo $resultSelectedQual[0]['Assessment_Date']?></td>
            </tr>
            <tr>
                <td class="tdright"><h4>Asses Type:</h4></td>
                <td class="tdleft"><?php echo $resultSelectedQual[0]['Assessment_Type']?></td>
            </tr>
            <tr>
                <td class="tdright"><h4>Exam Board:</h4></td>
                <td class="tdleft"><?php echo $resultSelectedQual[0]['Exam_Board_ID']?></td>
            </tr>
            <thread>
                <tr>
                    <td class="tdright"><h3>Unit</h3></td>
                </tr>
            </thread>            
            <tr>
                <td class="tdright"><h4>Unit Name:</h4></td>
                <td class="tdleft"><?php echo $resultSelectedUnit[0]['Unit_Name']?></td>
            </tr>
            <tr>
                <td class="tdright"><h4>Unit ID:</h4></td>
                <td class="tdleft"><?php echo $resultSelectedUnit[0]['Unit_ID']?></td>
            </tr>
            <thread>
                <tr><td class="tdright"><h3>Outcomes</h3></td></tr>
            </thread>
            <?php
            foreach($resultOutcomes as $row)
            {
            ?>
            <tr>
                <td class="tdright"><h4><?php echo $row['Outcome_Type']; ?>:</h4></td>
                <td class="tdleft"><?php echo $row['Outcome_Name']; ?></td>
            </tr>
            <?php
            }?>
        </table>
    </div>
</div>