
$(document).ready(function(){
   $("#sortProduct").change(function(){
      $('#productSortForm').submit();
   })
   $("#showProduct").change(function(){
      $('#productSortForm').submit();
   }); 

   // confirm delivery address
   $('.delete').click(function(event){
      var result = confirm("Do you want to delete!")
      if(!result){
          event.preventDefault();
      }
   });

   $(".product-quantity").change(function(){
      $("#updateCartForm").submit();
   });
})

