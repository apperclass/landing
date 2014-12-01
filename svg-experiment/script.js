var palette = [
    'c9cd9a',
    'cad19d',
    'b1c095',
    '80a184',
    '98b692',
    '87a687',
    '5d9081',
    '54887b',
    '7ea085',
    '467e73',
    '3d7f7b',
    '2a7578',
    '257073',
    '186d74',
    '257478',
    '257478',
    '186d74',
    '1e6e75'
];

var canvasHeight = 400;
var canvasWidth = 1280;

var s = Snap("#paper");

var
    vertices = new Array(80),
    i, x, y;


for(i = vertices.length; i--; ) {
    do {
        x = Math.random() - 0.5;
        y = Math.random() - 0.5;
    } while(x * x + y * y > 0.25);
    x = (x * 0.96875 + 0.5) * canvasWidth;
    y = (y * 0.96875 + 0.5) * canvasHeight;
    vertices[i] = [x, y];
}

vertices[0] = [0,0];
vertices[vertices.length-1] = [1280,400];
vertices[30] = [1280, 0];
vertices[60] = [0, 400];

var triangles = Delaunay.triangulate(vertices);
var shadowOn = Snap.filter.shadow(0,0,10, '#FFF', 0.5);
var shadowOff = Snap.filter.shadow(0,0,0, '#FFF', 0.5);

var paletteRatio = (palette.length) / triangles.length;

console.log( triangles.length);
for(i = triangles.length; i; ) {

    var trianglePoints = [];
    i--;
    trianglePoints[0] = vertices[triangles[i]][0];
    trianglePoints[1] = vertices[triangles[i]][1];
    i--;
    trianglePoints[2] = vertices[triangles[i]][0];
    trianglePoints[3] = vertices[triangles[i]][1];
    i--;
    trianglePoints[4] = vertices[triangles[i]][0];
    trianglePoints[5] = vertices[triangles[i]][1];

    var g = s.gradient("l(0, 0, 1, 1)#"+getColor(i)+"-#"+getColor(i+20));
    s.polyline(trianglePoints)
        .attr({
            fill: g,
            stroke: "#"+getColor(i),
            strokeWidth: 1
        })
       .hover(function(){
            this.animate({opacity: 0, transform: 'translate(640 300) scale(0.01 0.01)'}, 1000);
            });

}

function getColor(i)
{
    return palette[Math.abs(Math.floor(paletteRatio * ((triangles.length-i))))];
}

$(document).ready(function(){
    $('polyline').hover(function(){
        $(this).prependTo($('#paper'));
    });

});