var qs = require('querystring');
var util = require('./common')

function bookType(response, request, pool) {
	var sql = 'SELECT t.t_no as id, t.description as name FROM tbl_book_type t order by t.t_no';
	pool.getConnection(function(err, conn) {
		if(err){
			util.returnError(response, 500, err);
		}
		conn.query(sql, [],
			function(err, rows) {
				if(err) {
					util.returnError(response, 500, err);
				}
				response.writeHead(200,{"Content-Type":"application/json"});
				response.write(JSON.stringify(rows));
				response.end();
			}
		);
	});
}

function pubHouse(response, request, pool) {
	var sql = 'select distinct t.pub_house as name from tbl_book t where upper(t.pub_house) like upper(?) order by 1';
	var postData = '';
	request.addListener('data', function(postDataChunk) {
		postData += postDataChunk;
	});
	request.addListener('end', function() {
		pool.getConnection(function(err, conn) {
			if(err) util.returnError(response, 500, err);
			var param = qs.parse(postData);
			console.log('param: '+postData);
			conn.query(sql, ['%'+param.key+'%'], function(err, rows) {
				if(err) util.returnError(response, 500, err);
				response.writeHead(200,{"Content-Type":"application/json"});
				response.write(JSON.stringify(rows));
				response.end();
			});
		});
	});
}

function getAuthor(response, request, pool) {
	var sql = 'select distinct t.author as author from tbl_book t where upper(t.author) like upper(?) order by 1';
	var postData = '';
	request.addListener('data', function(dataChunk) {
		postData += dataChunk;
	});
	request.addListener('end', function() {
		pool.getConnection(function(err, conn) {
			if(err) util.returnError(response, 500, err);
			var param = qs.parse(postData);
			conn.query(sql, ['%'+param.key+'%'], function(err, rows) {
				if(err) util.returnError(response, 500, err);
				response.writeHead(200,{"Content-Type":"application/json"});
				response.write(JSON.stringify(rows));
				response.end();
			});
		})
	})
}
exports.bookType = bookType;
exports.pubHouse = pubHouse;
exports.getAuthor = getAuthor;