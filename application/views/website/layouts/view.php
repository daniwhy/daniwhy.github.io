<div id="map"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
		function autoSave()
	{
		var dataperintah = document.getElementById('dataperintah').value;
		var id_perintah = document.getElementById('id_perintah').value;
		if(id_perintah!='')
		{
			$.ajax({
				url:'beranda/autosave',
				method:"post",
				data:{dataperintah : dataperintah,id_perintah : id_perintah},
				success:function(response)
				{
					if(response!='')
					{
					document.getElementById('id_perintah').value=response;
					document.getElementById('dataperintah').value=response;	
					}
					document.getElementById('autoSave').innerHTML="";
				
				}
			});
		}
	}
	setInterval(function(){
		autoSave();
	},10000);
		setInterval(function(){
						document.getElementById('autoSave').innerHTML="";
					},35000);

	function autoSave1()
	{
		var dataperintah1 = document.getElementById('dataperintah1').value;
		var id_perintah = document.getElementById('id_perintah').value;
		if(id_perintah!='')
		{
			$.ajax({
				url:'beranda/autosave1',
				method:"post",
				data:{dataperintah1 : dataperintah1,id_perintah : id_perintah},
				success:function(response)
				{
					if(response!='')
					{
					document.getElementById('id_perintah').value=response;
					document.getElementById('dataperintah1').value=response;	
					}
					document.getElementById('autoSave1').innerHTML="";
				
				}
			});
		}
	}
	setInterval(function(){
		autoSave1();
	},10000);
		setInterval(function(){
						document.getElementById('autoSave1').innerHTML="";
					},35000);

	function autoSave2()
	{
		var dataperintah2 = document.getElementById('dataperintah2').value;
		var id_perintah = document.getElementById('id_perintah').value;
		if(id_perintah!='')
		{
			$.ajax({
				url:'beranda/autosave2',
				method:"post",
				data:{dataperintah2 : dataperintah2,id_perintah : id_perintah},
				success:function(response)
				{
					if(response!='')
					{
					document.getElementById('id_perintah').value=response;
					document.getElementById('dataperintah2').value=response;	
					}
					document.getElementById('autoSave2').innerHTML="";
				
				}
			});
		}
	}
	setInterval(function(){
		autoSave2();
	},10000);
		setInterval(function(){
						document.getElementById('autoSave2').innerHTML="";
					},35000);

		function showTime() {
		    var a_p = "";
		    var today = new Date();
		    var curr_hour = today.getHours();
		    var curr_minute = today.getMinutes();
		    var curr_second = today.getSeconds();
		    if (curr_hour < 12) {
		        a_p = "AM";
		    } else {
		        a_p = "PM";
		    }
		    if (curr_hour == 0) {
		        curr_hour = 12;
		    }
		    if (curr_hour > 12) {
		        curr_hour = curr_hour - 12;
		    }
		    curr_hour = checkTime(curr_hour);
		    curr_minute = checkTime(curr_minute);
		    curr_second = checkTime(curr_second);
		 document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
		    }
 
		function checkTime(i) {
		    if (i < 10) {
		        i = "0" + i;
		    }
		    return i;
		}
		setInterval(showTime, 500);
</script>