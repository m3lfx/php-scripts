<?php
session_start();
include('../include/header.php');
if (!isset($_SESSION['user_id'])) {
    $_SESSION['message'] = "please Login to access the page";
    header("Location: ../user/login.php" );
}
?>

<form action="store.php" method="POST" enctype="multipart/form-data">

<p>artist name: <input type="text" name="artist_name" /></p>
<p>country<input type="text" name="country" /></p>
<!-- <p>image<input type="text" name="img_path" /></p> -->
<input type="file" name="img_path" /><br/>
<p><input type="submit" value="save" /></p>

</form>

</div>
</body>
</html>