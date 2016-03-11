var fs = require('fs');
function route(handle, pathname, response, request, dbpool){
	console.log("About to route a request for "+ pathname);
	if(typeof handle[pathname]==='function'){
		handle[pathname](response, request, dbpool);
	}else{
		handle['load'](response, pathname);
	}
}
exports.route = route;