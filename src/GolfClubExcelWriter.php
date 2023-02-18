<?php

namespace R10Analyzer;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class GolfClubExcelWriter {

    private array $clubs;

    public function __construct(array $clubs) {
        $this->clubs = $clubs;
    }

    protected function createHeader(Worksheet $sheet) {

        $i = 1;
        $j = 1;
        $sheet->setCellValue([$i++, $j], 'Id');
        $sheet->setCellValue([$i++, $j], 'Name');
        $sheet->setCellValue([$i++, $j], 'Shaft Length');
        $sheet->setCellValue([$i++, $j], 'Loft Angle');
        $sheet->setCellValue([$i++, $j], 'Lie Angle');
        $sheet->setCellValue([$i++, $j], 'Flex Type');
        $sheet->setCellValue([$i++, $j], 'Average Distance');
        $sheet->setCellValue([$i++, $j], 'Advice Distance');
        $sheet->setCellValue([$i++, $j], 'Display Range');
        $sheet->setCellValue([$i++, $j], 'Is Retired');
        $sheet->setCellValue([$i++, $j], 'Is Deleted');
        $sheet->setCellValue([$i++, $j], 'Is Valid');
    }

    public function createWorkSheet(Worksheet $sheet) {

        $this->createHeader($sheet);
         $i = 1;
         $j = 2;
        /** @var GolfClub[] An array of GolfClub objects. */ 
        foreach($this->clubs as $golfClub) {        
            $sheet->setCellValue([$i++, $j], $golfClub->getType()->getValue());
            $sheet->setCellValue([$i++, $j], $golfClub->getType()->getName());
            $sheet->setCellValue([$i++, $j], $golfClub->getType()->getShaftLength());
            $sheet->setCellValue([$i++, $j], $golfClub->getType()->getLoftAngle());
            $sheet->setCellValue([$i++, $j], $golfClub->getType()->getLieAngle());
            $sheet->setCellValue([$i++, $j], $golfClub->getFlexTypeId());
            $sheet->setCellValue([$i++, $j], $golfClub->getAverageDistance());
            $sheet->setCellValue([$i++, $j], $golfClub->getAdviceDistance());
            $sheet->setCellValue([$i++, $j], $golfClub->getType()->getDisplayRange());

            $sheet->setCellValue([$i++, $j], $golfClub->getRetired());
            $sheet->setCellValue([$i++, $j], $golfClub->getDeleted());
            $sheet->setCellValue([$i++, $j], $golfClub->getType()->getValid());
            $i=1;
            $j++;
        }
    }
}