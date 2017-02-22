var fs = require('fs');
/* Route with different path include function and static file */
function route(handle, pathname, response, request, dbpool){
	if(typeof handle[pathname]==='function'){
	  console.log("Route request: "+ pathname);
		handle[pathname](response, request, dbpool);
	}else{
		handle['load'](response, request, pathname);
	}
}
exports.route = route;