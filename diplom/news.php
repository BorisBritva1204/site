<?php
require_once "dbconnect.php";
    session_start();
    $query = "SELECT Theme, Text, Photo, Date FROM newss ORDER BY date DESC";
    $result = mysqli_query($link, $query);
?>

<!DOCTYPE html>
<html>
<title>Новости</title>

<?php
include "standart.html";
?>

<?php
while ($row = mysqli_fetch_assoc($result)) {
echo '<div class="card mb-3" style="max-width: 100%;">';
echo '<div class="row g-0">';
echo '<div class="col-md-3">';
echo '<img width="200" height="211" src="image/'.$row["Photo"].'" alt="Fail">'; 
echo '</div>';
echo '<div class="col-md-8">';
echo '<div class="card-body">';
echo '<h5 class="card-title">'.$row["Theme"].'</h5>';
echo '<p class="card-text">'.$row["Text"].'</p>';
echo '<p class="card-text"><small class="text-muted">'.$row["Date"].'</small></p>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
}
?>

</body>
</html>