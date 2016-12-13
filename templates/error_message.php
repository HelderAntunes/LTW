<?php if (isset($_SESSION['error'])) { ?>
    <span id="error">
        <p><?=$_SESSION['error']?></p>
    </span>
<?php unset($_SESSION['error']); }?>