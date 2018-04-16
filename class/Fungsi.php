<?php
	class Fungsi {
		function post($p, $a = "") {
			return isset($_POST["$p"])?$_POST["$p"]:"$a";
		}
		function get($p, $a = "") {
			return isset($_GET["$p"])?$_GET["$p"]:"$a";
		}
		function sess($p, $a = "") {
			return isset($_SESSION["$p"])?$_SESSION["$p"]:"$a";
		}
		function rp($duit) {
			return "RP " . number_format($duit);
		}
		function alert($a) {
			echo "<script>alert('$a')</script>";
		}
		function redirect($r) {
			echo "<script>location.href='$r'</script>";
		}
		function back($b) {
			echo "<script>history.back()</script>";
		}
	}

	$ff = new Fungsi(); 
?>