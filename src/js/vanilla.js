// tarteaucitron 
	// Cookies 
	tarteaucitron.init({ 
		"hashtag": "#tarteaucitron",
		"highPrivacy": false,
		"orientation": "bottom", 
		"adblocker": false, 
		"showAlertSmall": false, 
		"cookieslist": true, 
		"removeCredit": false 
	});
	// Google Analytics 
	tarteaucitron.user.gtagUa = 'UA-116308965-1';
	(tarteaucitron.job = tarteaucitron.job || []).push('gtag');
	// Youtube 
	(tarteaucitron.job = tarteaucitron.job || []).push('youtube');
	// Viméo 
	(tarteaucitron.job = tarteaucitron.job || []).push('vimeo');
	// Dailymotion
	(tarteaucitron.job = tarteaucitron.job || []).push('dailymotion');
	
// Google translate
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'fr'}, 'google_translate_element');
}