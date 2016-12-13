<form action="action_remove_restaurant.php" onsubmit="return confirm('Do you really want to delete the restaurant?');" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value=<?=$_GET['id']?>>
    <input type="submit" value="Remove restaurant">
</form>