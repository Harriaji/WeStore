<?php

namespace App\Http\Controllers;

use App\Models\items;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = items::paginate(5);
        return view('admin.masterbarang',compact('data'));
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.createBarang');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'required' => ':attribute harus diisi dulu',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attibute maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
           
          
        ] ;

        $this->validate($request,[
        'item_name' => 'required',
        'item_qtt' => 'required',
        'item_desc' => 'required|min:5|max:50',

      ],$message);

      items::create([
        'item_name' => $request->item_name,
        'item_qtt' => $request->item_qtt,
        'item_desc' => $request->item_desc,
       
    ]);
        return redirect('/masterbarang');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    //    $data = items::find($id);
    //    return view()
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = items::find($id);
        return view('admin.editBarang', compact('data'));
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
        $message = [
            'required' => ':attribute harus diisi dulu',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attibute maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
          
        ] ;

        $this->validate($request,[
            'item_name' => 'required',
            'item_qtt' => 'required|numeric',
            'item_desc' => 'required|min:5|max:50',
    

      ],$message);

      $item = items::find($id);
      $item->item_name = $request->item_name;
      $item->item_qtt = $request->item_qtt;
      $item->item_desc = $request->item_desc;
      $item->update();
      return redirect('/masterbarang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
