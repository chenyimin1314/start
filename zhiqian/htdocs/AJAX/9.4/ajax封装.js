//
//	 fuction ajaxstar(){
//	 		 document.querySelector('.che').style.display='block';
//	 }
//	 fuction ajaxend(){
//	 		 document.querySelector('.che').style.display='none';
//	 }
	
     function ajax(type,url,data){
    	var a=new XMLHttpRequest();
    	if(type=='get'){
    		url+='?';
    		var arr=[];
    		for(var i in data){
    		arr.push(i+'='+data[i]);
    		}
    		url+=arr.join('&');
    	};
    	 a.open(type,url);
         if(type=='post'){
         	 a.setRequestHeader("Content-type","application/x-www-form-urlencoded");
         }
        if(type=='get'){
             a.send();
         }
         else{
            a.send(JSON.stringify(data));
         }
        a.onreadystatechange = function (){
        if(a.readyState == 4){
             if(a.status == 200){
             	console.log(a.response)
	        }
	      }
      }
  }
