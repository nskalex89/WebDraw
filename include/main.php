<!--
    Copyright (c) 2005, 2006 Rafael Robayna

    Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

    The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

    Additional Contributions by: Morris Johns
-->

<table width="100%" style="border-spacing: 0px;">
    <tbody>
        <tr>
            <td width="20%">
                <div class="ctr_btn" id="btn_0" style="background: #CCCCCC;" onclick="setCPDrawAction(0)"
                     onMouseDown="setControlLook(0, '#CCCCCC')" onMouseOver="setControlLook(0, '#EEEEEE')"
                     onMouseOut="setControlLook(0, '#FFFFFF')">brush
                </div>
                <div class="ctr_btn" id="btn_1" onclick="setCPDrawAction(1)" onMouseDown="setControlLook(1, '#CCCCCC')"
                     onMouseOver="setControlLook(1, '#EEEEEE')" onMouseOut="setControlLook(1, '#FFFFFF')">brush 2
                </div>
                <div class="ctr_btn" id="btn_2" onclick="setCPDrawAction(2)" onMouseDown="setControlLook(2, '#CCCCCC')"
                     onMouseOver="setControlLook(2, '#EEEEEE')" onMouseOut="setControlLook(2, '#FFFFFF')">line
                </div>
                <div class="ctr_btn" id="btn_3" onclick="setCPDrawAction(3)" onMouseDown="setControlLook(3, '#CCCCCC')"
                     onMouseOver="setControlLook(3, '#EEEEEE')" onMouseOut="setControlLook(3, '#FFFFFF')">rectangle
                </div>
                <div class="ctr_btn" id="btn_4" onclick="setCPDrawAction(4)" onMouseDown="setControlLook(4, '#CCCCCC')"
                     onMouseOver="setControlLook(4, '#EEEEEE')" onMouseOut="setControlLook(4, '#FFFFFF')">circle
                </div>
            </td>
            <td width="70%" height="500px" style="position: relative; overflow: auto; margin: 0px; padding: 0px; vertical-align: top;">
<!--                <div id="canvas-container">-->
                    <canvas id="canvas"></canvas>
                    <canvas id="canvasInterface"></canvas>
<!--                </div>-->
            </td>
            <td>
                <canvas id="colorChooser" width="275" height="80"></canvas>
                <canvas id="lineWidthChooser" width="275" height="76"></canvas>
            </td>
        </tr>
    </tbody>
</table>


<div id="errorArea"></div>
