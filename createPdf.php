<?php
require_once( "modules/fpdf.php" );
error_reporting(0);

$cityCode = array("ABA"=>"ABAKAN","DYR"=>"ANADYR","AAQ"=>"ANAPA","WZA"=>"APATITY","ARH"=>"ARKHANGELSK","ASF"=>"ASTRAKHAN","BWO"=>"BALAKOVO","BAX"=>"BARNAUL","EGO"=>"BELGOROD","BCX"=>"BELORECK","WZC"=>"BEREZNIKI","BQS"=>"BLAGOVESCHENSK","BTK"=>"BRATSK","UUA"=>"BUGULMA","BKA"=>"BYKOVO","CSY"=>"CHEBOKSARY","CEK"=>"CHELYABINSK","CEE"=>"CHEREPOVETS","HTA"=>"CHITA","WZD"=>"EJSK","SVX"=>"EKATERINBURG","ESL"=>"ELISTA","EV"=>"EVPATORIA","GDZ"=>"GELENDZIK","GRV"=>"GROZNYJ","WZE"=>"HANTY-MANSIJSK","INA"=>"INTA","IKT"=>"IRKUTSK","IWA"=>"IVANOVO","IJK"=>"IZHEVSK","KGD"=>"KALININGRAD","KZN"=>"KAZAN","KEJ"=>"KEMEROVO","KE"=>"KERCH","KHV"=>"KHABAROVSK","WZT"=>"KHIBINY","KVX"=>"KIROV","KVK"=>"KIROVSK","KGP"=>"KOGALYN","WZH"=>"KOLKHI","KXK"=>"KOMSOMOLSK-NA-AMURE","WZI"=>"KRAJNIJ","KRR"=>"KRASNODAR","KJA"=>"KRASNOJARSK","KRO"=>"KURGAN","KUR"=>"KURSK","LPK"=>"LIPETSK","GDX"=>"MAGADAN","MQF"=>"MAGNITOGORSK","WZJ"=>"MAJKOP","MCX"=>"MAKHACHKALA","MRV"=>"MINERALNYE-VODY","MJZ"=>"MIRNYJ","MOW"=>"MOSCOW","MMK"=>"MURMANSK","NBC"=>"NABEREVOYE-CHELNYB","NYM"=>"NADYM","WZL"=>"NAKHICHEVAN","NAL"=>"NALCHIK","NNM"=>"NARYAN-MAR","IGT"=>"NAZRAN","NFG"=>"NEFTEYUGANSK","NER"=>"NERYUNGRI","NJC"=>"NIZHNEVARTOVSK","GOJ"=>"NIZHNIY-NOVGOROD","NOJ"=>"NOJABRXSK","NSK"=>"NORILSK","GNO"=>"NOVGOROD-THE-GREAT","NOZ"=>"NOVOKUZNETSK","OVB"=>"NOVOSIBIRSK","NUX"=>"NOVYJ-URENGOJ","WZM"=>"NYAGAN","OMS"=>"OMSK","REN"=>"ORENBURG","OSW"=>"ORSK","PEZ"=>"PENZA","PEE"=>"PERM","PKC"=>"PETROPAVLOVSK-KAMCHA","PES"=>"PETROZAVODSK","PWE"=>"PEVEK","PYJ"=>"POLYARNYY","PTG"=>"PYATIGORSK","RAT"=>"RADUZHNYI","ROV"=>"ROSTOV","SLY"=>"SALEKHARD","KUF"=>"SAMARA","SKX"=>"SARANSK","RTW"=>"SARATOV","SIP"=>"SIMFEROPOL","WZN"=>"SLEPCOVSKAYA","AER"=>"SOCHI/ADLER","WZO"=>"SOKOL","LED"=>"ST. PETERSBURG","WZP"=>"STARYJ-OSKOL","STW"=>"STAVROPOL","SWT"=>"STRZHEWOI","SGC"=>"SURGUT","SUZ"=>"SUZDAL","SCW"=>"SYKTYVKAR","IKS"=>"TIKSI","TOF"=>"TOMSK","TVE"=>"TVER","TJM"=>"TYUMEN","UFA"=>"UFA","UCT"=>"UKHTA","UUD"=>"ULAN-UDE","ULY"=>"ULYANOVSK","USK"=>"USINSK","UIK"=>"UST-ILIMSK","OGZ"=>"VLADIKAVKAZ","VVO"=>"VLADIVOSTOK","VLK"=>"VOLGODONSK","VOG"=>"VOLGOGRAD","VGD"=>"VOLOGDA","VKT"=>"VORKUTA","VOZ"=>"VORONEZH","YKS"=>"YAKKUTSK",);

