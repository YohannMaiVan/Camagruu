<?php
 class likeClass {
public static function connectDatabase() {
	try {
		require __DIR__ .'/../Database/database.php';
	  $pdo = new PDO($DB_DSN, $DB_USER , $DB_PASSWORD);
	  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  } catch (PDOException $e) {
		echo 'Connection failed : ' . $e->getMessage();
		$pdo = null;
	  }
	  return $pdo;
}

public static function prepStatement($sql) {
    $pdo_statement = null;
    $pdo = self::connectDatabase();
    if ($pdo)
    try {
      $pdo_statement = $pdo->prepare($sql);
    } catch (PDOException $e) {
      echo 'Connection failed : ' . $e->getMessage();
    }
    return $pdo_statement;
}

public static function addLike($id, $like, $login, $getid) {
	try {
		$statement = self::prepStatement("INSERT INTO likes VALUES (?,?,?,?)");
		$statement->execute(array(NULL, 1, $_SESSION['login'], $_GET['id']));
	} catch (PDOException $e) {
		echo 'Failed adding a commentary : ' . $e->getMessage();				
	}
	return $statement;
	}

	public static function delLike($getlogin, $getid) {
		try {
			$statement = self::prepStatement("DELETE from likes WHERE likes_user = ? AND likes_id_image = ?");
			$statement->execute(array($getlogin, $getid));
		} catch (PDOException $e) {
			echo 'Fail DELETE : ' . $e->getMessage();				
		}
		}	

	public static function fetchLikes($getid) {
		try {
			$statement = self::prepStatement("SELECT id_like from likes WHERE likes_id_image = ?");
			$statement->execute(array($getid));
		} catch (PDOException $e) {
			echo 'Failed adding a commentary : ' . $e->getMessage();				
		}
		return $statement;
		}

	public static function checkNumLikes($getid, $getlogin) {
		try {
			$statement = self::prepStatement("SELECT id_like from likes WHERE likes_id_image = ? AND likes_user = ?");
			$statement->execute(array($getid,  $getlogin));
		} catch (PDOException $e) {
			echo 'Failed adding a commentary : ' . $e->getMessage();				
		}
		return $statement;
		}
}
?>