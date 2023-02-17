<?php
namespace R10Analyzer;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

require __DIR__ . '/vendor/autoload.php';

//read config file
$cfg = parse_ini_file('config/config.ini');

try {

    $timer = new ExecutionTimeMeasurement("Loading golf clubs", true);
    //load golf clubs
    $golfClubs = GolfDataFactory::load($cfg, GolfDataFactory::GOLF_CLUB);
    print $timer->getResult();    


    /**
     * loading and merging golf clubs
     */
    $timer = new ExecutionTimeMeasurement("Loading golf club types clubs", true);
    //load golf data clubs
    $golfClubTypes = GolfDataFactory::load($cfg, GolfDataFactory::GOLF_CLUB_TYPE);

    //merge golf club and golfclub types
    /** @var GolfClub[] An array of GolfClub objects. */ 
    foreach($golfClubs as $golfClub) {
        $golfClub->setType($golfClubTypes);
    }
    print $timer->getResult();  

     /**
     * Loading golf shots in all training sessions 
     */
    $timer = new ExecutionTimeMeasurement("Loading golf shots in all training sessions", true);
    //load SIM session
    $golfSIMSessions = GolfDataFactory::load($cfg, GolfDataFactory::GOLF_SIM_SESSIONS);
    print $timer->getResult(); 

    //export data into excel
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    
    $timer = new ExecutionTimeMeasurement("Generate Excel file", true);
    $i = 1;
    $j = 1;
    /** @var GolfClub[] An array of GolfClub objects. */ 
    foreach($golfClubs as $golfClub) {
        $sheet->setCellValue([$i++, $j], $golfClub->getId());
        $sheet->setCellValue([$i++, $j], $golfClub->getClubTypeId());
        $sheet->setCellValue([$i++, $j], $golfClub->getShaftLength());
        $sheet->setCellValue([$i++, $j], $golfClub->getFlexTypeId());
        $sheet->setCellValue([$i++, $j], $golfClub->getAverageDistance());
        $sheet->setCellValue([$i++, $j], $golfClub->getAdviceDistance());
        $sheet->setCellValue([$i++, $j], $golfClub->getRetired());
        $sheet->setCellValue([$i++, $j], $golfClub->getDeleted());
        $sheet->setCellValue([$i++, $j], $golfClub->getType()->getValue());
        $sheet->setCellValue([$i++, $j], $golfClub->getType()->getName());
        $sheet->setCellValue([$i++, $j], $golfClub->getType()->getShaftLength());
        $sheet->setCellValue([$i++, $j], $golfClub->getType()->getLoftAngle());
        $sheet->setCellValue([$i++, $j], $golfClub->getType()->getLieAngle());
        $sheet->setCellValue([$i++, $j], $golfClub->getType()->getDisplayRange());
        $sheet->setCellValue([$i++, $j], $golfClub->getType()->getValid());
        $i=1;
        $j++;
    }

    $writer = new Xlsx($spreadsheet);
    $writer->save('r10data.xlsx');
    print $timer->getResult(); 
    print "\nAll done!\n";

} catch (\Exception $e) {
    error_log($e->getMessage());
}
