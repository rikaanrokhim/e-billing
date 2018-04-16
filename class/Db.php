<?php 
	class Db {
		var $db = null;
		public function __construct() {
			try {
				$this->db = new PDO("mysql:host=localhost;dbname=ebilling", "root", "");
				$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch(PDOException $e) {
				die("Connection error " . $e->getMessage());
			}
		}
		function query($q) {
			$query = $this->db->prepare($q);
			$query->execute();
			return $query;
		}
		function insert($t, $f) {
			$query = $this->db->prepare("insert into $t values($f)");
			$query->execute();
		}
		function select($t, $f = "*") {
			$query = $this->db->prepare("select $f from $t");
			$query->execute();
			return $query;
		}
		function update($t, $f) {
			$query = $this->db->prepare("update $t set $f");
			$query->execute();
		}
		function delete($t) {
			$query = $this->db->prepare("delete from $t");
			$query->execute();
		}
		function nur($q) {
			return $data = $q->rowCount();
		}
		function paging($q, $L, $p) {
			$of = ($p-1)*$L;
			$query = $this->query("$q limit $of,$L");
			$jumlah = ceil($this->nur($this->query($q))/$L);
			$paging = array("query"=>$query,"jumlah"=>$jumlah,"no"=>$of);
		return $paging;
		}
		function nav($url, $j, $p) {
			echo "<div class=pagination>";
			for ($i = 1; $i <= $j ; $i++) { 
				if ($i == $p)
					echo "<a href=# class=active> <span>$i</span> </a>";
				else 
					echo "<a href='$url&page=$i'>$i</a>";
			}
			echo "</div>";
		}
		function sant($type) {
			$data = filter_input_array($type, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			return $data;
		}
	}

	$odb = new Db();
?>