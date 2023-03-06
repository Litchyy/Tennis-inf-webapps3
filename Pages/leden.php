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
        $voornaam = mysqli_real_escape_string($mysql,$_GET["voornaam"]);
        $tussenvoegsel = mysqli_real_escape_string($mysql,$_GET["tussenvoegsel"]);
        $achternaam = mysqli_real_escape_string($mysql,$_GET["achternaam"]);
        $dbachternaam = "$tussenvoegsel $achternaam";
        $adres = mysqli_real_escape_string($mysql,$_GET["adres"]);
        $woonplaats = mysqli_real_escape_string($mysql,$_GET["woonplaats"]);
        $geslacht = mysqli_real_escape_string($mysql,$_GET["geslacht"]);
        $enkel = mysqli_real_escape_string($mysql,$_GET["enkel"]);
        $dubbel = mysqli_real_escape_string($mysql,$_GET["dubbel"]);
        $inschrijfdatum = date('Y/m/d h:i:s', time());
        $geboortetijd = date('h:i:s', time());
        $geboortejaar = mysqli_real_escape_string($mysql,$_GET["geboortejaar"]);
        $geboortedatum = "$geboortejaar $geboortetijd";
        $telefoonnr = mysqli_real_escape_string($mysql,$_GET["telefoonnr"]);
        $lidnr = mysqli_real_escape_string($mysql,$_GET["lidnr"]);
        $zoektype = $_GET["zoektype"];

        // Gegevens opvragen uit de database
        mysqli_close($mysql) or die("Het verbreken van de verbinding met de MySQL-server is mislukt!");
	}
	?>
