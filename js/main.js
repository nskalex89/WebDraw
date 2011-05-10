function HexToRGB(hex_clr) {
    if (!/^\#?[\da-f]{6}$/i.test(hex_clr))
        return null;

    var color = (hex_clr.charAt(0) == "#") ? hex_clr.substring(1) : hex_clr;

    return {
        "red" : parseInt(color.substring(0, 2), 16),
        "green" : parseInt(color.substring(2, 4), 16),
        "blue" : parseInt(color.substring(4, 6), 16)
    }
}

$(function() {
    $(".main-toolbar-button, .drawing-toolbar-button, input:submit").button();
});