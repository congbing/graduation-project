<!DOCTYPE html>
<html>
<head>
	<title>live</title>
	<style type="text/css">
		body{background: #fff url('bg.jpg') no-repeat fixed 0 0; background-size: 100% 100%; margin: 0; padding: 0; position: relative;}
		.vlcplay{margin: 0 auto; width:600px; height:450px; margin-top:150px;}
	</style>
</head>
<body>
	<script type="text/javascript">
		$addr = Request.Cookies["addr"];
		alert('jjj');
		document.getElementsById('video').getAttribute('target') = Request.Cookies["addr"];
	</script>
	<div class="vlcplay">
		<object classid="clsid:9BE31822-FDAD-461B-AD51-BE1D1C159921" codebase="http://download.videolan.org/pub/videolan/vlc/last/win32/axvlc.cab" width="320" height="240" events="True" id="vlc2">
		</object>
		<embed type="application/x-vlc-plugin" id="video" name="video1" autoplay="no" loop="yes" width="600" height="450" target="rtsp://127.0.0.1:554/live.sdp" />
	</div>

</body>
</html>