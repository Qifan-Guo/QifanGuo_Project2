<?php
include 'function.php';


session_start();
//session_unset(); 


echo "Game Page";


$Ben_Properties=array();
function rollDice(){
	$dice=rand(1,6);
	return $dice;
	
}

$Board_Cell=array("Start","Chance","Peachtree","Raid Road 1","Henderson Rd","Go to Jail","Eletrical Bill","Ponce City Market",
		"Rail Road 2","Stone Mountain","Free Parkiing","Jimmy Carter",
		"Ashwood St","Tax","Rail Road 3","Jail","Parkview Walk",
		"Water Utility","Chest","Five Fork");
$Properties_all=array("Peachtree","Raid Road 1","Henderson Rd","Ponce City Market","Rail Road 2","Stone Mountain","Jimmy Carter",
		"Ashwood St","Rail Road 3","Parkview Walk",
		"Five Fork");
$Property_Pay=array("Peachtree"=>"40","Raid Road 1"=>"40","Henderson Rd"=>"41","Ponce City Market"=>"56","Rail Road 2"=>"40","Stone Mountain"=>"69","Jimmy Carter"=>"33",
		"Ashwood St"=>"42","Rail Road 3"=>"40","Parkview Walk"=>"77",
		"Five Fork"=>"64");
$Property_Buy=array("Peachtree"=>"220","Raid Road 1"=>"200","Henderson Rd"=>"160","Ponce City Market"=>"240","Rail Road 2"=>"200","Stone Mountain"=>"320","Jimmy Carter"=>"170",
		"Ashwood St"=>"150","Rail Road 3"=>"200","Parkview Walk"=>"300",
		"Five Fork"=>"280");

