<?
include("class/pData.class");
include("class/pChart.class");
include("class/pCache.class");

$fullfilename = "./resources/rem.csv";
if(($handle = fopen($fullfilename, "r")) !== FALSE)
{
	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
	{		
		switch (substr($data[0],5,2))
		{
			case '01':
				$date[1][] = str_replace("20","",date("d.m.Y", strtotime($data[0])));
				$t1[1][] = $data[1];
				$t2[1][] = $data[2];
			break;
			
			case '02':
				$date[2][] = str_replace("20","",date("d.m.Y", strtotime($data[0])));
				$t1[2][] = $data[1];
				$t2[2][] = $data[2];
			break;
			
			case '03':
				$date[3][] = str_replace("20","",date("d.m.Y", strtotime($data[0])));
				$t1[3][] = $data[1];
				$t2[3][] = $data[2];
			break;
			
			case '04':
				$date[4][] = str_replace("20","",date("d.m.Y", strtotime($data[0])));
				$t1[4][] = $data[1];
				$t2[4][] = $data[2];
			break;
			
			case '05':
				$date[5][] = str_replace("20","",date("d.m.Y", strtotime($data[0])));
				$t1[5][] = $data[1];
				$t2[5][] = $data[2];
			break;
			
			case '06':
				$date[6][] = str_replace("20","",date("d.m.Y", strtotime($data[0])));
				$t1[6][] = $data[1];
				$t2[6][] = $data[2];
			break;
			
			case '07':
				$date[7][] = str_replace("20","",date("d.m.Y", strtotime($data[0])));
				$t1[7][] = $data[1];
				$t2[7][] = $data[2];
			break;
			
			case '08':
				$date[8][] = str_replace("20","",date("d.m.Y", strtotime($data[0])));
				$t1[8][] = $data[1];
				$t2[8][] = $data[2];
			break;
			
			case '09':
				$date[9][] = str_replace("20","",date("d.m.Y", strtotime($data[0])));
				$t1[9][] = $data[1];
				$t2[9][] = $data[2];
			break;
			
			case '10':
				$date[10][] = str_replace("20","",date("d.m.Y", strtotime($data[0])));
				$t1[10][] = $data[1];
				$t2[10][] = $data[2];
			break;
			
			case '11':
				$date[11][] = str_replace("20","",date("d.m.Y", strtotime($data[0])));
				$t1[11][] = $data[1];
				$t2[11][] = $data[2];
			break;
			
			case '12':
				$date[12][] = str_replace("20","",date("d.m.Y", strtotime($data[0])));
				$t1[12][] = $data[1];
				$t2[12][] = $data[2];				
			break;
		}
    }
	for($i=1; $i <= 12; $i++)
	{
		if (isset($date[$i]))
		{	
			$filename = "chart_t_mounth_".$i.".png";
			//строим диаграмму
			$DataSet = new pData;
			$DataSet->AddPoint($t1[$i],"Serie-t1");
			$DataSet->AddPoint($t2[$i],"Serie-t2");
			$DataSet->AddPoint($date[$i],"Serie-date");
			$DataSet->AddSerie("Serie-t1");
			$DataSet->AddSerie("Serie-t2");
			$DataSet->SetAbsciseLabelSerie("Serie-date");
			$DataSet->SetSerieName("t1","Serie-t1");
			$DataSet->SetSerieName("t2","Serie-t2");
			//$DataSet->SetYAxisName("duration");
			//$DataSet->SetYAxisFormat("time");
			//$DataSet->SetXAxisFormat("date");			
			$Test = new pChart(1500,800);
			$Test->setFontProperties("Fonts/tahoma.ttf",8);
			$Test->setGraphArea(65,30,1450,700);
			$Test->drawFilledRoundedRectangle(7,7,693,223,5,240,240,240);
			$Test->drawRoundedRectangle(5,5,695,225,5,230,230,230);
			$Test->drawGraphArea(220,218,218,TRUE);
			$Test->drawScale($DataSet->GetData(),$DataSet->GetDataDescription(),SCALE_NORMAL,150,150,150,TRUE,0,2);
			$Test->drawGrid(4,TRUE,230,230,230,50);			 
			$Test->setFontProperties("Fonts/tahoma.ttf",6);
			$Test->drawTreshold(0,143,55,72,TRUE,TRUE);		
			$Test->drawLineGraph($DataSet->GetData(),$DataSet->GetDataDescription());
			$Test->drawPlotGraph($DataSet->GetData(),$DataSet->GetDataDescription(),3,2,255,255,255);		
			$Test->setFontProperties("Fonts/tahoma.ttf",8);
			$Test->drawLegend(90,35,$DataSet->GetDataDescription(),255,255,255);
			$Test->setFontProperties("Fonts/tahoma.ttf",10);
			//$Test->drawTitle(60,22,"Диаграмма",50,50,50,585);
			$Test->Render("charts\\".$filename);
			?>			
			<br /><img width="1200px" src="charts/
			<?
			echo $filename.'" />';
		}
	}	
    fclose($handle);
}
?>