<?php
require_once( "modules/fpdf.php" );

$cityCode = array("ABA"=>"ABAKAN","DYR"=>"ANADYR","AAQ"=>"ANAPA","WZA"=>"APATITY","ARH"=>"ARKHANGELSK","ASF"=>"ASTRAKHAN","BWO"=>"BALAKOVO","BAX"=>"BARNAUL","EGO"=>"BELGOROD","BCX"=>"BELORECK","WZC"=>"BEREZNIKI","BQS"=>"BLAGOVESCHENSK","BTK"=>"BRATSK","UUA"=>"BUGULMA","BKA"=>"BYKOVO","CSY"=>"CHEBOKSARY","CEK"=>"CHELYABINSK","CEE"=>"CHEREPOVETS","HTA"=>"CHITA","WZD"=>"EJSK","SVX"=>"EKATERINBURG","ESL"=>"ELISTA","EV"=>"EVPATORIA","GDZ"=>"GELENDZIK","GRV"=>"GROZNYJ","WZE"=>"HANTY-MANSIJSK","INA"=>"INTA","IKT"=>"IRKUTSK","IWA"=>"IVANOVO","IJK"=>"IZHEVSK","KGD"=>"KALININGRAD","KZN"=>"KAZAN","KEJ"=>"KEMEROVO","KE"=>"KERCH","KHV"=>"KHABAROVSK","WZT"=>"KHIBINY","KVX"=>"KIROV","KVK"=>"KIROVSK","KGP"=>"KOGALYN","WZH"=>"KOLKHI","KXK"=>"KOMSOMOLSK-NA-AMURE","WZI"=>"KRAJNIJ","KRR"=>"KRASNODAR","KJA"=>"KRASNOJARSK","KRO"=>"KURGAN","KUR"=>"KURSK","LPK"=>"LIPETSK","GDX"=>"MAGADAN","MQF"=>"MAGNITOGORSK","WZJ"=>"MAJKOP","MCX"=>"MAKHACHKALA","MRV"=>"MINERALNYE-VODY","MJZ"=>"MIRNYJ","MOW"=>"MOSCOW","MMK"=>"MURMANSK","NBC"=>"NABEREVOYE-CHELNYB","NYM"=>"NADYM","WZL"=>"NAKHICHEVAN","NAL"=>"NALCHIK","NNM"=>"NARYAN-MAR","IGT"=>"NAZRAN","NFG"=>"NEFTEYUGANSK","NER"=>"NERYUNGRI","NJC"=>"NIZHNEVARTOVSK","GOJ"=>"NIZHNIY-NOVGOROD","NOJ"=>"NOJABRXSK","NSK"=>"NORILSK","GNO"=>"NOVGOROD-THE-GREAT","NOZ"=>"NOVOKUZNETSK","OVB"=>"NOVOSIBIRSK","NUX"=>"NOVYJ-URENGOJ","WZM"=>"NYAGAN","OMS"=>"OMSK","REN"=>"ORENBURG","OSW"=>"ORSK","PEZ"=>"PENZA","PEE"=>"PERM","PKC"=>"PETROPAVLOVSK-KAMCHA","PES"=>"PETROZAVODSK","PWE"=>"PEVEK","PYJ"=>"POLYARNYY","PTG"=>"PYATIGORSK","RAT"=>"RADUZHNYI","ROV"=>"ROSTOV","SLY"=>"SALEKHARD","KUF"=>"SAMARA","SKX"=>"SARANSK","RTW"=>"SARATOV","SIP"=>"SIMFEROPOL","WZN"=>"SLEPCOVSKAYA","AER"=>"SOCHI/ADLER","WZO"=>"SOKOL","LED"=>"ST.PETERSBURG","WZP"=>"STARYJ-OSKOL","STW"=>"STAVROPOL","SWT"=>"STRZHEWOI","SGC"=>"SURGUT","SUZ"=>"SUZDAL","SCW"=>"SYKTYVKAR","IKS"=>"TIKSI","TOF"=>"TOMSK","TVE"=>"TVER","TJM"=>"TYUMEN","UFA"=>"UFA","UCT"=>"UKHTA","UUD"=>"ULAN-UDE","ULY"=>"ULYANOVSK","USK"=>"USINSK","UIK"=>"UST-ILIMSK","OGZ"=>"VLADIKAVKAZ","VVO"=>"VLADIVOSTOK","VLK"=>"VOLGODONSK","VOG"=>"VOLGOGRAD","VGD"=>"VOLOGDA","VKT"=>"VORKUTA","VOZ"=>"VORONEZH","YKS"=>"YAKKUTSK",);

