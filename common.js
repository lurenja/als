var fs = require('fs');

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
		default:
		returnError(response, pathname);
	}
}

function returnError(response, code, error){
	response.writeHead(code,{"Content-Type":"text/plain"});
	response.write(error+'\n');
	response.end();
}

exports.loadFile = loadFile;
exports.returnError = returnError;