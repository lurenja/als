var http = require("http");
var url = require('url');
var mysql = require('mysql');
var _pool;
/* Start server */
function start(route, handle) {
	var server_ip = '127.0.0.1';
	var server_port = 8080;
	function onRequest(request, response) {
		var pathname = url.parse(request.url).pathname;
		if(!_pool){
			_pool = initDBPool();
		}
		// console.log("Request "+ pathname +" received.");
		route(handle, pathname, response, request, _pool);
	}
	http.createServer(onRequest).listen(server_port, server_ip);
	console.log('Listening on: '+server_ip+' and server_port: '+server_port);
}
/* Create database pool */
function initDBPool() {
	var pool = mysql.createPool({
		host: '127.0.0.1',
		user: 'abe',
		password: '123456',
		database: 'als_dev'
	});
	console.log('DB Pool created...');
	return pool;
}
exports.start = start;
