<?php

	include("include/function.php");
	
	$status = "";
	
	if (SQL_Query("full", "SELECT COUNT(*) FROM `Items`")['COUNT(*)'] < 1) {
		$status = "No content";
	}
	else {
		$status = "Yep!";
	}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/my.css">
		<title>SCS - Simple Crypto Shop</title>
	</head>
	<body>
		<div class="Menu"><br>
			<span class="First1">
				<span style="font-size:50px;" class="menu">Wellcome, to </span>
				<span style="font-size:50px;">SBS</span>
			</span>
			<br>
			<span style="font-size:25px;" class="menu">Buy all items for Ethereum, Monero, DASH, Litecoin or Bitcoin.</span>
		</div>
		<div class="content">
			<?php
				if ($status == "No content") {
					echo $status;
				}
				else {
					$result = SQL_Query("nfull", "SELECT `id` FROM `Items`");
					while($row2 = $result->fetch_assoc()) {
						$a = $row2["id"];
						
						$row = SQL_Query("full", "SELECT `img`, `name`, `dscr`, `price`, `fiat_type` FROM `Items` WHERE `id` ='$a'");
						
						echo '<div class="product">';
						echo "\n";
						echo '				<img src="'.$row['img'].'" height="200" width="200">';
						echo "\n";
						echo '				<h3>'.$row['name'].'</h3>';
						echo "\n";
						echo '				<p>'.$row['dscr'].'</p>';
						echo "\n";
						echo '				<div class="payment_methods">';
						echo "\n";
						echo '					<form action="buy.php" method="post">'."\n						".'<input type="hidden" name="id" value="'.$a.'">'."\n						".'<input type="hidden" name="crypto" value="ethereum">'."\n						".'<button type="submit"><img src="img/eth.png" title="Buy with Ethereum" alt="ETH"></button>'."\n					".'</form>';
						echo "\n";
						echo '					<form action="buy.php" method="post">'."\n						".'<input type="hidden" name="id" value="'.$a.'">'."\n						".'<input type="hidden" name="crypto" value="monero">'."\n						".'<button type="submit"><img src="img/xmr.png" title="Buy with Monero" alt="XMR"></button>'."\n					".'</form>';
						echo "\n";
						echo '					<form action="buy.php" method="post">'."\n						".'<input type="hidden" name="id" value="'.$a.'">'."\n						".'<input type="hidden" name="crypto" value="bitcoin">'."\n						".'<button type="submit"><img src="img/btc.png" title="Buy with Bitcoin" alt="BTC"></button>'."\n					".'</form>';
						echo "\n";
						echo '					<form action="buy.php" method="post">'."\n						".'<input type="hidden" name="id" value="'.$a.'">'."\n						".'<input type="hidden" name="crypto" value="litecoin">'."\n						".'<button type="submit"><img src="img/ltc.png" title="Buy with Litecoin" alt="LTC"></button>'."\n					".'</form>';
						echo "\n";
						echo '					<form action="buy.php" method="post">'."\n						".'<input type="hidden" name="id" value="'.$a.'">'."\n						".'<input type="hidden" name="crypto" value="dash">'."\n						".'<button type="submit"><img src="img/dash.png" title="Buy with DASH" alt="DASH"></button>'."\n					".'</form>';
						echo "\n";
						echo '				</div>';
						echo "\n";
						echo '				<b>Price</b>: '.$row["price"]." ".$row["fiat_type"];
						echo '			</div>';
						echo "\n";
						echo "\n";
					}
				}
			?>
		</div>
	</body>
</html>