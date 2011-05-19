<?php
if ($_GET["p"] == null) {
    Header("Location: index.php?p=main");
    exit;
}

    include("config/config.php");

    $dbConf = new DbConfig();
    $conn = new mysqli($dbConf->host, $dbConf->user, $dbConf->password, $dbConf->database);
?>
<!DOCTYPE html>
<html>
<head>
    <title>WebDraw</title>
    <meta charset="utf-8">
    <script src="js/jquery-1.5.2.min.js"></script>
    <script src="js/jquery-ui-1.8.11.custom.min.js"></script>

    <?php if ($_GET["p"] == "main") { ?>
    <script src="js/processing-1.1.0.min.js"></script>
    <script src="js/farbtastic.js"></script>
    <script src="js/editor.js"></script>
    <?php } ?>

    <?php if ($_GET["p"] == "gallery") { ?>
    <script src="js/gallery.js"></script>
    <?php } ?>

    <?php if ($_GET["p"] == "load") { ?>
    <script src="js/jquery.fileupload.js"></script>
    <script src="js/jquery.fileupload-ui.js"></script>
    <script src="js/jquery.iframe-transport.js"></script>
    <script src="js/jquery.image-gallery.js"></script>
    <script src="js/jquery.tmpl.min.js"></script>
    <?php } ?>

    <script src="js/main.js"></script>

    <link rel="stylesheet" type="text/css" href="css/ui-aristo/jquery-ui-1.8.11.custom.css">

    <?php if ($_GET["p"] == "main") { ?>
    <link rel="stylesheet" type="text/css" href="css/farbtastic.css">
    <?php } ?>

    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>
<div class="main">
    <header class="page-header">
        <table border="0" width="100%" height="100%">
            <tbody>
            <tr>
                <td rowspan="2" width="30%">
                    <a href="#">
                        <img src="images/logo.png" width="260" height="46" alt="WebDraw"
                             style="margin-left: 10px; border: 0px;">
                    </a>
                </td>
                <td width="40%"></td>
                <td rowspan="2"></td>
            </tr>
            <tr>
                <td height="50%">
                    <div style="text-align: center; margin-top: 20px;">
                        <a class="menu" href="index.php?p=main">Редактор</a> |
                        <a class="menu" href="index.php?p=gallery">Галлерея</a> |
                        <a class="menu" href="index.php?p=load">Загрузка</a> |
                        <a class="menu" href="index.php?p=about">О сайте</a>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </header>
    <div class="container">
        <?php if ($_GET["p"] != "about" && $_GET["p"] != "load") { ?>
        <div class="toolbar-container">
            <div class="toolbar">
                <?php if ($_GET["p"] == "main") { ?>
                <div id="new-picture" class="main-toolbar-button">Очистить холст</div>
                <div id="delete-picture" class="main-toolbar-button">Сохранить</div>
                <?php } elseif ($_GET["p"] == "gallery") { ?>
                <div id="new-picture" class="main-toolbar-button">Редактировать</div>
                <div id="load-picture" class="main-toolbar-button">Информация</div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>

        <div class="content-container">

            <?php
            switch ($_GET["p"])
        {
            case "about":
                include ("include/about.php5");
                break;
            case "main":
                include ("include/main.php5");
                break;
            case "load":
                include ("include/load.php5");
                break;
        }
            ?>

        </div>

    </div>
    <footer class="page-footer">
        2011, Алексей Сазыкин
    </footer>
</div>
</body>
</html>

<?php
$conn->close();
?>