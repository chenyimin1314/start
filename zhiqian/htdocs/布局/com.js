     var fa=false;
     var  cum=1;
	   $(document).ajaxStart(function(){
	  	   fa=true;
	   })
     $(document).ajaxComplete(function(even,x){
     	    fa=false;
			var  data=JSON.parse(x.responseText)
			if(data.status==1001){
             $(".out-login").show();
			}
	 })

       
  function login(call){
	$(".lo-btn").on('click',function(){
			var account=$("#account").val();
			var password=$('#password').val();
            $.post('../api/cart/login.php',JSON.stringify({account:account,password:password}),function(data){
				 if(data.status==1){
				 $(".out-login").hide();
				 if(typeof call=="function"){
				    call();
				 }
				  
				}
			},'json')
		});
}
