var selectedImageId = -1;

$(function() {
    $('#gallery-grid td').click(function () {
        $('#gallery-grid td').removeClass('selected');
        $(this).addClass('selected');
        selectedImageId = $(this).children('img').attr('id');
    });
    
    $('#edit-picture').click(function() {
        top.location.href = "index.php?p=main&imgid=" + selectedImageId;
    });
    
    $('#show-picture-info').click(function() {
        if (selectedImageId != -1) {
            top.location.href = "index.php?p=imageinfo&imgid=" + selectedImageId;
        }
    });
});
