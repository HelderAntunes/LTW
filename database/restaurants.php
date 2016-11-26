<?php

    /**
     * Get restaurants of an user.
     */
    function get_user_restaurants($username) {
        global $dbh;

        try {
			$stmt = $dbh->prepare('SELECT * FROM restaurants WHERE owner_username = ?');
			$stmt->execute(array($username));
            $result = $stmt->fetchAll();
            return $result;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
    }

    /**
     * Add a restaurant to database.
     */
    function add_restaurant($name, $description, $local, $owner_username) {
        global $dbh;

        try {
            $stmt = $dbh->prepare("INSERT INTO restaurants (id, name, description, local, owner_username)
                                    VALUES (NULL, :name, :description, :local, :owner_username)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':local', $local);
            $stmt->bindParam(':owner_username', $owner_username);

            $stmt->execute();

		} catch (PDOException $e) {
			echo $e->getMessage();
		}
    }

?>
