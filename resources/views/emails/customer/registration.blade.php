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
								THANK YOU FOR REGISTERING!
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
								Dear <strong>{{ $user->name }}</strong>, 
								<br>
								<br>
Thank you for signing up and taking the first step towards your SMYL journey!
Your account has been successfully registered and we will keep you updated about our offers and promotions. Please confirm your email address by clicking on the button below. 


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
											<!-- verifyemail -->
											<a href="{{ route('generatePassword', $user->email_verification_code) }}" style="text-decoration: none; color: #ffffff;">
												CONFIRM YOUR EMAIL ADDRESS
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

					<!-- Button -->
					<tr>
						<td align="center">
							<table align="center" border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td align="center" height="44" style="font-family: 'Montserrat', sans-serif; font-size: 14px; font-weight: 400; color: #ffffff; line-height: 24px; letter-spacing: 1px; padding-left: 26px; padding-right: 26px; border: 2px solid #ffffff;">
										<a href="https://smylusa.com/contact-us" style="text-decoration: none; color: #ffffff;">
											CONTACT US
										</a>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<!-- End Button -->

					<tr>
						<td height="90" style="font-size: 1px; line-height: 90px;">&nbsp;</td>
					</tr>	

				</table>
			</td>
		</tr>
	</table>
	<!-- END MAIN B -->
	<!-- ARTICLE 2 -->
	<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td align="center" bgcolor="#ffffff">
				<table class="table600" width="600" border="0" cellpadding="0" cellspacing="0">

					<tr>
						<td height="50" style="font-size: 1px; line-height: 50px;">&nbsp;</td>
					</tr>

					<tr>
						<td>
							
							<table class="full-width" width="287" align="left" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
								
								<tr>
									<td align="center">
										<img class="img-full" src="{{ asset('images/img287-1') }}.jpg" alt="img" width="287" height="192">
									</td>
								</tr>

								<tr>
									<td height="20" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
								</tr>

								<tr>
									<td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 13px; font-weight: 400; color: #333333; letter-spacing: 2px; line-height: 24px;">
										VIST OUR LOCATION
									</td>
								</tr>

								<tr>
									<td height="15" style="font-size: 15px; line-height: 15px;">&nbsp;</td>
								</tr>

								<tr>
									<td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 20px; font-weight: 400; color: #333333; letter-spacing: 2px; line-height: 24px;">
										BOOK YOUR APPOINTMENT
									</td>
								</tr>

								<tr>
									<td height="20" style="font-size: 1px; line-height: 20px;">&nbsp;</td>
								</tr>
								
								<tr>
									<td align="center" style="font-family: 'Open Sans', sans-serif; font-size: 13px; font-weight: 400; color: #8f96a1; line-height: 24px;">
										Head over to the locations tab on our website. You can book an appointment in your nearby location. 
									</td>
								</tr>

							</table>

							<!-- SPACE -->
								<table class="full-width" width="1" align="left" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" >
									<tr>
										<td width="1" height="40" style="font-size: 40px; line-height: 40px;"></td>
									</tr>
								</table>
							<!-- END SPACE -->

							<table class="full-width" width="287" align="right" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
								
								<tr>
									<td align="center">
										<img class="img-full" src="{{ asset('images/img287-2') }}.jpg" alt="img" width="287" height="192">
									</td>
								</tr>

								<tr>
									<td height="20" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
								</tr>

								<tr>
									<td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 13px; font-weight: 400; color: #333333; letter-spacing: 2px; line-height: 24px;">
										ORDER ONLINE
									</td>
								</tr>

								<tr>
									<td height="15" style="font-size: 15px; line-height: 15px;">&nbsp;</td>
								</tr>

								<tr>
									<td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 20px; font-weight: 400; color: #333333; letter-spacing: 2px; line-height: 24px;">
										CHOOSE FROM OUR FLEXIBLE PLANS
									</td>
								</tr>

								<tr>
									<td height="20" style="font-size: 1px; line-height: 20px;">&nbsp;</td>
								</tr>
								
								<tr>
									<td align="center" style="font-family: 'Open Sans', sans-serif; font-size: 13px; font-weight: 400; color: #8f96a1; line-height: 24px;">
										Get your new smile delivered to your doorstep. We have made it that simple.
									</td>
								</tr>

							</table>

						</td>
					</tr>

					<tr>
						<td height="50" style="font-size: 1px; line-height: 50px;">&nbsp;</td>
					</tr>

				</table>
			</td>
		</tr>
	</table>
	<!-- END ARTICLE 2 -->

	

	

	<!-- SEPERATOR A -->
	<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<!-- Background -->
			<td align="center" bgcolor="#333333" background="{{ asset('images/bg-sep') }}-a.jpg" style="background-size: cover; background-position: center;">
				<table class="table600" width="600" border="0" cellpadding="0" cellspacing="0">

					<tr>
						<td height="75" style="font-size: 1px; line-height: 75px;">&nbsp;</td>
					</tr>

					<tr>
						<td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 28px; font-weight: 400; color: #ffffff; letter-spacing: 2px; line-height: 32px;">
							BRING YOUR SMILE ON
						</td>
					</tr>

					<!-- Underline -->
					<tr>
						<td align="center">
							<table width="75" border="0" cellpadding="0" cellspacing="0">
							<!-- Edit Underline -->
								<tr>
									<td height="20" style="border-bottom: 2px solid #26c6da;"></td>
								</tr>
							</table>
						</td>
					</tr>
					<!-- End Underline -->

					<tr>
						<td height="20" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
					</tr>

					<tr>
						<td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 13px; font-weight: 400; color: #ffffff; letter-spacing: 2px; line-height: 24px;">
							GET READY FOR YOUR NEW SMILE
						</td>
					</tr>

					<tr>
						<td height="75" style="font-size: 1px; line-height: 75px;">&nbsp;</td>
					</tr>

				</table>
			</td>
		</tr>
	</table>
	<!-- END SEPERATOR A -->

	







	<!-- PRICE 2 -->
	<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<!-- Background -->
			<td align="center" bgcolor="#edf0f7">
				<table class="table600" width="600" border="0" cellpadding="0" cellspacing="0">

					<tr>
						<td height="50" style="font-size: 1px; line-height: 50px;">&nbsp;</td>
					</tr>

					<tr>
						<td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 28px; font-weight: 400; color: #333333; letter-spacing: 2px; line-height: 32px;">
							OUR PRICING
						</td>
					</tr>

					<!-- Underline -->
					<tr>
						<td align="center">
							<table width="75" border="0" cellpadding="0" cellspacing="0">
							<!-- Edit Underline -->
								<tr>
									<td height="20" style="border-bottom: 2px solid #26c6da;"></td>
								</tr>
							</table>
						</td>
					</tr>
					<!-- End Underline -->

					<tr>
						<td height="20" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
					</tr>

					<tr>
						<td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 13px; font-weight: 400; color: #333333; letter-spacing: 2px; line-height: 24px;">
							Your smiles making life around you more beautiful.
						</td>
					</tr>

					<tr>
						<td height="30" style="font-size: 1px; line-height: 30px;">&nbsp;</td>
					</tr>	

					<tr>
						<td align="center" style="font-family: 'Open Sans', sans-serif; font-size: 13px; font-weight: 400; color: #8f96a1; line-height: 24px;">
							We offer two easy ways to pay, and either way it's less expensive than other options.
						</td>
					</tr>

					<tr>
						<td height="40" style="font-size: 1px; line-height: 40px;">&nbsp;</td>
					</tr>

					<tr>
						<td>

							<table class="full-width" width="287" align="left" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">

								<tr>
									<td height="30" style="font-size: 1px; line-height: 30px;">&nbsp;</td>
								</tr>

								<tr>
									<td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 24px; font-weight: 400; color: #333333; letter-spacing: 1px; line-height: 28px;">
										ONE-TIME PAYMENT
									</td>
								</tr>

								<!-- Underline -->
								<tr>
									<td align="center">
										<table width="75" border="0" cellpadding="0" cellspacing="0">
										<!-- Edit Underline -->
											<tr>
												<td height="20" style="border-bottom: 2px solid #26c6da;"></td>
											</tr>
										</table>
									</td>
								</tr>
								<!-- End Underline -->

								<tr>
									<td height="20" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
								</tr>

								<tr>
									<td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 13px; font-weight: 400; color: #333333; letter-spacing: 1px; line-height: 24px;">
										You save 20%
									</td>
								</tr>

								<tr>
									<td height="30" style="font-size: 1px; line-height: 30px;">&nbsp;</td>
								</tr>

								<tr>
									<td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 58px; font-weight: 300; color: #333333; line-height: 60px;">
										$1799
									</td>
								</tr>

								<tr>
									<td height="10" style="font-size: 1px; line-height: 10px;">&nbsp;</td>
								</tr>

								<tr>
									<td align="center" style="font-family: 'Open Sans', sans-serif; font-size: 13px; font-weight: 400; color: #8f96a1; line-height: 24px;">
										Pay even less with a one-time payment
									</td>
								</tr>

								<tr>
									<td height="30" style="font-size: 1px; line-height: 30px;">&nbsp;</td>
								</tr>

								<!-- Button -->
								<tr>
									<td align="center">
						    			<table width="170" align="center" border="0" cellpadding="0" cellspacing="0" style="border-radius: 2px;" bgcolor="#26c6da">

						    				<tr>
						    					<td height="10" style="font-size: 1px; line-height: 10px;">&nbsp;</td>
						    				</tr>

						    				<tr>
						    					<td align="center" style="font-family: 'Open Sans', sans-serif; font-size: 14px; font-weight: 600; color: #ffffff; line-height: 24px;">
						    						<a href="https://smylusa.com/products" style="color: #ffffff; text-decoration: none;">Order your Kit</a>
						    					</td>
						    				</tr>

						    				<tr>
						    					<td height="10" style="font-size: 1px; line-height: 10px;">&nbsp;</td>
						    				</tr>				    				
						    				
						    			</table>
						    		</td>
						    	</tr>
						    	<!-- End Button -->

								<tr>
									<td height="30" style="font-size: 1px; line-height: 30px;">&nbsp;</td>
								</tr>

							</table>

							<!-- SPACE -->
								<table class="full-width" width="1" align="left" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" >
									<tr>
										<td width="1" height="40" style="font-size: 40px; line-height: 40px;"></td>
									</tr>
								</table>
							<!-- END SPACE -->

							<table class="full-width" width="287" align="right" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">

								<tr>
									<td height="30" style="font-size: 1px; line-height: 30px;">&nbsp;</td>
								</tr>

								<tr>
									<td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 24px; font-weight: 400; color: #333333; letter-spacing: 1px; line-height: 28px;">
										INSTALLMENTS
									</td>
								</tr>

								<!-- Underline -->
								<tr>
									<td align="center">
										<table width="75" border="0" cellpadding="0" cellspacing="0">
										<!-- Edit Underline -->
											<tr>
												<td height="20" style="border-bottom: 2px solid #26c6da;"></td>
											</tr>
										</table>
									</td>
								</tr>
								<!-- End Underline -->

								<tr>
									<td height="20" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
								</tr>

								<tr>
									<td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 13px; font-weight: 400; color: #333333; letter-spacing: 1px; line-height: 24px;">
										No Credit Checks
									</td>
								</tr>

								<tr>
									<td height="30" style="font-size: 1px; line-height: 30px;">&nbsp;</td>
								</tr>

								<tr>
									<td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 58px; font-weight: 300; color: #333333; line-height: 60px;">
										$70-90
									</td>
								</tr>

								<tr>
									<td height="10" style="font-size: 1px; line-height: 10px;">&nbsp;</td>
								</tr>

								<tr>
									<td align="center" style="font-family: 'Open Sans', sans-serif; font-size: 13px; font-weight: 400; color: #8f96a1; line-height: 24px;">
										We offer a convenient monthly payment plan
									</td>
								</tr>

								<tr>
									<td height="30" style="font-size: 1px; line-height: 30px;">&nbsp;</td>
								</tr>

								<!-- Button -->
								<tr>
									<td align="center">
						    			<table width="170" align="center" border="0" cellpadding="0" cellspacing="0" style="border-radius: 2px;" bgcolor="#26c6da">

						    				<tr>
						    					<td height="10" style="font-size: 1px; line-height: 10px;">&nbsp;</td>
						    				</tr>

						    				<tr>
						    					<td align="center" style="font-family: 'Open Sans', sans-serif; font-size: 14px; font-weight: 600; color: #ffffff; line-height: 24px;">
						    						<a href="https://smylusa.com/products" style="color: #ffffff; text-decoration: none;">Order your Kit</a>
						    					</td>
						    				</tr>

						    				<tr>
						    					<td height="10" style="font-size: 1px; line-height: 10px;">&nbsp;</td>
						    				</tr>				    				
						    				
						    			</table>
						    		</td>
						    	</tr>
						    	<!-- End Button -->

								<tr>
									<td height="30" style="font-size: 1px; line-height: 30px;">&nbsp;</td>
								</tr>

							</table>

						</td>
					</tr>

					<tr>
						<td height="75" style="font-size: 1px; line-height: 75px;">&nbsp;</td>
					</tr>

				</table>
			</td>
		</tr>
	</table>
	<!-- END PRICE 2 -->





	

	<!-- PREFOOTER -->
	<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td align="center" bgcolor="#ffffff">
				<table class="table600" width="600" border="0" cellpadding="0" cellspacing="0">

					<tr>
						<td height="50" style="font-size: 1px; line-height: 50px;">&nbsp;</td>
					</tr>

					<tr>
						<td>

							<table class="full-width" width="340" align="left" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">

								<tr>
									<td align="left" style="font-family: 'Montserrat', sans-serif; font-size: 20px; font-weight: 400; color: #333333; line-height: 24px;">
										SMYLUSA
									</td>
								</tr>

								<tr>
									<td height="20" style="font-size: 1px; line-height: 20px;">&nbsp;</td>
								</tr>

								<tr>
									<td>
										
										<table class="full-width" width="100" align="left" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
											<tr>
												<td align="left">
													<img src="{{ asset('images/img-prefooter') }}.jpg" alt="icon" width="100" height="150">
												</td>
											</tr>
										</table>

										<!-- SPACE -->
											<table class="full-width" width="1" align="left" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" >
												<tr>
													<td width="1" height="30" style="font-size: 30px; line-height: 30px;"></td>
												</tr>
											</table>
										<!-- END SPACE -->

										<table class="full-width" width="210" align="right" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">

											<tr>
												<td align="left" style="font-family: 'Montserrat', sans-serif; font-size: 20px; font-weight: 400; color: #333333; letter-spacing: 1px; line-height: 24px;">
													BRING YOUR SMILE ON
												</td>
											</tr>

											<tr>
												<td height="15" style="font-size: 1px; line-height: 15px;">&nbsp;</td>
											</tr>

											<tr>
												<td align="left" style="font-family: 'Open Sans', sans-serif; font-size: 13px; font-weight: 400; color: #8f96a1; line-height: 24px;">
													Our mission is to provide our customers with an affordable, effective, and convenient dental care solution.
												</td>
											</tr>

											<tr>
												<td height="15" style="font-size: 1px; line-height: 15px;">&nbsp;</td>
											</tr>

											<tr>
												<td align="left" style="font-family: 'Open Sans', sans-serif; font-size: 13px; font-weight: 400; color: #26c6da; line-height: 24px;">
													<a href="https://smylusa.com/contact-us" style="color: #26c6da; text-decoration: none;">Subsribe for our latest offers</a>
												</td>
											</tr>

										</table>

									</td>
								</tr>

							</table>

							<!-- SPACE -->
								<table class="full-width" width="1" align="left" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" >
									<tr>
										<td width="1" height="40" style="font-size: 40px; line-height: 40px;"></td>
									</tr>
								</table>
							<!-- END SPACE -->

							<table class="full-width" width="190" align="right" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">

								<tr>
									<td align="left" style="font-family: 'Montserrat', sans-serif; font-size: 20px; font-weight: 400; color: #333333; line-height: 24px;">
										CONTACT US
									</td>
								</tr>

								<tr>
									<td height="20" style="font-size: 1px; line-height: 20px;">&nbsp;</td>
								</tr>

								<tr>
									<td align="left" style="font-family: 'Montserrat', sans-serif; font-size: 13px; font-weight: 400; color: #333333; line-height: 24px;">
										Address :
									</td>
								</tr>

								<tr>
									<td height="5" style="font-size: 1px; line-height: 5px;">&nbsp;</td>
								</tr>

								<tr>
									<td align="left" style="font-family: 'Open Sans', sans-serif; font-size: 13px; font-weight: 400; color: #8f96a1; line-height: 24px;">
										8761 N 56th St #290757 Tampa, FL 33617
									</td>
								</tr>

								<tr>
									<td height="20" style="font-size: 1px; line-height: 20px;">&nbsp;</td>
								</tr>

								<tr>
									<td align="left" style="font-family: 'Montserrat', sans-serif; font-size: 13px; font-weight: 400; color: #333333; line-height: 24px;">
										Phone Number and Email :
									</td>
								</tr>

								<tr>
									<td height="5" style="font-size: 1px; line-height: 5px;">&nbsp;</td>
								</tr>

								<tr>
									<td align="left" style="font-family: 'Open Sans', sans-serif; font-size: 13px; font-weight: 400; color: #8f96a1; line-height: 24px;">
										813-860-5677
									</td>
								</tr>

								<tr>
									<td align="left" style="font-family: 'Open Sans', sans-serif; font-size: 13px; font-weight: 400; color: #8f96a1; line-height: 24px;">
										info@smylusa.com
									</td>
								</tr>

							</table>

						</td>
					</tr>

					<tr>
						<td height="50" style="font-size: 1px; line-height: 50px;">&nbsp;</td>
					</tr>

				</table>
			</td>
		</tr>
	</table>
	<!-- END PREFOOTER -->



</body>
</html>