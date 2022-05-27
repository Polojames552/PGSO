<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Tourism;
use DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Sheet;
class TourismExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tourism::select(
        'Property_No',
        'Description',
        'Date_Aquired',
        'Aquisition_Cost',
        'Accountable_Person',
        'Location',
        'Med_dental_equipment',
        'Office_Eq',
        'Hospital_Eq',
        'FurnitureNFixtures',
        'Motor_Vehicles',
        'Info_Tech',
        'Other_Machine_Eq',
        'Other_Asset',
        'Remark'
        )->get();
        // )->orderBy('FullName')->get();
    }
    public function headings(): array
    {
        return [
            'Property No.',
            'Description',
            'Date Aquired',
            'Aquisition Cost',
            'Accountable Person',
            'Location',
            'Med.dental & Equipment',
            'Office Equipment',
            'Hospital Equipment',
            'Furniture & Fixtures',
            'Motor Vehicles',
            'Information Technology',
            'Other Machine Equipment',
            'Other Asset',
            'Remark'
        ];
    }
    public function registerEvents(): array
    {
        return [

            AfterSheet::class    => function(AfterSheet $event) {
                // All headers

                $cellRange = 'A1:W1';
                $header = [
                    'font' => [
                        'family'     => 'Calibri',
                        'size'       => '10',
                        'bold'       => true
                    ],

                ];
                $event->sheet->getStyle($cellRange)->applyFromArray($header);
                //BODY
                $styleArray = [
                    'font' => [
                        'family'     => 'Calibri',
                        'size'       => '6.5',
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ];
                $num1 = Tourism::query()->count()+1;
                $body1 = 'A1'.':O'.$num1; //RANGE OF CELL
                $event->sheet->getStyle($body1)->applyFromArray($styleArray)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);;
                //Border
                // $event->sheet->getStyle($body1)

                //ORIENTATION
                $event->sheet
                ->getPageSetup()
                ->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LEGAL)
                ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
            },

        ];
    }
}
