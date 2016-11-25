<?php

    /**
     * Return true if exists the pair ($username, $password) in database.
     */
    function username_password_exists($username, $password) {
        $password =  sha1($password); // hashing
        global $dbh;
        try {
			$stmt = $dbh->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
			$stmt->execute(array($username, $password));
            $result = $stmt->fetch();
            if ($result != false) {
                return true;
            } else {
                return false;
            }

		} catch (PDOException $e) {
			echo $e->getMessage();
		}
    }

?>
