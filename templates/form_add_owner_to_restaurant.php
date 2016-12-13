<form action="action_add_owner_to_restaurant.php" method="post">
    <label><b>Username:</b></label>
    <input type="hidden" name="id" value=<?=$_GET['id']?>>
    <input type="text" placeholder="Enter Username" name="username" required>
    <button id="add_btn" type="submit">Add Owner</button>
</form>