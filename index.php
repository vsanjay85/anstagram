<!DOCTYPE html>
<html>
<head>
<title>Welcome to Saskatchewan!</title>
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
  Enter A Word:<br>
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
	$escaped_anword = escapeshellarg($anword);
	if(str_word_count("$anword") == 1)
		{
		echo "Generating Anagrams For: $anword <br> <br>";
		$output = shell_exec("/usr/games/an {$escaped_anword} | tr '[:upper:]' '[:lower:]' | uniq");
		$count = count(explode("\n", $output));		
		echo "Your Word Generated $count Anagrams:";		
		echo "<pre>$output</pre>";
		}
	elseif(str_word_count("$anword") < 1)
		{
			echo "You Did Not Enter Anything!!";
		}
	else { echo "Enter Only One Word!!"; }
	}
?>

</body>
<footer>
<p> You're being served by: <?php echo gethostname(); ?> </p>  </footer>
</html>
