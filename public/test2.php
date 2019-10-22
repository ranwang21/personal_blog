<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['choice'])){
    var_dump($_POST['choice']);
}

?>

<form action="test2.php" method="post">
    <input type="checkbox" name="choice[]" value="first" />
    <input type="checkbox" name="choice[]" value="second" />
    <input type="checkbox" name="choice[]" value="third" />
    <input type="submit" />
</form>
