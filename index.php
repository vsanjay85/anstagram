<!DOCTYPE html>
<html>
<head>
<title>Welcome to Anstagram!</title>
<style>
    body {
        width: 35em;
        margin: 0 auto;
        font-family: Tahoma, Verdana, Arial, sans-serif;
    }
</style>
</head>
<body>
<h1>Welcome to Anstagram!</h1>
<p>Enter a single word, and I'll generate all possible anagrams for it.</p>

<p>
<form  method="post" action="">
  Enter Word:<br>
  <input type="text" name="anword"><br>

<input type="submit" value="Submit">
<a href="." style="text-decoration: none">
   <input type="button" value="Clear Results" />
</a>
</form>
</p>

<?php
if(isset($_POST['anword']))
    {
	
	$anword = htmlspecialchars($_POST['anword']);
	if(str_word_count("$anword") == 1)
		{
		echo $anword;
		$output = shell_exec("/usr/games/an {$anword} | tr '[:upper:]' '[:lower:]' | uniq");
		echo "<pre>$output</pre>";
		}
	elseif(str_word_count("$anword") < 1)
		{
			echo "You Did Not Enter Anything!!";
		}
	else { echo "Enter Only One Word!!"; }
	}
?>

<!--<p>For online documentation and support please refer to
<a href="http://nginx.org/">nginx.org</a>.<br/>
Commercial support is available at
<a href="http://nginx.com/">nginx.com</a>.</p>

<p><em>Thank you for using nginx, eh?</em></p>
-->
</body>
</html>