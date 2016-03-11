var http = require("http");
var url = require('url');
var mysql = require('mysql');
var _pool;

function start(route, handle) {
	function onRequest(request, response) {
		var pathname = url.parse(request.url).pathname;
		if(!_pool){
			console.log('db pool initialize');
			_pool = initDBPool();
		}
		console.log("Request for "+ pathname +" received.");
		route(handle, pathname, response, request, _pool);
	}
	http.createServer(onRequest).listen(90);
	console.log('server started');
}

function initDBPool() {
	var pool = mysql.createPool({
		host: '127.0.0.1',
		user: 'abe',
		password: '123456',
		database: 'als_dev'
	});
	return pool;
}

exports.start = start;