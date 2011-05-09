var color;
var brushSize;

function drawBrushSize() {
//    var canvas = $('#brush-size');
//    var context = canvas.getContext("2d");
//    context.fillStyle = "red";
//    context.fillRect(0, 0, 10, 10);
}

$(function() {
    $('#brush-size-slider').slider({
        min: 1,
        max: 45,
        change: function() {
            brushSize = $(this).slider("option", "value");
            drawBrushSize();
        }
    });

    $('#brush-size-slider').slider("option", "value", 10);
    
    $('#colorpicker').farbtastic(function() {
        color = this.color;
    });

//    drawBrushSize($('#brush-size'), $('#brush-size-range').value);
//
//    $('#brush-size-range').method().onchange(drawBrushSize($('#brush-size'), $('#brush-size-range').value));
});