$MonthArray = array("January","February","March","April","May","June","July","August","September","October","November","December");

$Curses = array(
	"1. FMT Basic" => 'img/basic.jpg',
	"2. FMT Basic+Perfomance" => "img/2. FMT Basic+Perfomance.jpg",
	"3. FMT Perfomance" => "img/3. FMT Perfomance.jpg",
	"4. FMT Blades" => "img/4. FMT Blades.jpg",
	"5. FMT Blades Advanced" => "img/5. FMT Blades Advanced.jpg",
	"6. FMT SCN" => "img/6. FMT SCN.jpg",
	"7. FMT SCN+MOV" => "img/7. FMT SCN+MOV.jpg",
	"8. FMT MOV" => "img/8. FMT MOV.jpg",
	"9. FMT Logopedics" => "img/basic.jpg",
	"10. FMT Dent" => "img/basic.jpg",
	"11. FMT Equine" => "img/11. FMT Equine.jpg",
	"12. FMT Special Course" => "img/12. FMT Special Course.jpg"
);


$tcode = array(
	"1. FMT Basic" => 'T1',
	"2. FMT Basic+Perfomance" => "TF",
	"3. FMT Perfomance" => "T2",
	"4. FMT Blades" => "T2",
	"5. FMT Blades Advanced" => "T2",
	"6. FMT SCN" => "T2",
	"7. FMT SCN+MOV" => "T2",
	"8. FMT MOV" => "T2",
	"9. FMT Logopedics" => "T2",
	"10. FMT Dent" => "T2",
	"11. FMT Equine" => "T2",
	"12. FMT Special Course" => "T2"
);

if(isset($_POST['name']) && isset($_POST['Country']) && isset($_POST['City']) && isset($_POST['Day']) && isset($_POST['Mounth']) && isset($_POST['Year']) && isset($_POST['Curs'])) {

	$city = $_POST['City'];
	$contry = $_POST['Country'];
	$day = $_POST['Day'];
	$mount = $_POST['Mounth'];
	$year = $_POST['Year'];
	$curs = $_POST['Curs'];
	$names = explode("\n",$_POST['name']);
	sort($names);


	$i = 0;

	$pdf = new FPDF('L','mm','A4');
	foreach (GenerateNumbers($names,$city,$mount,$year,$tcode[$curs]) as $num) {
		FmtBasic($pdf,$num,$names[$i],$cityCode[$city],$contry,$MonthArray[$mount-1],$day,"20".$year,$Curses[$curs]);
		$i++;
	}
	$name = "pdf/".date("d-m-Y").".pdf";
	$pdf->Output("I",$name, true);
} 


//FmtBasic($pdf,"RTMOW1016IT1AO","ALIAKSANDR BOIKA","GOMEL","Belarus","August",17,2018);
//FmtBasicPerformens($pdf,"RTMOW1016IT1AO","ALIAKSANDR2 BOIKA","GOMEL","Belarus","August",17,2018);
/*
ALIAKSANDR BOIKA
ALIAKSANDR LOIKA
ALIAKSANDR BOIKA
GLIAKSANDR DOIKA
VLIAKSANDR FOIKA
ALIAKSANDR BOIKA
FLIAKSANDR BOIKA
SLIAKSANDR FOIKA
*/




function GenerateNumbers($names,$cityCode,$mount,$year,$t)
{
	$enicials = EnicialNames($names);
	$numbers  = array();

	$mount = mb_strlen($mount) > 1 ? $mount : "0".$mount;

	foreach ($enicials as $en) {
		$numbers[] = "RT".$cityCode.$mount.$year.$t.$en;
	}
	return $numbers;
}


