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

// не убирать!
/* @pjs preload="http://localhost/WebDraw/files/MassEffect.jpg"; */

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

  if (imgPath != "") {
    bg = loadImage(imgPath);
  }
  else {
    clearPlot();
  }
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