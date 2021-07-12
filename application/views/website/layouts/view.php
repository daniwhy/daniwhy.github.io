<div id="map"></div>
<script type="text/javascript">
		<!--
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
 <?php
$id_perintah="";
$perintah="";
?>
    <form method="post" action="<?= site_url('beranda/autosave'); ?>">
	
		<script>

var s;
function timePicker(vr) {
    if (vr > 0) {
         if (vr > 1) {
             $('#timer').html('Data will be updated in next '+ vr+' secounds');
         } else {
             $('#timer').html('Data will be updated in next 1 secound');
         }
         vr--;
         s = setTimeout('timePicker(' + vr + ')', 1000);
     } else {
         clearInterval(s);
         $.ajax({
             type: 'post',
             url: '<?= site_url('beranda/autosave'); ?>',
             data: $('').serialize(),
             success: function (data) {
                 s = setTimeout('timePicker(' + 10 + ')', 5000);
                 return false;
             }
         });
     }
 }
</script>
		
</script>