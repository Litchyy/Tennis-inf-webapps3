<?php
	header('Content-Type: text/html; charset=utf-8');
	session_start();
	include "connect.php";
	// Hier wordt gecontroleerd of er op de zoek-knop is geklikt
	if(isset($_GET["verzend"]))
	{
	// Hier wordt connectie gemaakt met de database
	$mysql = mysqli_connect($server,$user,$pass,$db) or die("Fout: Er is geen verbinding met de MySQL-server tot stand gebracht!");
	// Ingevulde gegevens veilig ophalen uit het formulier
	$model = mysqli_real_escape_string($mysql,$_GET["model"]);
	$prijsmin = mysqli_real_escape_string($mysql,$_GET["prijsmin"]);
	$prijsmax = mysqli_real_escape_string($mysql,$_GET["prijsmax"]);
	
	// Gegevens opvragen uit de database
	// WHERE vraagprijs BETWEEN '$prijsmin' and '$prijsmax' and carrosserie = '$carrosserie' and kilometer BETWEEN '$kmmin' and '$kmmax' and kleur = '$kleur'
	$resultaat = mysqli_query($mysql,"SELECT * FROM `secondhandbmw` WHERE model = '$model' and vraagprijs BETWEEN '$prijsmin' and '$prijsmax'") or die("De selectquery op de database is mislukt!");
	mysqli_close($mysql) or die("Het verbreken van de verbinding met de MySQL-server is mislukt!");
	}
	?>
