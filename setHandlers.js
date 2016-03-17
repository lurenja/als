var beHandler = require('./backendHandlers');
var fs = require('fs');
var jade = require('jade');
var url = require('url');
var qs = require('querystring');

function setting(response, request, pool) {
	beHandler.loadBookType(pool, function(data) {
		var template = fs.readFileSync('./template/setting.jade');
		var fn = jade.compile(template);
		var context = {types: data};
		response.writeHead(200,{"Content-Type":"text/html"});
		response.write(fn(context));
		response.end();
	});
}

function newType(response, request) {
	var template = fs.readFileSync('./template/type_create.jade');
	var fn = jade.compile(template, {filename: './template/type_form.jade'});
	response.writeHead(200,{"Content-Type":"text/html"});
	response.write(fn());
	response.end();
}

function createType(response, request, pool){
	var sql = 'insert into tbl_book_type (t_no, description) values (?, ?)';
	var postData = '';
	request.addListener("data",function(postDataChunk){
        postData += postDataChunk;
        console.log('Received postData: '+postDataChunk);
    });
    request.addListener("end",function(){
    	pool.getConnection(function(err, conn){
			if(err) util.returnError(response, 500, err);
			var param = qs.parse(postData);
			conn.query(sql,
				[param.id, param.name],
				function(err, rows) {
					if(err) util.returnError(response, 500, err);
					setting(response, request, pool);
				}
			);
			conn.release();
		});
    });
}

function selType(response, request) {
	var param = url.parse(request.url, true).query;
	console.log('request param: ' + param.id);

	var template = fs.readFileSync('./template/type_update.jade');
	var fn = jade.compile(template, {filename: './template/type_form.jade'});
	var context = {id: param.id, name: param.name};
	response.writeHead(200,{"Content-Type":"text/html"});
	response.write(fn(context));
	response.end();
}

function updateType(response, request, pool) {
	var sql = 'update tbl_book_type t set t.description = ? where t.t_no = ?';
	var postData = '';
	request.addListener("data",function(postDataChunk){
		postData += postDataChunk;
		console.log('Received postData: '+postDataChunk);
    });
    request.addListener("end",function(){
    	pool.getConnection(function(err, conn){
			if(err) util.returnError(response, 500, err);
			var param = qs.parse(postData);
			conn.query(sql,
				[param.name, param.id],
				function(err, rows) {
					if(err) util.returnError(response, 500, err);
					setting(response, request, pool);
				}
			);
			conn.release();
		});
    });
}

function deleteType(response, request, pool) {
	var sql = 'delete from tbl_book_type where t_no = ?';
	var postData = '';
	request.addListener("data",function(postDataChunk){
		postData += postDataChunk;
		console.log('Received postData: '+postDataChunk);
    });
    request.addListener("end",function(){
    	pool.getConnection(function(err, conn){
			if(err) util.returnError(response, 500, err);
			var param = qs.parse(postData);
			conn.query(sql,
				[param.id],
				function(err, rows) {
					if(err) util.returnError(response, 500, err);
					setting(response, request, pool);
				}
			);
			conn.release();
		});
    });
}
exports.setting = setting;
exports.newType = newType;
exports.createType = createType;
exports.selType = selType;
exports.updateType = updateType;
exports.deleteType = deleteType;