<!DOCTYPE html>
<html>
	<head>
        <link rel="stylesheet" href="https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/Css/tel.css">

        <!-- favicon -->
        <link rel="shortcut icon" href="https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/afbeeldingen/TVA-logo.png"  />
        <!-- veranderd button naam afhankelijk van keuze -->
        <script>
            function changeButtonName() {
                var dropdown = document.getElementById("zoektype");
                var button = document.getElementById("verzend");
                button.innerHTML = dropdown.value;
            }
	    </script>

        <!-- dynamic required fields -->
        <script>
            function toggleFields() {
            var choice = document.getElementById("zoektype").value;
            var voornaam = document.getElementById("voornaam");
            var achternaam = document.getElementById("achternaam");
            var woonplaats = document.getElementById("woonplaats");
            var geslacht = document.getElementById("geslacht");
            var enkel = document.getElementById("enkel");
            var dubbel = document.getElementById("dubbel");
            var labelvoornaam = document.getElementById("labelvoornaam");
            var labelachternaam = document.getElementById("labelachternaam");
            var labelwoonplaats = document.getElementById("labelwoonplaats");
            var labelgeslacht = document.getElementById("labelgeslacht");
            var labelenkel = document.getElementById("labelenkel");
            var labeldubbel = document.getElementById("labeldubbel");
            if (choice === "Zoek!") {
                voornaam.required = true;
                achternaam.required = true;
                woonplaats.required = true;
                geslacht.required = true;
                enkel.required = true;
                dubbel.required = true;
                labelvoornaam.innerHTML = "Voornaam:<label style=color:red>*</label>";
                labelachternaam.innerHTML = "Achternaam:<label style=color:red>*</label>";
                labelwoonplaats.innerHTML = "Woonplaats:<label style=color:red>*</label>";
                labelgeslacht.innerHTML = "Selecteer uw Geslacht:<label style=color:red>*</label>";
                labelenkel.innerHTML = "Selecteer uw Enkel:<label style=color:red>*</label>";
                labeldubbel.innerHTML = "Selecteer uw Dubbel:<label style=color:red>*</label>";
            } else if (choice === "Aanpassen") {
                voornaam.required = false;
                achternaam.required = false;
                woonplaats.required = false;
                geslacht.required = false;
                enkel.required = false;
                dubbel.required = false;
                voornaam.innerHTML = "Voornaam:";
                achternaam.innerHTML = "Achternaam:";
                labelvoornaam.innerHTML = "Voornaam:";
                labelachternaam.innerHTML = "Achternaam:";
                labelwoonplaats.innerHTML = "Woonplaats:";
                labelgeslacht.innerHTML = "Selecteer uw Geslacht:";
                labelenkel.innerHTML = "Selecteer uw Enkel:";
                labeldubbel.innerHTML = "Selecteer uw Dubbel:";
            } else if (choice === "Verwijder") {
                voornaam.required = false;
                achternaam.required = false;
                woonplaats.required = false;
                geslacht.required = false;
                enkel.required = false;
                dubbel.required = false;
                voornaam.innerHTML = "Voornaam:";
                achternaam.innerHTML = "Achternaam:";
                labelvoornaam.innerHTML = "Voornaam:";
                labelachternaam.innerHTML = "Achternaam:";
                labelwoonplaats.innerHTML = "Woonplaats:";
                labelgeslacht.innerHTML = "Selecteer uw Geslacht:";
                labelenkel.innerHTML = "Selecteer uw Enkel:";
                labeldubbel.innerHTML = "Selecteer uw Dubbel:";
            }
            }
        </script>

        <!-- tel menu -->
		<script type='text/javascript' data-noptimize='' data-no-minify='' src='https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/js/webfontloader.js' id='mk-webfontloader-js'></script>
		<script type='text/javascript' src='https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/js/jqueryv3.6.1.min.js' id='jquery-core-js'></script>
		<script type='text/javascript' id='mk-webfontloader-js-after'>
			WebFontConfig = {
				timeout: 2000
			}
			
			if ( mk_typekit_id.length > 0 ) {
				WebFontConfig.typekit = {
					id: mk_typekit_id
				}
			}
			
			if ( mk_google_fonts.length > 0 ) {
				WebFontConfig.google = {
					families:  mk_google_fonts
				}
			}
			
			if ( (mk_google_fonts.length > 0 || mk_typekit_id.length > 0) && navigator.userAgent.indexOf("Speed Insights") == -1) {
				WebFont.load( WebFontConfig );
			}
					
		</script>
    	<script type="text/javascript">window.abb = {};php = {};window.PHP = {};PHP.ajax = "https://ltcwaterwijk.nl/wp-admin/admin-ajax.php";PHP.wp_p_id = "13534";var mk_header_parallax, mk_banner_parallax, mk_page_parallax, mk_footer_parallax, mk_body_parallax;var mk_images_dir = "https://ltcwaterwijk.nl/wp-content/themes/jupiter/assets/images",mk_theme_js_path = "https://ltcwaterwijk.nl/wp-content/themes/jupiter/assets/js",mk_theme_dir = "https://ltcwaterwijk.nl/wp-content/themes/jupiter",mk_captcha_placeholder = "Enter Captcha",mk_captcha_invalid_txt = "Invalid. Try again.",mk_captcha_correct_txt = "Captcha correct.",mk_responsive_nav_width = 1140,mk_vertical_header_back = "Back",mk_vertical_header_anim = "1",mk_check_rtl = true,mk_grid_width = 1140,mk_ajax_search_option = "fullscreen_search",mk_preloader_bg_color = "#d40e27",mk_accent_color = "#e57406",mk_go_to_top =  "true",mk_smooth_scroll =  "true",mk_show_background_video =  "true",mk_preloader_bar_color = "#e57406",mk_preloader_logo = "/Informatica/.Tennis PO/afbeeldingen/TVA-logo-zwart.png";var mk_header_parallax = false,mk_banner_parallax = false,mk_footer_parallax = false,mk_body_parallax = false,mk_no_more_posts = "No More Posts",mk_typekit_id   = "",mk_google_fonts = ["Open Sans:100italic,200italic,300italic,400italic,500italic,600italic,700italic,800italic,900italic,100,200,300,400,500,600,700,800,900"],mk_global_lazyload = true;</script>
		<!-- einde tel menu-->



		<link rel="stylesheet" href="//code.jquery.com/mobile/1.4.0/jquery.mobile-1.4.0.min.css" />			
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
		<title>Leden &#8211; TVA</title>
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
			.mk-header-bg { background:-webkit-linear-gradient(left,#4B91F1 0%, #4B91F1 100%);background:linear-gradient(to left,purple 0%, #4B91F1 100%) } 
			.mk-classic-nav-bg { background:-webkit-linear-gradient(left,#4B91F1 0%, #4B91F1 100%);background:linear-gradient(to left,purple 0%, #4B91F1 100%) } 
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
			.mk-event-countdown-ul[max-width~="750px"] li { width:90%; display:block; margin:0 auto 15px; } body { font-family: graphik,arial,helvetica,sans-serif; } 
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
			border: 2px solid #4b0082; /* button border width and color */
			color: #E47405;    /* text color */
			line-height: initial;  /* reset the line-height. Let padding control size */
			padding: 10px 20px;
			border-radius: 5px;
			font-size: 19px;  /* Optional. Remove to match to your other menu items */
			transition: all .25s;  /* animate the hover transition. Duration 0.25 seconds */
			}
			.menu-button a:hover {
			color: white; /* change the hover text color */
			background-color: #9932cc;  /* fill the background on hover */
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
										<a href="http://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/index.php" title="TVA">
											<img class="mk-desktop-logo dark-logo  lazyload"
												title="TVA"
												alt="TVA"
												src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/Informatica/.Tennis PO/afbeeldingen/TVA-logo-zwart.png" decoding="async" />
											<noscript><img class="mk-desktop-logo dark-logo "
												title="TVA"
												alt="TVA"
												src="/Informatica/.Tennis PO/afbeeldingen/TVA-logo-zwart.png" data-eio="l" /></noscript>
											<img class="mk-desktop-logo light-logo  lazyload"
												title="TVA"
												alt="TVA"
												src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/Informatica/.Tennis PO/afbeeldingen/TVA-logo-zwart.png" decoding="async" />
											<noscript><img class="mk-desktop-logo light-logo "
												title="TVA"
												alt="TVA"
												src="/Informatica/.Tennis PO/afbeeldingen/TVA-logo-zwart.png" data-eio="l" /></noscript>
											<img class="mk-sticky-logo  lazyload"
												title="TVA"
												alt="TVA"
												src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/Informatica/.Tennis PO/afbeeldingen/TVA-logo-zwart.png" decoding="async" />
											<noscript><img class="mk-sticky-logo "
												title="TVA"
												alt="TVA"
												src="/Informatica/.Tennis PO/afbeeldingen/TVA-logo-zwart.png" data-eio="l" /></noscript>
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
											<li id="menu-item-8713" class="menu-item menu-item-type-post_type menu-item-object-page no-mega-menu"><a class="menu-item-link js-smooth-scroll"  href="https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/Pages/boetes.php">Boetes</a></li>
											<li id="menu-item-14864" class="menu-button menu-item menu-item-type-post_type menu-item-object-page no-mega-menu"><a class="menu-item-link js-smooth-scroll"  href="https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/Pages/aangemeld.php">Lid worden?</a></li>
                                            <li id="menu-item-14864" class="menu-button menu-item"><a class="menu-item-link js-smooth-scroll"  href="<?php if(isset($_SESSION['email'])){echo"account.php";} else{ echo "https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/Pages/login.php";} ?>"><?php if(isset($_SESSION['email'])){echo"".$_SESSION['voornaam']."";} else{ echo "Inloggen";} ?></a></li>
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
										<li id="responsive-menu-item-8259" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home"><a class="menu-item-link js-smooth-scroll"  href="https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/index.php">Home</a></li>
										<li id="responsive-menu-item-8258" class="menu-item menu-item-type-post_type menu-item-object-page">
											<a class="menu-item-link js-smooth-scroll"  href="https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/Pages/leden.php">Leden</a>
										</li>
										<li id="responsive-menu-item-8255" class="menu-item menu-item-type-post_type menu-item-object-page"><a class="menu-item-link js-smooth-scroll"  href="https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/Pages/scores.php">Scores</a></li>
										<li id="responsive-menu-item-8713" class="menu-item menu-item-type-post_type menu-item-object-page"><a class="menu-item-link js-smooth-scroll"  href="https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/Pages/boetes.php">Boetes</a></li>
										<li id="responsive-menu-item-14864" class="menu-button menu-item menu-item-type-post_type menu-item-object-page"><a class="menu-item-link js-smooth-scroll"  href="https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/Pages/aangemeld.php">Lid worden?</a></li>
                                        <li id="menu-item-14864" class="menu-button menu-item"><a class="menu-item-link js-smooth-scroll"  href="<?php if(isset($_SESSION['email'])){echo"account.php";} else{ echo "https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/Pages/login.php";} ?>"><?php if(isset($_SESSION['email'])){echo"".$_SESSION['voornaam']."";} else{ echo "Inloggen";} ?></a></li>
                                    </ul>
								</nav>
							</div>
						</div>
					</div>
					<div class="mk-header-padding-wrapper"></div>
					<section id="mk-page-introduce" class="intro-left">
						<div class="mk-grid">
							<h1 class="page-title" style=text-align:center>Leden</h1>
							<div id="mk-breadcrumbs">
								<div class="mk-breadcrumbs-inner"><span xmlns:v="http://rdf.data-vocabulary.org/#"><span typeof="v:Breadcrumb"><a href="https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/index.php" rel="v:url" property="v:title">Home</a> &#47; <span rel="v:child" typeof="v:Breadcrumb">Leden</span></span></span></div>
							</div>
							<div class="clearboth"></div>
						</div>
					</section>
				</header>





                <!-- body input -->
				<div id="pag1" data-role="page" data-theme="b">
					<div data-role="header">
						<h1 style="margin-left:20.6%;margin-right:20.6%">Leden zoeken / aanpassen / verwijderen</h1>
                        <p style="margin-left:20.6%;margin-right:20.6%">Hier kunt u leden zoeken, aanpassen of verwijderen in de database. Als u niet weet wat u moet invullen bij <strong>zoeken</strong> vult u een punt (.) in.</p>
					</div>
					<div role="main" class="ui-content">
                    <div role="main" class="ui-content">
						<form action="leden.php" method="get" style="font-size:20px">
								<label for="zoektype" style="margin-left:20%;padding-right:40%">Ik wil leden:</label>
								<br>
								<select name="zoektype" id="zoektype" data-native-menu="false" data-mini="true" style="margin-left:20%;width: 56.2%" onchange="changeButtonName(); toggleFields()" required>
                                    <option value="">Kies uw actie!</option>
									<option value="Zoek!">Zoeken</option>
									<option value="Aanpassen">Aanpassen</option>
									<option value="Verwijder">Verwijderen</option>
								</select>
                            <br><br>
                            <label for="lidnr" style="margin-left:20%;padding-right:50%">Lidnr:<label style=color:red>*</label></label>
                            <br>
                            <input name="lidnr" id="lidnr" type="text" placeholder="Lidnr" value="" data-mini="true" style="margin-left:20%;width: 56.2%" required>
                            <br><br>
							<label id="labelvoornaam" for="voornaam" style="margin-left:20%;padding-right:50%">Voornaam:</label>
                            <br>
                            <input name="voornaam" id="voornaam" type="text" placeholder="Voornaam" value="" data-mini="true" style="margin-left:20%;width: 56.2%" required>
                            <br><br>
                            <label for="tussenvoegsel" style="margin-left:20%;padding-right:50%">Tussenvoegsel:</label>
                            <br>
                            <input name="tussenvoegsel" id="tussenvoegsel" type="text" placeholder="Tussenvoegsel" value="" data-mini="true" style="margin-left:20%;width: 56.2%">
                            <br><br>
                            <label id="labelachternaam" for="achternaam" style="margin-left:20%;padding-right:50%">Achternaam:</label>
                            <br>
							<input name="achternaam" id="achternaam" type="text" placeholder="Achternaam" value="" data-mini="true" style=";margin-left:20%;width: 56.2%"> 
                            <br><br>
                            <label for="geboortejaar" style="margin-left:20%;padding-right:50%">Geboortejaar:</label>
							<br>
							<input name="geboortejaar" id="geboortejaar" type="date" value="" data-highlight="true" data-mini="true" style="margin-left:20%;width: 56.2%;border:0;">
                            <br><br>
							<label id="labelwoonplaats" for="woonplaats" style="margin-left:20%;padding-right:50%">Woonplaats:</label>
							<br>
							<input name="woonplaats" id="woonplaats" type="text" placeholder="Woonplaats" value="" data-mini="true" style="margin-left:20%;width: 56.2%">
                            <br><br>
							<div data-type="horizontal" data-mini="true" style="margin-left:20%;width: 56%">
								<label id="labelgeslacht" for="geslacht">Selecteer uw Geslacht:</label>
								<br>
								<select name="geslacht" id="geslacht" data-native-menu="false" data-mini="true">
                                    <option value="">Geslacht</option>
									<option value="M">M</option>
									<option value="V">V</option>
									<option value="Anders">Anders</option>
								</select>
							</div>
                            <br>
							<div data-type="horizontal" data-mini="true" style="margin-left:20%;width: 56%">
								<label id="labelenkel" for="enkel">Selecteer uw Enkel:</label>
								<br>
								<select name="enkel" id="enkel" data-native-menu="false" data-mini="true"> 
                                    <option value="">Enkel</option>
									<option value="A1">A1</option>
									<option value="A2">A2</option>
									<option value="A3">A3</option>
									<option value="B1">B1</option>
									<option value="B2">B2</option>
									<option value="B3">B3</option>
									<option value="C1">C1</option>
									<option value="C2">C2</option>
									<option value="C3">C3</option>
									<option value="D1">D1</option>
									<option value="D2">D2</option>
									<option value="D3">D3</option>
									<option value="E">E</option>
								</select>
							</div>
                            <br>
							<div style="margin-left:20%;width: 56%" data-type="horizontal" data-mini="true">
								<label id="labeldubbel" for="dubbel">Selecteer uw Dubbel:</label>
								<br>
								<select name="dubbel" id="dubbel" data-native-menu="false" data-mini="true">
                                    <option value="">Dubbel</option>
									<option value="A1">A1</option>
									<option value="A2">A2</option>
									<option value="A3">A3</option>
									<option value="B1">B1</option>
									<option value="B2">B2</option>
									<option value="B3">B3</option>
									<option value="C1">C1</option>
									<option value="C2">C2</option>
									<option value="C3">C3</option>
									<option value="D1">D1</option>
									<option value="D2">D2</option>
									<option value="D3">D3</option>
									<option value="E">E</option>
								</select>
							</div>
							<br>
							<label class="ui-hidden-accessible" for="verzend" style="margin-left:20%;width: 56%">Verzend:</label>
							<button class="ui-shadow ui-btn ui-corner-all ui-mini" id="verzend" type="submit" name="verzend" style="margin-left:20%;width: 56.2%">Maak uw keuze bovenaan</button>
						</form>
						<div class="ui-body ui-corner-all" style="margin-left:19.5%;width:56%;font-size:20px;">
							<?php
								// Hier wordt gecontroleerd of er op de zoek-knop is geklikt
								
								if(isset($_GET["verzend"]))
								{   
                                    $mysql = mysqli_connect($server,$user,$pass,$db) or die("Fout: Er is geen verbinding met de MySQL-server tot stand gebracht!");
                                    $zoektype = $_GET["zoektype"];
                                    if ($zoektype == 'Zoek!')
                                    {
                                        if ($tussenvoegsel == "")
                                        {
                                            $dbachternaam = "$achternaam";
                                        } else {
                                            $dbachternaam = "$tussenvoegsel $achternaam";
                                        }
                                        
                                        $zoeken = mysqli_query($mysql,"SELECT * FROM `leden` WHERE  voornaam = '$voornaam' and naam = '$dbachternaam' and geslacht = '$geslacht' and lidnr = $lidnr and woonplaats = '$woonplaats' and enkel = '$enkel' and dubbel = '$dubbel'") or die("De selectquery op de database is mislukt!");
                                        $boetes = mysqli_query($mysql,"SELECT l.*, s.gewonnen, s.verloren, b.boetenr, b.datum, b.bedrag FROM leden l LEFT JOIN scores s ON l.lidnr = s.lidnr LEFT JOIN boetes b ON l.lidnr = b.lidnr where l.lidnr = '$lidnr'") or die("De selectquery op de database is mislukt!");

                                        
                                        $rows_get = mysqli_num_rows($zoeken);
                                        if ($rows_get >0)
                                        {   
                                            // zoeken
                                            echo"<br><strong style=font-size:27px;>Zoekresultaten:<br><br></strong>";
                                            while(list($lidnr, $voornaam, $dbachternaam, $adres, $woonplaats, $telefoonnr, $geslacht, $geboortedatum, $inschrijfdatum, $enkel, $dubbel, $gewonnen, $verloren, $boetenr, $boetedatum, $boetebedrag) = mysqli_fetch_row($boetes))
                                            {
                                                // echo geboortedatum d/m/Y format php
                                                $geboortedatumm = trim($geboortedatum, "00:00:00");
                                                $geboortedatumm = date('d/m/Y', strtotime($geboortedatumm));
                                                // echo boetedatum d/m/Y format php
                                                if ($boetedatum !== null) {
                                                    $boetedatum = trim($boetedatum, "00:00:00");
                                                    $boetedatum = date('d/m/Y', strtotime($boetedatum));
                                                    $boetebedrag = "€" . $boetebedrag;
                                                }
                                                //age calc
                                                $str = $geboortedatum;
                                                $geboortedatum = trim($str, "00:00:00");
                                                $geboortedatum = date('m/d/Y', strtotime($geboortedatum));
                                                $de = date('m/d/Y', strtotime($geboortedatum));
                                                //date in mm/dd/yyyy format; or it can be in other formats as well
                                                $birthDate = "$de";
                                                //explode the date to get month, day and year
                                                $birthDate = explode("/", $birthDate);
                                                //get age from date or birthdate
                                                $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
                                                    ? ((date("Y") - $birthDate[2]) - 1)
                                                    : (date("Y") - $birthDate[2]));

                                                $naam = "$voornaam $dbachternaam";
                                                echo"<strong>Lidnr:</strong> $lidnr <br><strong>Naam:</strong> $naam <br><strong>Voornaam:</strong> $voornaam <br> <strong>Achternaam:</strong> $dbachternaam <br> <strong>Geboortedatum:</strong> $geboortedatumm<br> 
                                                <strong>Leeftijd:</strong> $age jaar<br><strong>Adres:</strong> $adres <br><strong>Woonplaats:</strong> $woonplaats<br><strong>Telefoonnummer:</strong> $telefoonnr<br><strong>Geslacht:</strong> $geslacht<br> 
                                                <strong>Enkel:</strong> $enkel<br> <strong>Dubbel:</strong> $dubbel<br><br><br><div style='font-size: 26px;'><span class='tel-font'><strong>Wedstrijdstatistieken:</strong></span></div><br>
                                                <strong>Gewonnen:</strong> " . ($gewonnen ? $gewonnen : "N/A") . "<br> <strong>Verloren:</strong> " . ($verloren ? $verloren : "N/A") . " <br><br><br><label style='font-size:26px'><strong>Boetes:</strong></label><br>
                                                <strong>Boetenr:</strong> " . ($boetenr ? $boetenr : "N/A") . "<br> 
                                                <strong>Boetedatum:</strong> " . ($boetedatum ? $boetedatum : "N/A") . "<br>
                                                <strong>Boetebedrag:</strong> " . ($boetebedrag ? $boetebedrag : "N/A") . "<br>";
                                                echo"▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬<br>";
                                            }
                                        }
                                        else {
                                            
                                            // mogelijke zoekresultaten
                                            echo"<br><strong style=font-size:27px;>Er is een fout opgetreden:<br><br></strong>";
                                            echo "De zoekquery heeft geen resultaten opgeleverd. Controleer de zoekcriteria en probeer het opnieuw.<br><br><br>";
                                            $mogelijk = mysqli_query($mysql,"SELECT * FROM `leden` WHERE  lidnr = $lidnr or voornaam = '$voornaam' or naam = '$dbachternaam'") or die("De selectquery op de database is mislukt!");
                                            $boetes = mysqli_query($mysql,"SELECT l.*, s.gewonnen, s.verloren, b.boetenr, b.datum, b.bedrag FROM leden l LEFT JOIN scores s ON l.lidnr = s.lidnr LEFT JOIN boetes b ON l.lidnr = b.lidnr where l.lidnr = '$lidnr' or l.voornaam = '$voornaam' or l.naam = '$dbachternaam'") or die("De selectquery op de database is mislukt!");
                                            $rows_get = mysqli_num_rows($boetes);
                                            if ($rows_get >0)
                                            {
                                                echo"Misschien zocht u voor:<br><br>";
                                                while(list($lidnr, $voornaam, $dbachternaam, $adres, $woonplaats, $telefoonnr, $geslacht, $geboortedatum, $inschrijfdatum, $enkel, $dubbel, $gewonnen, $verloren, $boetenr, $boetedatum, $boetebedrag) = mysqli_fetch_row($boetes))
                                                {
                                                    // echo geboortedatum d/m/Y format php
                                                    $geboortedatumm = trim($geboortedatum, "00:00:00");
                                                    $geboortedatumm = date('d/m/Y', strtotime($geboortedatumm));
                                                    // echo boetedatum d/m/Y format php
                                                    if ($boetedatum !== null) {
                                                        $boetedatum = trim($boetedatum, "00:00:00");
                                                        $boetedatum = date('d/m/Y', strtotime($boetedatum));
                                                        $boetebedrag = "€" . $boetebedrag;
                                                    }
                                                    //age calc
                                                    $str = $geboortedatum;
                                                    $geboortedatum = trim($str, "00:00:00");
                                                    $geboortedatum = date('m/d/Y', strtotime($geboortedatum));
                                                    $de = date('m/d/Y', strtotime($geboortedatum));
                                                    //date in mm/dd/yyyy format; or it can be in other formats as well
                                                    $birthDate = "$de";
                                                    //explode the date to get month, day and year
                                                    $birthDate = explode("/", $birthDate);
                                                    //get age from date or birthdate
                                                    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
                                                        ? ((date("Y") - $birthDate[2]) - 1)
                                                        : (date("Y") - $birthDate[2]));

                                                    $naam = "$voornaam $dbachternaam";
                                                    echo"<strong>Lidnr:</strong> $lidnr <br><strong>Naam:</strong> $naam <br><strong>Voornaam:</strong> $voornaam <br> <strong>Achternaam:</strong> $dbachternaam <br> <strong>Geboortedatum:</strong> $geboortedatumm<br> 
                                                    <strong>Leeftijd:</strong> $age jaar<br><strong>Adres:</strong> $adres <br><strong>Woonplaats:</strong> $woonplaats<br><strong>Telefoonnummer:</strong> $telefoonnr<br><strong>Geslacht:</strong> $geslacht<br> 
                                                    <strong>Enkel:</strong> $enkel<br> <strong>Dubbel:</strong> $dubbel<br><br><br><div style='font-size: 26px;'><span class='tel-font'><strong>Wedstrijdstatistieken:</strong></span></div><br>
                                                    <strong>Gewonnen:</strong> " . ($gewonnen ? $gewonnen : "N/A") . "<br> <strong>Verloren:</strong> " . ($verloren ? $verloren : "N/A") . "<br><br><br> <label style='font-size:26px'><strong>Boetes:</strong></label><br>
                                                    <strong>Boetenr:</strong> " . ($boetenr ? $boetenr : "N/A") . "<br> 
                                                    <strong>Boetedatum:</strong> " . ($boetedatum ? $boetedatum : "N/A") . "<br>
                                                    <strong>Boetebedrag:</strong> " . ($boetebedrag ? $boetebedrag : "N/A") . "<br>";
                                                    echo"▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬<br>";
                                                }
                                            } else {

                                            }
                                            
                                        }
                                    }

                                    //aanpassen
                                    else if ($zoektype == 'Aanpassen')
                                    {
                                        $id = $_GET['lidnr'];
                                        $voornaam = $_GET['voornaam'];
                                        $tussenvoegsel = $_GET['tussenvoegsel'];
                                        $achternaam = $_GET['achternaam'];
                                        $geboortejaar = $_GET['geboortejaar'];
                                        $woonplaats = $_GET['woonplaats'];
                                        $geslacht = $_GET['geslacht'];
                                        $enkel = $_GET['enkel'];
                                        $dubbel = $_GET['dubbel'];

                                        // Build the SQL query to delete the entry
                                        $sql = "UPDATE leden SET 
                                        voornaam = IF('$voornaam'='', voornaam, '$voornaam'),
                                        naam = IF('$achternaam'='', naam, '$tussenvoegsel $achternaam'),
                                        geboortedatum = IF('$geboortejaar'='', geboortedatum, '$geboortejaar'),
                                        woonplaats = IF('$woonplaats'='', woonplaats, '$woonplaats'),
                                        geslacht = IF('$geslacht'='', geslacht, '$geslacht'),
                                        enkel = IF('$enkel'='', enkel, '$enkel'),
                                        dubbel = IF('$dubbel'='', dubbel, '$dubbel')
                                        WHERE lidnr = '$id'";
                                
                                        $zoeken = mysqli_query($mysql,"SELECT * FROM `leden` WHERE  lidnr = $id") or die("<strong style=font-size:27px;>Er is een fout opgetreden:<br><br></strong>De updatequery is mislukt. Controleer de ingevulde gegevens en probeer het opnieuw.");
                                        
                                        $zoekurl = "https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/Pages/leden.php?zoektype=Zoek!&lidnr=$id&verzend=";
        
                                        //exec updatequery
                                        if (mysqli_query($mysql, $sql)) {
                                            // Check if any rows were affected
                                            if (mysqli_affected_rows($mysql) > 0) {

                                                //oude data
                                                while(list($lidnr, $voornaam, $dbachternaam, $adres, $woonplaats, $telefoonnr, $geslacht, $geboortedatum, $inschrijfdatum, $enkel, $dubbel) = mysqli_fetch_row($zoeken))
                                                {
                                                    $strr = $geboortedatum;
                                                    $geboortedatumm = trim($strr, "00:00:00");
                                                    $geboortedatumm = date('d/m/Y', strtotime($geboortedatumm));
                                                    //age calc
                                                    $str = $geboortedatum;
                                                    $geboortedatum = trim($str, "00:00:00");
                                                    $geboortedatum = date('m/d/Y', strtotime($geboortedatum));
                                                    $de = date('m/d/Y', strtotime($geboortedatum));
                                                    //date in mm/dd/yyyy format; or it can be in other formats as well
                                                    $birthDate = "$de";
                                                    //explode the date to get month, day and year
                                                    $birthDate = explode("/", $birthDate);
                                                    //get age from date or birthdate
                                                    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
                                                        ? ((date("Y") - $birthDate[2]) - 1)
                                                        : (date("Y") - $birthDate[2]));
        
                                                    $naam = "$voornaam $dbachternaam";
        
                                                    if ($age < "10")
                                                    {
                                                        $oudecontributie = "60";
                                                    }
                                                    else if ($age >= "10" and $age <= "15")
                                                    {
                                                        $oudecontributie = "90";
                                                    }
                                                    else if ($age >= "16" and $age <= "20")
                                                    {
                                                        $oudecontributie = "100";
                                                    }
                                                    else if ($age >= "21" and $age <= "25")
                                                    {
                                                        $oudecontributie = "130";
                                                    }
                                                    else if ($age >= "26" and $age <= "30")
                                                    {
                                                        $oudecontributie = "140";
                                                    }
                                                    else if ($age > "30")
                                                    {
                                                        $oudecontributie = "150";
                                                    }
        
                                                    echo "<strong style=font-size:27px;><a href='$zoekurl'>De persoon met Lidnr $id is succesvol aangepast. <br><br>Dit zijn de oude gegevens:</a><br><br></strong>";
                                                    echo"<strong>Lidnr:</strong> $lidnr <br><strong>Naam:</strong> $naam <br><strong>Voornaam:</strong> $voornaam <br> <strong>Achternaam:</strong> $dbachternaam <br> <strong>Geboortedatum:</strong> $geboortedatumm<br> 
                                                    <strong>Leeftijd:</strong> $age jaar<br><strong>Adres:</strong> $adres <br><strong>Woonplaats:</strong> $woonplaats<br><strong>Telefoonnummer:</strong> $telefoonnr<br><strong>Geslacht:</strong> $geslacht<br> 
                                                    <strong>Enkel:</strong> $enkel<br> <strong>Dubbel:</strong> $dubbel<br><br><strong>Uw oude contributie per seizoen:</strong> €$oudecontributie<br>";
                                                    echo"▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬<br><br>";
                                                }


                                                //nieuwe data
                                                $zoeken = mysqli_query($mysql,"SELECT * FROM `leden` WHERE  lidnr = $id") or die("<strong style=font-size:27px;>Er is een fout opgetreden:<br><br></strong>De updatequery is mislukt. Controleer de ingevulde gegevens en probeer het opnieuw.");        
                                                while(list($lidnr, $voornaam, $dbachternaam, $adres, $woonplaats, $telefoonnr, $geslacht, $geboortedatum, $inschrijfdatum, $enkel, $dubbel) = mysqli_fetch_row($zoeken))
                                                {
                                                    $strr = $geboortedatum;
                                                    $geboortedatumm = trim($strr, "00:00:00");
                                                    $geboortedatumm = date('d/m/Y', strtotime($geboortedatumm));
                                                    //age calc
                                                    $str = $geboortedatum;
                                                    $geboortedatum = trim($str, "00:00:00");
                                                    $geboortedatum = date('m/d/Y', strtotime($geboortedatum));
                                                    $de = date('m/d/Y', strtotime($geboortedatum));
                                                    //date in mm/dd/yyyy format; or it can be in other formats as well
                                                    $birthDate = "$de";
                                                    //explode the date to get month, day and year
                                                    $birthDate = explode("/", $birthDate);
                                                    //get age from date or birthdate
                                                    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
                                                        ? ((date("Y") - $birthDate[2]) - 1)
                                                        : (date("Y") - $birthDate[2]));

                                                    $naam = "$voornaam $dbachternaam";

                                                    if ($age < "10")
                                                    {
                                                        $nieuwecontributie = "60";
                                                    }
                                                    else if ($age >= "10" and $age <= "15")
                                                    {
                                                        $nieuwecontributie = "90";
                                                    }
                                                    else if ($age >= "16" and $age <= "20")
                                                    {
                                                        $nieuwecontributie = "100";
                                                    }
                                                    else if ($age >= "21" and $age <= "25")
                                                    {
                                                        $nieuwecontributie = "130";
                                                    }
                                                    else if ($age >= "26" and $age <= "30")
                                                    {
                                                        $nieuwecontributie = "140";
                                                    }
                                                    else if ($age > "30")
                                                    {
                                                        $nieuwecontributie = "150";
                                                    }
                                                    $verschilcontributie = $nieuwecontributie - $oudecontributie;
                                                    if ($verschilcontributie >= 0)
                                                    {
                                                        $meerofminder = "meer";
                                                    }
                                                    else {
                                                        $meerofminder = "minder";
                                                        $verschilcontributie = $verschilcontributie * -1;
                                                    }
                                                    echo "<strong style=font-size:27px;><a href='$zoekurl'>Dit zijn de nieuwe gegevens:</a><br><br></strong>";
                                                    echo"<strong>Lidnr:</strong> $lidnr <br><strong>Naam:</strong> $naam <br><strong>Voornaam:</strong> $voornaam <br> <strong>Achternaam:</strong> $dbachternaam <br> <strong>Geboortedatum:</strong> $geboortedatumm<br> 
                                                    <strong>Leeftijd:</strong> $age jaar<br><strong>Adres:</strong> $adres <br><strong>Woonplaats:</strong> $woonplaats<br><strong>Telefoonnummer:</strong> $telefoonnr<br><strong>Geslacht:</strong> $geslacht<br> 
                                                    <strong>Enkel:</strong> $enkel<br> <strong>Dubbel:</strong> $dubbel<br><br><strong>Uw nieuwe contributie per seizoen:</strong> €$nieuwecontributie (€$verschilcontributie $meerofminder)<br>";
                                                    echo"▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬<br>";
                                                }        
                                            } else {
                                                echo"<br><strong style=font-size:27px;>Er is een fout opgetreden:<br><br></strong>";
                                                
                                                echo "De persoon met lidnr: $id is niet gevonden. Controleer het lidnr en probeer het opnieuw. Zorg ervoor dat minstens 2 velden zijn ingevuld.";
                                            }
                                        } else {
                                            echo "Error updating entry: " . mysqli_error($mysql);
                                        }
                                    }

                                    // verwijderen
                                    else if ($zoektype == 'Verwijder')
                                    {
                                        $id = $_GET['lidnr'];
                                        $zoekurl = "https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/Pages/leden.php?zoektype=Zoek!&lidnr=$id&verzend=";

                                        // Build the SQL query to delete the entry
                                        $sql = "DELETE FROM leden WHERE lidnr = $id";
                                        $zoeken = mysqli_query($mysql,"SELECT * FROM `leden` WHERE  lidnr = $id") or die("<strong style=font-size:27px;>Er is een fout opgetreden:<br><br></strong>De deletequery is mislukt. Controleer de ingevulde gegevens en probeer het opnieuw.");

                    
                                        if (mysqli_query($mysql, $sql)) {
                                            // Check if any rows were affected
                                            if (mysqli_affected_rows($mysql) > 0) {
                                                echo "<strong style=font-size:27px;><a href='$zoekurl'>De persoon met Lidnr $id is succesvol verwijderd. Dit zijn de gegevens van de verwijderde persoon:</a><br><br></strong>";
                                            } else {
                                                echo"<br><strong style=font-size:27px;>Er is een fout opgetreden:<br><br></strong>";
                                                echo "De persoon met lidnr: $id is niet gevonden. Controleer het lidnr en probeer het opnieuw.";
                                            }
                                        } else {
                                            echo "Error deleting entry: " . mysqli_error($mysql);
                                        }
                                        
                                        
                                        while(list($lidnr, $voornaam, $dbachternaam, $adres, $woonplaats, $telefoonnr, $geslacht, $geboortedatum, $inschrijfdatum, $enkel, $dubbel) = mysqli_fetch_row($zoeken))
                                        {
                                            $strr = $geboortedatum;
                                            $geboortedatumm = trim($strr, "00:00:00");
                                            $geboortedatumm = date('d/m/Y', strtotime($geboortedatumm));
                                            //age calc
                                            $str = $geboortedatum;
                                            $geboortedatum = trim($str, "00:00:00");
                                            $geboortedatum = date('m/d/Y', strtotime($geboortedatum));
                                            $de = date('m/d/Y', strtotime($geboortedatum));
                                            //date in mm/dd/yyyy format; or it can be in other formats as well
                                            $birthDate = "$de";
                                            //explode the date to get month, day and year
                                            $birthDate = explode("/", $birthDate);
                                            //get age from date or birthdate
                                            $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
                                                ? ((date("Y") - $birthDate[2]) - 1)
                                                : (date("Y") - $birthDate[2]));

                                            $naam = "$voornaam $dbachternaam";

                                            echo"<strong>Lidnr:</strong> $lidnr <br><strong>Naam:</strong> $naam <br><strong>Voornaam:</strong> $voornaam <br> <strong>Achternaam:</strong> $dbachternaam <br> <strong>Geboortedatum:</strong> $geboortedatumm<br> 
                                            <strong>Leeftijd:</strong> $age jaar<br><strong>Adres:</strong> $adres <br><strong>Woonplaats:</strong> $woonplaats<br><strong>Telefoonnummer:</strong> $telefoonnr<br><strong>Geslacht:</strong> $geslacht<br> 
                                            <strong>Enkel:</strong> $enkel<br> <strong>Dubbel:</strong> $dubbel<br>";
                                            echo"▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬<br>";
                                        }        
                                    }
                                    mysqli_close($mysql) or die("Het verbreken van de verbinding met de MySQL-server is mislukt!");
								}
                                else {
                                    echo"<h3><strong style=font-size:27px;>Dit zijn alle leden:<br><br></strong></h3>";
                                    $mysql = mysqli_connect($server,$user,$pass,$db) or die("Fout: Er is geen verbinding met de MySQL-server tot stand gebracht!");
            
                                    // Get the current page number from the query string
                                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
            
                                    // Calculate the offset for the SQL query
                                    $offset = ($page - 1) * 5;
            
                                    // Loop through the results and display them
                                    $scores = mysqli_query($mysql,"SELECT l.*, s.gewonnen, s.verloren, b.boetenr, b.datum, b.bedrag FROM leden l LEFT JOIN scores s ON l.lidnr = s.lidnr LEFT JOIN boetes b ON l.lidnr = b.lidnr order by lidnr asc LIMIT 5 OFFSET $offset") or die("De selectquery op de database is mislukt!");
                                    $first = true;
                                    while(list($lidnr, $voornaam, $dbachternaam, $adres, $woonplaats, $telefoonnr, $geslacht, $geboortedatum, $inschrijfdatum, $enkel, $dubbel, $gewonnen, $verloren, $boetenr, $boetedatum, $boetebedrag) = mysqli_fetch_row($scores))
                                    {
                                        // echo geboortedatum d/m/Y format php
                                        $geboortedatumm = trim($geboortedatum, "00:00:00");
                                        $geboortedatumm = date('d/m/Y', strtotime($geboortedatumm));
                                        // echo boetedatum d/m/Y format php
                                        if ($boetedatum !== null) {
                                            $boetedatum = trim($boetedatum, "00:00:00");
                                            $boetedatum = date('d/m/Y', strtotime($boetedatum));
                                            $boetebedrag = "€" . $boetebedrag;
                                        }
                                        //age calc
                                        $geboortedatum = trim($geboortedatum, "00:00:00");
                                        $geboortedatum = date('m/d/Y', strtotime($geboortedatum));
                                        $de = date('m/d/Y', strtotime($geboortedatum));
                                        //date in mm/dd/yyyy format; or it can be in other formats as well
                                        $birthDate = "$de";
                                        //explode the date to get month, day and year
                                        $birthDate = explode("/", $birthDate);
                                        //get age from date or birthdate
                                        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
                                            ? ((date("Y") - $birthDate[2]) - 1)
                                            : (date("Y") - $birthDate[2]));

                                        $naam = "$voornaam $dbachternaam";
                                        echo"<strong>Lidnr:</strong> $lidnr <br><strong>Naam:</strong> $naam <br><strong>Voornaam:</strong> $voornaam <br> <strong>Achternaam:</strong> $dbachternaam <br> <strong>Geboortedatum:</strong> $geboortedatumm<br> 
                                        <strong>Leeftijd:</strong> $age jaar<br><strong>Adres:</strong> $adres <br><strong>Woonplaats:</strong> $woonplaats<br><strong>Telefoonnummer:</strong> $telefoonnr<br><strong>Geslacht:</strong> $geslacht<br> 
                                        <strong>Enkel:</strong> $enkel<br> <strong>Dubbel:</strong> $dubbel<br><br><br><div style='font-size: 26px;'><span class='tel-font'><strong>Wedstrijdstatistieken:</strong></span></div><br>
                                        <strong>Gewonnen:</strong> " . ($gewonnen ? $gewonnen : "N/A") . "<br> <strong>Verloren:</strong> " . ($verloren ? $verloren : "N/A") . "<br><br><br><label style='font-size:26px'><strong>Boetes:</strong></label><br><strong>Boetenr:</strong> " . ($boetenr ? $boetenr : "N/A") . "<br> 
                                        <strong>Boetedatum:</strong> " . ($boetedatum ? $boetedatum : "N/A") . "<br>
                                        <strong>Boetebedrag:</strong> " . ($boetebedrag ? $boetebedrag : "N/A") . "<br>";
                                        echo"▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬<br>";                                       
                                    }
                                    
                                    // Display links to the previous and next pages
                                    echo "<div>";
                                    if ($page > 1) {
                                        echo "<br><a href='leden.php?page=" . ($page - 1) . "'>Previous</a>";
                                    }
                                    if (mysqli_num_rows($scores) == 5) {
                                        echo "<a href='leden.php?page=" . ($page + 1) . "' style='margin-left:65px'>Next</a>";
                                    }
                                    echo "</div><br>";
                                    mysqli_close($mysql) or die("Het verbreken van de verbinding met de MySQL-server is mislukt!");
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
											<img class="alignnone size-medium wp-image-8260 lazyload" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAADtAQMAAAA/cNqTAAAABlBMVEUAAAD///+l2Z/dAAAAAXRSTlMAQObYZgAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAB9JREFUaN7twQENAAAAwqD3T20PBxQAAAAAAAAAAHBoJBsAAVxmHVQAAAAASUVORK5CYII=" alt="" width="300" height="237" data-src="http://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/afbeeldingen/TVA-logo.png" decoding="async" />
											<noscript><img class="alignnone size-medium wp-image-8260" src="http://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/afbeeldingen/TVA-logo.png" alt="" width="600" height="237" data-eio="l" /></noscript>
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
											#social-63f378ffdadc1 a:hover { color: #ffffff !important;background-color: #4B91F1 !important;}
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
        <!-- tel menu -->
        <script type='text/javascript' src='https://v21dkoeve.helenparkhurst.net/Informatica/.Tennis%20PO/js/telmenucore.6.10.2.js' id='core-scripts-js'></script>
        <!-- einde tel menu -->
	</body>
</html>