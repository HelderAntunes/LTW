<form action="action_add_restaurant.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="owner_username" value="<?=$_SESSION['username']?>">
    <label>Name:
        <input type="text" placeholder="Enter the name of restaurant" name="name" required>
    </label>
    <label>Description:
        <textarea rows="4" cols="50" name="description" placeholder="Enter description here..." required></textarea>
    </label>
    <label>Local:
        <input type="text" placeholder="Enter the local of restaurant" name="local" required>
    </label>
    <label>Image:
        <input type="file" name="image">
    </label>
    <input type="submit" value="Add restaurant">
</form>