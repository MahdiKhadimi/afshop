
 // making ajax object
 var xmlttp;
 if(window.XMLHttpRequest){
   xmlttp = new XMLHttpRequest();
 }else{
   xmlttp = new ActiveXObject('Microsoft.XMLTTP');
 }

$(document).ready(function(){
   // confirm admin delete
    $('.adminConformDelete').click(function(){
        if(confirm('Are you sure want to delete?')){
          return true;
        }else{
            return false;
        }
    });

  // confirm product delete 
  $(".productConfirmDelete").click(function(even) {
      if(!confirm("Are you want to delete?")){
          even.preventDefault();
      }

  });

  $(".brandStatus").click(function(){
     var text = $(this).children('i').attr('status');
     var brand_id = $(this).attr('brand_id');
      xmlttp.open("GET",'brand/status/'+brand_id,true);
      xmlttp.send();
      xmlttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){  
          if(this.responseText==0){
              $("#brand-"+brand_id).html('<i class="fas fa-toggle-off" aria-hidden="true" status="inactive"></i>');
          }else{
            $("#brand-"+brand_id).html('<i class="fas fa-toggle-on" aria-hidden="true" status="active"></i>');
          }
        }
      }
  });
  
});


 


  /*
  *get product id
  * sent data by ajax to ImageController
  * edit product image
  */
  function editProductImage(id){

   
  }

   /*
  *get image id
  * sent data by ajax to the ImageController
  *
  */
  function deleteProductImage(id)
  {
    var div = document.getElementById('divImageInfo'+id);
    var image = document.getElementById('productImage'+id);
    if(confirm("Are you sure want to delete?")){  
    xmlttp.open('GET','image/delete/'+id,true);
     xmlttp.send();
     xmlttp.onreadystatechange = function(){
       if(this.readyState==4 && this.status==200 ){
          if(this.responseText=='success'){
            div.remove();
            image.remove();
          }
           
       }
     }  
    }
  
  }

