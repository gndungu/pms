<?php

namespace App\Exports;

use App\Models\LessonLearned;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class LessonLearnedExport implements FromCollection, WithHeadings, WithStyles, WithMapping
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        return LessonLearned::all();
    }

    // public function query()
    // {
    //     return LessonLearned::all();
    // }

    public function headings():array{
        return[
            'Id',
            'County',
            'Project /Program',
            'Thematic Area',
            'Business Unit',
            'Staff with Lesson',
            'Project /program Lesson learned',
            'Barriers to implementation for others to learn from',
            'Any other relevant comment',
            'Created By',
            'Created_at',
            'Updated_at',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }

    public function map($model): array
    {
        return [
          $model->id,
          $model->country->name,
          $model->project->name,
          $model->thematic_area->name,
          $model->business_unit->name,
          $model->staff_title->name,
          $model->lesson_learned,
          $model->barriers,
          $model->comment,
          $model->user->name,
          $model->created_at,
          $model->updated_at,
        ];
    }


}
