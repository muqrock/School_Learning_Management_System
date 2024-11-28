<?php
session_start();
include "../db_conn.php";

$question_no="";
$question="";
$gambar="";
$opt1="";
$opt2="";
$opt3="";
$opt4="";
$answer="";
$count=0;
$ans="";

$queno=$_GET["questionno"];

if(isset($_SESSION["answer"][$queno]))
{
    $ans=$_SESSION["answer"][$queno];
}
$res=mysqli_query($conn,"select * from soalan where Tajuk = '$_SESSION[kuiz_subjek]' && no_soalan=$_GET[questionno]");
$count=mysqli_num_rows($res);

if($count==0){
    echo "over";
}else{
    while($row=mysqli_fetch_array($res)){
        $question_no=$row["no_soalan"];
        $question=$row["soalan"];
        $gambar=$row["gambar"];
        $opt1=$row["opt1"];
        $opt2=$row["opt2"];
        $opt3=$row["opt3"];
        $opt4=$row["opt4"];
    }
    ?>
<br>

<!-- DISPLAY GAMBAR -->
<center>
<?php
    if(strpos($gambar,'images/')!==false){?>
        <img src="<?php echo $gambar;?>" style="width:100%;height:auto;"><br><br>
        <?php
    }else{
        echo $gambar;
    }?>
</center>

    <table>
        <tr>
            <td style="font-weight:bold; font-size:18px; padding-left:5px" colspan="2">
            <?php echo "(".$question_no.") ".$question; ?>
            </td>
        </tr>
    </table>

    <table style="margin-left: 10px">
        <!-- PILIHAN JAWAPAN 1 -->
        <tr>
            <td>
                <input type="radio" name="r1" id="r1" value="<?php echo $opt1; ?>" onclick="radioclick(this.value,<?php echo $question_no?>)"
                <?php
                if($ans==$opt1){
                    echo "checked";
                } 
                ?>>
            </td>
            <!-- CHECK JIKA ADA GAMBAR -->
            <td style="padding-left: 10px">
                <?php
                if(strpos($opt1,'images/')!=false){
                    ?>
                    <img src="images/<?php echo $opt1; ?>" height="30" width="30">
                    <?php
                }
                else{
                    echo "A) " .$opt1;
                }
                ?>
            </td>
        </tr>

        <!-- PILIHAN JAWAPAN 2 -->
        <tr>
            <td>
                <input type="radio" name="r1" id="r1" value="<?php echo $opt2; ?>" onclick="radioclick(this.value,<?php echo $question_no?>)"
                <?php
                if($ans==$opt2){
                    echo "checked";
                } 
                ?>>
            </td>
            <!-- CHECK JIKA ADA GAMBAR -->
            <td style="padding-left: 10px">
                <?php
                if(strpos($opt2,'images/')!=false){
                    ?>
                    <img src="images/<?php echo $opt2; ?>" height="30" width="30">
                    <?php
                }
                else{
                    echo "B) " .$opt2;
                }
                ?>
            </td>
        </tr>

        <!-- PILIHAN JAWAPAN 3 -->
        <tr>
            <td>
                <input type="radio" name="r1" id="r1" value="<?php echo $opt3; ?>" onclick="radioclick(this.value,<?php echo $question_no?>)"
                <?php
                if($ans==$opt3){
                    echo "checked";
                } 
                ?>>
            </td>
            <!-- CHECK JIKA ADA GAMBAR -->
            <td style="padding-left: 10px">
                <?php
                if(strpos($opt3,'images/')!=false){
                    ?>
                    <img src="images/<?php echo $opt3; ?>" height="30" width="30">
                    <?php
                }
                else{
                    echo "C) " .$opt3;
                }
                ?>
            </td>
        </tr>

        <!-- PILIHAN JAWAPAN 4 -->
        <tr>
            <td>
                <input type="radio" name="r1" id="r1" value="<?php echo $opt4; ?>" onclick="radioclick(this.value,<?php echo $question_no?>)"
                <?php
                if($ans==$opt4){
                    echo "checked";
                } 
                ?>>
            </td>
            <!-- CHECK JIKA ADA GAMBAR -->
            <td style="padding-left: 10px">
                <?php
                if(strpos($opt4,'images/')!=false){
                    ?>
                    <img src="images/<?php echo $opt4; ?>" height="30" width="30">
                    <?php
                }
                else{
                    echo "D) " .$opt4;
                }
                ?>
            </td>
        </tr>
    </table>



    <?php

        }
?>