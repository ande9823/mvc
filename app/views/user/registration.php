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
<!-- Potential regex for username: pattern="^(?=.{8,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$" -->
    </div>
    
    <div>    
        <label for="password">password</label>
        <br>
        <input id="password" name="password" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\S{7,31}">
    </div>
<!-- Regex for password: pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\S{7,31}"-->
    <button type="submit">Submit</button>
</form>

