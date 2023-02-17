<?php 
namespace R10Analyzer;

interface GolfData {
    public static function initialize(\stdClass $data) : GolfData;
}