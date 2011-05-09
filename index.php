<?
if ($_GET["p"] == null) {
    Header("Location: index.php?p=main");
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>WebDraw</title>
        <meta charset="utf-8">
        <script src="js/jquery-1.5.2.min.js"></script>
        <script src="js/jquery-ui-1.8.11.custom.min.js"></script>
        <script src="js/main.js"></script>

        <link rel="stylesheet" type="text/css" href="css/ui-aristo/jquery-ui-1.8.11.custom.css">
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
                                    <img src="images/logo.png" width="260" height="46" alt="WebDraw" style="margin-left: 10px; border: 0px;">
                                </a>
                            </td>
                            <td width="40%"></td>
                            <td rowspan="2"></td>
                        </tr>
                        <tr>
                            <td height="50%">
                                <div style="text-align: center; margin-top: 20px;">
                                    <a class="menu" href="index.php?p=main">Главная</a> |
                                    <a class="menu" href="index.php?p=gallery">Галлерея</a> |
                                    <a class="menu" href="index.php?p=about">О сайте</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </header>
            <div class="container">
                <?php if ($_GET["p"] != "about") { ?>
                    <div class="toolbar-container">
                        <div class="toolbar">
                            <?php if ($_GET["p"] == "main") { ?>
                                <div id="new-picture">Очистить холст</div>
                                <div id="load-picture">Загрузить</div>
                                <div id="delete-picture">Сохранить</div>
                            <?php } elseif ($_GET["p"] == "gallery") { ?>
                                <div id="new-picture">Редактировать</div>
                                <div id="load-picture">Информация</div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>

                <div class="content-container">

                    <?php
                    switch ($_GET["p"]) {
                        case "about":
                            include ("include/about.php");
                            break;
                        case "main":
                            include ("include/main.php");
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
