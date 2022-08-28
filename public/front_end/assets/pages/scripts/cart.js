
 // making ajax object
 var xmlttp;
 if(window.XMLHttpRequest){
   xmlttp = new XMLHttpRequest();
 }else{
   xmlttp = new ActiveXObject('Microsoft.XMLTTP');
 }

 function showCart(id){
     xmlttp.open('GET','product/cart/'+id,true);
     xmlttp.send();
     xmlttp.onreadystatechange = function(){
      if(this.readyState==4 && this.status==200 ){
         alert(this.responseText); 
      }

    }  
   }
 


 


