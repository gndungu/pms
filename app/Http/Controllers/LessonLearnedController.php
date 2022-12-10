<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Project;
use App\Models\ThematicArea;
use App\Models\BusinessUnit;
use App\Models\StaffTitle;
use App\Models\LessonLearned;
use App\Exports\LessonLearnedExport;

class LessonLearnedController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $items = LessonLearned::all();
    return view('lesson.list', compact('items'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $data['country'] = Country::orderBy('name')->pluck('name', 'id');
      $data['project'] = Project::all()->pluck('name', 'id');
      $data['thematic_area'] = ThematicArea::all()->pluck('name', 'id');
      $data['business_unit'] = BusinessUnit::all()->pluck('name', 'id');
      $data['staff_title'] = StaffTitle::all()->pluck('name', 'id');
      return view('lesson.form', $data);
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
      'country' => ['required', 'int'],
      'project' => ['required', 'int'],
      'thematic_area' => ['required', 'int'],
      'business_unit' => ['required', 'int'],
      'staff_title' => ['required', 'int'],
      'lesson_learned' => ['required', 'string'],
      'barriers' => ['required', 'string'],
    ]);

    $user = LessonLearned::create([
        'country_id' => $request->country,
        'project_id' => $request->project,
        'thematic_area_id' => $request->thematic_area,
        'business_unit_id' => $request->business_unit,
        'staff_title_id' => $request->staff_title,
        'lesson_learned' => $request->lesson_learned,
        'barriers' => $request->barriers,
        'comment' => $request->comment,
        'created_by' => Auth::id(),
    ]);
    return redirect('lesson');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      $lesson = LessonLearned::whereId($id)->first();
      return view('lesson.detail')->with('lesson', $lesson);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      $data['country'] = Country::orderBy('name')->pluck('name', 'id');
      $data['project'] = Project::all()->pluck('name', 'id');
      $data['thematic_area'] = ThematicArea::all()->pluck('name', 'id');
      $data['business_unit'] = BusinessUnit::all()->pluck('name', 'id');
      $data['staff_title'] = StaffTitle::all()->pluck('name', 'id');
      $user = LessonLearned::findOrFail($id);
      return view('lesson.form', $data)->with('object', $user);
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

    $user = $this->validate(request(), [
      'country' => ['required', 'int'],
      'project' => ['required', 'int'],
      'thematic_area' => ['required', 'int'],
      'business_unit' => ['required', 'int'],
      'staff_title' => ['required', 'int'],
      'lesson_learned' => ['required', 'string'],
      'barriers' => ['required', 'string'],
    ]);

    $user = LessonLearned::whereId($id)->update([
        'country_id' => $request->country,
        'project_id' => $request->project,
        'thematic_area_id' => $request->thematic_area,
        'business_unit_id' => $request->business_unit,
        'staff_title_id' => $request->staff_title,
        'lesson_learned' => $request->lesson_learned,
        'barriers' => $request->barriers,
        'comment' => $request->comment,
        'created_by' => Auth::id(),
    ]);

    return redirect('lesson');
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

  public function export_lesson()
  {
     return Excel::download(new LessonLearnedExport, 'users.xlsx');
  }

}
