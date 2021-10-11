<?php
include "standart.php";
require_once "dbconnect.php";

//session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && $_SESSION["admORuser"] !== "admin"){
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<title>Админка</title>

<?php
    if (!empty($_POST['public'])) {
        $stmt = mysqli_prepare($link, "INSERT INTO newss VALUES (null, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, 'ssss', $theme, $text, $photo, $date);

        $upfile = 'image/';
        $uploadfile = $upfile . basename($_FILES['newsImage']['name']);

        if (move_uploaded_file($_FILES['newsImage']['tmp_name'], $uploadfile)) {
            $msg =  "Файл корректен и был успешно загружен.\n";
        } else {
            $msg =  "Возможная атака с помощью файловой загрузки!\n";
        }

        $theme = $_POST["nTitle"];
        $text = $_POST["nText"];
        $photo = $_FILES['newsImage']['name'];
        $date = date("Y-n-j"); 

        mysqli_stmt_execute($stmt);

        printf("строк добавлено: %d.\n", mysqli_stmt_affected_rows($stmt));

    }
?>

<body>
<div class="container">
  <form enctype="multipart/form-data" action="admin.php" method="POST">
    <div>
      <label for="nTitle">Текст темы</label>
      <input type="text" id="nTitle" name="nTitle" placeholder="Тема тут...">
    </div>
    <div>
      <label for="nText">Текст Новости</label>
      <textarea id="nText" name="nText" placeholder="Новость тут..." style="height:200px"></textarea>
    </div>
    <div>
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <label for="newsImage">Добавить изображение</label>
    <input name="newsImage" type="file" class="form-control-file" id="newsImage">
  </div>
  <div>
    <input type="submit" name="public" value="Опубликовать">
  </div>
  </form>


<?php
$query1 = "SELECT id, username, admORuser FROM admin";
$result1 = mysqli_query($link, $query1);
while ($row1 = mysqli_fetch_assoc($result1)) {
echo ' | ID = '.$row1["id"].' | ';
echo ' Имя = '.$row1["username"].' ';
echo ' | Админ = '.$row1["admORuser"].' | <br>';
}

if (!empty($_POST['owner'])) {  
    $ressult = mysql_query("UPDATE admin SET admORuser = '$admoruser' WHERE id = '$idd'");
    mysqli_fetch_array($ressult);
    
    $admoruser = $_POST["the_admin"]; 
    $idd = $_POST["the_ID"];
}
?>
<form method="POST">
<div>
<select name="the_ID">
<?php foreach($result1 as $option) : ?>
        <option value="<?php echo $option['id']; ?>"><?php echo $option['id']; ?></option>
<?php endforeach; ?>
</select>
<select name="the_admin">
    <option>admin</option>
    <option>user</option>
</select>
<input type="submit" name="owner" value="Выдать">
</div>
</form>
</div>
</body>

</body>
</html>

