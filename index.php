<?
if(!isset($_COOKIE["AUTH"]))
{
	header('Location: auth.php');
}
elseif ($_COOKIE["AUTH"] != MD5("admin").MD5("admin")) {
	header('Location: auth.php');
	die;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PdfDiploms</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	

<br><br><br><br>

<section>
	<div class="container">
		<div class="row">
			<div class="col-md-offset-2	 col-md-8">
				
				
				<form role="form" action="createPdf.php" method="POST">
				

				  	<div class="col-md-6">
				  		<label for="idCountry">Страна (Country)</label>
				    	<input name="Country" required type="text" class="form-control" id="idCountry" placeholder="Страна (Country)" value="Russia">
					</div>


				  	<div class="col-md-6">
						<label for="idCity">Город (City)</label>
				    	<!-- <input name="City" required type="text" class=" col-sm-2 col-md-4 form-control" id="idCity" placeholder="Город" value="Москва"> -->
				    	<select name="City" id="idCity" required class="form-control" >
				    		<option value='MOW' selected >MOSCOW</option>
				    		<option value='LED'>ST. PETERSBURG</option>
				    		<option value='ABA'>ABAKAN</option>
							<option value='DYR'>ANADYR</option>
							<option value='AAQ'>ANAPA</option>
							<option value='WZA'>APATITY</option>
							<option value='ARH'>ARKHANGELSK</option>
							<option value='ASF'>ASTRAKHAN</option>
							<option value='BWO'>BALAKOVO</option>
							<option value='BAX'>BARNAUL</option>
							<option value='EGO'>BELGOROD</option>
							<option value='BCX'>BELORECK</option>
							<option value='WZC'>BEREZNIKI</option>
							<option value='BQS'>BLAGOVESCHENSK</option>
							<option value='BTK'>BRATSK</option>
							<option value='UUA'>BUGULMA</option>
							<option value='BKA'>BYKOVO</option>
							<option value='CSY'>CHEBOKSARY</option>
							<option value='CEK'>CHELYABINSK</option>
							<option value='CEE'>CHEREPOVETS</option>
							<option value='HTA'>CHITA</option>
							<option value='WZD'>EJSK</option>
							<option value='SVX'>EKATERINBURG</option>
							<option value='ESL'>ELISTA</option>
							<option value='EV'>EVPATORIA</option>
							<option value='GDZ'>GELENDZIK</option>
							<option value='GRV'>GROZNYJ</option>
							<option value='WZE'>HANTY-MANSIJSK</option>
							<option value='INA'>INTA</option>
							<option value='IKT'>IRKUTSK</option>
							<option value='IWA'>IVANOVO</option>
							<option value='IJK'>IZHEVSK</option>
							<option value='KGD'>KALININGRAD</option>
							<option value='KZN'>KAZAN</option>
							<option value='KEJ'>KEMEROVO</option>
							<option value='KE'>KERCH</option>
							<option value='KHV'>KHABAROVSK</option>
							<option value='WZT'>KHIBINY</option>
							<option value='KVX'>KIROV</option>
							<option value='KVK'>KIROVSK</option>
							<option value='KGP'>KOGALYN</option>
							<option value='WZH'>KOLKHI</option>
							<option value='KXK'>KOMSOMOLSK-NA-AMURE</option>
							<option value='WZI'>KRAJNIJ</option>
							<option value='KRR'>KRASNODAR</option>
							<option value='KJA'>KRASNOJARSK</option>
							<option value='KRO'>KURGAN</option>
							<option value='KUR'>KURSK</option>
							<option value='LPK'>LIPETSK</option>
							<option value='GDX'>MAGADAN</option>
							<option value='MQF'>MAGNITOGORSK</option>
							<option value='WZJ'>MAJKOP</option>
							<option value='MCX'>MAKHACHKALA</option>
							<option value='MRV'>MINERALNYE-VODY</option>
							<option value='MJZ'>MIRNYJ</option>
							<option value='MMK'>MURMANSK</option>
							<option value='NBC'>NABEREVOYE-CHELNYB</option>
							<option value='NYM'>NADYM</option>
							<option value='WZL'>NAKHICHEVAN</option>
							<option value='NAL'>NALCHIK</option>
							<option value='NNM'>NARYAN-MAR</option>
							<option value='IGT'>NAZRAN</option>
							<option value='NFG'>NEFTEYUGANSK</option>
							<option value='NER'>NERYUNGRI</option>
							<option value='NJC'>NIZHNEVARTOVSK</option>
							<option value='GOJ'>NIZHNIY-NOVGOROD</option>
							<option value='NOJ'>NOJABRXSK</option>
							<option value='NSK'>NORILSK</option>
							<option value='GNO'>NOVGOROD-THE-GREAT</option>
							<option value='NOZ'>NOVOKUZNETSK</option>
							<option value='OVB'>NOVOSIBIRSK</option>
							<option value='NUX'>NOVYJ-URENGOJ</option>
							<option value='WZM'>NYAGAN</option>
							<option value='OMS'>OMSK</option>
							<option value='REN'>ORENBURG</option>
							<option value='OSW'>ORSK</option>
							<option value='PEZ'>PENZA</option>
							<option value='PEE'>PERM</option>
							<option value='PKC'>PETROPAVLOVSK-KAMCHA</option>
							<option value='PES'>PETROZAVODSK</option>
							<option value='PWE'>PEVEK</option>
							<option value='PYJ'>POLYARNYY</option>
							<option value='PTG'>PYATIGORSK</option>
							<option value='RAT'>RADUZHNYI</option>
							<option value='ROV'>ROSTOV</option>
							<option value='SLY'>SALEKHARD</option>
							<option value='KUF'>SAMARA</option>
							<option value='SKX'>SARANSK</option>
							<option value='RTW'>SARATOV</option>
							<option value='SIP'>SIMFEROPOL</option>
							<option value='WZN'>SLEPCOVSKAYA</option>
							<option value='AER'>SOCHI/ADLER</option>
							<option value='WZO'>SOKOL</option>
							<option value='WZP'>STARYJ-OSKOL</option>
							<option value='STW'>STAVROPOL</option>
							<option value='SWT'>STRZHEWOI</option>
							<option value='SGC'>SURGUT</option>
							<option value='SUZ'>SUZDAL</option>
							<option value='SCW'>SYKTYVKAR</option>
							<option value='IKS'>TIKSI</option>
							<option value='TOF'>TOMSK</option>
							<option value='TVE'>TVER</option>
							<option value='TJM'>TYUMEN</option>
							<option value='UFA'>UFA</option>
							<option value='UCT'>UKHTA</option>
							<option value='UUD'>ULAN-UDE</option>
							<option value='ULY'>ULYANOVSK</option>
							<option value='USK'>USINSK</option>
							<option value='UIK'>UST-ILIMSK</option>
							<option value='OGZ'>VLADIKAVKAZ</option>
							<option value='VVO'>VLADIVOSTOK</option>
							<option value='VLK'>VOLGODONSK</option>
							<option value='VOG'>VOLGOGRAD</option>
							<option value='VGD'>VOLOGDA</option>
							<option value='VKT'>VORKUTA</option>
							<option value='VOZ'>VORONEZH</option>
							<option value='YKS'>YAKKUTSK</option>
				    	</select>
					</div>

					<div class="col-md-12">
						<hr>
					</div>

						<!--START DATE 1-->
				
					  	<div class="col-sm-4">
					  		<label for="idDay">День (Day)</label>
					  		<select name="Day" required class="form-control" id="idDay">
					  			<?	
					  				$d = date("d");
									for($i=1;$i<32;$i++){
										if ($d == $i)											
											echo "<option selected value=\"$i\">$i</option>";
										else
											echo "<option value=\"$i\">$i</option>";
								}
					  			?>
							</select>
						</div>


					  	<div class="col-sm-4">
					  		<label for="idMounth">Месяц (Month)</label>
					  		<select name="Mounth" required class="form-control" id="idMounth">
					  			<?
					  			$m = date("F");
					  			$MonthArray = array("January","February","March","April","May","June","July","August","September","October","November","December");
					  			$i = 1;
					            foreach ($MonthArray as $month) {
									
									if($m == $month){
										echo "<option selected value=\"$i\">$month</option>";
									}
									else
										echo "<option value=\"$i\">$month</option>";
									$i++;
					        	}
					        	?>
							</select>
						</div>

					  	<div class="col-sm-4">
					  		<label for="idYear">Год (Year)</label>
					  		<select name="Year" required class="form-control" id="idYear">
					  			<?	
					  				$y = date("Y");
									for($i=2013;$i<=$y+1;$i++){
										$v = $i-2000;
										if($i == $y)
											echo "<option selected value=\"$v\">$i</option>";
										else
											echo "<option value=\"$v\">$i</option>";
								}
					  			?>
							</select>
						</div>

						<!--END DATE 1-->

						<!--START DATE 2-->

					  	<div class="col-sm-4">
					  		<label for="idDay2">День (Day)</label>
					  		<select name="Day2"  class="form-control" id="idDay2">
					  			<option selected ></option> 
					  			<?	
					  				$d = date("d");
									for($i=1;$i<32;$i++){
										echo "<option value=\"$i\">$i</option>";
								}
					  			?>
							</select>
						</div>


					  	<div class="col-sm-4">
					  		<label for="idMounth2">Месяц (Month)</label>
					  		<select name="Mounth2" class="form-control" id="idMounth2">
					  			<option selected ></option> 
					  			<?
					  			$m = date("F");
					  			$MonthArray = array("January","February","March","April","May","June","July","August","September","October","November","December");
					  			$i = 1;
					            foreach ($MonthArray as $month) {
									echo "<option value=\"$i\">$month</option>";
									$i++;
					        	}
					        	?>
							</select>
						</div>

					  	<div class="col-sm-4">
					  		<label for="idYear2">Год (Year)</label>
					  		<select name="Year2" class="form-control" id="idYear2">
					  			<option selected ></option> 
					  			<?	
					  				$y = date("Y");
									for($i=2013;$i<=$y+1;$i++){
										$v = $i-2000;
										echo "<option value=\"$v\">$i</option>";
								}
					  			?>
							</select>
						</div>

						<!--END DATE 2-->


						<div class="col-md-12">
							<hr>
						</div>
									
						<!--START CURSE-->

					  	<div class="col-sm-12">
					  		<label for="idCurs">Курс (Course)</label>
					  		<select name="Curs" required class="form-control" id="idCurs">
					  			<?	
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
										"FMT Logopedics" => "img/9. FMT Logopedics.jpg",
										"FMT Dent" => "img/10. FMT Dent.jpg",
										"FMT Equine" => "img/11. FMT Equine.jpg",
					  				);
									foreach ($Curses as $curse => $val) {
										echo "<option value=\"$curse\">$curse</option>";
									}
					  			?>
							</select>
						</div>

						<!--END CURSE-->

					  	<div class="col-sm-12">
					  		<label for="IdInstructor">Инструктор (Instructor)</label>
					    	<input name="Instructor" required type="text" class="form-control" id="IdInstructor" placeholder="инструктор" value="">
						</div>


					  	<div class="col-sm-12">
					  		<label for="idName">Имя (можно несколько в столбик) | Names (in a column)</label>
				  			<textarea name="name" required class="form-control" rows="15" id="idName"></textarea>
				  		</div>

						<div class="col-sm-12">
							<hr>
							<!-- <button id="generate" class="btn btn-primary btn-block">Сгенерировать</button> -->
							<button type="submit" class="btn btn-primary btn-block">Сгенерировать | Generate</button>
							<p id="res"></p>
						</div>
				</form>
			</div>
		</div>
	</div>
</section>


<script src="common.js"></script>


</body>
</html>