<?php
    /**
     * Get restaurants of an user.
     */
    function get_user_restaurants($username) {
        global $dbh;

        try {
			$stmt = $dbh->prepare('SELECT id, name, description, local
                                    FROM restaurants, owners_restaurants
                                    WHERE owner_username = ? AND restaurant_id = id');
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
    function add_restaurant($name, $description, $local) {
        global $dbh;

        try {
            $stmt = $dbh->prepare("INSERT INTO restaurants (id, name, description, local)
                                    VALUES (NULL, :name, :description, :local)");
            $stmt->execute(array($name, $description, $local));
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
    }

    /**
     * Add an owner to a restaurant.
     */
    function add_owner_to_restaurant($restaurant_id, $owner_username) {
        global $dbh;

        try {
            $stmt = $dbh->prepare("INSERT INTO owners_restaurants (owner_username, restaurant_id)
                                    VALUES (:owner_username, :restaurant_id)");
            $stmt->execute(array($owner_username, $restaurant_id));
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
    }

    /**
     * Return true the pair <username, restaurant_id> exists in owners_restaurants's table.
     */
    function user_is_owner_of_restaurant($username, $restaurant_id) {
        global $dbh;
        try {
			$stmt = $dbh->prepare('SELECT * FROM owners_restaurants WHERE owner_username = ? AND restaurant_id = ?');
			$stmt->execute(array($username, $restaurant_id));
            $result = $stmt->fetch();
            if ($result == true) {
                return true;
            } else {
                return false;
            }

		} catch (PDOException $e) {
			echo $e->getMessage();
		}
    }

    /**
     * Get owners's username of a restaurant.
     */
    function get_owners_username_of_a_restaurant($restaurant_id) {
        global $dbh;

        try {
			$stmt = $dbh->prepare('SELECT username
                                    FROM users, owners_restaurants
                                    WHERE owner_username = username AND restaurant_id = ?');
			$stmt->execute(array($restaurant_id));
            $result = $stmt->fetchAll();
            return $result;
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
     * Get restaurant with an given id.
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

    /**
     * Search the restaurants with name = "*$name*".
     */
    function search_restaurants($name) {
        global $dbh;

        try {
			$stmt = $dbh->prepare('SELECT * FROM restaurants WHERE name LIKE ?');
			//$stmt->execute(array('%$name%'));
			$stmt->execute(array('%'.$name.'%'));
            $result = $stmt->fetchAll();
            return $result;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
    }

    function remove_restaurant($id) {
        global $dbh;
 

        try {
            $stmt = $dbh->prepare('DELETE FROM owners_restaurants WHERE restaurant_id = ?');
            $stmt->execute(array($id));
            $result = $dbh->prepare('DELETE FROM restaurants WHERE id = ?');
            $result->execute(array($id));

		} catch (PDOException $e) {
			echo $e->getMessage();
		}
    }

?>
