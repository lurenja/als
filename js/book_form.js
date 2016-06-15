/* 设置下拉按钮文字 */
function setButton(e){
  $a = $(e);
  var $button = $a.closest('ul').prev('button');
  $button.text($a.text());
  return;
}
/* 选择类别触发方法 */
function setType(e, typeId){
  setButton(e);
  $('input[name="type"]').val(typeId);
}
/* Search book by ISBN using Douban API */
function getISBN(){
  var isbn = $('input[name="bid"]').val();
  var doubanApi = 'https://api.douban.com/v2/book/isbn/:'+isbn;
  $.get(doubanApi, {}, function(result){
    if(result){
      var data = result;
      $('input[name="bName"]').val(data.title);
      $('input[name="author"]').val(data.author?data.author:'No Info');
      $('input[name="pubDate"]').val(data.pubdate);
      $('input[name="pubHouse"]').val(data.publisher);
    }else{
      alert('No Data Found');
    }
  }, 'jsonp');
}
