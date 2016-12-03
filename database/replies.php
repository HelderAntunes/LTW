<?php

    /**
     * Get the replies of a review.
     * @param $id id of review
     */
    function get_replies_of_a_review($id) {
        global $dbh;

        try {
            $stmt = $dbh->prepare('SELECT * FROM replies
                                    WHERE review_id = ?');
            $stmt->execute(array($id));
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /*
     * Add reply to database.
     */
    function add_reply($message, $review_id, $username) {
        global $dbh;

        try {
            $stmt = $dbh->prepare("INSERT INTO replies (id, message, review_id, username)
                                    VALUES (NULL, :mesage, :review_id, :username)");
            $stmt->execute(array($name, $review_id, $username));
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
    }


?>
