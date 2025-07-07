<?php

namespace R10Analyzer;

class SimGolfShotAnalyzer {

    private $simSessions;

    private array $clubs;

    private $config;
    /** @var GolfSimSession[] An array of GolfSimSession objects. */ 
    public function __construct(array $golfSIMSessions, array $clubs, array $config)
    {
        $this->simSessions = $golfSIMSessions;
        foreach($clubs as $club) {
            $this->clubs[$club->getId()] = $club;
        }
        $this->config = $config;
    }

    public function getAnalyzedData() : array {
        
         /** @var GolfSimSession[] An array of GolfSimSession objects. */ 
        foreach($this->simSessions as $golfShots) {   
                 
            /** @var GolfShot[] An array of GolfShot objects. */ 
           foreach($golfShots->getShots() as $sShot){

                $club = str_replace(' ','_',strtolower($this->clubs[$sShot->getClubId()]->getType()->getName()));
                $carry_cfg = $club.'_min_carry';
                $deviation_cfg = $club.'_max_deviation_distance';

                if(isset($this->config[$carry_cfg]) && (float)$this->config[$carry_cfg] > 0) {
                    if($sShot->getCarryDistance() < (float)$this->config[$carry_cfg]) {
                        $sShot->setGoodShot(false);
                    }
                }

    
                if(isset($this->config[$deviation_cfg]) && (float)$this->config[$deviation_cfg] > 0) {
                    if($sShot->getTotalDeviationDistance() > (float)$this->config[$deviation_cfg]) {
                        $sShot->setGoodShot(false);
                    }

                    if((-1)*$sShot->getTotalDeviationDistance() > (float)$this->config[$deviation_cfg]) {
                        $sShot->setGoodShot(false);
                    }
                }
           }
        }

        return $this->simSessions;
    }
}
