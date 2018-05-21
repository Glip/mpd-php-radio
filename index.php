<?php
include("m.php");

$playlist = $mpd->playlist();
?><!-- Required meta tags -->
<header>
	<title>Радио</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</header>
	<body>

		<div class="container-fluid text-center">
			<div class="center-block">
				<button id="volp"  class="btn btn-primary">Vol+</button>
				<script>
				$('#volp').click(function(){
					$.post(
						"control.php?vol=plus"
					);
				});
				</script>
				<button id="volm"  class="btn btn-primary">Vol-</button>
				<script>
				$('#volm').click(function(){
					$.post(
						"control.php?vol=min"
					);
				});
				</script>
				<button id="stop"  class="btn btn-primary">STOP</button>
				<script>
				$('#stop').click(function(){
					$.post(
						"control.php?stop=1"
					);
				});
			</script>
		</div>
	</div>
	<div class="table-responsive">
		<table  class="table">
			<tr>
				<th></th>
				<th>Название</th>
				<th></th>
			</tr>
			<?php
			echo $api;
			foreach($playlist as $pl){
				echo "<tr><th scope=\"row\">".$pl['Id']."</th><td>".$pl['Name']."</td><td><button class=\"btn btn-dark\" id=\"play".$pl['Id']."\">Play</button>
				<script>
				$('#play".$pl['Id']."').click(function(){
					$.post(
						\"control.php?play=".$pl['Id']."\"
					);
				});
				</script> </td></tr>";
			}
			?>
		</table>
	</div>
	<form action="control.php" method="get"  class="form-inline">
		<input type="url" name="add" class="form-control"><button class="btn" type="submit" name="submit">Добавить станцию</button>
	</form><div class="alert alert-primary" role="alert">
		*Название в списке появится только после того, <br>
		как вы запустите станцию и обновите страницу.
	</div>
</body>
