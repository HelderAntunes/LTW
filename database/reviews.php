<?php

    /**
     * Add a review to database.
     */
     function add_review($score, $comment, $restaurant_id, $reviewer_username) {
        global $dbh;

        try {
            $stmt = $dbh->prepare("INSERT INTO reviews (id, score, comment, restaurant_id, reviewer_username)
                                    VALUES (NULL, :score, :comment, :restaurant_id, :reviewer_username)");
            $stmt->execute(array($score, $comment, $restaurant_id, $reviewer_username));
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
    }

    /**
     * Get reviews of a restaurant.
     */
    function get_reviews_of_restaurant($restaurant_id) {
        global $dbh;

        try {
			$stmt = $dbh->prepare('SELECT * FROM reviews
                                    WHERE restaurant_id = ?');
			$stmt->execute(array($restaurant_id));
            $result = $stmt->fetchAll();
            return $result;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
    }

    /**
     * Get a review from database.
     * @param $id id of review
     */
    function get_review($id) {
        global $dbh;

        try {
			$stmt = $dbh->prepare('SELECT * FROM reviews
                                    WHERE id = ?');
			$stmt->execute(array($id));
            $result = $stmt->fetch();
            return $result;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
    }
    
?>
