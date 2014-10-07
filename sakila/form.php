<? require_once('header.php'); ?>

<!-- Input form -->

<form action="action.php" method="get">
	<fieldset>
		<legend>Enter an actor here</legend>
	First Name <input type="text" name="firstName"><br>
	Last Name <input type="text" name="lastName"><br>
	<input type="submit" name="submit" value="submit"><button name="Cancel" value="Cancel" type="reset">Cancel</button>
	</fieldset>
</form>

<? require_once('footer.php'); ?>