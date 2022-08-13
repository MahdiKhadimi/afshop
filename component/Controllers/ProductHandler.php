<?php 
namespace component\Controllers;
use app\Models\Product;
class ProductHandler
{
  public function sort($section,$category,$sort)
  {   
      if($sort!=null){
        
         switch($sort){
             case 'Default':
                $column = '';
                $status = ''; 
                break;
             case 'Name(A-Z)':
                $column = 'name';
                $status = 'asc'; 
                break;
            case 'Name(Z-A)':
                $column = 'name';
                $status = 'desc'; 
                break;
          case 'Price(Low_to_High)':
                $column = 'price';
                $status = 'desc'; 
                break;
         case 'Price(High_to_Low)':
                $column = 'price';
                $status = 'asc'; 
                break;
                          
         }

        return Product::orderBy($column,$status)->get();     }
  }

  public function show($section,$category,$show)
  {
      if($show!=null){
          return Product::limit($show)->get();
      }

  }

  
}