$MonthArray = array("January","February","March","April","May","June","July","August","September","October","November","December");

$Curses = array(
	"FMT Basic" => 'img/basic.jpg',
	"FMT Basic+Perfomance" => "img/2. FMT Basic+Perfomance.jpg",
	"FMT Perfomance" => "img/3. FMT Perfomance.jpg",
	"Individ. FMT Basic" => 'img/basic.jpg',
	"Individ. FMT Basic+Perfomance" => "img/2. FMT Basic+Perfomance.jpg",
	"Individ. FMT Perfomance" => "img/3. FMT Perfomance.jpg",
	"FMT Blades" => "img/4. FMT Blades.jpg",
	"FMT Blades Advanced" => "img/5. FMT Blades Advanced.jpg",
	"FMT SCN" => "img/6. FMT SCN.jpg",
	"FMT SCN+MOV" => "img/7. FMT SCN+MOV.jpg",
	"FMT MOV" => "img/8. FMT MOV.jpg",
	"FMT Logopedix" => "img/9. FMT Logopedics.jpg",
	"FMT Dent" => "img/10. FMT Dent.jpg",
	"FMT Equine" => "img/11. FMT Equine.jpg",
);


$tcode = array(
	"FMT Basic" => 'T1',
	"FMT Basic+Perfomance" => "TF",
	"FMT Perfomance" => "T2",
	"Individ. FMT Basic" => 'IT1',
	"Individ. FMT Basic+Perfomance" => "ITF",
	"Individ. FMT Perfomance" => "IT2",
	"FMT Blades" => "BL",
	"FMT Blades Advanced" => "BLA",
	"FMT SCN" => "SC",
	"FMT SCN+MOV" => "SMV",
	"FMT MOV" => "MV",
	"FMT Logopedix" => "LG",
	"FMT Dent" => "DN",
	"FMT Equine" => "EQ",
);

if(isset($_POST['name']) && isset($_POST['Country']) && isset($_POST['City']) && isset($_POST['Day']) && isset($_POST['Mounth']) && isset($_POST['Year']) && isset($_POST['Curs'])) {

	$city = $_POST['City'];
	$contry = $_POST['Country'];
	$day = $_POST['Day'];
	$mount = $_POST['Mounth'];
	$year = $_POST['Year'];
	$curs = $_POST['Curs'];
	$Instructor = $_POST['Instructor'];
	$names = explode("\n",$_POST['name']);
	$i = 0;

	if(!empty($_POST['cityR']) && !empty($_POST['cityRK'])){
		$tmp = strtoupper($_POST['cityRK']);
		$cityCode[$tmp]  = $_POST['cityR'];
		$city = $tmp;
	}

	if(!empty($_POST['Day2']) && !empty($_POST['Year2']) && !empty($_POST['Mounth2'])) {
		$day2 = $_POST['Day2'];
		$mount2 = $_POST['Mounth2'];
		$year2 = $_POST['Year2'];
		$Gn = GenerateNumbers($names,$city,$mount2,$year2,$tcode[$curs]);
	}

	if (!isset($Gn)) {
		$Gn = GenerateNumbers($names,$city,$mount,$year,$tcode[$curs]);
	}

	$date = GenerateDate($day,$MonthArray[$mount-1],$year,$day2,$MonthArray[$mount2-1],$year2);
	$pdf = new FPDF('L','mm','A4');
	foreach ($Gn as $num) {
		if ($curs =="FMT Logopedix" || $curs == "FMT Dent") {
			FmtSpecial($pdf,$num,$names[$i],$cityCode[$city],$contry,$date,$Curses[$curs],$Instructor);
		}
		else{
			FmtBasic($pdf,$num,$names[$i],$cityCode[$city],$contry,$date,$Curses[$curs],$Instructor);
		}
		$i++;
	}
	$name = "pdf/".date("d-m-Y").".pdf";

	if(!empty($_POST['Email'])){
		$email = $_POST['Email'];
		$pdf->Output("F",$name, true);
		if(SendToMail($email,$name)){
			echo "otpravleno on $email <br>";
			if(unlink($name)){
				echo "Udaleno";
			}
		}
	}
	else{
		$pdf->Output("I",$name, true);	
	}
	
} 

