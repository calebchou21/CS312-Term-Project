<div id = "center"><?php echo Asset::img("grayLogo.png", array('id'=>'logo')) ?></div>
<h1>JCC Incorporated</h1>
<h2>An awesome company</h2>
<br><br><br>
<?php
echo '<table id="table1">';
        for($i=0; $i < $colors; $i++){
            //Build first column 
            echo "<tr>";
            echo "<td>";
            if(isset($_POST['Color'.$i])) echo $_POST['Color'.$i];
            echo "</td>";
            $j = $i +1;
            echo "<td>";
            echo "<p>";
            if(isset($_POST['text'.$j])) echo $_POST['text'.$j];
            echo "</p>";
            echo "</td>";
            echo "</tr>";
        }
echo '</table>';
    
echo '<table id="table2">';
    $letter = 'A';
    $number = 1;

    for($i=0; $i <= $rowCols; $i++){
        echo '<tr>';
        
        for($j=0; $j <= $rowCols; $j++){
            echo '<td>';
            if($i == 0 && $j==0){continue;}
            if($i==0){echo '<p>'; echo $letter++; echo '</p>';} 
            if($j==0){echo '<p>'; echo $number++; echo '</p>';}
            echo '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
    ?>
    