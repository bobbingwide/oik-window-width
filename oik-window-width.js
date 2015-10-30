/**    (C) Copyright 2012,2013 Bobbing Wide
 *
 * jQuery oik-window-width - debug tools for helping you to build responsive CSS
 * http://oik-plugins.com/
 *
 * 
 * The windowSize() function will display the current window size in a span of class oik-width
 * and some more information in the oik-mq-min and oik-mq-max spans
 *
 * <script type="text/javascript">
 * jQuery(document).ready(function() { jQuery( "body" ).windowSize(); });
 * </script>
 
 * Attempting to duplicate this in jQuery http://playground.johanbrook.com/css/mediaquerydebug.html
 * 
 */
(function($){
  $.fn.windowSize = function( options ) {
  var defaults = { text: 'width:'
      , dpr: ' dpr:'
		},
  settings = $.extend( defaults, options );
  oik_window_width_create();
  var el = $("span.oik-width");
  oik_window_width_resize();

  $(window).bind( 'resize', oik_window_width_resize );

  function oik_window_width_create() {
    $('body').prepend( '<span class="oik-width">oik-width</span><span class="oik-mq-min"></span><span class="oik-mq-max"></span>' );
  }

  function oik_window_width_resize() {
    var width = $(window).width();
    var dpr = window.devicePixelRatio;
    x = el.css( {  'display': 'inline', 'text-align': 'center', 'background': 'rgba(255,255,0, 0.7)' } );
    el.text( settings.text + width + settings.dpr + dpr );
    el.css( 'z-index', 100000 );
    el.css( 'position', 'absolute').css( 'top', 0 ).css( 'left', '50%' );
  }
};
})(jQuery);
