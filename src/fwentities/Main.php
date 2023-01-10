<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 05/07/2020
 * Time: 10:42
 */

namespace fwentities;

use fwentities\entities\Dragons;
use fwentities\entities\Quake;
use fwentities\entities\TNTTag;
use fwentities\task\DragonsTask;
use fwentities\task\QuakeTask;
use fwentities\task\TNTTagTask;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\entity\{EntityDamageEvent, EntityDamageByEntityEvent};
use pocketmine\player\Player;
use fwentities\entities\EntityManager;
use fwentities\entities\Duels;
use fwentities\entities\Locker;
use fwentities\entities\DustShop;
use fwentities\entities\Booster;
use fwentities\entities\Dab;
use fwentities\task\DuelsTask;
use fwentities\task\LockerTask;
use fwentities\task\DustShopTask;
use fwentities\task\BoosterTask;
use pocketmine\entity\Entity;
use libpmquery\PMQuery;
use libpmquery\PmQueryException;

class Main extends PluginBase implements Listener{

    public static $instance;

    public function onLoad() : void {
        self::$instance = $this;
    }

    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("§aFWEntities enabled");
        $this->loadEntitys();
        $this->getScheduler()->scheduleRepeatingTask(new DuelsTask($this), 20);
        $this->getScheduler()->scheduleRepeatingTask(new LockerTask($this), 20);
        $this->getScheduler()->scheduleRepeatingTask(new DustShopTask($this), 20);
        $this->getScheduler()->scheduleRepeatingTask(new BoosterTask($this), 20);
        $this->getScheduler()->scheduleRepeatingTask(new DragonsTask($this), 20);
        $this->getScheduler()->scheduleRepeatingTask(new QuakeTask($this), 20);
        $this->getScheduler()->scheduleRepeatingTask(new TNTTagTask($this), 20);
    }

    public static function getInstance() : self {
        return self::$instance;
    }

    public function onCommand(CommandSender $sender, Command $cmd, String $label, array $args): bool{
        switch($cmd->getName()){
            case "fwentity":
                if($sender instanceof Player) {
                    if($sender->hasPermission("fwentities.use")){
                        if($args[0]=="duels"){
                            $entity = new EntityManager();
                            $entity->setDuels($sender);
                            $sender->sendMessage("§l§cFWMC§r§7: §aSpawned Entity");
                            return true;
                        }

                        if($args[0]=="locker"){
                            $entity = new EntityManager();
                            $entity->setLocker($sender);
                            $sender->sendMessage("§l§cFWMC§r§7: §aSpawned Entity");
                            return true;
                        }

                        if($args[0]=="dustshop"){
                            $entity = new EntityManager();
                            $entity->setDustShop($sender);
                            $sender->sendMessage("§l§cFWMC§r§7: §aSpawned Entity");
                            return true;
                        }

                        if($args[0]=="booster"){
                            $entity = new EntityManager();
                            $entity->setBooster($sender);
                            $sender->sendMessage("§l§cFWMC§r§7: §aSpawned Entity");
                            return true;
                        }

                        if($args[0]=="dab"){
                            $entity = new EntityManager();
                            $entity->setDab($sender);
                            $sender->sendMessage("§l§cFWMC§r§7: §aSpawned Entity");
                            return true;
                        }

                        if($args[0]=="tnttag"){
                            $entity = new EntityManager();
                            $entity->setTNTTag($sender);
                            $sender->sendMessage("§l§cFWMC§r§7: §aSpawned Entity");
                            return true;
                        }

                        if($args[0]=="dragons"){
                            $entity = new EntityManager();
                            $entity->setDragons($sender);
                            $sender->sendMessage("§l§cFWMC§r§7: §aSpawned Entity");
                            return true;
                        }

                        if($args[0]=="quake"){
                            $entity = new EntityManager();
                            $entity->setQuake($sender);
                            $sender->sendMessage("§l§cFWMC§r§7: §aSpawned Entity");
                            return true;
                        }

                        if($args[0]=="remove" && $args[1]=="tnttag") {
                            foreach ($sender->getLevel()->getEntities() as $entity) {
                                if ($entity instanceof TNTTag) {
                                    $entity->kill();
                                    $sender->sendMessage("§l§cFWMC§r§7: §aRemoved Entity");
                                }
                            }
                        }

                        if($args[0]=="remove" && $args[1]=="dragons") {
                            foreach ($sender->getLevel()->getEntities() as $entity) {
                                if ($entity instanceof Dragons) {
                                    $entity->kill();
                                    $sender->sendMessage("§l§cFWMC§r§7: §aRemoved Entity");
                                }
                            }
                        }

                        if($args[0]=="remove" && $args[1]=="quake") {
                            foreach ($sender->getLevel()->getEntities() as $entity) {
                                if ($entity instanceof Quake) {
                                    $entity->kill();
                                    $sender->sendMessage("§l§cFWMC§r§7: §aRemoved Entity");
                                }
                            }
                        }

                        if($args[0]=="remove" && $args[1]=="dab") {
                            foreach ($sender->getLevel()->getEntities() as $entity) {
                                if ($entity instanceof Dab) {
                                    $entity->kill();
                                    $sender->sendMessage("§l§cFWMC§r§7: §aRemoved Entity");
                                }
                            }
                        }

                        if($args[0]=="remove" && $args[1]=="duels") {
                            foreach ($sender->getLevel()->getEntities() as $entity) {
                                if ($entity instanceof Duels) {
                                    $entity->kill();
                                    $sender->sendMessage("§l§cFWMC§r§7: §aRemoved Entity");
                                }
                            }
                        }

                        if($args[0]=="remove" && $args[1]=="locker") {
                            foreach ($sender->getLevel()->getEntities() as $entity) {
                                if ($entity instanceof Locker) {
                                    $entity->kill();
                                    $sender->sendMessage("§l§cFWMC§r§7: §aRemoved Entity");
                                }
                            }
                        }

                        if($args[0]=="remove" && $args[1]=="dustshop") {
                            foreach ($sender->getLevel()->getEntities() as $entity) {
                                if ($entity instanceof DustShop) {
                                    $entity->kill();
                                }
                            }
                        }

                        if($args[0]=="remove" && $args[1]=="booster") {
                            foreach ($sender->getLevel()->getEntities() as $entity) {
                                if ($entity instanceof Booster) {
                                    $entity->kill();
                                    $sender->sendMessage("§l§cFWMC§r§7: §aRemoved Entity");
                                }
                            }
                        }

                        if($args[0]=== null){
                            $sender->sendMessage("§l§cFWMC§r§7: §aArgument not specified");
                            return true;
                        }


                    }else{
                        $sender->sendMessage("§l§cFWMC§r§7: §4No permission to use this command.");
                    }
                }
        }
        return true;
    }

    public function loadEntitys() : void {
        $values = [Duels::class, Locker::class, DustShop::class, Booster::class, Dragons::class, TNTTag::class, Quake::class];
        foreach ($values as $entitys) {
            Entity::registerEntity($entitys, true);
        }
        unset ($values);
    }

    public function onDamageNPC(EntityDamageByEntityEvent $event)
    {
        $npc = $event->getEntity();
        $player = $event->getDamager();
        if($npc instanceof Duels){
            $event->setCancelled(true);
            if($player instanceof Player) {
                $player->sendMessage("§6Coming soon");
            }
        }

        if($npc instanceof Locker){

            $event->setCancelled(true);
            if($player instanceof Player) {
                $this->getServer()->dispatchCommand($player, "locker");
            }
        }

        if($npc instanceof Dab){

            $event->setCancelled(true);
        }

        if($npc instanceof DustShop){

            $event->setCancelled(true);
            if($player instanceof Player) {
                $this->getServer()->dispatchCommand($player, "dustshop");
            }
        }

        if($npc instanceof Booster){
            $event->setCancelled(true);
            if($player instanceof Player) {
                $this->getServer()->dispatchCommand($player, "booster");
            }
        }
    }

    public function serverPlayers($ip, $port)
    {
        try {

            $query = PMQuery::query($ip, $port);
        
            return (int) $query['Players'];

        }catch(PmQueryException $e){
            
            return "§cServer Offline";
        }

    }
}