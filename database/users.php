<?php

    /**
     * Return true if exists the pair ($username, $password) in database, false otherwise.
     */
    function username_password_exists($username, $password) {
     
        global $dbh;
        try {
			$stmt = $dbh->prepare('SELECT * FROM users WHERE username = ?');
			$stmt->execute(array($username));
            $result = $stmt->fetch();
            return ($result !== false && password_verify($password, $result['password']));

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
            if ($result !== false) {
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
    function add_user($username, $password, $email, $birthdate) {
        
        global $dbh;
        $options = ['cost' => 12];
        $hash = password_hash($password, PASSWORD_DEFAULT, $options);

        try {
            $stmt = $dbh->prepare("INSERT INTO users (username, password, email, birthdate)
                                    VALUES (:username, :password, :email, :birthdate)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hash);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':birthdate', $birthdate);

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

    /**
     * Update a user.
     */
    function update_user($username, $password, $email, $birthdate) {
        global $dbh;

        $options = ['cost' => 12];
        $hash = password_hash($password, PASSWORD_DEFAULT, $options);

        try {

            $stmt = $dbh->prepare("UPDATE users SET password=:password, email=:email, birthdate=:birthdate WHERE username=:username");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hash);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':birthdate', $birthdate);
            $stmt->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
    }

    /*function verify_user_info($username, $password, $new_password, $email, $birthdate){
        $user = get_user($username);

        if($user['password'] == sha1($password)){
            if($new_password == "")
                update_user($username,$password,$email,$birthdate);
            else{
              $new_password=sha1($password);
              update_user($username,$new_password,$email,$birthdate);
            }
        }
    }*/

?>
