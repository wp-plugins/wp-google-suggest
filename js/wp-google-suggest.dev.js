jQuery.fn.googleSuggest = function(opts){
  var services = {youtube: 'yt', books: 'bo', products: 'pr', news: 'n', images: 'i'};
  
  opts = jQuery.extend({service: '', secure: false}, opts);
  opts.source = function(request, response){
    jQuery.ajax({
      url: 'http'+(opts.secure?'s':'')+'://clients1.google.com/complete/search',
      dataType: 'jsonp',
      data: {
        q: request.term,
        ds: opts.service in services ? services[opts.service] : '',
        nolabels: 't'
      },
      success: function( data ) {
        response(jQuery.map(data[1], function(item){
          return { value: item[0] }
        }));
      }
    });  
  };
  
  opts.select = function() {
	  jQuery(this).parents('form').submit();
  }
  
  return this.each(function(){
    jQuery(this).autocomplete(opts);
  });
}
jQuery(function($){
	$('#s').googleSuggest();
});