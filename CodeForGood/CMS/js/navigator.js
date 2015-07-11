function toTitleCase(str) {
    return str.replace(/(?:^|\s)\w/g, function(match) {
        return match.toUpperCase();
    });
}

var template=function(opt){
		console.log(opt+'-button is clicked');
		opt=opt.toLowerCase();
		var ws=$('#workspace');
		ws.html('<img src="./images/loading.gif">');
		$.ajax({
				url : 'cms-images.php',
				type : 'post',
				data : {
					"page" : ""+opt
				},
				success : function(response) {
					//console.log(response);
					//setTimeout(function(){
					  	ws.html(response);
					//}, 1500);
					document.title="Enactus - Content Management | Admin | "+toTitleCase(opt);
				}
			});
		

	};

//Set default page
var defaultPage='gallery';



$(function(){
	//Load default page
	
	var urlLoc = window.location.href.split('#');

	if(urlLoc.length>1){
		defaultPage = urlLoc[1];
	}

	template(defaultPage);

	$('#gallery-button').click(function(){
		template('gallery');
	});

	$('#projects-button').click(function(){
		template('projects');
	});

	$('#bab-button').click(function(){
		template('bab');
	});
});