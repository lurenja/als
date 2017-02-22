var fs = require('fs');
var path = require('path');
var mime = require('./mime').types;
var expires = require('./expires');
/* Load static file */
function loadFile(response, request, pathname) {
	// var ext = pathname.match(/(\.[^.]+|)$/)[0];//取得后缀名
	var localPath = '.'+pathname;
	fs.exists(localPath, function(exists){
		if(!exists){ // If file not exists
			returnError(response, 404, pathname+' not found!');
		}else{
			var ext = path.extname(localPath);
			ext = ext ? ext.slice(1) : 'unknown';
			var contentType = mime[ext] || "text/plain";
			fs.stat(localPath, function(err, stat){
				if(err) returnError(response, 500, err);
				var lastModified = stat.mtime.toUTCString(); //Set file header with last modify time
				var ifModifiedSince = "If-Modified-Since".toLowerCase();
				response.setHeader("Last-Modified", lastModified);

				if (ext.match(expires.Expires.fileMatch)) { //Set file expires time&date
					var expiresDate = new Date();
					expiresDate.setTime(expiresDate.getTime() + expires.Expires.maxAge);
					response.setHeader("Expires", expiresDate.toUTCString());
					response.setHeader("Cache-Control", "max-age=" + expires.Expires.maxAge);
				}

				// console.log(pathname+' last modify at:'+request.headers[ifModifiedSince]);
				if (request.headers[ifModifiedSince] && lastModified == request.headers[ifModifiedSince]) { //If not modified return 304
					response.writeHead(304, "Not Modified");
					response.end();
				} else {
					fs.readFile(localPath, 'binary', function(err, data){
						if(err) returnError(response, 500, err);
						response.writeHead(200, {"Content-Type": contentType});
						response.write(data, 'binary');
						response.end();
					});
				}
			});
		}
	});
}
/* Render error page */
function returnError(response, statusCode, error){
	response.writeHead(statusCode,{"Content-Type":"text/plain"});
	response.write(error+'\n');
	response.end();
}
exports.loadFile = loadFile;
exports.returnError = returnError;