<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\BusinessUnit;

class BusinessUnitController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $items = BusinessUnit::all();
    return view('business_unit.list', compact('items'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('business_unit.form');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $user = $this->validate(request(), [
        'name' => ['required', 'string', 'max:255'],
    ]);

    $user = BusinessUnit::create([
        'name' => $request->name,
        'description' => $request->description,
        'created_by' => Auth::id(),
    ]);
    return redirect('business_unit');
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
      $user = BusinessUnit::findOrFail($id);
      return view('business_unit.form')->with('object', $user);
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
    $validatedData = $request->validate(
        array(
            'name'=>'required|string|max:255',
        )
    );

    BusinessUnit::whereId($id)->update([
      'name' => $request->name,
      'description' => $request->description,
      'created_by' => Auth::id(),
    ]);

    return redirect('business_unit');
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
