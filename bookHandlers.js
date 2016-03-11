
var qs = require("querystring");
var fs = require('fs');
var jade = require('jade');
var util = require('./common');

function index(response, request, pool){
	var sql = 'select t.bid, t.b_name, t1.name as aname '+
				'from tbl_book t, tbl_author t1 '+
			   'where t.author = t1.aid '+
			   'order by t.bid desc';
	pool.getConnection(function(err, conn){
		if(err) {
			util.returnError(response, 500, err);
		}
		conn.query(sql, [],
			function(err, rows) {
				if(err) {
					util.returnError(response, 500, err);
				}
				var template = fs.readFileSync('./template/index.jade');
				var fn = jade.compile(template);
				var context = {books: rows};
				response.writeHead(200,{"Content-Type":"text/html"});
				response.write(fn(context));
				response.end();
			}
		);
		conn.release();
	});
	console.log("Request handler 'index' was called.");
}

function newBookP(response, request) {
	var template = fs.readFileSync('./template/book_create.jade');
	var fn = jade.compile(template, {filename: './template/book_form.jade'});
	response.writeHead(200,{"Content-Type":"text/html"});
	response.write(fn());
	response.end();
}

function createBook(response, request, pool) {
	var sql = 'insert into tbl_book(bid, b_name, author, pub_date, pub_house, remarks) values (?, ?, ?, ?, ?, ?)';
	var postData = '';
	request.addListener("data",function(postDataChunk){
      postData += postDataChunk;
      console.log('Received postData: '+postDataChunk);
    });
    request.addListener("end",function(){
    	pool.getConnection(function(err, conn){
			if(err) {
				util.returnError(response, 500, err);
			}
			var param = qs.parse(postData);
			conn.query(sql, [param.bid, param.bName, param.author, param.pubDate+'-01', param.pubHouse, param.remarks],
				function(err, rows) {
					if(err) {
						util.returnError(response, 500, err);
					}
					index(response, request, pool);
				}
			);
			conn.release();
		});
    });
}
function upload(response, request){
	console.log("Request handler 'upload' was called.");

	var form =new formidable.IncomingForm();
	form.uploadDir = '/tmp';
	console.log("about to parse");
	form.parse(request,function(error, fields, files){
		console.log("parsing done");
		fs.renameSync(files.upload.path,"/tmp/test.jpg");
		var template = fs.readFileSync('./template/result.jade');
		var fn = jade.compile(template);
		response.writeHead(200,{"Content-Type":"text/html"});
		response.write(fn());
		response.end();
	});

}

function show(response){
  console.log("Request handler 'show' was called.");
  fs.readFile("/tmp/test.jpg","binary",function(error, file){
    if(error){
      response.writeHead(500,{"Content-Type":"text/plain"});
      response.write(error +"\n");
      response.end();
    }else{
      response.writeHead(200,{"Content-Type":"image/png"});
      response.write(file,"binary");
      response.end();
    }
  });
}


exports.index = index;
exports.newBookP = newBookP;
exports.createBook = createBook;
// exports.upload = upload;
// exports.show = show;