<nav>
    <div>amazingly menuistic: 
        <a href="/home/index">Home</a>
        <!--<a href="/home/restricted">restricted</a>-->

        <?php if(isset($_SESSION['logged_in'])) : ?>
            <a href="/user/upload">upload</a>
            <a href="/user/feed">image feed</a>
            <a href="/user/all_users">user list</a>
            <a href="/user/logout">logout</a>
            
        <?php else : ?>
            <a href="/user/register">register</a>
            <a href="/user/login">login</a>
        <?php endif; ?>
    </div>
</nav>
<?php
/**
 * The menu file contains the top menu of the project.
 */