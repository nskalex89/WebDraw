<div class="dialog" id="load-dialog">
    <form name="form" action="" method="POST" enctype="multipart/form-data">
        <input id="fileToUpload" type="file" size="45" name="fileToUpload">
    </form>
</div>
<div class="dialog" id="save-dialog">
    <p>Автор: <input type="text" id="save-author"></p>
    <p>
        Комментарий:<br>
        <textarea id="save-comment" rows="10" cols="45"></textarea>
    </p>
</div>
<div style="width: 100%; height: 100%;">
    <div class="toolbar" style="display: inline-block; vertical-align: top; margin: 10px;">
        <div id="draw-brush" class="drawing-toolbar-button" title="Кисть"><img src="images/editor/draw-brush.png"></div>
        <div id="draw-circle" class="drawing-toolbar-button" title="Эллипс"><img src="images/editor/draw-circle.png"></div>
        <div id="draw-rectangle" class="drawing-toolbar-button" title="Прямоугольник"><img src="images/editor/draw-rectangle.png"></div>
        <div id="draw-eraser" class="drawing-toolbar-button" title="Ластик"><img src="images/editor/draw-eraser.png"></div>
    </div>
    <div style="display: inline-block; padding: 10px; padding-left: 0px;">
        <script type="application/processing" target="plot">
            int imageWidth = 550;
            int imageHeight = 350;
            float x;
            float y;
            float targetX, targetY;
            float easing = 0.07;
            float startX;
            float startY;
            PImage bg;
            boolean canDraw;
            
            <?php
            if ($_GET["imgid"] != "") {
            $appConfig = new AppConfig();

            $conn = new mysqli($appConfig->host, $appConfig->user, $appConfig->password,
                               $appConfig->database);
            $q_str = "select images.FilePath from images where images.ImageId = " . $_GET["imgid"];
            $q_res = @$conn->query($q_str);
            $imgPath = @$q_res->fetch_assoc();
            $imgPath = $imgPath['FilePath'];
            $conn->close();

            echo("/* @pjs preload='" . $imgPath . "'; */");
            }
            ?>

            void clearPlot() {
            bg = createImage(imageWidth, imageHeight, RGB);
            bg.loadPixels();
            for (int i = 0; i < bg.pixels.length; i++) {
            bg.pixels[i] = color(255, 255, 255);
            }
            bg.updatePixels();
            }

            void setup() {
            size(imageWidth, imageHeight);
            smooth();
            noStroke();

            color c = color(brushR, brushG, brushB);
            fill(c);

            <?php
            if ($_GET["imgid"] != "") {
            echo("bg = loadImage('" . $imgPath . "');");
            }
            else {
            echo("clearPlot();");
            }
            ?>
            }

            void draw() {
            background(bg);
            if (canDraw) {
            if (selectedTool == "circle") {
            //set(0, 0, bg);
            ellipse(startX, startY, x - startX, y - startY);
            } 
            else if (selectedTool == "rectangle") {
            //set(0, 0, bg);
            rect(startX, startY, x - startX, y - startY);
            } 
            }
            }

            void mousePressed() {
            color c = color(brushR, brushG, brushB);
            fill(c);

            bg = get();

            startX = mouseX;
            startY = mouseY;
            x = mouseX;
            y = mouseY;

            canDraw = true;
            }

            void mouseDragged() {
            if (selectedTool == "circle" || selectedTool == "rectangle") {
            x = mouseX;
            y = mouseY;
            } 
            else {
            targetX = mouseX;
            float dx = mouseX - x;
            if (abs(dx) > 1) {
            x += dx * easing;
            }

            targetY = mouseY;
            float dy = mouseY - y;
            if (abs(dy) > 1) {
            y += dy * easing;
            }
            }

            if (selectedTool == "brush") {
            noLoop();
            ellipse(x, y, brushSize, brushSize);
            } 
            else if (selectedTool == "eraser") {
            noLoop();
            color c = color(255, 255, 255);
            fill(c);
            ellipse(x, y, brushSize, brushSize);
            }
            }

            void mouseReleased() {
            color c = color(brushR, brushG, brushB);
            fill(c);

            bg = get();

            canDraw = false;
            loop();
            }

            $("#new-picture").click(function() {
            clearPlot();
            });
        </script>
        <canvas id="plot" width="550" height="350"></canvas>
    </div>
    <div class="toolbar" style="display: inline-block; vertical-align: top; margin-top: 10px;">
        <div id="colorpicker"></div>
        <hr>
        <div>
            <div id="brush-size-slider" style="width: 130px; display: inline-block; vertical-align: middle;"></div>
            <canvas id="brush-size" data-processing-sources="pde/brush-size.pde"></canvas>
        </div>
    </div>
</div>