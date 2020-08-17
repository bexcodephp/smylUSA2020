<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
	<title>SmylUSA</title>
	<style type="text/css">

	@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,600);
	@import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);

	.ReadMsgBody { width: 100%; background-color: #ffffff; }
    .ExternalClass { width: 100%; background-color: #ffffff; }
    .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }
	html { width: 100%; }
	body { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }
	table { border-spacing: 0; border-collapse: collapse; }
	table td { border-collapse: collapse; }
	.yshortcuts a { border-bottom: none !important; }
	img { display: block !important; }
	a { text-decoration: none; color: #26c6da; }

	/* Media Queries */

	@media only screen and (max-width: 640px) {
		body { width: auto !important; }
		table[class="table600"] { width: 450px !important; }
		table[class="table-container"] { width: 90% !important; }
		table[class="container2-2"] { width: 47% !important; text-align: left !important; }
		table[class="full-width"] { width: 100% !important; text-align: center !important; }
		img[class="img-full"] { width: 100% !important; height: auto !important; }
}

	@media only screen and (max-width: 479px) {
		body { width: auto !important; }
		table[class="table600"] { width: 290px !important; }
		table[class="table-container"] { width: 82% !important; }
		table[class="container2-2"] { width: 100% !important; text-align: left !important; }
		table[class="full-width"] { width: 100% !important; text-align: center !important; }
		img[class="img-full"] { width: 100% !important; }
}

	</style>

</head>

<body marginwidth="0" marginheight="0" style="margin-top: 0; margin-bottom: 0; padding-top: 0; padding-bottom: 0; width: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;" offset="0" topmargin="0" leftmargin="0">


		<!-- ARTICLE FULL -->
		<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td align="center" bgcolor="#ffffff">
					<table class="table600" width="600" border="0" cellpadding="0" cellspacing="0">
	
						<tr>
							<td height="50" style="font-size: 1px; line-height: 50px;">&nbsp;</td>
						</tr>
						
						<tr>
							<td align="center"
								style="font-family: 'Montserrat', sans-serif; font-size: 28px; font-weight: 400; color: #333333; letter-spacing: 2px; line-height: 32px;">
								Your Order is on the way!
							</td>
						</tr>
						
						<!-- Underline -->
						<tr>
							<td align="center">
								<table width="75" border="0" cellpadding="0" cellspacing="0">
									<!-- Edit Underline -->
									<tbody>
										<tr>
											<td height="20" style="border-bottom: 2px solid #26c6da;"></td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<!-- End Underline -->
						
						<tr>
							<td height="20" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
						</tr>
						
						<tr>
							<td align="center"
								style="font-family: 'Montserrat', sans-serif; font-size: 13px; font-weight: 400; color: #333333; letter-spacing: 2px; line-height: 24px;">
								Bringing your new smile to you.
							</td>
						</tr>
						
						<tr>
							<td height="30" style="font-size: 1px; line-height: 30px;">&nbsp;</td>
						</tr>
						
						<tr>
							<td align="center">
								<img class="img-full" src="https://smylusa.com/images/img600.jpg" alt="img" width="600" height="215">
							</td>
						</tr>
						
						<tr>
							<td height="30" style="font-size: 1px; line-height: 30px;">&nbsp;</td>
						</tr>
	
						<tr>
							<td align="justify" style="font-family: 'Open Sans', sans-serif; font-size: 13px; font-weight: 400; color: #8f96a1; line-height: 24px;">
								Dear <strong>{{ $customer->name }}</strong>, 
								<br>
								<br>
								Thank you for trusting SMYLUSA with your smile!
								<br>
								<br>
								We have shipped the impression kit to your location. Now all you have to do is sit back and relax. The process of taking
								your teeth impression is simple and easy. Refer to the videos and instructions on our website and you’ll be good to go!
								<br>
								<br>
								<p>Shipment Service: {{ $order->shipment_service }}</p>
								<p>Shipment Carrier: {{ $order->shipment_carrier }}</p>
								<p>Shipment Tracking Number: {{ $order->shipment_tracking_code }}</p><br>
								If at any time you need help or assistance, please do not hesitate to contact us!
							</td>
						</tr>
	
						<tr>
							<td height="40" style="font-size: 1px; line-height: 40px;">&nbsp;</td>
						</tr>
	
						<!-- Button -->
						<tr>
							<td align="center">
								<table align="center" border="0" cellpadding="0" cellspacing="0" style="border-radius: 2px;" bgcolor="#26c6da">
									<tr>
										<td align="center" height="44" style="font-family: 'Open Sans', sans-serif; font-size: 14px; font-weight: 600; color: #ffffff; line-height: 24px; padding-left: 53px; padding-right: 53px;">
											<a href="{{ route('pricing') }}" style="text-decoration: none; color: #ffffff;">
												CHECK OUT OUR PRICES
											</a>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<!-- End Button -->
	
						<tr>
							<td height="50" style="font-size: 1px; line-height: 50px;">&nbsp;</td>
						</tr>
	
					</table>
				</td>
			</tr>
		</table>
		<!-- END ARTICLE FULL -->

		<!-- MAIN B -->
	<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<!-- Background -->
			<td align="center" bgcolor="#333333" background="http://smylusa.com/images/bg-main-b.jpg" style="background-size: cover; background-position: center;">
				<table class="table600" width="600" border="0" cellpadding="0" cellspacing="0">

					<tr>
						<td height="90" style="font-size: 1px; line-height: 90px;">&nbsp;</td>
					</tr>

					<tr>
						<td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 15px; font-weight: 400; color: #ffffff; line-height: 24px; letter-spacing: 2px;">
							BEST REGARDS, 
						</td>
					</tr>

					<tr>
						<td height="30" style="font-size: 1px; line-height: 30px;">&nbsp;</td>
					</tr>	

					<tr>
						<td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 42px; font-weight: 400; color: #ffffff; line-height: 48px; letter-spacing: 4px;">
							TEAM SMYLUSA
						</td>
					</tr>

					<!-- Underline -->
					<tr>
						<td align="center">
							<table width="75" border="0" cellpadding="0" cellspacing="0">
							<!-- Edit Underline -->
								<tr>
									<td height="30" style="border-bottom: 2px solid #ffffff;"></td>
								</tr>
							</table>
						</td>
					</tr>
					<!-- End Underline -->

					<tr>
						<td height="30" style="font-size: 1px; line-height: 30px;">&nbsp;</td>
					</tr>	
				</table>
			</td>
		</tr>
	</table>
	<!-- END MAIN B -->
	
</body>
</html>