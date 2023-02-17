<?php
namespace R10Analyzer;

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

} catch (Exception $e) {
    error_log($e->getMessage());
}
