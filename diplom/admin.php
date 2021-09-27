<?php
require_once "dbconnect.php";
?>

<!DOCTYPE html>
<html>
<title>Админка</title>

<?php
include "standart.html";
?>

<?php
    if (!empty($_POST)) {
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
    <input type="submit" value="Опубликовать">
  </div>
  </form>
</div>
</body>

</body>
</html>