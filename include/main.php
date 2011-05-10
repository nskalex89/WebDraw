<div style="width: 100%; height: 100%;">
    <div class="toolbar" style="display: inline-block; vertical-align: top; margin: 10px;">
        <div id="draw-brush" class="drawing-toolbar-button"><img src="images/editor/draw-brush.png"></div>
        <div id="draw-circle" class="drawing-toolbar-button"><img src="images/editor/draw-circle.png"></div>
        <div id="draw-rectangle" class="drawing-toolbar-button"><img src="images/editor/draw-rectangle.png"></div>
        <div id="draw-eraser" class="drawing-toolbar-button"><img src="images/editor/draw-eraser.png"></div>
    </div>
    <div style="display: inline-block; padding: 10px; padding-left: 0px;">
        <canvas id="plot"></canvas>
    </div>
    <div class="toolbar" style="display: inline-block; vertical-align: top; margin-top: 10px;">
        <div id="colorpicker"></div>
        <hr>
        <div>
            <div id="brush-size-slider" style="width: 130px; display: inline-block; vertical-align: middle;"></div>
            <canvas data-processing-sources="pde/brush-size.pde" id="brush-size"></canvas>
        </div>
    </div>
</div>