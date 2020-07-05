<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 05/07/2020
 * Time: 10:42
 */

namespace fwentities;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\entity\{EntityDamageEvent, EntityDamageByEntityEvent};
use pocketmine\Player;
use fwentities\entities\EntityManager;
use fwentities\entities\Title;
use fwentities\entities\Locker;
use fwentities\entities\DustShop;
use fwentities\entities\Booster;
use pocketmine\entity\Entity;

class Main extends PluginBase implements Listener{

    public static $instance;

    public function onLoad() : void {
        self::$instance = $this;
    }

    public function onEnable(){
        $this->getLogger()->info("§aFWEntities enabled");
        $this->loadEntitys();
    }

    public static function getInstance() : self {
        return self::$instance;
    }

    public function onCommand(CommandSender $sender, Command $cmd, String $label, array $args): bool{
        switch($cmd->getName()){
            case "fwentities":
                if($sender instanceof Player) {
                    if($sender->hasPermission("fwentities.use")){
                        if($args[0]=="title"){
                            $entity = new EntityManager();
                            $entity->setTitle($sender);
                            return true;
                        }

                        if($args[0]=="locker"){
                            $entity = new EntityManager();
                            $entity->setLocker($sender);
                            return true;
                        }

                        if($args[0]=="dustshop"){
                            $entity = new EntityManager();
                            $entity->setDustShop($sender);
                            return true;
                        }

                        if($args[0]=="booster"){
                            $entity = new EntityManager();
                            $entity->setBooster($sender);
                            return true;
                        }

                        if($args[0]=== null){
                            $sender->sendMessage("§l§cFWMC§r§7: §aArgument not specified");
                            return true;
                        }
                    }else{
                        $sender->sendMessage("§l§cFWMC§r§7: §4No permission tu use this command.");
                    }
                }
        }
        return true;
    }

    public function loadEntitys() : void {
        $values = [Title::class, Locker::class, DustShop::class, Booster::class];
        foreach ($values as $entitys) {
            Entity::registerEntity($entitys, true);
        }
        unset ($values);
    }
    
    public function onDamageNPC(EntityDamageByEntityEvent $event)
    {
        $npc = $event->getEntity();
        $player = $event->getDamager();
        if($npc instanceof Title){
            $event->setCancelled(true);
        }

        if($npc instanceof Locker){

            $event->setCancelled(true);
            $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "locker");
        }

        if($npc instanceof DustShop){

            $event->setCancelled(true);
            $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "dustshop");
        }

        if($npc instanceof Booster){
            $event->setCancelled(true);
            $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "booster");
        }
    }   


}
