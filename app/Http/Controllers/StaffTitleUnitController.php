<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\StaffTitle;

class StaffTitleUnitController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $items = StaffTitle::all();
    return view('title.list', compact('items'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('title.form');
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

    $user = StaffTitle::create([
        'name' => $request->name,
        'description' => $request->description,
        'created_by' => Auth::id(),
    ]);
    return redirect('title');
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
      $user = StaffTitle::findOrFail($id);
      return view('title.form')->with('object', $user);
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

    StaffTitle::whereId($id)->update([
      'name' => $request->name,
      'description' => $request->description,
      'created_by' => Auth::id(),
    ]);

    return redirect('title');
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
