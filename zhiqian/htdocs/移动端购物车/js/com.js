// 默认没加载数据
var loading = false;

$(document).ajaxStart(function(){
  // 当有调接口的时候，就会触发ajaxStart这个回调函数
  loading = true;
})

$(document).ajaxComplete(function(event, xhr){
  // 当接口调用完毕，就会触发ajaxComplete这个回调函数
  loading = false;
  var data = JSON.parse(xhr.responseText);
  if(data.status == 1001){
    $('.login-box').show();
  }
})



function login( callback ){
  $('.lo-btn').on('click', function(){
  var account = $('#account').val();
  var password = $('#password').val();

  $.post('../../api/cart/login.php', JSON.stringify( {account:account, password:password} ), function(data){
    if(data.status == 1){
      $('.login-box').hide();
      if(typeof callback == 'function'){
        callback();
      }
    }
  }, 'json' )

  })
}