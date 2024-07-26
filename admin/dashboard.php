<?php
$query = mysqli_query($db, "SELECT name, level FROM users WHERE username = '$login_session'");
$users = mysqli_fetch_assoc($query); 
?>

<div class="container">
    <h1>Selamat Datang <i><?php echo $users['name'];?></i>!!</h1>
</div>