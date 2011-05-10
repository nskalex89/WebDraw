// Main draw loop
void draw() {
    color c = color(brushR, brushG, brushB);

    size(50, 50);
    background(255);
    stroke(c);
    fill(c);
    ellipse(width / 2, height / 2, brushSize, brushSize);
}