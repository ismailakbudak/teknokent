
 

$(function(){
 
	$('[data-toggle="popover"]').popover();
	$('[data-toggle="tooltip"]').tooltip();
	
	// <span class="img-loader hide"></span> 
	$( ".btn" ).on('click',function(){
	       var id = $( this ).find(".img-loader");
	       id.removeClass("hide"); 
	});

	$( ".capitalize" ).on('keyup',function(){
	        var text = $( this ).val();
	        if(  strcmp(  text.charAt(0), " " ) == 0 )    
	            text = jQuery.trim( text );
	        $( this ).val( text.charAt(0).toUpperCase() + text.slice(1) );
	});
    
    function strcmp ( str1, str2 ) {
                str1 = jQuery.trim(str1); 
                str2 = jQuery.trim(str2);
                return ( ( str1 == str2 ) ? 0 : ( ( str1 > str2 ) ? 1 : -1 ) );
    }

/* kod kopyalama için
  var $button = $("<div id='source-button' class='btn btn-primary btn-xs'>&lt; &gt;</div>").click(function(){
    var html = $(this).parent().html();
    html = cleanSource(html);
    $("#source-modal pre").text(html);
    $("#source-modal").modal();
  });

  $(".bs-component").hover(function(){
    $(this).append($button);
    $button.show();
  }, function(){
    $button.hide();
  });

  function cleanSource(html) {
    var lines = html.split(/\n/);

    lines.shift();
    lines.splice(-1, 1);

    var indentSize = lines[0].length - lines[0].trim().length,
        re = new RegExp(" {" + indentSize + "}");

    lines = lines.map(function(line){
      if (line.match(re)) {
        line = line.substring(indentSize);
      }

      return line;
    });

    lines = lines.join("\n");

    return lines;
  }
*/
});

 