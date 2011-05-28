<?php
include ("config/config.php");
include ("resizeImage.php");
$error = "";
$msg = "";
$fileElementName = 'fileToUpload';
$appConfig = new AppConfig();
if (!empty($_FILES[$fileElementName]['error'])) {
    switch ($_FILES[$fileElementName]['error']) {

        case '1':
            $error = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
            break;
        case '2':
            $error = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
            break;
        case '3':
            $error = 'The uploaded file was only partially uploaded';
            break;
        case '4':
            $error = 'No file was uploaded.';
            break;

        case '6':
            $error = 'Missing a temporary folder';
            break;
        case '7':
            $error = 'Failed to write file to disk';
            break;
        case '8':
            $error = 'File upload stopped by extension';
            break;
        case '999':
        default:
            $error = 'No error code avaiable';
    }
} elseif (empty($_FILES['fileToUpload']['tmp_name']) || $_FILES['fileToUpload']['tmp_name'] == 'none') {
    $error = 'No file was uploaded..';
} else {
    $conn = new mysqli($appConfig->host, $appConfig->user, $appConfig->password,
                       $appConfig->database);
    
    $q_str = "select MAX(ImageId) from images";
    $q_res = @$conn->query($q_str);
    $max = @$q_res->fetch_assoc();
    $max = $max['MAX(ImageId)'];
    $max = $max + 1;
    
    $f_path = $appConfig->files . $appConfig->tmpdir . $max;
    $s_path = $appConfig->server . $appConfig->tmpdir . $max;
    resize($_FILES['fileToUpload']['tmp_name'], $f_path, 550, 350, false);
    
    // добавление записи в бд
    $q_str = "insert into images(FilePath, Comment, CreatedBy, ModifiedBy, CreationDateTime, ModificationDateTime, Temporary) values('" . $s_path . "', NULL, 'Tmp', 'Tmp', NOW(), NOW(), TRUE)";
    $conn->query($q_str);
    $msg = $max;
    $conn->close();
}
echo "{";
echo "error: '" . $error . "',\n";
echo "msg: '" . $msg . "'\n";
echo "}";
?>