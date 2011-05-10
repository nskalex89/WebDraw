var brushR = 0;
var brushG = 0;
var brushB = 0;

var brushSize = 10;
var processingInstance;

function drawBrushSize() {
    if (!processingInstance) {
        processingInstance = Processing.getInstanceById('brush-size');
    }
    processingInstance.loop();
}

$(function() {
    $('#brush-size-slider').slider({
        min: 1,
        max: 45,
        value: brushSize,
        slide: function() {
            brushSize = $(this).slider("option", "value");
            drawBrushSize();
        }
    });

    $('#colorpicker').farbtastic(function() {
        var rgbColor = HexToRGB(this.color);

        brushR = rgbColor.red;
        brushG = rgbColor.green;
        brushB = rgbColor.blue;

        debugger;
        drawBrushSize();
    });
});
