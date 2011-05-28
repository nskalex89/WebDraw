<?php
include ("config/config.php");
include ("resizeImage.php");

$appConfig = new AppConfig();

$conn = new mysqli($appConfig->host, $appConfig->user, $appConfig->password,
                   $appConfig->database);


if ($_POST['imgid'] != "") {
    $q_str = "select Temporary from images where ImageId=" . $_POST['imgid'];
    $q_res = $conn->query($q_str);
    $tmp = $q_res->fetch_assoc();
    $tmp = $tmp['Temporary'];
    
    $max = $_POST['imgid'];
} else {
    $tmp = false;
    
    $q_str = "select MAX(ImageId) from images";
    $q_res = @$conn->query($q_str);
    $max = @$q_res->fetch_assoc();
    $max = $max['MAX(ImageId)'];
    $max = $max + 1;
}

$f_path = $appConfig->files . $appConfig->uploaddir . $max;
$s_path = $appConfig->server . $appConfig->uploaddir . $max;
if ($tmp == true) {
    $source = "./" . $appConfig->tmpdir . $max;
    $dest = "./" . $appConfig->uploaddir . $max;
    copy($source, $dest);
}
    
$imgstring = explode(",", $_POST['image']);
$rawimage = base64_decode($imgstring[1]);
file_put_contents($f_path, $rawimage);

// добавление записи в бд
if ($_POST['imgid'] == "") {
    $q_str = "insert into images(FilePath, Comment, CreatedBy, ModifiedBy, " .
    "CreationDateTime, ModificationDateTime, Temporary) values('" .
    $s_path . "', '" . $_POST['comment'] . "', '" . $_POST['author'] .
    "', 'Tmp', NOW(), NOW(), FALSE)";
} else  {  
    $q_str = "update images set Comment = '" . $_POST['comment'] .
    "', ModifiedBy = '" . $_POST['author'] . "', ModificationDateTime = NOW(), " .
    "Temporary = FALSE, FilePath = '" . $s_path .
    "' where ImageId = " . $_POST["imgid"];
}

$conn->query($q_str);
$msg = $conn->insert_id;
$conn->close();

echo $max;
?>
