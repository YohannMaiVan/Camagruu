<?php
class user {
public static function coDatabase() {
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
public static function createStatement($sql) {
    $pdo_statement = null;
    $pdo = self::coDatabase();
    if ($pdo)
    try {
      $pdo_statement = $pdo->prepare($sql);
    } catch (PDOException $e) {
      echo 'Connection failed : ' . $e->getMessage();
    }
    return $pdo_statement;
}
// WHERE id="'.$workouts['user_id'].'"'
		public static function insert_user($login, $passwd, $email, $date_user, $confirmkey)
		{
			  try {
			$pdo_statement = self::createStatement('INSERT INTO users (user, passwd, mail, date_user, confirmkey) VALUES (:login, :passwd, :email, :date_user, :confirmkey)');
			$pdo_statement->bindparam(':login', $login) &&
			$pdo_statement->bindparam(':passwd', $passwd) &&
			$pdo_statement->bindparam(':email', $email) &&
			$pdo_statement->bindparam(':date_user', $date_user) &&
			$pdo_statement->bindparam(':confirmkey', $confirmkey) &&
			$pdo_statement->execute();
		} catch (PDOException $e) { die('Erreur : ' . $e->getMessage());

		}
		return $pdo_statement;
		}
		public static function profil_user()
		{
			$getid = intval($_GET['id']);
			$requser = self::createStatement('SELECT * FROM users where id = ?');
			$requser->execute(array($getid));
			$userinfo = $requser->fetch();
			return $userinfo;
		}
		public static function connect_user()
		{
			$loginconnect = htmlspecialchars(trim($_POST['login']));
			$passwordconnect = crypt($_POST['passwd'], "$6$rounds=5000$macleapersonnaliseretagardersecret$"); // pas sur si il faut le mettre ici ou avant la DB
			$requser = self::createStatement("SELECT * FROM users WHERE user =? AND passwd =?");
			$requser->execute(array($loginconnect, $passwordconnect));
			return $requser;
		}
  }