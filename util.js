var fs = require('fs');
/* Load static file */
function loadFile(response, pathname) {
	var ext = pathname.match(/(\.[^.]+|)$/)[0];//取得后缀名
	switch(ext){
		case '.css':
		case '.js':
			fs.readFile('.'+pathname, 'utf-8', function(err, data) {
				if(err) returnError(response, pathname);
				response.writeHead(200, {
					"Content-Type": {
						".css":"text/css",
						".js":"application/javascript",
					}[ext]
				});
				response.write(data,'binary');
				response.end();
			});
		break;
		case '.woff':
		case '.woff2':
		case '.ttf':
			fs.readFile('.'+pathname, 'binary', function(err, data) {
				if(err) returnError(response, pathname);
				response.writeHead(200, {"Content-Type": "application/x-font-woff"});
				response.write(data,'binary');
				response.end();
			});
		break;
		case '.icon':
		    fs.readFile('.'+pathname, 'binary', function(err, data) {
		    	if(err) returnError(response, pathname);
		    	response.writeHead(200, {"Content-Type": "image/x-icon"});
		    	response.write(data, 'binary');
		    	response.end();
		    })
		default:
		returnError(response, pathname);
	}
}
/* Render error page */
function returnError(response, error){
	response.writeHead(404,{"Content-Type":"text/plain"});
	response.write(error+'\n');
	response.end();
}
exports.loadFile = loadFile;
exports.returnError = returnError;