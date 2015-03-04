$(document).on('ready', function() {
   amt = $('.load_script'); 
   if(amt.length > 0 ){
       
       for (var i = 0; i < amt.length; i++){
           GetScript(amt[i].getAttribute('data-url'),amt[i].getAttribute('data-cache'),amt[i].getAttribute('data-url-css'));
       }
       
   } 
});

function GetScript(url,cache,url_css) {
    
    if(url_css){
    
       $('head').append('<link href="'+url_css+'" type="text/css" rel="stylesheet" >');
        
    }
    if(url){
        $.ajax({
            type: "GET",
            url: url,
            dataType:"script",
            cache: cache 
        });
    }
    
}