<?php
namespace R10Analyzer;

class GolfSimSession implements GolfData {

    private GolfSessionSummary $summary;

    private array $shots;

    public function __construct(\stdClass $data) {
        $this->summary = new GolfSessionSummary($data->summary);
        if (!empty($data->shots)) {
            $this->shots = $this->loadShots($data->shots);
        }
    }

    protected function loadShots(array $shots) : array {
        $rshots = [];
        //walk over all shots in the session
        foreach($shots as $shot) {
               $rshots[] = new GolfShot($shot); 
        }
        return $rshots;
    }


    public static function initialize(\stdClass $data) : GolfData {
        return new GolfSimSession($data);
    }
    
}