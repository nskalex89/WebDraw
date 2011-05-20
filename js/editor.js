var brushR = 0;
var brushG = 0;
var brushB = 0;

var brushSize = 10;
var selectedTool = "brush";
var processingInstance;
var imgPath = "http://localhost/WebDraw/files/MassEffect.jpg";

function drawBrushSize() {
    if (!processingInstance) {
        processingInstance = Processing.getInstanceById('brush-size');
    }
    processingInstance.loop();
}

$(function() {
    $("#load-dialog").dialog({
        autoOpen: false,
        width: 500,
        title: 'Загрузить изображение'
    });

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

        drawBrushSize();
    });

    $("#draw-brush").click(function() {
        selectedTool = "brush";
    });

    $("#draw-circle").click(function() {
        selectedTool = "circle";
    });

    $("#draw-rectangle").click(function() {
        selectedTool = "rectangle";
    });

    $("#draw-eraser").click(function() {
        selectedTool = "eraser";
    });

    $("#load-picture").click(function() {
        $("#load-dialog").dialog("open");
    });

    $("#load-dialog").dialog("option", "buttons", { "Загрузить": function() {
        $.ajaxFileUpload(
        {
            url:'doajaxfileupload.php',
            secureuri:false,
            fileElementId:'fileToUpload',
            dataType: 'json',
            data:{name:'logan', id:'id'},
            success: function (data, status) {
                if (typeof(data.error) != 'undefined') {
                    if (data.error != '') {
                        alert(data.error);
                    } else {
                        // TODO: переход по адресу
                        //imgPath = "files/" + data.msg;
                        $("#load-dialog").dialog("close");
                    }
                }
            },
            error: function (data, status, e) {
                alert(e);
            }
        });
    }
    });
});
