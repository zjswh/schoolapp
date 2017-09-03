<?php 
require '../init.inc.php';
$_model = new onCourseModel();
$_obj = $_model->getAllOnCourse();
$datay=array();
$datax=array();
$_obj = Tool::subStr($_obj, 'name', '6', 'UTF-8');
foreach($_obj as $_value){

    array_push($datay, $_value->studyNum);
    array_push($datax, $_value->name);
}
require_once ('../jpgraph/jpgraph.php');
require_once ('../jpgraph/jpgraph_bar.php');

// We need some data
// $datay=array(0.13,0.25,0.21,0.35,0.31,0.06);
// $datax=array("January","February","March","April","May","June");

// Setup the graph.
$graph = new Graph(550,600);
$graph->img->SetMargin(70,10,40,100);
$graph->SetScale("textlin");
$graph->SetMarginColor("lightblue:1.1");
$graph->SetAngle(90);
$graph->SetShadow();

// Set up the title for the graph

$graph->title->SetMargin(5);
$graph->title->SetFont(FF_SIMSUN,FS_BOLD);
$graph->title->SetColor("darkred");


// Setup font for axis
// $graph->xaxis->SetFont(FF_VERDANA,FS_NORMAL,10);
$graph->xaxis->title->SetFont(FF_SIMSUN,FS_BOLD,10);
$graph->yaxis->title->SetFont(FF_SIMSUN,FS_BOLD);
$graph->yaxis->SetFont(FF_VERDANA,FS_NORMAL,10);
$graph->xaxis->SetTitleMargin(20);

// Show 0 label on Y-axis (default is not to show)
$graph->yscale->ticks->SupressZeroLabel(false);

// Setup X-axis labels
$graph->xaxis->SetTickLabels($datax);
$graph->xaxis->SetLabelAngle(0);

// Create the bar pot
$bplot = new BarPlot($datay);
$graph->xaxis->title->Set(iconv("UTF-8","GB2312//IGNORE","课程")); 
$graph->yaxis->title->Set(iconv("UTF-8","GB2312//IGNORE","次数")); 
$graph->xaxis->title->SetAngle(0);
$graph->yaxis->title->SetAngle(0);
$bplot->SetWidth(0.6);

// Setup color for gradient fill style
$bplot->SetFillGradient("navy:0.9","navy:1.55",GRAD_LEFT_REFLECTION);



// Set color for the frame of each bar
$bplot->SetColor("white");
$graph->Add($bplot);
$bplot->value->SetFormat('%d');
$bplot->value->Show();
// Finally send the graph to the browser
$graph->Stroke();
?>
