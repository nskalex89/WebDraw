<?php
$appConfig = new AppConfig();
$conn = new mysqli($appConfig->host, $appConfig->user, $appConfig->password,
                   $appConfig->database);

$q_str = "select * from images";
$q_res = $conn->query($q_str);
?>

<table id="gallery-grid">
    <?php
        $i = 0;
        echo ('<tr>');
        while (($row_data = $q_res->fetch_assoc()) !== NULL) {
            if ($row_data['Temporary'] == 0) {
                if ($i % 3 == 0) {
                    echo ('</tr><tr>');
                }
                echo ('<td><img src="' . $appConfig->uploaddir . $row_data['ImageId'] . '" id="' .
                      $row_data['ImageId'] . '" class="gallery-image"></img></td>');
                $i++;
            }
        }
        echo ('</tr>');
    ?>
</table>