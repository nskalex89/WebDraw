// execute once when the program begins
void setup()
{
    size(50, 50);
}

// Main draw loop
void draw() {
    color c = color(brushR, brushG, brushB);

    background(255);
    stroke(c);
    fill(c);
    ellipse(width / 2, height / 2, brushSize, brushSize);
}