<!DOCTYPE html>
<html>
	<head>
        




        
        <!-- css for social icons (footer)-->
        <link rel='stylesheet' id='jupiter-donut-shortcodes-css' href='https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/Css/footer-social.css' type='text/css' media='all' />





        <!-- img loader (header en footer)-->
        <script type='text/javascript' src='https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/js/footer-image.js' id='eio-lazy-load-js'></script>

		<!--Menu bar bovenaan-->
		<link rel='stylesheet' id='contact-form-7-css' href='https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/Css/menubar1.css' type='text/css' media='all' />
		<link rel='stylesheet' id='text_slider_testimonial_jquery_css-css' href='https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/Css/menubar2.css' type='text/css' media='all' />
		<link rel='stylesheet' id='text_slider_testimonial_css-css' href='https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/Css/menubar3.css' type='text/css' media='all' />
		<link rel='stylesheet' id='theme-styles-css' href='https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/Css/menubar-layout.css' type='text/css' media='all' />
		<!-- dikte menu bar bovenaan + witte tekst kleur + font-->
		<link rel='stylesheet' id='theme-options-css' href='https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/Css/dikte-menubar.css' type='text/css' media='all' />
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="format-detection" content="telephone=no">
		<title>Inschrijfformulier &#8211; D Tennis</title>
		<style id='global-styles-inline-css' type='text/css'>
			body{--wp--preset--color--black: #000000;--wp--preset--color--cyan-bluish-gray: #abb8c3;--wp--preset--color--white: #ffffff;--wp--preset--color--pale-pink: #f78da7;--wp--preset--color--vivid-red: #cf2e2e;--wp--preset--color--luminous-vivid-orange: #ff6900;--wp--preset--color--luminous-vivid-amber: #fcb900;--wp--preset--color--light-green-cyan: #7bdcb5;--wp--preset--color--vivid-green-cyan: #00d084;--wp--preset--color--pale-cyan-blue: #8ed1fc;--wp--preset--color--vivid-cyan-blue: #0693e3;--wp--preset--color--vivid-purple: #9b51e0;--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%);--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg,rgb(122,220,180) 0%,rgb(0,208,130) 100%);--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg,rgba(252,185,0,1) 0%,rgba(255,105,0,1) 100%);--wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg,rgba(255,105,0,1) 0%,rgb(207,46,46) 100%);--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg,rgb(238,238,238) 0%,rgb(169,184,195) 100%);--wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg,rgb(74,234,220) 0%,rgb(151,120,209) 20%,rgb(207,42,186) 40%,rgb(238,44,130) 60%,rgb(251,105,98) 80%,rgb(254,248,76) 100%);--wp--preset--gradient--blush-light-purple: linear-gradient(135deg,rgb(255,206,236) 0%,rgb(152,150,240) 100%);--wp--preset--gradient--blush-bordeaux: linear-gradient(135deg,rgb(254,205,165) 0%,rgb(254,45,45) 50%,rgb(107,0,62) 100%);--wp--preset--gradient--luminous-dusk: linear-gradient(135deg,rgb(255,203,112) 0%,rgb(199,81,192) 50%,rgb(65,88,208) 100%);--wp--preset--gradient--pale-ocean: linear-gradient(135deg,rgb(255,245,203) 0%,rgb(182,227,212) 50%,rgb(51,167,181) 100%);--wp--preset--gradient--electric-grass: linear-gradient(135deg,rgb(202,248,128) 0%,rgb(113,206,126) 100%);--wp--preset--gradient--midnight: linear-gradient(135deg,rgb(2,3,129) 0%,rgb(40,116,252) 100%);--wp--preset--duotone--dark-grayscale: url('#wp-duotone-dark-grayscale');--wp--preset--duotone--grayscale: url('#wp-duotone-grayscale');--wp--preset--duotone--purple-yellow: url('#wp-duotone-purple-yellow');--wp--preset--duotone--blue-red: url('#wp-duotone-blue-red');--wp--preset--duotone--midnight: url('#wp-duotone-midnight');--wp--preset--duotone--magenta-yellow: url('#wp-duotone-magenta-yellow');--wp--preset--duotone--purple-green: url('#wp-duotone-purple-green');--wp--preset--duotone--blue-orange: url('#wp-duotone-blue-orange');--wp--preset--font-size--small: 13px;--wp--preset--font-size--medium: 20px;--wp--preset--font-size--large: 36px;--wp--preset--font-size--x-large: 42px;--wp--preset--spacing--20: 0.44rem;--wp--preset--spacing--30: 0.67rem;--wp--preset--spacing--40: 1rem;--wp--preset--spacing--50: 1.5rem;--wp--preset--spacing--60: 2.25rem;--wp--preset--spacing--70: 3.38rem;--wp--preset--spacing--80: 5.06rem;}:where(.is-layout-flex){gap: 0.5em;}body .is-layout-flow > .alignleft{float: left;margin-inline-start: 0;margin-inline-end: 2em;}body .is-layout-flow > .alignright{float: right;margin-inline-start: 2em;margin-inline-end: 0;}body .is-layout-flow > .aligncenter{margin-left: auto !important;margin-right: auto !important;}body .is-layout-constrained > .alignleft{float: left;margin-inline-start: 0;margin-inline-end: 2em;}body .is-layout-constrained > .alignright{float: right;margin-inline-start: 2em;margin-inline-end: 0;}body .is-layout-constrained > .aligncenter{margin-left: auto !important;margin-right: auto !important;}body .is-layout-constrained > :where(:not(.alignleft):not(.alignright):not(.alignfull)){max-width: var(--wp--style--global--content-size);margin-left: auto !important;margin-right: auto !important;}body .is-layout-constrained > .alignwide{max-width: var(--wp--style--global--wide-size);}body .is-layout-flex{display: flex;}body .is-layout-flex{flex-wrap: wrap;align-items: center;}body .is-layout-flex > *{margin: 0;}:where(.wp-block-columns.is-layout-flex){gap: 2em;}.has-black-color{color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-color{color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-color{color: var(--wp--preset--color--white) !important;}.has-pale-pink-color{color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-color{color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-color{color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-color{color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-color{color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-color{color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-color{color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-color{color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-color{color: var(--wp--preset--color--vivid-purple) !important;}.has-black-background-color{background-color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-background-color{background-color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-background-color{background-color: var(--wp--preset--color--white) !important;}.has-pale-pink-background-color{background-color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-background-color{background-color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-background-color{background-color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-background-color{background-color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-background-color{background-color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-background-color{background-color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-background-color{background-color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-background-color{background-color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-background-color{background-color: var(--wp--preset--color--vivid-purple) !important;}.has-black-border-color{border-color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-border-color{border-color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-border-color{border-color: var(--wp--preset--color--white) !important;}.has-pale-pink-border-color{border-color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-border-color{border-color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-border-color{border-color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-border-color{border-color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-border-color{border-color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-border-color{border-color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-border-color{border-color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-border-color{border-color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-border-color{border-color: var(--wp--preset--color--vivid-purple) !important;}.has-vivid-cyan-blue-to-vivid-purple-gradient-background{background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;}.has-light-green-cyan-to-vivid-green-cyan-gradient-background{background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;}.has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background{background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;}.has-luminous-vivid-orange-to-vivid-red-gradient-background{background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;}.has-very-light-gray-to-cyan-bluish-gray-gradient-background{background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;}.has-cool-to-warm-spectrum-gradient-background{background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;}.has-blush-light-purple-gradient-background{background: var(--wp--preset--gradient--blush-light-purple) !important;}.has-blush-bordeaux-gradient-background{background: var(--wp--preset--gradient--blush-bordeaux) !important;}.has-luminous-dusk-gradient-background{background: var(--wp--preset--gradient--luminous-dusk) !important;}.has-pale-ocean-gradient-background{background: var(--wp--preset--gradient--pale-ocean) !important;}.has-electric-grass-gradient-background{background: var(--wp--preset--gradient--electric-grass) !important;}.has-midnight-gradient-background{background: var(--wp--preset--gradient--midnight) !important;}.has-small-font-size{font-size: var(--wp--preset--font-size--small) !important;}.has-medium-font-size{font-size: var(--wp--preset--font-size--medium) !important;}.has-large-font-size{font-size: var(--wp--preset--font-size--large) !important;}.has-x-large-font-size{font-size: var(--wp--preset--font-size--x-large) !important;}
			.wp-block-navigation a:where(:not(.wp-element-button)){color: inherit;}
			:where(.wp-block-columns.is-layout-flex){gap: 2em;}
			.wp-block-pullquote{font-size: 1.5em;line-height: 1.6;}
		</style>
		<style id='theme-styles-inline-css' type='text/css'>
			#wpadminbar {
			-webkit-backface-visibility: hidden;
			backface-visibility: hidden;
			-webkit-perspective: 1000;
			-ms-perspective: 1000;
			perspective: 1000;
			-webkit-transform: translateZ(0px);
			-ms-transform: translateZ(0px);
			transform: translateZ(0px);
			}
			@media screen and (max-width: 600px) {
			#wpadminbar {
			position: fixed !important;
			}
			}
			body { background-color:#fff; } .hb-custom-header #mk-page-introduce, 
			.mk-header { background-color:#ffffff;background-image:url(http://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/afbeeldingen/clubhuis2.jpg);background-size:cover;-webkit-background-size:cover;-moz-background-size:cover; } .hb-custom-header > div, 
			.mk-header-bg { background:-webkit-linear-gradient(left,#4B91F1 0%, #4B91F1 100%);background:linear-gradient(to right,#4B91F1 0%, #4B91F1 100%) } 
			.mk-classic-nav-bg { background:-webkit-linear-gradient(left,#efa057 0%, #e57406 100%);background:linear-gradient(to right,#efa057 0%, #e57406 100%) } 
			.master-holder-bg { background-color:#fff; } 
			#mk-footer { background-color:#000000;background-repeat:no-repeat;background-position:center center; } 
			#mk-boxed-layout { -webkit-box-shadow:0 0 0px rgba(0, 0, 0, 0); -moz-box-shadow:0 0 0px rgba(0, 0, 0, 0); box-shadow:0 0 0px rgba(0, 0, 0, 0); } 
			.mk-news-tab .mk-tabs-tabs .is-active a, 
			.mk-fancy-title.pattern-style span, 
			.mk-fancy-title.pattern-style.color-gradient span:after, 
			.page-bg-color { background-color:#fff; } 
			.page-title { font-size:20px; color:#dd7133; text-transform:uppercase; font-weight:700; letter-spacing:2px; } 
			.page-subtitle { font-size:14px; line-height:100%; color:#a3a3a3; font-size:14px; text-transform:none; } 
			.header-style-1 .mk-header-padding-wrapper, 
			.header-style-2 .mk-header-padding-wrapper, 
			.header-style-3 .mk-header-padding-wrapper { padding-top:211px; } 
			.mk-process-steps[max-width~="950px"] ul::before { display:none !important; } 
			.mk-process-steps[max-width~="950px"] li { margin-bottom:30px !important; width:100% !important; text-align:center; } 
			.mk-event-countdown-ul[max-width~="750px"] li { width:90%; display:block; margin:0 auto 15px; } body { font-family:Open Sans } 
			@font-face { font-family:'star'; src:url('https://ltcwaterwijk.nl/wp-content/themes/jupiter/assets/stylesheet/fonts/star/font.eot'); 
			src:url('https://ltcwaterwijk.nl/wp-content/themes/jupiter/assets/stylesheet/fonts/star/font.eot?#iefix') format('embedded-opentype'), 
			url('https://ltcwaterwijk.nl/wp-content/themes/jupiter/assets/stylesheet/fonts/star/font.woff') format('woff'), url('https://ltcwaterwijk.nl/wp-content/themes/jupiter/assets/stylesheet/fonts/star/font.ttf') format('truetype'), url('https://ltcwaterwijk.nl/wp-content/themes/jupiter/assets/stylesheet/fonts/star/font.svg#star') format('svg'); font-weight:normal; font-style:normal; } 
			@font-face { font-family:'WooCommerce'; src:url('https://ltcwaterwijk.nl/wp-content/themes/jupiter/assets/stylesheet/fonts/woocommerce/font.eot'); 
			src:url('https://ltcwaterwijk.nl/wp-content/themes/jupiter/assets/stylesheet/fonts/woocommerce/font.eot?#iefix') format('embedded-opentype'), 
			url('https://ltcwaterwijk.nl/wp-content/themes/jupiter/assets/stylesheet/fonts/woocommerce/font.woff') format('woff'), 
			url('https://ltcwaterwijk.nl/wp-content/themes/jupiter/assets/stylesheet/fonts/woocommerce/font.ttf') format('truetype'), 
			url('https://ltcwaterwijk.nl/wp-content/themes/jupiter/assets/stylesheet/fonts/woocommerce/font.svg#WooCommerce') format('svg'); font-weight:normal; font-style:normal; }
		</style>
		<style id='qcf_style-inline-css' type='text/css'>
			.qcf-style.default {max-width:100%;overflow:hidden;width:100%;}
			.qcf-style.default input[type=text], .qcf-style.default input[type=email],.qcf-style.default textarea, .qcf-style.default select, .qcf-style.default #submit {border-radius:0;}
			.qcf-style.default h2 {color: #465069;font-size: 1.6em;;height:auto;}.qcf-style.default p, .qcf-style.default select{font-family: arial, sans-serif; font-size: 1em;color: #465069;height:auto;line-height:normal;height:auto;}
			.qcf-style.default div.rangeslider, .qcf-style.default div.rangeslider__fill {height: 1em;background: #CCC;}
			.qcf-style.default div.rangeslider__fill {background: #00ff00;}
			.qcf-style.default div.rangeslider__handle {background: white;border: 1px solid #CCC;width: 2em;height: 2em;position: absolute;top: -0.5em;-webkit-border-radius:#FFF%;-moz-border-radius:50%;-ms-border-radius:50%;-o-border-radius:50%;border-radius:50%;}
			.qcf-style.default div.qcf-slideroutput{font-size:1em;color:#465069;}.qcf-style.default input[type=text], .qcf-style.default input[type=email], .qcf-style.default textarea, .qcf-style.default select {border: 1px solid #415063;background:#FFFFFF;font-family: arial, sans-serif; font-size: 1em; color: #465069;;line-height:normal;height:auto; margin: 2px 0 3px 0;padding: 6px;}
			.qcf-style.default .qcfcontainer input + label, .qcf-style.default .qcfcontainer textarea + label {font-family: arial, sans-serif; font-size: 1em; color: #465069;;}
			.qcf-style.default input:focus, .qcf-style.default textarea:focus {background:#FFFFCC;}
			.qcf-style.default input[type=text].required, .qcf-style.default input[type=email].required, .qcf-style.default select.required, .qcf-style.default textarea.required {border: 1px solid #00C618;}
			.qcf-style.default p span, .qcf-style.default .error {color:#D31900;clear:both;}
			.qcf-style.default input[type=text].error, .qcf-style.default input[type=email].error,.qcf-style.default select.error, .qcf-style.default textarea.error {border:1px solid #D31900;}
			.qcf-style.default #submit {float:left;width:100%;color:#FFF;background:#343838;border:1px solid #415063;font-family: arial, sans-serif;font-size: inherit;}
			.qcf-style.default #submit:hover{background:#888888;}
		</style>
		<style type="text/css" id="wp-custom-css">
			.menu-button a { 
			border: 2px solid #E47405; /* button border width and color */
			color: #E47405;    /* text color */
			line-height: initial;  /* reset the line-height. Let padding control size */
			padding: 10px 20px;
			border-radius: 5px;
			font-size: 19px;  /* Optional. Remove to match to your other menu items */
			transition: all .25s;  /* animate the hover transition. Duration 0.25 seconds */
			}
			.menu-button a:hover {
			color: white; /* change the hover text color */
			background-color: #E47405;  /* fill the background on hover */
			}
		</style>
	</head>
	<body>
		<div id="mk-boxed-layout">
			<div id="mk-theme-container" >
				<header data-height='160'
					data-sticky-height='160'
					data-responsive-height='90'
					data-transparent-skin=''
					data-header-style='2'
					data-sticky-style='fixed'
					data-sticky-offset='header' id="mk-header-1" class="mk-header header-style-2 header-align-center  toolbar-false menu-hover-5 sticky-style-fixed mk-background-stretch boxed-header " role="banner" itemscope="itemscope" itemtype="https://schema.org/WPHeader" >
					<div class="mk-header-holder">
						<div class="mk-header-inner">
							<div class="mk-header-bg "></div>
							<div class="mk-grid header-grid">
								<div class="add-header-height">
									<div class="mk-nav-responsive-link">
										<div class="mk-css-icon-menu">
											<div class="mk-css-icon-menu-line-1"></div>
											<div class="mk-css-icon-menu-line-2"></div>
											<div class="mk-css-icon-menu-line-3"></div>
										</div>
									</div>
									<div class=" header-logo fit-logo-img add-header-height  logo-has-sticky">
										<a href="http://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/Pages/aanmelden.php" title="D Tennis">
											<img class="mk-desktop-logo dark-logo  lazyload"
												title="D Tennis"
												alt="D Tennis"
												src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/Informatica/.Tennis PO/afbeeldingen/d-tennis-logo.png" decoding="async" />
											<noscript><img class="mk-desktop-logo dark-logo "
												title="D Tennis"
												alt="D Tennis"
												src="/Informatica/.Tennis PO/afbeeldingen/d-tennis-logo.png" data-eio="l" /></noscript>
											<img class="mk-desktop-logo light-logo  lazyload"
												title="D Tennis"
												alt="D Tennis"
												src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/Informatica/.Tennis PO/afbeeldingen/d-tennis-logo.png" decoding="async" />
											<noscript><img class="mk-desktop-logo light-logo "
												title="D Tennis"
												alt="D Tennis"
												src="/Informatica/.Tennis PO/afbeeldingen/d-tennis-logo.png" data-eio="l" /></noscript>
											<img class="mk-sticky-logo  lazyload"
												title="D Tennis"
												alt="D Tennis"
												src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/Informatica/.Tennis PO/afbeeldingen/d-tennis-logo.png" decoding="async" />
											<noscript><img class="mk-sticky-logo "
												title="D Tennis"
												alt="D Tennis"
												src="/Informatica/.Tennis PO/afbeeldingen/d-tennis-logo.png" data-eio="l" /></noscript>
										</a>
									</div>
								</div>
							</div>
							<div class="clearboth"></div>
							<div class="mk-header-nav-container menu-hover-style-5" role="navigation" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement" >
								<div class="mk-classic-nav-bg"></div>
								<div class="mk-classic-menu-wrapper">
									<nav class="mk-main-navigation js-main-nav">
										<ul id="menu-main-menu" class="main-navigation-ul">
											<li id="menu-item-8258" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home no-mega-menu"><a class="menu-item-link js-smooth-scroll"  href="https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/index.php">Home</a></li>
											<li id="menu-item-8258" class="menu-item menu-item-type-post_type menu-item-object-page no-mega-menu"><a class="menu-item-link js-smooth-scroll"  href="https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/Pages/leden.php">Leden</a></li>
											<li id="menu-item-8255" class="menu-item menu-item-type-post_type menu-item-object-page no-mega-menu"><a class="menu-item-link js-smooth-scroll"  href="https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/Pages/scores.php">Scores</a></li>
											<li id="menu-item-8465" class="menu-item menu-item-type-post_type menu-item-object-page no-mega-menu"> <a class="menu-item-link js-smooth-scroll"  href="https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/Pages/teams.php">Teams</a></li>
											<li id="menu-item-8713" class="menu-item menu-item-type-post_type menu-item-object-page no-mega-menu"><a class="menu-item-link js-smooth-scroll"  href="https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/Pages/boetes.php">Boetes</a></li>
											<li id="menu-item-14864" class="menu-button menu-item menu-item-type-post_type menu-item-object-page no-mega-menu"><a class="menu-item-link js-smooth-scroll"  href="https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/Pages/aangemeld.php">Lid worden?</a></li>
										</ul>
									</nav>
								</div>
							</div>
							<div class="mk-header-right">
								<div class="mk-header-social header-section">
									<ul>
										<li>
											<a class="facebook-hover " target="_blank" rel="noreferrer noopener" href="https://www.facebook.com/">
												<svg  class="mk-svg-icon" data-name="mk-jupiter-icon-simple-facebook" data-cacheid="icon-63f4b7c0c7b43" style=" height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
													<path d="M192.191 92.743v60.485h-63.638v96.181h63.637v256.135h97.069v-256.135h84.168s6.674-51.322 9.885-96.508h-93.666v-42.921c0-8.807 11.565-20.661 23.01-20.661h71.791v-95.719h-83.57c-111.317 0-108.686 86.262-108.686 99.142z"/>
												</svg>
											</a>
										</li>
										<li>
											<a class="twitter-hover " target="_blank" rel="noreferrer noopener" href="https://twitter.com/Stoplicht13">
												<svg  class="mk-svg-icon" data-name="mk-jupiter-icon-simple-twitter" data-cacheid="icon-63f4b7c0c7c18" style=" height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
													<path d="M454.058 213.822c28.724-2.382 48.193-15.423 55.683-33.132-10.365 6.373-42.524 13.301-60.269 6.681-.877-4.162-1.835-8.132-2.792-11.706-13.527-49.679-59.846-89.698-108.382-84.865 3.916-1.589 7.914-3.053 11.885-4.388 5.325-1.923 36.678-7.003 31.749-18.079-4.176-9.728-42.471 7.352-49.672 9.597 9.501-3.581 25.26-9.735 26.93-20.667-14.569 1.991-28.901 8.885-39.937 18.908 3.998-4.293 7.01-9.536 7.666-15.171-38.91 24.85-61.624 74.932-80.025 123.523-14.438-13.972-27.239-25.008-38.712-31.114-32.209-17.285-70.722-35.303-131.156-57.736-1.862 19.996 9.899 46.591 43.723 64.273-7.325-.986-20.736 1.219-31.462 3.773 4.382 22.912 18.627 41.805 57.251 50.918-17.642 1.163-26.767 5.182-35.036 13.841 8.043 15.923 27.656 34.709 62.931 30.82-39.225 16.935-15.998 48.234 15.93 43.565-54.444 56.244-140.294 52.123-189.596 5.08 128.712 175.385 408.493 103.724 450.21-65.225 31.23.261 49.605-10.823 60.994-23.05-17.99 3.053-44.072-.095-57.914-5.846z"/>
												</svg>
											</a>
										</li>
										<li>
											<a class="instagram-hover " target="_blank" rel="noreferrer noopener" href="https://www.instagram.com/litchy.y">
												<svg  class="mk-svg-icon" data-name="mk-jupiter-icon-simple-instagram" data-cacheid="icon-63f4b7c0c7cd2" style=" height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 81.2 81.2">
													<path d="M81,23.9c-0.2-4.3-0.9-7.3-1.9-9.9c-1-2.7-2.4-4.9-4.7-7.2c-2.3-2.3-4.5-3.6-7.2-4.7c-2.6-1-5.5-1.7-9.9-1.9 C53,0,51.6,0,40.6,0c-11,0-12.4,0-16.7,0.2c-4.3,0.2-7.3,0.9-9.9,1.9c-2.7,1-4.9,2.4-7.2,4.7C4.6,9.1,3.2,11.3,2.1,14 c-1,2.6-1.7,5.5-1.9,9.9C0,28.2,0,29.6,0,40.6c0,11,0,12.4,0.2,16.7c0.2,4.3,0.9,7.3,1.9,9.9c1,2.7,2.4,4.9,4.7,7.2 c2.3,2.3,4.5,3.6,7.2,4.7c2.6,1,5.5,1.7,9.9,1.9c4.3,0.2,5.7,0.2,16.7,0.2c11,0,12.4,0,16.7-0.2c4.3-0.2,7.3-0.9,9.9-1.9 c2.7-1,4.9-2.4,7.2-4.7c2.3-2.3,3.6-4.5,4.7-7.2c1-2.6,1.7-5.5,1.9-9.9c0.2-4.3,0.2-5.7,0.2-16.7C81.2,29.6,81.2,28.2,81,23.9z  M73.6,57c-0.2,4-0.8,6.1-1.4,7.5c-0.7,1.9-1.6,3.2-3,4.7c-1.4,1.4-2.8,2.3-4.7,3c-1.4,0.6-3.6,1.2-7.5,1.4 c-4.3,0.2-5.6,0.2-16.4,0.2c-10.8,0-12.1,0-16.4-0.2c-4-0.2-6.1-0.8-7.5-1.4c-1.9-0.7-3.2-1.6-4.7-3c-1.4-1.4-2.3-2.8-3-4.7 C8.4,63.1,7.7,61,7.6,57c-0.2-4.3-0.2-5.6-0.2-16.4c0-10.8,0-12.1,0.2-16.4c0.2-4,0.8-6.1,1.4-7.5c0.7-1.9,1.6-3.2,3-4.7 c1.4-1.4,2.8-2.3,4.7-3c1.4-0.6,3.6-1.2,7.5-1.4c4.3-0.2,5.6-0.2,16.4-0.2c10.8,0,12.1,0,16.4,0.2c4,0.2,6.1,0.8,7.5,1.4 c1.9,0.7,3.2,1.6,4.7,3c1.4,1.4,2.3,2.8,3,4.7c0.6,1.4,1.2,3.6,1.4,7.5c0.2,4.3,0.2,5.6,0.2,16.4C73.9,51.4,73.8,52.7,73.6,57z"/>
													<path d="M40.6,19.8c-11.5,0-20.8,9.3-20.8,20.8c0,11.5,9.3,20.8,20.8,20.8c11.5,0,20.8-9.3,20.8-20.8 C61.4,29.1,52.1,19.8,40.6,19.8z M40.6,54.1c-7.5,0-13.5-6.1-13.5-13.5c0-7.5,6.1-13.5,13.5-13.5c7.5,0,13.5,6.1,13.5,13.5 C54.1,48.1,48.1,54.1,40.6,54.1z"/>
													<circle cx="62.3" cy="18.9" r="4.9"/>
												</svg>
											</a>
										</li>
									</ul>
									<div class="clearboth"></div>
								</div>
							</div>
							<div class="mk-responsive-wrap">
								<nav class="menu-main-menu-container">
									<ul id="menu-main-menu-1" class="mk-responsive-nav">
										<li id="responsive-menu-item-8259" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home">
											<a class="menu-item-link js-smooth-scroll"  href="https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/index.php">Home</a>
											<span class="mk-nav-arrow mk-nav-sub-closed">
												<svg  class="mk-svg-icon" data-name="mk-moon-arrow-down" data-cacheid="icon-63f4b7c0cb39b" style=" height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
													<path d="M512 192l-96-96-160 160-160-160-96 96 256 255.999z"/>
												</svg>
											</span>
										</li>
										<li id="responsive-menu-item-8258" class="menu-item menu-item-type-post_type menu-item-object-page">
											<a class="menu-item-link js-smooth-scroll"  href="https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/Pages/leden.php">Leden</a>
											<span class="mk-nav-arrow mk-nav-sub-closed">
												<svg  class="mk-svg-icon" data-name="mk-moon-arrow-down" data-cacheid="icon-63f4b7c0cb39b" style=" height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
													<path d="M512 192l-96-96-160 160-160-160-96 96 256 255.999z"/>
												</svg>
											</span>
										</li>
										<li id="responsive-menu-item-8255" class="menu-item menu-item-type-post_type menu-item-object-page"><a class="menu-item-link js-smooth-scroll"  href="https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/Pages/scores.php">Scores</a></li>
										<li id="responsive-menu-item-8465" class="menu-item menu-item-type-post_type menu-item-object-page">
											<a class="menu-item-link js-smooth-scroll"  href="https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/Pages/teams.php">Teams</a>
											<span class="mk-nav-arrow mk-nav-sub-closed">
												<svg  class="mk-svg-icon" data-name="mk-moon-arrow-down" data-cacheid="icon-63f4b7c0cb98f" style=" height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
													<path d="M512 192l-96-96-160 160-160-160-96 96 256 255.999z"/>
												</svg>
											</span>
										</li>
										<li id="responsive-menu-item-8713" class="menu-item menu-item-type-post_type menu-item-object-page"><a class="menu-item-link js-smooth-scroll"  href="https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/Pages/boetes.php">Boetes</a></li>
										<li id="responsive-menu-item-14864" class="menu-button menu-item menu-item-type-post_type menu-item-object-page"><a class="menu-item-link js-smooth-scroll"  href="https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/Pages/aangemeld.php">Lid worden?</a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
					<div class="mk-header-padding-wrapper"></div>
					<section id="mk-page-introduce" class="intro-left">
						<div class="mk-grid">
							<h1 class="page-title ">Inschrijfformulier</h1>
							<div id="mk-breadcrumbs">
								<div class="mk-breadcrumbs-inner dark-skin"><span xmlns:v="http://rdf.data-vocabulary.org/#"><span typeof="v:Breadcrumb"><a href="https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/index.php" rel="v:url" property="v:title">Home</a> &#47; <span rel="v:child" typeof="v:Breadcrumb">Inschrijfformulier</span></span></span></div>
							</div>
							<div class="clearboth"></div>
						</div>
					</section>
				</header>





                <!-- body input -->
				<div id="pag1" data-role="page" data-theme="b">
					<div data-role="header">
						<h1>Aanmelden</h1>
					</div>
					<div role="main" class="ui-content">
						<form action="aangemeld.php" method="get">
							<label for="voornaam">Voornaam</label>
							<input name="naam" id="voornaam" type="text" placeholder="Voornaam" value="" data-mini="true" >
							<label for="achternaam">Achternaam</label>
							<input name="naam" id="achternaam" type="text" placeholder="Achternaam" value="" data-mini="true" >
							<label for="adres">Adres</label>
							<input name="adres" id="adres" type="text" placeholder="Adres" value="" data-mini="true" >
							<label for="woonplaats">Woonplaats</label>
							<input name="woonplaats" id="woonplaats" type="text" placeholder="Woonplaats" value="" data-mini="true" >
							<label for="geslacht">Geslacht</label>
							<input name="geslacht" id="geslacht" type="text" placeholder="Adres" value="" data-mini="true" >
							<br>
							<div data-role="rangeslider">
								<label for="prijsmin">Vul uw vraagprijs in euro's in</label>
								<input name="prijsmin" id="prijsmin" type="range" min="23000" max="100000" step="1000" value="0" data-mini="true" required>
								<label for="prijsmax">Vul uw vraagprijs in euro's in</label>
								<input name="prijsmax" id="prijsmax" type="range" min="23000" max="110000" step="1000" value="110000" data-mini="true" required>
							</div>
							<br>
							<label for="opmerkingen">Opmerkingen:</label>
							<textarea name="opmerkingen" id="opmerkingen" placeholder="Opmerkingen" rows="8" cols="40" data-mini="true"></textarea>
							<br>
							<label class="ui-hidden-accessible" for="verzend">Verzend:</label>
							<button class="ui-shadow ui-btn ui-corner-all ui-mini" id="verzend" type="submit" name="verzend">Verzend</button>
						</form>
						<div class="ui-body ui-body-b ui-corner-all">
							<?php
								// Hier wordt gecontroleerd of er op de zoek-knop is geklikt
								
								if(isset($_GET["verzend"]))
								{
									echo"Resultaten:<br><br>";
									while(list($aanbieder, $model, $carrosserie, $brandstof, $bouwjaar, $kleur, $kilometer, $extra, $vraagprijs) = mysqli_fetch_row($resultaat))
									{
										echo"Aanbieder: $aanbieder <br>Model: $model <br> Carrosserie: $carrosserie <br>Brandstof: $brandstof <br>Bouwjaar: $bouwjaar<br> Kleur: $kleur<br> Kilometerstand: $kilometer<br> Extra's: $extra<br> Vraagprijs: €$vraagprijs euro<br>";
										echo"▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬<br>";
									}
								}
								else
								{
									echo"Resultaten:<br><br>";
									$mysql = mysqli_connect($server,$user,$pass,$db) or die("Fout: Er is geen verbinding met de MySQL-server tot stand gebracht!");
									$sql = mysqli_query($mysql, "SELECT * FROM `secondhandbmw`");
									mysqli_close($mysql) or die("Het verbreken van de verbinding met de MySQL-server is mislukt!");
									while(list($aanbieder, $model, $carrosserie, $brandstof, $bouwjaar, $kleur, $kilometer, $extra, $vraagprijs) = mysqli_fetch_row($sql))
									{	
										echo"Aanbieder: $aanbieder <br>Model: $model <br> Vraagprijs: €$vraagprijs euro<br>";
										echo"▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬<br>";
									}
									
								
								}
								?>
						</div>
					</div>
				</div>
				<!-- einde body input-->

                                    


				<!-- footer -->
				<section id="mk-footer" class=" disable-on-mobile" role="contentinfo" itemscope="itemscope" itemtype="https://schema.org/WPFooter" >
					<div class="footer-wrapper mk-grid">
						<div class="mk-padding-wrapper">
							<div class="mk-col-1-3">
								<section id="text-4" class="widget widget_text">
									<div class="textwidget">
										<div style="text-align: center;">
											<img class="alignnone size-medium wp-image-8260 lazyload" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAADtAQMAAAA/cNqTAAAABlBMVEUAAAD///+l2Z/dAAAAAXRSTlMAQObYZgAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAB9JREFUaN7twQENAAAAwqD3T20PBxQAAAAAAAAAAHBoJBsAAVxmHVQAAAAASUVORK5CYII=" alt="" width="300" height="237" data-src="http://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/afbeeldingen/d-tennis-logo.png" decoding="async" />
											<noscript><img class="alignnone size-medium wp-image-8260" src="http://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/afbeeldingen/d-tennis-logo.png" alt="" width="600" height="237" data-eio="l" /></noscript>
										</div>
										<div style="padding-bottom: 40px;"></div>
									</div>
								</section>
								<section id="social-1" class="widget widget_social_networks">
									<div id="social-63f378ffdadc1" class="align-center">
										<a href="https://www.facebook.com/" rel="nofollow noreferrer noopener" class="builtin-icons mk-square-rounded custom large facebook-hover" target="_blank" alt="Volg ons op facebook" title="Volg ons op facebook">
											<svg  class="mk-svg-icon" data-name="mk-jupiter-icon-simple-facebook" data-cacheid="icon-63f378ffdaea8" style=" height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
												<path d="M192.191 92.743v60.485h-63.638v96.181h63.637v256.135h97.069v-256.135h84.168s6.674-51.322 9.885-96.508h-93.666v-42.921c0-8.807 11.565-20.661 23.01-20.661h71.791v-95.719h-83.57c-111.317 0-108.686 86.262-108.686 99.142z"/>
											</svg>
										</a>
										<a href="https://www.instagram.com/litchy.y/" rel="nofollow noreferrer noopener" class="builtin-icons mk-square-rounded custom large instagram-hover" target="_blank" alt="Volg ons op instagram" title="Volg ons op instagram">
											<svg  class="mk-svg-icon" data-name="mk-jupiter-icon-simple-instagram" data-cacheid="icon-63f378ffdaf54" style=" height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 81.2 81.2">
												<path d="M81,23.9c-0.2-4.3-0.9-7.3-1.9-9.9c-1-2.7-2.4-4.9-4.7-7.2c-2.3-2.3-4.5-3.6-7.2-4.7c-2.6-1-5.5-1.7-9.9-1.9 C53,0,51.6,0,40.6,0c-11,0-12.4,0-16.7,0.2c-4.3,0.2-7.3,0.9-9.9,1.9c-2.7,1-4.9,2.4-7.2,4.7C4.6,9.1,3.2,11.3,2.1,14 c-1,2.6-1.7,5.5-1.9,9.9C0,28.2,0,29.6,0,40.6c0,11,0,12.4,0.2,16.7c0.2,4.3,0.9,7.3,1.9,9.9c1,2.7,2.4,4.9,4.7,7.2 c2.3,2.3,4.5,3.6,7.2,4.7c2.6,1,5.5,1.7,9.9,1.9c4.3,0.2,5.7,0.2,16.7,0.2c11,0,12.4,0,16.7-0.2c4.3-0.2,7.3-0.9,9.9-1.9 c2.7-1,4.9-2.4,7.2-4.7c2.3-2.3,3.6-4.5,4.7-7.2c1-2.6,1.7-5.5,1.9-9.9c0.2-4.3,0.2-5.7,0.2-16.7C81.2,29.6,81.2,28.2,81,23.9z  M73.6,57c-0.2,4-0.8,6.1-1.4,7.5c-0.7,1.9-1.6,3.2-3,4.7c-1.4,1.4-2.8,2.3-4.7,3c-1.4,0.6-3.6,1.2-7.5,1.4 c-4.3,0.2-5.6,0.2-16.4,0.2c-10.8,0-12.1,0-16.4-0.2c-4-0.2-6.1-0.8-7.5-1.4c-1.9-0.7-3.2-1.6-4.7-3c-1.4-1.4-2.3-2.8-3-4.7 C8.4,63.1,7.7,61,7.6,57c-0.2-4.3-0.2-5.6-0.2-16.4c0-10.8,0-12.1,0.2-16.4c0.2-4,0.8-6.1,1.4-7.5c0.7-1.9,1.6-3.2,3-4.7 c1.4-1.4,2.8-2.3,4.7-3c1.4-0.6,3.6-1.2,7.5-1.4c4.3-0.2,5.6-0.2,16.4-0.2c10.8,0,12.1,0,16.4,0.2c4,0.2,6.1,0.8,7.5,1.4 c1.9,0.7,3.2,1.6,4.7,3c1.4,1.4,2.3,2.8,3,4.7c0.6,1.4,1.2,3.6,1.4,7.5c0.2,4.3,0.2,5.6,0.2,16.4C73.9,51.4,73.8,52.7,73.6,57z"/>
												<path d="M40.6,19.8c-11.5,0-20.8,9.3-20.8,20.8c0,11.5,9.3,20.8,20.8,20.8c11.5,0,20.8-9.3,20.8-20.8 C61.4,29.1,52.1,19.8,40.6,19.8z M40.6,54.1c-7.5,0-13.5-6.1-13.5-13.5c0-7.5,6.1-13.5,13.5-13.5c7.5,0,13.5,6.1,13.5,13.5 C54.1,48.1,48.1,54.1,40.6,54.1z"/>
												<circle cx="62.3" cy="18.9" r="4.9"/>
											</svg>
										</a>
										<a href="https://twitter.com/Stoplicht13" rel="nofollow noreferrer noopener" class="builtin-icons mk-square-rounded custom large twitter-hover" target="_blank" alt="Volg ons op twitter" title="Volg ons op twitter">
											<svg  class="mk-svg-icon" data-name="mk-jupiter-icon-simple-twitter" data-cacheid="icon-63f378ffdafd7" style=" height:16px; width: 16px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
												<path d="M454.058 213.822c28.724-2.382 48.193-15.423 55.683-33.132-10.365 6.373-42.524 13.301-60.269 6.681-.877-4.162-1.835-8.132-2.792-11.706-13.527-49.679-59.846-89.698-108.382-84.865 3.916-1.589 7.914-3.053 11.885-4.388 5.325-1.923 36.678-7.003 31.749-18.079-4.176-9.728-42.471 7.352-49.672 9.597 9.501-3.581 25.26-9.735 26.93-20.667-14.569 1.991-28.901 8.885-39.937 18.908 3.998-4.293 7.01-9.536 7.666-15.171-38.91 24.85-61.624 74.932-80.025 123.523-14.438-13.972-27.239-25.008-38.712-31.114-32.209-17.285-70.722-35.303-131.156-57.736-1.862 19.996 9.899 46.591 43.723 64.273-7.325-.986-20.736 1.219-31.462 3.773 4.382 22.912 18.627 41.805 57.251 50.918-17.642 1.163-26.767 5.182-35.036 13.841 8.043 15.923 27.656 34.709 62.931 30.82-39.225 16.935-15.998 48.234 15.93 43.565-54.444 56.244-140.294 52.123-189.596 5.08 128.712 175.385 408.493 103.724 450.21-65.225 31.23.261 49.605-10.823 60.994-23.05-17.99 3.053-44.072-.095-57.914-5.846z"/>
											</svg>
										</a>
										<style>
											#social-63f378ffdadc1 a {
											opacity: 1 !important;margin: 6px;color: #ffffff !important;}
											#social-63f378ffdadc1 a:hover { color: #ffffff !important;background-color: #bf5125 !important;}
											#social-63f378ffdadc1 a:hover .mk-svg-icon { fill: #ffffff !important;}
										</style>
									</div>
								</section>
								<section id="custom_html-2" class="widget_text widget widget_custom_html">
									<div class="textwidget custom-html-widget"></div>
								</section>
							</div>
							<div class="mk-col-1-3">
								<section id="text-3" class="widget widget_text">
									<div class="widgettitle">Contact</div>
									<div class="textwidget">
										<p class="address"><a href="https://goo.gl/maps/6L6fvEDuj53Znofo6">Bongerdstraat 1<br />1326 AA Almere</a></p>
										<p class="phone"><a href="tel:+31365332797">036-5332797</a></p>
									</div>
								</section>
							</div>
							<div class="clearboth"></div>
						</div>
					</div>
				</section>
			</div>
		</div>
        
	</body>
</html>