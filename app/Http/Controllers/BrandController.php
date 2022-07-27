<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\brand;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = brand::get();
        return view('brand.list',compact('brands'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand = new Brand();
        $brand->name= $request->name;
        $brand->status =$request->status;
        if($brand->save()){
            session()->flash('success','new brand has been successfull added');
        }
        return redirect('/brand');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = brand::find($id);
        return view('brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    
        $brand = brand::find($id);
        $brand->name = $request->name;
        $brand->status = $request->status;
        
        if($brand->save()){
            session()->flash('success','Selected brand has been successfully updated!');
        }
        return redirect('brand');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $result = brand::find($id)->delete();
        if($result){
            session()->flash('success','selected data has been successfully deleted!');
        }
        return redirect('brand');
    }

   public function update_status($id){
      $brand=brand::find($id);
      if($brand->status==1){
          $brand->status=0;
          $result = 0;
      }else{
        $brand->status=1;
        $result = 1;
      }
     if($brand->save()){
         echo $result;
     }
   }
}
