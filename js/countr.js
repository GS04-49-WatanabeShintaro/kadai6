/*!
 * jQuery Countr
 * ---------------------------------------------------------------------------------
 *
 * jQuery Countr
 *
 * Licensed under The MIT License
 *
 * @version 0.2.0
 * @since 22/10/2011
 * @author Daniel Faria Gomes
 * @twitter http://twitter.com/danielfariati
 * @license http://opensource.org/licenses/mit-license.php
 * @package jQuery Plugins
 *
 * Usage with default values:
 * ---------------------------------------------------------------------------------
 * $('#countr').countr();
 *
 * <span id="countr"/>
 *
 * $('#countr').countr({
 *	hours: 10,
 *	minutes: 10,
 *	seconds: 10,
 *	toOpacity: 0.5,
 *	colorAlert: true,
 *	alertStartAt: 60,
 *	fontAnimation : true,
 *	fontAnimationSize : '20px',
 *	fontAnimationStartAt : 5,
 *	callBack: function(me) {
 * 		$(me).text('Timeout!');
 * 	}
 * });
 *
 */

jQuery.fn.countr = function(settings, total) {
	settings = jQuery.extend({
		hours : 0,
		minutes : 0,
		seconds : 0,
		toOpacity: 1,
		colorAlert : false,
		alertStartAt : 10,
		fontSize : $(this).css('fontSize'),
		fontAnimation : false,
		fontAnimationSize : $(this).css('fontSize'),
		fontAnimationStartAt : settings.alertStartAt,
		callBack : function() {
		}
	}, settings);
	return this.each(
		function() {

		if(!total && total != 0){
			total = settings.seconds;
			total = total + 60 * settings.minutes;
			total = total + 60 * 60 * settings.hours;
		}

    	settings.hours = 0;
    	settings.minutes = 0;
    	settings.seconds = 0;
    	
    	aux = total;
    	
    	while(aux >= 3600){
    		settings.hours += 1;
    		aux -= 3600;
    	}
    	while(aux >= 60){
    		settings.minutes += 1;
    		aux -= 60;
    	}
		settings.seconds = aux;
		
		if (settings.minutes < 10) {
			settings.minutes = "0" + settings.minutes;
		}

		if (settings.seconds < 10) {
			settings.seconds = "0" + settings.seconds;
		}

		$(this).text(settings.hours + ':' + settings.minutes + ':' + settings.seconds).css('opacity', 1);
		
		if(total <= settings.alertStartAt && settings.colorAlert == true) {
			$(this).css('color', '#FF0000');
		}
		if(total <= settings.fontAnimationStartAt && settings.fontAnimation == true) {
			$(this).css('fontSize', settings.fontAnimationSize);
		}
		
		$(this).animate({opacity : settings.toOpacity, fontSize : settings.fontSize}, 1000,'',function() {
		      if(total > 1) {
		    	  $(this).countr(settings, total - 1);
		      }
		      else
		      {
	    	    $(this).text('0:00:00').css('opacity', 1);
		        settings.callBack(this);
		      }
		    });
	});
};
