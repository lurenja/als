
var jade = require('jade');
var url = require('url');
var qs = require('querystring');
var fs = require('fs');
var util = require('./util');

function bookList(response, request, pool){
	var sql = 'select t.bid, t.b_name, t.author as aname '+
				'from tbl_book t '+
			   'order by t.bid desc';
	pool.getConnection(function(err, conn){
		if(err) util.returnError(response, 500, err);
		conn.query(sql, [],
			function(err, rows) {
				if(err) util.returnError(response, 500, err);
				var template = fs.readFileSync('./template/index.jade');
				var fn = jade.compile(template, {filename: './template/layout.jade', pretty: true});
				var context = {books: rows};
				response.writeHead(200,{"Content-Type":"text/html"});
				response.write(fn(context));
				response.end();
			}
		);
		conn.release();
	});
}

function newBook(response, request) {
	var template = fs.readFileSync('./template/book_create.jade');
	var fn = jade.compile(template, {filename: './template/book_form.jade'});
	response.writeHead(200,{"Content-Type":"text/html"});
	response.write(fn());
	response.end();
}

function newBookByParam(response, request) {
    var param = url.parse(request.url, true).query;
    var context = {isbn: param.isbn, name:param.name, author:param.author, pubdate:param.pubdate, publisher:param.publisher};
    var template = fs.readFileSync('./template/book_create.jade');
    var fn = jade.compile(template, {filename: './template/book_form.jade'});
    response.writeHead(200,{"Content-Type":"text/html"});
    response.write(fn(context));
    response.end();
}

function createBook(response, request, pool) {
	var sql = 'insert into tbl_book(bid, b_name, author, pub_date, pub_house, remarks, type, serial_no) '+
	          'values (?, ?, ?, ?, ?, ?, ?, ?)';
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
				[param.bid, param.bName, param.author, param.pubDate+'-01', param.pubHouse, param.remarks, param.type, param.serialNo],
				function(err, rows) {
					if(err) util.returnError(response, 500, err);
					bookList(response, request, pool);
				}
			);
			conn.release();
		});
    });
}
function selBook(response, request, pool){
	var sql = 'select t.bid, t.b_name, t.author as aname, '+
                     'date_format(t.pub_date,\'%Y-%m\') as pub_date, '+
                     't.pub_house, t.type as type_id, '+
                     't2.description as tname, t.rectime, '+
                     't.serial_no, t.remarks '+
                'from tbl_book t, tbl_book_type t2 '+
               'where t.type = t2.t_no '+
                 'and t.bid = ?';
	pool.getConnection(function(err, conn){
		if(err) return util.returnError(response, 500, err);
		var param = url.parse(request.url, true).query;
		console.log('request param: ' + param.bid);
		conn.query(sql, [param.bid], function(err, rows) {
			if(err) util.returnError(response, 500, err);
			var template = fs.readFileSync('./template/book_update.jade');
			var fn = jade.compile(template, {filename: './template/book_form.jade'});
			var context = {books: rows};
			response.writeHead(200,{"Content-Type":"text/html"});
			response.write(fn(context));
			response.end();
		});
		conn.release();
	});
}

function updateBook(response, request, pool){
	var sql = 'update tbl_book t '+
	             'set t.b_name = ?, t.author = ?, t.pub_date = ?,' +
                     't.pub_house = ?, t.type = ?, t.serial_no = ?, t.remarks = ? '+
               'where t.bid = ?';
    var postData = '';
    request.addListener('data', function(dataChunk) {
    	postData += dataChunk;
    });
    request.addListener('end', function() {
    	pool.getConnection(function(err, conn) {
        	if(err) return util.returnError(response, 500, err);
        	var param = qs.parse(postData);
        	conn.query(sql,
        		[param.bName, param.author, param.pubDate+'-01', param.pubHouse, param.type, param.serialNo, param.remarks, param.bid],
				function(err, rows) {
					if(err) util.returnError(response, 500, err);
					bookList(response, request, pool);
				}
			);
			conn.release();
        });
    });
}

function deleteBook(response, request, pool) {
	var sql = 'delete from tbl_book where bid = ?';
	var postData = '';
	request.addListener('data', function(dataChunk) {
		postData += dataChunk;
	});
	request.addListener('end', function() {
		pool.getConnection(function(err, conn) {
			if(err) return util.returnError(response, 500, err);
			var param = qs.parse(postData);
			conn.query(sql, [param.bid], function(err, rows) {
				if(err) util.returnError(response, 500, err);
				bookList(response, request, pool);
			});
			conn.release();
		});
	});
}

function bookSearch(response, request) {
    var template = fs.readFileSync('./template/search.jade');
    var fn = jade.compile(template, {filename: './template/layout.jade', pretty: true});
    response.writeHead(200,{"Content-Type":"text/html"});
    response.write(fn());
    response.end();
}
exports.bookList = bookList;
exports.newBook = newBook;
exports.newBookByParam = newBookByParam;
exports.createBook = createBook;
exports.selBook = selBook;
exports.updateBook = updateBook;
exports.deleteBook = deleteBook;
exports.search = bookSearch;
