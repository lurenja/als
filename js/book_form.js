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
function getByISBN(btnObj){
  var isbn = $('input[name="bid"]').val();
  var doubanApi = 'https://api.douban.com/v2/book/isbn/'+isbn;
  $.get(doubanApi, {}, function(result){
    if(result.code == undefined){
      var data = result;
      $('input[name="bName"]').val(data.title);
      $('input[name="author"]').val(data.author?data.author:'No Info');
      $('input[name="pubDate"]').val(data.pubdate);
      $('input[name="pubHouse"]').val(data.publisher);
    }else{
      alert('No Data Found');
    }
    $(btnObj).removeClass('disabled');
  }, 'jsonp');
}
/* Load Book Type and set select value if exists */
function loadType(defaultId){
  $.get('loadType',{},function(data){
    for(var i=0, size=data.length; i<size; i++) {
      $option = $('<option>');
      $option.text(data[i].name).val(data[i].id);
      if(defaultId != '' && data[i].id == defaultId){
        $option.prop('selected', true);
      }
              //- $a = $('<a>');
              //- $a.text(data[i].name).attr('onclick', 'setType(this, \''+ data[i].id +'\')').attr('href', 'javascript:void(0);');
              //- $li = $('<li>');
              //- $li.append($a);
      $('#type_list').append($option);
    }
  },'json');
}