$others=array("Chance","Go to Jail","Eletrical Bill","Tax","Chest","Jail");






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


				echo "Ben <br>";
					echo 'You Have Rolled '.$move1.'<br>';
				$_SESSION['Ben_Position']+=$move1;
				if($_SESSION['Ben_Position']>20){
					$_SESSION['Ben_Position']-=20;
				}
				//Property means anycell that we land on
				$Property=$Board_Cell[$_SESSION['Ben_Position']-1];
				echo "You have landed in ".$Property."<br>Position:".$_SESSION['Ben_Position'];



					if(in_array($Property, $others)) {
							echo $Property;

							switch ($Property) {
								case 'Chance':
									echo "<br>Do 10 Push Up";
									break;
								case 'Go to Jail':
									echo "<br>Suspend for two rounds";
									break;
								case 'Jail':
									echo "<br>Just visiting";
									break;
								case 'Chest':
									$_SESSION['Ben_Cash_plus']+=100;
									echo "<br>Found 100 Dollars In the Bathroom!";
									break;
								case 'Tax':
									$_SESSION['Ben_Cash_minus']+=200;
									echo "<br>Pay 200 Dollar in Tax";
									break;
								case 'Eletrical Bill':
									$_SESSION['Ben_Cash_minus']+=75;
									echo "<br>Pay 75 in Eletrical Bill";
								
								default:
									# code...
									break;
							}
						}
				//Check if it is actually Propety that we can buy
				if(in_array($Property, $Properties_all)){
					
						if(in_array($Property, $_SESSION['Joe_Properties'])){
							echo "<br>This is Joe's Property";
							$pay=$Property_Pay[$Property];
							echo "You paid ".$pay." to Joe";
							$_SESSION[Ben_Cash_minus]+=$pay;
							$_SESSION[Joe_Cash_plus]+=$pay;
						}elseif (in_array($Property, $_SESSION['Ben_Properties'])) {
							echo "<br>This is your own Property";
					
						}

						else {
							$buy=$Property_Buy[$Property];
							echo "<br>This propety is up for sale ,Do you want to buy this property for ".$buy;
							

						}
					}
				}
				if(isset($_POST['Ben_buy'])){
				

						$bProperty=$Board_Cell[$_SESSION['Ben_Position']-1];
            			
            			if(in_array($bProperty, $Properties_all)){
            				echo "You have purchased ".$bProperty;
            				$_SESSION['Ben_Properties'][]=$bProperty;
            				$buy=$Property_Buy[$bProperty];
            				echo "<br> You spent ".$buy;
            				$_SESSION['Ben_Cash_minus']+=$buy;
            			}else{
            				echo "You can't purchased this item";
            			}
            			

            			
            			 
					
				}


			
			?>
            <form method="POST">
            	<input type="submit" name="Ben_buy" value="Buy" id="Ben_buy" >
                <input type="submit" value="Roll" name="roll">
            </form>
        </div>



      <div class="controlCenterRight">
            <?php 
			

				if(isset($_POST['roll2'])){
					
					$move2=rollDice();



					echo "Joe <br>";
					echo 'You Have Rolled '.$move2.'<br>';
				$_SESSION['Joe_Position']+=$move2;
					if($_SESSION['Joe_Position']>20){
					$_SESSION['Joe_Position']-=20;
		
				}
				$jProperty=$Board_Cell[$_SESSION['Joe_Position']-1];
				echo "You have landed in ".$Board_Cell[$_SESSION['Joe_Position']-1]."<br>Position:".$_SESSION['Joe_Position'];
				
				if(in_array($jProperty, $Properties_all)){
					
						if(in_array($jProperty, $_SESSION['Ben_Properties'])){
							echo "<br>This is Ben's Property";
							$pay=$Property_Pay[$jProperty];
							echo "You paid ".$pay." to Ben";
							$_SESSION[Joe_Cash_minus]-=$pay;
							$_SESSION[Ben_Cash_plus]+=$pay;
						}elseif (in_array($jProperty,$_SESSION['Joe_Properties'])) {
							echo "<br>This is your own Property";
						}else {
							$buy=$Property_Buy[$jProperty];
							echo "<br>This propety is up for sale ,Do you want to buy this property for ".$buy;
							

						}
					}
				}
			if(isset($_POST['Joe_buy'])){
				

						$bProperty=$Board_Cell[$_SESSION['Joe_Position']-1];
            			
            			if(in_array($bProperty, $Properties_all)){
            				echo "You have purchased ".$bProperty;
            				$_SESSION['Joe_Properties'][]=$bProperty;
            				$buy=$Property_Buy[$bProperty];
            				echo "<br> You spent ".$buy;
            				$_SESSION['Joe_Cash_plus']-=$buy;
            			}else{
            				echo "You can't purchased this item";
            			}
            			

            			
            			 
					
				}


			
			?>
            <form method="POST">
            	<input type="submit" name="Joe_buy" value="Buy" id="Joe_buy">
                <input type="submit" value="Roll" name="roll2">
            </form>
        </div>

		<div class="Ben_scoreBoard">
			<table>
				<th style="width:180px;text-align: left">Property</th>
				

			<?php 
			$list=$_SESSION['Ben_Properties'];
				for($i=0;$i<sizeof($list);$i++){
					echo '<tr><td>'.$list[$i].'<td></tr>';
				}
			?>
			</table>	
		</div>
				

		<div class="Joe_scoreBoard">
			<table>
					<th style="width:180px;text-align: left">Property</th>

			<?php 

			$list1=$_SESSION['Joe_Properties'];
				for($i=0;$i<sizeof($list1);$i++){
					echo '<tr><td>'.$list1[$i].'<td></tr>';
				}
			?>
			
			</table>			
		</div>

		<div class="Ben_Cash">
			
			<?php 
					$_SESSION['Ben_Cash']=1500-$_SESSION['Ben_Cash_minus']+$_SESSION['Ben_Cash_plus'];
					
					$_SESSION['Joe_Cash']=1500-$_SESSION['Joe_Cash_minus']+$_SESSION['Joe_Cash_plus'];
			

				echo "<h3>Money :".$_SESSION['Ben_Cash']."</h3>";


			?>

		</div>

			<div class="Joe_Cash">
			
			<?php 
				
				echo "<h3>Money :".$_SESSION['Joe_Cash']."</h3>";


			?>

		</div>



    </body>
		
    </html>