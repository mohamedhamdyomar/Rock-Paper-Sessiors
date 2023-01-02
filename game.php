<?php 
	if(!isset($_GET['name']) || strlen($_GET['name']) <1 )
	{
		die("Name parameter missing");
	}
	if (isset($_POST["logout"])) {
		header("Location: index.php");
		return;
	}

	$names = array('Rock','Paper','Sessiors');
	$computer = rand(0,2);
	$human = isset($_POST["human"]) ? $_POST["human"]+0 : -1;

	function check($computer, $human) {
		if($human == 0){
			if($computer == 0){
				return "Tie";
			} elseif ($computer == 1) {
				return "You Lose";
			}
			elseif ($computer == 2) {
				return "You Win";
			}
		}
		elseif($human == 1){
			if($computer == 0){
				return "You Win";
			} elseif ($computer == 1) {
				return "Tie";
			}
			elseif ($computer == 2) {
				return "You Lose";
			}
		}
		elseif($human == 2){
			if($computer == 0){
				return "You Lose";
			} elseif ($computer == 1) {
				return "You Win";
			}
			elseif ($computer == 2) {
				return "Tie";
			}
		}
		return false;	
	}
	
	$result = check($computer,$human);
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
 	<title>Mohamed Hamdy aa634380</title>
 	<?php require_once "bootstrap.php"; ?>
 </head>
 <body>
 	<div class="container">
 		<h1>Rock Paper Sessiors</h1>

 		<?php
 			if ( isset($_REQUEST['name']) ) {
    			echo "<p>Welcome: ";
    			echo htmlentities($_REQUEST['name']);
    			echo "</p>\n";
			}
 		?>

 		<form method="post">
 			<select name=human>
 				<option value="-1">Select</option>
 				<option value="0">Rock</option>
 				<option value="1">Paper</option>
 				<option value="2">Sessiors</option>
 				<option value="3">Test</option>
 			</select>
 			<input type="submit" value="Play">
 			<input type="submit" name="logout" value="Log Out">
 		</form>
<pre>
<?php
if ($human == -1) {
echo "Please select a strategy and press Play.<br>";
} 
elseif($human == 3){
for($c=0;$c<3;$c++) {
for($h=0;$h<3;$h++) {
$r = check($c, $h);
print "Human=$names[$h] Computer=$names[$c] Result=$r<br>";
}
}
}
else{
print "Your Play=$names[$human] Computer Play=$names[$computer] Result=$result<br>";
}
?>
</pre>
 	</div>
 </body>
 </html>