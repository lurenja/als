function setButton(e){ //设置下拉按钮文字
  $a = $(e);
  var $button = $a.closest('ul').prev('button');
  $button.text($a.text());
  return;
}
function setType(e, typeId){ //选择类别触发方法
  setButton(e);
  $('input[name="type"]').val(typeId);
}
function getISBN(){
  var isbn = $('input[name="bid"]').val();
  var url = 'http://api.36wu.com/ISBN/GetIsbnInfo?authkey=8510a6b198f0494295cefff5be5305f1&format=json&isbn='+isbn;
  $.get(url, {}, function(result){
    if(result.status == 200){
      var data = result.data;
      $('input[name="bName"]').val(data.title);
      $('input[name="author"]').val(data.author?data.author:'No Info');
      $('input[name="pubDate"]').val(data.pubdate);
      $('input[name="pubHouse"]').val(data.publisher);
    }else{
      alert(result.status);
    }
  }, 'json');
}