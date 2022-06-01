<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\ProvincialAdminOffice;
use DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Sheet;
class ProvincialAdminOfficeExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ProvincialAdminOffice::select(
            'Property_No',
            'Particulars',
            'Date_Aquired',
            'Quantity',
            'Unit_Cost',
            'Total_Cost',
            'Accumulated_Depreciation',
            'NetBookValue',
            'Remark'
        )->get();
        // )->orderBy('FullName')->get();
    }
    public function headings(): array
    {
        return [
            'Property_No',
            'Particulars',
            'Date_Aquired',
            'Quantity',
            'Unit_Cost',
            'Total_Cost',
            'Accumulated_Depreciation',
            'NetBookValue',
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
                        'size'       => '10',
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ];
                $num1 = ProvincialAdminOffice::query()->count()+1;
                $body1 = 'A1'.':I'.$num1; //RANGE OF CELL
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
