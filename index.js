var server = require("./server");
var router = require('./router');
var bookHdl = require('./bookHandlers');
var basicHdl = require('./basicHandlers');
var util = require('./common');

var handle = {};
handle["/"]= bookHdl.index;
handle["/index"]= bookHdl.index;
// handle["/upload"]= requestHandlers.upload;
// handle["/show"]= requestHandlers.show;
handle['/newbook'] = bookHdl.newBookP;
handle['/createBook'] = bookHdl.createBook;
handle['/loadType'] = basicHdl.bookType;
handle['/loadPubHouse'] = basicHdl.pubHouse;
handle['/loadAuthor'] = basicHdl.getAuthor;
handle['load'] = util.loadFile;

server.start(router.route, handle);