$(document).ready(function(){
   
	$("#generate").click(function(){
		
    	var name = $("#idName").val();
    	var Country = $("#idCountry").val();
    	var City = $("#idCity").val();
    	var Day = $("#idDay").val();
        var Mounth = $("#idMounth").val();
        var Year = $("#idYear").val();
        var Curs = $("#idCurs").val();

        alert(name+Country+City+Day+Mounth+Year+Curs);
        $.ajax
        ({
            type: "POST",
            data:{
            	name: name,
            	Country: Country,
            	City: City,
            	Day: Day,
                Mounth: Mounth,
                Year: Year,
                Curs: Curs
            },
            url: 'createPdf.php',
            success:function(serverData)
            {
                alert(serverData);
                $('#res').innerHTML = serverData;
            },
        });
    });
});