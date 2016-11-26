<?php

    /**
     * Add a image to database.
     */
    function add_image($title, $restaurant_id) {
        global $dbh;

        try {
            $stmt = $dbh->prepare("INSERT INTO images (id, title, restaurant_id)
                                    VALUES (NULL, :title, :restaurant_id)");
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':restaurant_id', $restaurant_id);

            $stmt->execute();

		} catch (PDOException $e) {
			echo $e->getMessage();
		}
    }

?>
