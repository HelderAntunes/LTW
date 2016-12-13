 <form id="edit_user" action="action_edit_user.php" method="post" enctype="multipart/form-data">
    <h3>Username: <?=$user['username']?></h3>
    <input type="hidden" value=<?=$user['username']?> name="username" required>
    <label>Password:</label>
    <input type="password" name="password" required>
    <label>New Password:</label>
    <input type="password" name="new_password">
    <label>Email:</label>
    <input type="email" value=<?=$user['email']?> name="email" required>
    <label>Birthdate:</label>
    <input type="date" value=<?=$user['birthdate']?> name="birthdate" required>
    <button type="submit">Edit profile</button>
</form>