function GenerateDate($day,$mount,$year,$day2=null,$mount2=null,$year2=null)
{
	if($day2 != null)
		if($mount2 != $mount)
			return $mount." ".$day." - ".$day2." ".$mount2.", 20".$year2;
		else 
			return $mount." ".$day." - ".$day2.", 20".$year2;
	return $mount." ".$day.", 20".$year;
}


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

	//print_r($nf);

	$i = 0;
	foreach ($nf as $io) {
		$k = 0;
		for ($j=0; $j < $i; $j++) { 
			if($nf[$j] == $io) $k++;
		}
		$res[] = $k == 0 ? $io : $io.++$k;
		if($k > 0){
			for ($j=0; $j < $i; $j++) { 
				if(strrpos($nf[$j],$io) !== false){
					$res[$j] = $io."1";
					break;
				} 
			}
		}
		$i++;
	}

	//$count_values = array_count_values($nf);
	//print_r(array_count_values($nf) );
	/*foreach ($count_values as $key => $value) {
		
		for($i = 0;$i<$value;$i++){
			$res[] = $i == 0 ? $key : $key.$i;
		}
	}*/

	//print_r($res);

	return $res;
}

function FmtBasic(&$pdf,$code,$name,$city,$country,$date,$curse,$instructor)
{
	$pdf->AddPage();
	$pdf->Image($curse,0,10,297);

	$pdf->Ln(11.7);
	// code
	$pdf->SetFont('helvetica','',8);
	$pdf->SetTextColor( '0', '0', '0' );
	
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
	$pdf->Cell(0,6,"on $date",0,1,'C',false);

	$pdf->SetFont('Arial','',7);
	$pdf->SetTextColor( '0', '0', '0' );
	$pdf->Ln(24);
	$pdf->Cell(107.5,10,'',0,0,'R',false);
	$pdf->Cell(100,10,$instructor,0,1,'L',false);
}


function SendToMail($email,$file){
	$filename = $file; //Имя файла для прикрепления
	$to = $email; //Кому
	//$from = "def@gmail.com"; //От кого
	$subject = "Test"; //Тема
	$message = "Текстовое сообщение"; //Текст письма
	$boundary = "---"; //Разделитель
	/* Заголовки */
	//$headers = "From: $from\nReply-To: $from\n";
	$headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"";
	$body = "--$boundary\n";
	/* Присоединяем текстовое сообщение */
	$body .= "Content-type: text/html; charset='utf-8'\n";
	$body .= "Content-Transfer-Encoding: quoted-printablenn";
	$body .= "Content-Disposition: attachment; filename==?utf-8?B?".base64_encode($filename)."?=\n\n";
	$body .= $message."\n";
	$body .= "--$boundary\n";
	$file = fopen($filename, "r"); //Открываем файл
	$text = fread($file, filesize($filename)); //Считываем весь файл
	fclose($file); //Закрываем файл
	/* Добавляем тип содержимого, кодируем текст файла и добавляем в тело письма */
	$body .= "Content-Type: application/octet-stream; name==?utf-8?B?".base64_encode($filename)."?=\n"; 
	$body .= "Content-Transfer-Encoding: base64\n";
	$body .= "Content-Disposition: attachment; filename==?utf-8?B?".base64_encode($filename)."?=\n\n";
	$body .= chunk_split(base64_encode($text))."\n";
	$body .= "--".$boundary ."--\n";
	if(mail($to, $subject, $body, $headers)) {
		return true;
	}
	return false;
}

function FmtSpecial(&$pdf,$code,$name,$city,$country,$date,$curse,$instructor)
{
		$pdf->AddPage();
	$pdf->Image($curse,0,10,297);

	$pdf->Ln(11.7);
	// code
	$pdf->SetFont('helvetica','',8);
	$pdf->SetTextColor( '0', '0', '0' );
	
	$pdf->Cell(232,10,"",0,0,'R',false);
	$pdf->Cell(26,10,"".$code,0,1,'L',false);
	//$pdf->Cell(0,8,$code,0,1,'R',false);

	// curefly
	$pdf->SetFont('Arial','B',20);
	$pdf->SetTextColor( '0', '0', '0' );
	$pdf->Ln(44);
	//$pdf->Cell(0,8,'Hello World!',0,1,'C',false);

	// name 
	$pdf->SetFont('Arial','B',24);
	$pdf->Cell(0,8,$name,0,1,'C',false);
	$pdf->Ln(9);
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
	$pdf->Cell(0,6,"on $date",0,1,'C',false);

	$pdf->SetFont('Arial','',7);
	$pdf->SetTextColor( '0', '0', '0' );
	$pdf->Ln(24);
	$pdf->Cell(107.5,10,'',0,0,'R',false);
	$pdf->Cell(100,10,$instructor,0,1,'L',false);
 }
