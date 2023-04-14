<?php

namespace R10Analyzer;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SimGolfShotsExcelWriter {

    private array $shots;

    private array $clubs;

    public function __construct(array $shots, array $clubs) {
        $this->shots = $shots;
        foreach($clubs as $club) {
            $this->clubs[$club->getId()] = $club;
        }
    }

    protected function createHeader(Worksheet $sheet) {

        $i = 1;
        $j = 1;
        $sheet->setCellValue([$i++, $j], 'Client ID');
        $sheet->setCellValue([$i++, $j], 'Session Name');
        $sheet->setCellValue([$i++, $j], 'Shot Order');
        $sheet->setCellValue([$i++, $j], 'Shot Time');
        $sheet->setCellValue([$i++, $j], 'Club Id');
        $sheet->setCellValue([$i++, $j], 'Club');
        $sheet->setCellValue([$i++, $j], 'Ball Speed');
        $sheet->setCellValue([$i++, $j], 'Vertical Launch Angle');   
        $sheet->setCellValue([$i++, $j], 'Horizontal Launch Angle');   
        $sheet->setCellValue([$i++, $j], 'Club Head Speed');   
        $sheet->setCellValue([$i++, $j], 'Club Path Angle');   
        $sheet->setCellValue([$i++, $j], 'Back Swing Time');   
        $sheet->setCellValue([$i++, $j], 'Down Swing Time');   
        $sheet->setCellValue([$i++, $j], 'Swing Tempo');   
        $sheet->setCellValue([$i++, $j], 'Attack Angle');   
        $sheet->setCellValue([$i++, $j], 'Club Face Angle');   
        $sheet->setCellValue([$i++, $j], 'Spin Rate');   
        $sheet->setCellValue([$i++, $j], 'Spin Axis');   
        $sheet->setCellValue([$i++, $j], 'Carry Distance');   
        $sheet->setCellValue([$i++, $j], 'Total Distance');   
        $sheet->setCellValue([$i++, $j], 'Target Distance');   
        $sheet->setCellValue([$i++, $j], 'Smash Factor');   
        $sheet->setCellValue([$i++, $j], 'Apex Height');   
        $sheet->setCellValue([$i++, $j], 'Total Deviation Distance'); 
        $sheet->setCellValue([$i++, $j], 'Spin Callculation Type');   
        $sheet->setCellValue([$i++, $j], 'Ball Type');   
        $sheet->setCellValue([$i++, $j], 'Temperature');   
        $sheet->setCellValue([$i++, $j], 'Humidity');   
        $sheet->setCellValue([$i++, $j], 'Air Pressure');
        $sheet->setCellValue([$i++, $j], 'Good Shot');   
        $sheet->setCellValue([$i++, $j], 'Club speed has value');   
        $sheet->setCellValue([$i++, $j], 'Club path has value');   
    }

    public function createWorkSheet(Worksheet $sheet) {

        $this->createHeader($sheet);
         $i = 1;
         $j = 2;
        /** @var GolfSimSession[] An array of GolfSimSession objects. */ 
        foreach($this->shots as $golfShots) {   
                 
            $sessionName = $golfShots->getSummary()->getStartTime()->format('Y-m-d H:i');
             /** @var GolfShot[] An array of GolfShot objects. */ 
            foreach($golfShots->getShots() as $sShot){
                $sheet->setCellValue([$i++, $j], $golfShots->getSummary()->getClientKey());
                $sheet->setCellValue([$i++, $j], $sessionName); 
                $sheet->setCellValue([$i++, $j], $sShot->getShotOrder());
                $sheet->setCellValue([$i++, $j], $sShot->getShotTime());
                $sheet->setCellValue([$i++, $j], $this->clubs[$sShot->getClubId()]->getType()->getValue());
                $sheet->setCellValue([$i++, $j], $this->clubs[$sShot->getClubId()]->getType()->getName());
                $sheet->setCellValue([$i++, $j], $sShot->getBallSpeed());
                $sheet->setCellValue([$i++, $j], $sShot->getVerticalLaunchAngle());
                $sheet->setCellValue([$i++, $j], $sShot->getHorizontalLaunchAngle());
                $sheet->setCellValue([$i++, $j], $sShot->getClubHeadSpeed());
                $sheet->setCellValue([$i++, $j], $sShot->getClubPathAngle());
                $sheet->setCellValue([$i++, $j], $sShot->getBackSwingTime());
                $sheet->setCellValue([$i++, $j], $sShot->getDownSwingTime());
                $sheet->setCellValue([$i++, $j], $sShot->getSwingTempo());
                $sheet->setCellValue([$i++, $j], $sShot->getAttackAngle());
                $sheet->setCellValue([$i++, $j], $sShot->getClubFaceAngle());
                $sheet->setCellValue([$i++, $j], $sShot->getSpinRate());
                $sheet->setCellValue([$i++, $j], $sShot->getSpinAxis());
                $sheet->setCellValue([$i++, $j], $sShot->getCarryDistance());
                $sheet->setCellValue([$i++, $j], $sShot->getTotalDistance());
                $sheet->setCellValue([$i++, $j], $sShot->getTargetDistance());
                $sheet->setCellValue([$i++, $j], $sShot->getSmashFactor());
                $sheet->setCellValue([$i++, $j], $sShot->getApexHeight());
                $sheet->setCellValue([$i++, $j], $sShot->getTotalDeviationDistance());
                $sheet->setCellValue([$i++, $j], $sShot->getSpinCalculationType());
                $sheet->setCellValue([$i++, $j], $sShot->getBallType());
                $sheet->setCellValue([$i++, $j], $sShot->getTemperature());
                $sheet->setCellValue([$i++, $j], $sShot->getHumidity());
                $sheet->setCellValue([$i++, $j], $sShot->getAirPressure());
                $sheet->setCellValue([$i++, $j], $sShot->getGoodShot());
                $sheet->setCellValue([$i++, $j], (bool)$sShot->getClubHeadSpeed());
                $sheet->setCellValue([$i++, $j], (bool)$sShot->getClubPathAngle());
                $i=1;
                $j++;
            }
        }
    }
}