<?php
namespace R10Analyzer;

class GolfDataFactory {

    public const GOLF_CLUB = 'golf_club';
    public const GOLF_CLUB_TYPE = 'golf_club_type';

    public const GOLF_SIM_SESSIONS = 'golf_sim_session';
    
    private static function getFilePath(array $cfg, string $type) {
        $gdata = $cfg['garmin_data_folder'];
        $golfFolder = $cfg['garmin_golf_folder'];
        $fileName = $cfg[$type.'_file'];

        return realpath($gdata.'/'.$golfFolder.'/'.$fileName);
    }

    public static function load(array $cfg, string $type) : array {
        
        $fileName = self::getFilePath($cfg, $type);
        
        if (!file_exists($fileName)) {
            throw new \Exception('file ' . $fileName . ' not found. Place analyze.php into downloaded dir from Garmin');
        }

        //read file and get data
        $f = file_get_contents($fileName);
        $j = json_decode($f);
        
        $rdata = [];
        if (isset($j->data) && count($j->data) > 0) {
            //load data from file
            foreach ($j->data as $mydata) {

                switch ($type) {
                    case self::GOLF_CLUB: $rdata[] = GolfCLub::initialize($mydata);
                    break; 
                    
                    case self::GOLF_CLUB_TYPE: $rdata[] = GolfClubType::initialize($mydata);
                    break;

                    case self::GOLF_SIM_SESSIONS: $rdata[] = GolfSimSession::initialize($mydata);
                    break;
                }

                
            }
        }
        
        return $rdata;
    }
}
