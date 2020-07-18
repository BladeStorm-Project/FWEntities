<?php



namespace fwentities;

use pocketmine\plugin\PluginBase;
use libpmquery\PMQuery;
use libpmquery\PmQueryException;

class Query extends PluginBase{

    public function getQueryServer($ip, $port)
    {
        try {
            $online = PMQuery::query($ip, $port)['Players'];
            $this->online = $online;
        }catch(PmQueryException $e){
            $offline = "Server offline";
        }
    }
}