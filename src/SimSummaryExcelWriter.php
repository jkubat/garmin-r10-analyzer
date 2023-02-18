<?php

namespace R10Analyzer;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SimSummaryExcelWriter {

    private array $shots;

    public function __construct(array $shots) {
        $this->shots = $shots;
    }

    protected function createHeader(Worksheet $sheet) {

        $i = 1;
        $j = 1;
        $sheet->setCellValue([$i++, $j], 'Client ID');
        $sheet->setCellValue([$i++, $j], 'Name');
        $sheet->setCellValue([$i++, $j], 'Start Time');
        $sheet->setCellValue([$i++, $j], 'End Time');
        $sheet->setCellValue([$i++, $j], 'Num Shots');
        $sheet->setCellValue([$i++, $j], 'Type');   
    }

    public function createWorkSheet(Worksheet $sheet) {

        $this->createHeader($sheet);
         $i = 1;
         $j = 2;
        /** @var GolfSimSession[] An array of GolfSimSession objects. */ 
        foreach($this->shots as $golfShots) {        
            $sheet->setCellValue([$i++, $j], $golfShots->getSummary()->getClientKey());
            $sheet->setCellValue([$i++, $j], $golfShots->getSummary()->getName());
            $sheet->setCellValue([$i++, $j], $golfShots->getSummary()->getStartTime());
            $sheet->setCellValue([$i++, $j], $golfShots->getSummary()->getEndTime());
            $sheet->setCellValue([$i++, $j], $golfShots->getSummary()->getNumShots());
            $sheet->setCellValue([$i++, $j], $golfShots->getSummary()->getType());

            $i=1;
            $j++;
        }
    }
}