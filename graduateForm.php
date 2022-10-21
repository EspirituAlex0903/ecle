<form action="" method="post">
    <div class="inputs">

    <input type="text" class="input" placeholder="Student Number" name="studentNumber">
    <input type="text" class="input" placeholder="Last Name" name="lname">
    <input type =hidden name="token" value="<?php echo Token::generate(); ?>">
    <input type="submit" class="button-check"value="Check"/>
    </div>
</form>
<div>
    <a href="index.php"><input type="submit" class="button-back"value="Back"/></a>
</div>