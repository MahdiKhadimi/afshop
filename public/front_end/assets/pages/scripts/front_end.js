
$(document).ready(function(){
   $("#sortProduct").change(function(){
      var value =  $.get('product.product_list');
      alert(value);
   })
})