function EnicialNames($names)
{
	$res = array();
	$nf = array();
	foreach ($names as $name) {
		$tmp = explode(" ",ucwords($name));
		$nf[] = $tmp[0][0].$tmp[1][0];
	}

/*	print_r($nf);
	print_r(array_count_values($nf) );*/
	foreach (array_count_values($nf) as $key => $value) {
		
		for($i = 0;$i<$value;$i++){
			$res[] = $i == 0 ? $key : $key.$i;
		}
	}
	return $res;
}

function FmtBasic(&$pdf,$code,$name,$city,$country,$mount,$day,$year,$curse)
{
	$pdf->AddPage();
	$pdf->Image($curse,0,0,297);


	// code
	$pdf->SetFont('helvetica','',8);
	$pdf->SetTextColor( '0', '0', '0' );
	$pdf->Ln(2);
	$pdf->Cell(232,10,"",0,0,'R',false);
	$pdf->Cell(26,10,"".$code,0,1,'L',false);
	//$pdf->Cell(0,8,$code,0,1,'R',false);

	// curefly
	$pdf->SetFont('Arial','B',20);
	$pdf->SetTextColor( '0', '0', '0' );
	$pdf->Ln(48);
	//$pdf->Cell(0,8,'Hello World!',0,1,'C',false);

	// name 
	$pdf->SetFont('Arial','B',24);
	$pdf->Ln(5);
	$pdf->Cell(0,8,$name,0,1,'C',false);

	// sucses 
	$pdf->SetFont('Arial','',22);
	$pdf->Ln(16);
	//$pdf->Cell(0,8,'has successfuly completed',0,1,'C',false);

	// name Curs 
	$pdf->SetFont('Arial','B',40);
	$pdf->Ln(22);
	//$pdf->Cell(0,20,'FMT BASE',0,1,'C',false);

	// where 
	$pdf->SetFont('Arial','B',16);
	$pdf->Ln(3);
	$city = ucfirst(strtolower($city));
	$pdf->Cell(0,6,"in $city, $country",0,1,'C',false);

	$pdf->SetFont('Arial','B',16);
	$pdf->Ln(4);
	$mount = ucfirst(strtolower($mount));
	$pdf->Cell(0,6,"on $mount $day,$year",0,1,'C',false);
}

function FmtBasicPerformens(&$pdf,$code,$name,$city,$country,$mount,$day,$year)
{
	$pdf->AddPage();
	$pdf->Image('img/Basic+Perfomance.jpg',0,0,297);


	// code
	$pdf->SetFont('Arial','',8);
	$pdf->SetTextColor( '0', '0', '0' );
	$pdf->Ln(2);
	$pdf->Cell(259,10,$code,0,1,'R',false);
	//$pdf->Cell(0,8,$code,0,1,'R',false);

	// curefly
	$pdf->SetFont('Arial','B',20);
	$pdf->SetTextColor( '0', '0', '0' );
	$pdf->Ln(48);
	//$pdf->Cell(0,8,'Hello World!',0,1,'C',false);

	// name 
	$pdf->SetFont('Arial','B',24);
	$pdf->Ln(5);
	$pdf->Cell(0,8,$name,0,1,'C',false);

	// sucses 
	$pdf->SetFont('Arial','',22);
	$pdf->Ln(16);
	//$pdf->Cell(0,8,'has successfuly completed',0,1,'C',false);

	// name Curs 
	$pdf->SetFont('Arial','B',40);
	$pdf->Ln(22);
	//$pdf->Cell(0,20,'FMT BASE',0,1,'C',false);

	// where 
	$pdf->SetFont('Arial','B',16);
	$pdf->Ln(3);
	$pdf->Cell(0,6,"in $city, $country",0,1,'C',false);

	$pdf->SetFont('Arial','B',16);
	$pdf->Ln(4);
	$pdf->Cell(0,6,"on $mouns $day,$year",0,1,'C',false);
}

?>
