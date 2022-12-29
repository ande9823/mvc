<h1>Register new user</h1>
<form method="post" action="/user/register">
    <div>    
        <label for="email">email address</label>
        <br>
        <input id="email" name="email" pattern="\S+@\S+\.([a-z]|[A-Z]){1,5}">
    </div>
    
    <div>    
        <label for="username">username</label>
        <br>
        <input id="username" name="username">
    </div>
    
    <div>    
        <label for="password">password</label>
        <br>
        <input id="password" name="password" type="password">
    </div>
<!-- Regex for password: pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\S{7,31}"-->
    <button type="submit">Submit</button>
</form>

