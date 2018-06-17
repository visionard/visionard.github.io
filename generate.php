<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Create QR code for WhatsApp | WhatsApp Business</title>
	<meta name="description" value="Enable customers to chat directly to your business on WhatsApp without saving your number. Get feedback, show your products and many more.">
	<?php include('bs.php');?>
	<style>
		@media print {
		  .hidden-print {
		    display: none !important;
		  }
		}
		body{
			padding-top: 30px;
		}
		#qrcode > img {
			margin-left: auto;
			margin-right: auto;
		}
		#takePrint:hover{
			cursor: pointer;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col"></div>
			<div class="col-6">
				<h1 class="text-center">Connect with <span id="businessName"></span></h1>
				<h3 class="text-center">on</h3>
				<p class="text-center"><img src="whatsapp.png" style="margin: 0px auto;" height="120px" width="120px" alt=""></p>
				<p class="text-center">scan</p>
				<div id="qrcode" style="position: relative;" class="center-block">
				</div>
				<p style="color: #003366; text-align: center; margin-top: 10px;"><em>Powered by <strong><a target="_blank" href="https://visionard.com?utm_source=whatsapp_qr_generator">Visionard.com</a></strong></em></p>
				<p class="text-center"><button tabindex="1" onclick="getDetails()" id="generateQR" class="btn btn-primary hidden-print">Create Your QR Code</button></p>
				<p class="text-center"><a tabindex="2" onclick="window.print();" class="hidden-print" style="display: none;" id="takePrint">Click To Print</a></p>
			</div>
			<div class="col"></div>
		</div>
	</div>
	<!-- qr.js file comes here -->
	<?php include('qr.php');?>
	<div id="qrcode"></div>
	<script type="text/javascript">
		var businessName = "Visionard";
		var whatsappNumber = "919806532911";
		var whatappUrl = "https://api.whatsapp.com?phone=";
		document.getElementById("businessName").innerHTML = businessName;
		var qrcode = new QRCode(document.getElementById("qrcode"), {
			text: whatappUrl + whatsappNumber,
			width: 256,
			height: 256,
			colorDark : "#25D366",
			colorLight : "#ffffff",
			correctLevel : QRCode.CorrectLevel.H
		});
		function getDetails() {
			businessName = prompt("Your Business Name?");
			whatsappNumber = prompt("Your WhatsApp Number with country code?");
			document.getElementById("generateQR").innerHTML = "Generate Another QR Code";
			document.getElementById("businessName").innerHTML = businessName;
			document.getElementById("takePrint").style.display = "block";
			qrcode.clear(); // clear the code.
			qrcode.makeCode(whatappUrl + whatsappNumber);
		}
	</script>
</body>
</html>