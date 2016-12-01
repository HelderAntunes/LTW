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

    /**
     * Update a restaurant.
     */
    function update_restaurant($id, $name, $description, $local) {
        global $dbh;

        try {

            $stmt = $dbh->prepare("UPDATE restaurants set name=:name, description=:description, local=:local WHERE id=:id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':local', $local);
            $stmt->execute();

		} catch (PDOException $e) {
			echo $e->getMessage();
		}
    }

    /**
     * Get restaurants with an given id.
     */
    function get_restaurant($id) {
        global $dbh;

        try {
			$stmt = $dbh->prepare('SELECT * FROM restaurants WHERE id = ?');
			$stmt->execute(array($id));
            $result = $stmt->fetch();
            return $result;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
    }

?>
