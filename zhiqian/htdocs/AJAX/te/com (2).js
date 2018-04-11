var $ = function(selector){
  return document.querySelector(selector);
}
 $.ajaxStart = function(){
  console.log('ajax开始调用');
       document.querySelector('.loading').style.display = 'block';
  }

$.ajaxComplete = function(){
    console.log('ajax调用结束');
     document.querySelector('.loading').style.display = 'none';
  }

  // type就是ajax的请求方法，url就是ajax的请求地址，data就是ajax的请求参数，这个参数必须是对象
$.ajax = function(type, url, data, contentType){
    $.ajaxStart();
    var xhr = new XMLHttpRequest();
    var formData;
    if(contentType == undefined){
      contentType = true;
    }

    if(type == 'get'){
      url+='?';
      var arr = [];
      for(var k in data){
        arr.push(k+'='+data[k])
      };
      url += arr.join('&');
    }else if(type == 'post'){
      
    }else if(type == 'put'){
      
    }else if(type == 'delete'){
      
    }
    
    xhr.open(type, url);

    if(type == 'post' && contentType){
      xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    }else if(type == 'post'){
      formData = new FormData();
      for(var k in data){
        formData.append(k, data[k]);
      }
      console.log( formData.get('name') );
    }

    if(type == 'get'){
      xhr.send();
    }else if(type == 'post' && !contentType){
      xhr.send(formData);
    }else{
      xhr.send( JSON.stringify(data) );
    }
    xhr.onreadystatechange = function (){
      if(xhr.readyState == 4){
        if(xhr.status == 200){
          console.log(xhr.response);
        }
        $.ajaxComplete(xhr.response);
      }
    }
  }