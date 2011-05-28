var brushR = 0;
var brushG = 0;
var brushB = 0;

var brushSize = 10;
var selectedTool = "brush";
var processingInstance;

/**
* Parses get params out of an url
*
* @param string url - an url . if empty or null - parses current page's url
* @return array GET - an array of params passed
*/
function parseGET(url)
{  
        if(!url || url == '') url = document.location.search;
        if(url.indexOf('?') < 0) return Array();
 
        url = url.split('?');
        url = url[1];
       
        var GET = [];
        var params = [];
        var keyval = [];
 
        if(url.indexOf('#')!=-1)    
        {    
                anchor = url.substr(url.indexOf('#')+1);
                url = url.substr(0,url.indexOf('#'));
        }
 
        if(url.indexOf('&') > -1) params = url.split('&');
        else params[0] = url;
 
        for (i=0; i<params.length; i++)
        {
                if(params[i].indexOf('=') > -1) keyval = params[i].split('=');
                else { keyval[0] = params[i]; keyval[1] = true; }
                GET[keyval[0]]=keyval[1];
        }
     
        return (GET);
};

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
    
    $("#save-dialog").dialog({
        autoOpen: false,
        width: 500,
        title: 'Сохранить изображение'
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
    
    $("#save-picture").click(function() {
        $("#save-dialog").dialog("open");
        $("#save-author").attr("value", "");
        $("#save-comment").attr("value", "");
    });

    $("#load-dialog").dialog("option", "buttons", {
        "Загрузить": function() {
            $.ajaxFileUpload(
            {
                url:'doajaxfileupload.php',
                secureuri:false,
                fileElementId:'fileToUpload',
                dataType: 'json',
                data:{
                    name:'logan', 
                    id:'id'
                },
                success: function (data, status) {
                    if (typeof(data.error) != 'undefined') {
                        if (data.error != '') {
                            alert(data.error);
                        } else {
                            $("#load-dialog").dialog("close");
                            top.location.href = "index.php?p=main&imgid=" + data.msg;
                        }
                    }
                },
                error: function (data, status, e) {
                    alert(e);
                }
            });
        }
    });
    
    $("#save-dialog").dialog("option", "buttons", {
        "Сохранить": function() {
            var img = document.getElementById("plot").toDataURL();
            var $_GET = parseGET();
            $.post("saveimage.php", {
                author: $("#save-author").attr("value"),
                comment: $("#save-comment").attr("value"),
                image:  img,
                imgid: $_GET['imgid']
            },
            function (data) {
                    top.location.href = "index.php?p=main&imgid=" + data;
                }
            );
            $("#save-dialog").dialog("close");
        }
    });
});
