<?php
 class gallery {
public static function initDatabase() {
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

public static function prepareStatement($sql) {
    $pdo_statement = null;
    $pdo = self::initDatabase();
    if ($pdo)
    try {
      $pdo_statement = $pdo->prepare($sql);
    } catch (PDOException $e) {
      echo 'Connection failed : ' . $e->getMessage();
    }
    return $pdo_statement;
}

public static function fetchMiniatures() {
	try {
			$statement = self::prepareStatement("SELECT path_image FROM images ORDER BY id_image DESC LIMIT 0, 6");
			$statement->execute();
			$result = $statement->fetchAll();
	} catch (PDOException $e) {
	}
	return $result;
	}

	public static function fetchGallery() {
		global $picsPerPage;
		global $depart;
		try {
				$statement = self::prepareStatement("SELECT user_image, path_image, id_image FROM images ORDER BY id_image DESC LIMIT $depart, $picsPerPage");
				$statement->execute();
				$result = $statement->fetchAll();
		} catch (PDOException $e) {
		}
		return $result;
		}

		public static function imagesNumber() {
			try {
					$statement = self::prepareStatement("SELECT id_image FROM images");
					$statement->execute();
					$result = $statement->fetchAll();
			} catch (PDOException $e) {
			}
			return $result;
			}

		public static function getPicture() {
			try {
				$statement = self::prepareStatement("SELECT * from images where id_image = ?");
				$statement->execute(array($_GET['id']));
				$picture = $statement->fetch();
			} catch (PDOException $e) {
				echo 'Failed getting the picture : ' . $e->getMessage();				
			}
			return $picture;
			}

		public static function deletePicture() {
			try {
				$statement = self::prepareStatement("DELETE from images where id_image = ? AND user_image = ?");
				$statement->execute(array($_POST['id_picture'], $_SESSION['login']));
			} catch (PDOException $e) {
				echo 'Failed getting the picture : ' . $e->getMessage();				
			}
			}
			
		public static function addCom() {
			try {
				$statement = self::prepareStatement("INSERT INTO commentaires VALUES (?,?,?,?)");
				$statement->execute(array(NULL, $_POST['commentaire'], $_SESSION['login'], $_GET['id']));
			} catch (PDOException $e) {
				echo 'Failed adding a commentary : ' . $e->getMessage();				
			}
			}

		public static function fetchCom() {
			try {
				$statement = self::prepareStatement("SELECT * from commentaires WHERE com_id_image = ? ORDER BY com_id DESC");
				$statement->execute(array($_GET['id']));
				$result = $statement->fetchAll();					
			} catch (PDOException $e) {
				echo 'Failed showing commentaries : ' . $e->getMessage();				
			}
			return $result;
			}

		public static function selectMail() {
			try {
				$statement = self::prepareStatement("SELECT mail  FROM users INNER JOIN images ON images.user_image = users.user WHERE images.id_image = ?");
				$statement->execute(array($_GET['id']));
				$result = $statement->fetchAll();
			} catch (PDOException $e) {
				echo 'Failed showing commentaries : ' . $e->getMessage();				
			}
			return $result;
		}
	}
?>