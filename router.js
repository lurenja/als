var fs = require('fs');
function route(handle, pathname, response, request, dbpool){
	if(typeof handle[pathname]==='function'){
	    console.log("Route request: "+ pathname);
		handle[pathname](response, request, dbpool);
	}else{
		handle['load'](response, pathname);
	}
}
exports.route = route;