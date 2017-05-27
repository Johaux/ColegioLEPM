<?php

require_once("src/jpgraph.php");
require_once("src/jpgraph_bar.php");


//ejemplo datos a graficar
$datos_X = array('dato1','dato2','dato3','dato4','dato5');
$datos_Y = array(35,65,120.250,300);


//se crea un objeto con el tamaño del graph

$grafica = new Graph(900,640);
$grafica->SetScale("textlin");



// posicion de los puntos del eje de las Y

$mayor = array(0,50,100,150,200,250,300);
$menor = array(100,150,200,250,300,350,350);

$grafica->yaxis->SetTickPositions($mayor,$menor);

$grafica->SetBox(false);

//nombe de las columnas

$grafica->xaxis->SetTickLabels($datos_X);

//datos a graficar

$barras = new BarPlot($datos_Y);

//color de los bordes
$barras->SetColor("white");
$barras->SetFillColor("red");

//ancho de las barras
$barras->SetWidth(50);


//titulo de la grafica
$grafica->title->set("Ventas por producto");

//tipo de letra
$grafica->title->SetFont(FF_TIMES,FS_ITALIC,18);

//SE grafica
$grafica->Add($barras);
$grafica->Stroke();


 ?>
