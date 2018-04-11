var $=function(Selection){
	document.querySelector(Selection);
}
$.ajaxStart=function(){
	document.querySelector('.che').display='block'
}
$.ajaxComplete=function(){
	document.querySelector('.che').display='none'
}
$.ajax=function(type, url, data, contentType){
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
