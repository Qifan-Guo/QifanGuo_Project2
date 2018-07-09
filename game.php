<?php
include 'function.php';


session_start();
echoshit();
	    $Board_Cell=array("Start","Chance","Peachtree","Raid Road 1","Henderson Rd","Go to Jail","Eletrical Bill","Ponce City Market",
		"Rail Road 2","Stone Mountain","Free Parkiing","Jimmy Carter",
		"Ashwood St","Tax","Rail Road 3","Jail","Parkview Walk",
		"Water Utility","Chest","Five Fork");

echo "Game Page";



$two;
function rollDice(){
	$dice=rand(1,6);
	return $dice;
	
}
?>
    <!doctype html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>Game Page</title>
        <link rel="stylesheet" href="board.css">
    </head>

    <body>




        <table class="board">
            <tr>
                <td class="topCell" name="1">
                	
                	<div class="ownership"></div>
                    <div class="item">Start</div>
                    <img src="start.jpg" alt="" style="width:200px; height:auto;">
                </td>
                <td class="topCell" name="2">
               	<?php 

               		if($two==true){
               			echo "<div style='height:100px; width:100px;' class='something'>";
               		}
               	?>
                    <div class="item">Chance</div>
                </td>
                <td class="topCell" name="3">
                	<div class="<?=$myHeaderClass?>" style="height: 100px;width:100px"></div>
                	<div class="<?=$myHeaderClass?>"></div>
                    <div class="item">Peachtree St</div>
                </td>
                <td class="topCell" name="4">
                	<div class="<?=$myHeaderClass?>" style="height: 100px;width:100px"></div>
                    <div class="item">Rail Road</div>
                </td>
                <td class="topCell" name="5">
                	<div class="<?=$myHeaderClass?>" style="height: 100px;width:100px"></div>
                    <div class="item">Henderson Rd</div>
                </td>
                <td class="topCell" name="6">
                    <div class="item">Go to Jail</div>
                </td>
            </tr>
            <tr>
                <td class="rightCell" name="7">
                    <div class="item">Five Fork</div>
                </td>
                <td colspan="4" class="CenterCell"></td>
                <td class="leftCell" name="20">
                    <div class="item">Eletrical Bill</div>
                </td>
            </tr>
            <tr>
                <td class="rightCell" name="8">
                    <div class="item">Chest</div>
                </td>
                <td colspan="4" class="CenterCell"></td>
                <td class="leftCell" name="19">
                    <div class="item">Ponce City Market</div>
                </td>
            </tr>
            <tr>
                <td class="rightCell" name="9">
                    <div class="item">Water Utility</div>
                </td>
                <td colspan="4" class="CenterCell"></td>
                <td class="leftCell" name="18">
                    <div class="item">Rail Road</div>
                </td>
            </tr>
            <tr>
                <td class="rightCell" name="10">
                    <div class="item">Parkview Walk</div>
                </td>
                <td colspan="4" class="CenterCell"></td>
                <td class="leftCell" name="17">
                    <div class="item">Stone Mountain</div>
                </td>
            </tr>
            <tr>
                <td class="bottomCell" name="16">
                    <div class="item">Jail</div>
                </td>
                <td class="bottomCell" name="15">
                    <div class="item">Raid Road</div>
                </td>
                <td class="bottomCell" name="14">
                    <div class="item">Tax</div>
                </td>
                <td class="bottomCell" name="13">
                    <div class="item">Ashwood St</div>
                </td>
                <td class="bottomCell" name="12">
                    <div class="item">Jimmy Carter</div>
                </td>
                <td class="bottomCell" name="11">
                    <div class="item">Free Parking</div>
                </td>
            </tr>
        </table>
        <div class="controlCenterLeft">
            <?php 


				if(isset($_POST['roll'])){
					$Ben_Term=false;
					$move1=rollDice();


				echo "<h2>Ben</h2>";
					echo '<p>You Have Rolled '.$move1.'</p>';
				$_SESSION['Ben_Position']+=$move1;
				if($_SESSION['Ben_Position']>20){
					$_SESSION['Ben_Position']-=20;
				}
				echo "You have landed in ".$Board_Cell[$_SESSION['Ben_Position']-1]."<br>Position:".$_SESSION['Ben_Position'];

				// $_SESSION['Ben_Position']=0;
				// $_SESSION['Joe_Position']=0;

				
				}
			
			?>
            <form method="POST">
                <input type="submit" value="Roll" name="roll">
            </form>
        </div>
        <div class="controlCenterRight">
            <?php 
			

				if(isset($_POST['roll2'])){
					
					$move2=rollDice();



					echo "<h2>Joe</h2>";
					echo '<p>You Have Rolled '.$move2.'</p>';
				$_SESSION['Joe_Position']+=$move2;
					if($_SESSION['Joe_Position']>20){
					$_SESSION['Joe_Position']-=20;
		
				}
				echo "You have landed in ".$Board_Cell[$_SESSION['Joe_Position']-1]."<br>Position:".$_SESSION['Joe_Position'];

				

				//$_SESSION['myPosition']=0;
				// echo $_SESSION['Joe_Position'];
				}
			
			?>
            <form method="POST">
                <input type="submit" value="Roll" name="roll2">
            </form>
        </div>

		<div class="Ben_scoreBoard">
			<table>
				<th style="width:180px;text-align: left">Property</th>
				<th style="width: 60px;text-align: left">Money</th>
			</table>			
		</div>
				<div class="Joe_scoreBoard">
			<table>
					<th style="width:180px;text-align: left">Property</th>
				<th style="width: 60px;text-align: left">Money</th>
			</table>			
		</div>


    </body>
		
    </html>