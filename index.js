var server = require("./server");
var router = require('./router');
var bookHand = require('./bookHandlers');
var beHand = require('./backendHandlers');
var setHand = require('./setHandlers');
var util = require('./util');

var handle = {};
handle["/"]= beHand.index;
handle["/index"]= beHand.index;

handle['/newBook'] = bookHand.newBook;
handle['/newBookByParam'] = bookHand.newBookByParam;
handle['/selbook'] = bookHand.selBook;
handle['/createBook'] = bookHand.createBook;
handle['/updateBook'] = bookHand.updateBook;
handle['/deleteBook'] = bookHand.deleteBook;
handle['/search'] = bookHand.search;
handle['/bookList'] = bookHand.bookList;

handle['/setting'] = setHand.setting;
handle['/newType'] = setHand.newType;
handle['/createType'] = setHand.createType;
handle['/selType'] = setHand.selType;
handle['/updateType'] = setHand.updateType;
handle['/deleteType'] = setHand.deleteType;

handle['/loadType'] = beHand.getBookType;
handle['/loadPubHouse'] = beHand.getPubHouse;
handle['/loadAuthor'] = beHand.getAuthor;

handle['load'] = util.loadFile;

server.start(router.route, handle);