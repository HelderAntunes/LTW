<?php

    /**
     * Return true if exists the pair ($username, $password) in database, false otherwise.
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

    /**
     * Return true if exists the username in database, false otherwise.
     */
    function username_exists($username) {
        global $dbh;
        try {
			$stmt = $dbh->prepare('SELECT * FROM users WHERE username = ?');
			$stmt->execute(array($username));
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

    /**
     * Add a user to database.
     */
    function add_user($username, $password, $email, $birthdate, $user_type) {
        $password =  sha1($password); // hashing
        global $dbh;
        try {
            $stmt = $dbh->prepare("INSERT INTO users (username, password, email, birthdate, user_type)
                                    VALUES (:username, :password, :email, :birthdate, :user_type)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':birthdate', $birthdate);
            $stmt->bindParam(':user_type', $user_type);

            $stmt->execute();

		} catch (PDOException $e) {
			echo $e->getMessage();
		}
    }

    /**
     * Get a user.
     */
    function get_user($username) {
        global $dbh;
        try {
			$stmt = $dbh->prepare('SELECT * FROM users WHERE username = ?');
			$stmt->execute(array($username));
            $result = $stmt->fetch();
            return $result;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
    }

?>
