<?php
$appConfig = new AppConfig();
$conn = new mysqli($appConfig->host, $appConfig->user, $appConfig->password,
                   $appConfig->database);

$q_str = "select * from images where ImageId = " . $_GET['imgid'];
$q_res = $conn->query($q_str);
$row_data = $q_res->fetch_assoc();
?>

<p>Автор: <?php echo($row_data['CreatedBy']); ?></p>
<p>Последним изображение редактировал: <?php echo($row_data['ModifiedBy']); ?></p>
<p>Дата и время содания: <?php echo($row_data['CreationDateTime']); ?></p>
<p>Дата и время последней модификации: <?php echo($row_data['ModificationDateTime']); ?></p>
<p>Комментарий:<p><?php echo($row_data['Comment']); ?></p></p>
