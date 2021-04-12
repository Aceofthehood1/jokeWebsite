<form action="" method="POST">
    <label>Username</label>
	<input type="text" name="author[username]" /> 
    <label>Password</label>
	<input type="password" name="author[password]" />
	<input type="submit" name="submit" value="Log in" />
	<a href="/author/register">Click here to register if you dont have an account</a>
</form>
<p><?=$errorMessage ?? " " ?></p>