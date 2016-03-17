var jade = require('jade');
var url = require('url');
var fs = require('fs');
var util = require('./util')

function getBookType(response, request, pool) {
	loadBookType(pool, function(data){
		response.writeHead(200,{"Content-Type":"application/json"});
		response.write(JSON.stringify(data));
		response.end();
	});
}

function loadBookType(pool, callback){
	var sql = 'select t.t_no as id, t.description as name FROM tbl_book_type t where t.t_no is not null order by t.t_no';
	pool.getConnection(function(err, conn) {
		if(err) util.returnError(response, 500, err);
		conn.query(sql, [], function(err, rows) {
			if(err) util.returnError(response, 500, err);
			callback(rows);
		});
		conn.release();
	});
}
function getPubHouse(response, request, pool) {
	var sql = 'select distinct t.pub_house as name from tbl_book t where upper(t.pub_house) like upper(?) order by 1';
	pool.getConnection(function(err, conn) {
		if(err) util.returnError(response, 500, err);
		var param = url.parse(request.url, true).query;
		console.log(param.key);
		conn.query(sql, ['%'+param.key+'%'], function(err, rows) {
			if(err) util.returnError(response, 500, err);
			response.writeHead(200,{"Content-Type":"application/json"});
			response.write(JSON.stringify(rows));
			response.end();
		});
		conn.release();
	});
}
function getAuthor(response, request, pool) {
	var sql = 'select distinct t.author as author from tbl_book t where upper(t.author) like upper(?) order by 1';
	pool.getConnection(function(err, conn) {
		if(err) util.returnError(response, 500, err);
		var param = url.parse(request.url, true).query;
		console.log(param.key);
		conn.query(sql, ['%'+param.key+'%'], function(err, rows) {
			if(err) util.returnError(response, 500, err);
			response.writeHead(200,{"Content-Type":"application/json"});
			response.write(JSON.stringify(rows));
			response.end();
		});
		conn.release();
	});
}
exports.getBookType = getBookType;
exports.loadBookType = loadBookType;
exports.getPubHouse = getPubHouse;
exports.getAuthor = getAuthor;