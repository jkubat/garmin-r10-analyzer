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
    
    //create sheet with golf clubs
    $gfWriter = new GolfClubExcelWriter($golfClubs);
    $gfWriter->createWorkSheet($sheet);
    $sheet->setTitle('Golf CLubs');

    //create sheet with golf summary
    $sheet = $spreadsheet->createSheet(1);
    $sheet->setTitle('Golf SIM shots');
    $simShots = new SimSummaryExcelWriter($golfSIMSessions);
    $simShots->createWorkSheet($sheet);

    //create sheet with all golfshots
    $sheet = $spreadsheet->createSheet(2);
    $sheet->setTitle('Golf Shots');
    $simShots = new SimGolfShotsExcelWriter($golfSIMSessions, $golfClubs);
    $simShots->createWorkSheet($sheet);

    $writer = new Xlsx($spreadsheet);
    $writer->save('r10data.xlsx');
    print $timer->getResult(); 
    print "\nAll done!\n";

} catch (\Exception $e) {
    error_log($e->getMessage());
}
