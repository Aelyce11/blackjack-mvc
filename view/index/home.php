<?php
include('../view/header.php');
?>

<form method="POST" action="/?controller=game&action=new">
  <fieldset>
    <legend>Begin a new game !</legend>
    <input type="text" name="player">
    <button type="submit">GO !</button>
  </fieldset>
</form>

<?php
include('../view/footer.php');
?>