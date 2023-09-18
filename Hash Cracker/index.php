<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DGKNSYGN - Hash Cracker</title>
</head>
<body>

	<center>
		<div class="MainBox">
			<img src="logo.png" class="Logo">

			<br>

			<form action="index.php" method="POST">
				<select name="HashType" class="HashType">
					<option>Select Hash Type</option>
					<option>MD5</option>
					<option>SHA1</option>
				</select>

				<textarea name="HashValue" class="HashValue"></textarea>

				<input class="Descrpyt" type="submit" value="Descrpyt">
			</form>
		</div>

		<?php

			error_reporting(0);

			$HashType  = $_POST['HashType'];
			$HashValue = $_POST['HashValue'];

			$Wordlist = file_get_contents('wordlist.txt');

			$Words = explode("\n", $Wordlist);

			$Result = false;
			$Value = "";

			foreach ($Words as $Word) 
			{
				if ($HashType == "MD5")
				{
					$Hash = md5(trim($Word));

					if ($Hash == $HashValue)
					{
						$Value = $Word;
						$Result = true;
						break;
					}
				}
				else if ($HashType == "SHA1")
				{
					$Hash = sha1(trim($Word));

					if ($Hash == $HashValue)
					{
						$Value = $Word;
						$Result = true;
						break;
					}
				}

			}

			if (isset($HashType) && isset($HashValue))
			{
				echo "<div class='Result'><br>";

				if ($Result)
				{
					echo "<p class='ResultText' style='color: lightgreen;'>Found Value: ".$Value."</p>";
				}
				else
				{
					echo "<p class='ResultText' style='color: rgb(255, 50, 50);'>Not Found</p>";
				}
			}

		?>

		</div>

	</center>

<style>
	body {
		background: black;
	}
	.MainBox {
		width: 450px;
		height: 340px;
		background: linear-gradient(180deg, rgba(45,45,45,1) 0%, rgba(25,25,25,1) 100%);
		border-radius: 5px;
	}
	.Logo {
		width: 120px;
		background: transparent;
		margin-top: 10px;
	}
	.HashType {
		color: white;
		width: 400px;
		height: 30px;
		background: none;
		margin-top: 10px;
	}
	.HashType Option {
		color: black;
	}
	.HashValue {
		color: white;
		width: 395px;
		height: 150px;
		background: none;
		margin-top: 10px;
	}
	.Descrpyt {
		color: white;
		width: 400px;
		height: 30px;
		background: none;
		border: 1px solid gray;
		margin-top: 6px;
	}
	.Descrpyt:hover {
		background: black;
	}
	.Result {
		width: 450px;
		height: 50px;
		background: linear-gradient(180deg, rgba(45,45,45,1) 0%, rgba(25,25,25,1) 100%);
		border-radius: 5px;
		margin-top: 10px;
	}
	.ResultText {
		color: white;
		margin-top: -2px;
	}
</style>
</body>
</html>