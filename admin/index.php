<?php
	include_once  "../class/Db.php";
    include_once  "../class/Fungsi.php";

    if (isset($_SESSION['username'])) {
    	$ff->redirect('home.php');
    }

    $err = "Silahkan klik button login untuk melanjutkan!";

    if (isset($_GET['err'])) {
    	switch ($_GET['err']) {
    		case 1:
    			$err = "Lengkapi from untuk melanjutkan!";
    			break;

    		case 2:
    			$err = "Masukkan username dan password yang benar!";
    			break;

    		default:
    			$err = "Silahkan klik button login untuk melanjutkan!";
    			break;
    	}
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Login Page</title>

	<link href="../vendor/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../style/css/admin.css">
</head>
<body>
	<center>
		<div id="box" style="width: 45%;">
			<div class="box-top" style="font-size: 20px;">
				Login Page
			</div>
			<div class="box-panel">
				<form action="" method="post" style="float">
					<div class="form-group">
						<label for="username" style="float: left;">Username</label>
						<input type="text" name="username" class="form-control" required="">
					</div>
					<div class="form-group">
						<label for="password" style="float: left;" >Password</label>
						<input type="password" name="password" class="form-control" required="">
					</div>
					<center>
						<button type="submit" name="submit" class="btn btn-success">Login</button> <br><br>
					</center>
					<center><i><?=$err?></i></center>
				</form>
			</div>
		</div>
		<?php
			if (isset($_POST['submit'])) {
				$post = $odb->sant(INPUT_POST);
				$ff->post('username');
				$ff->post('password');
				extract($post);

				$q = $odb->select("admin where username = '$username' and password = '$password'");
				$a = $odb->nur($q);

				if ($a == 1) {
					session_start();
					$_SESSION['username'] = $username;
					$ff->alert('Selamat Datang' .' '. $username);
					$ff->redirect('home.php');
				} else {
					$ff->alert('Masukkan data yang benar!');
					$ff->redirect("index.php?err=2");
				}
			}
		?>
	</center>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../vendor/js/bootstrap.min.js"></script>
    <script src="js/admin.js"></script>
</body>
</html>