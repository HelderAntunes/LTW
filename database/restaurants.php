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

?>
