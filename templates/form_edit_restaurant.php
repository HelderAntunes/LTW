<form id="edit_restaurant_form" action="action_edit_restaurant.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$_GET['id']?>">
    <label><b>Name:</b></label>
    <input type="text" value=<?=$restaurant['name']?> name="name" required>
    <label><b>Description:</b></label>
    <textarea rows="4" cols="50" name="description" required><?=$restaurant['description']?></textarea>
    <label><b>Local:</b></label>
    <input type="text" value=<?=$restaurant['local']?> name="local" required>
    <button type="submit">Edit restaurant</button>
</form>