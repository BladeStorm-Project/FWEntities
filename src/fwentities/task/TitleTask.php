<?php
declare(strict_types=1);

namespace fwentities\task;

use fwentities\{Main, entities\Title};
use pocketmine\{Server, Player, utils\TextFormat as Color, entity\Effect, entity\EffectInstance, scheduler\Task};

class TitleTask extends Task {
    public function onRun(int $currentTick) : void {
        foreach (Server::getInstance()->getDefaultLevel()->getEntities() as $entity) {
            if ($entity instanceof Title) {
                $entity->addEffect(new EffectInstance(Effect::getEffect(Effect::ABSORPTION), 999));
                $entity->setNameTag(self::setName());
                $entity->setNameTagAlwaysVisible(true);
                $entity->setScale(0);
            }
        }
    }

    public static function setName() : string {

        $colors = [Color::AQUA . 'The summer update is here!', Color::AQUA . 'NEW: SkyWars', 'TNTTag Update', 'FW Pass now online!'];
        $title = "§l§aFireworkMC §bNetwork" . "\n" . "\n";
        $subtitle1 = Color::BOLD . Color::RESET . $colors[array_rand($colors)] . "\n";
        $onlineplayers = "§aPlayers Online: " . Server::getInstance()->getOnlinePlayers();
        $subtitle2 = "§6pe.FireworkMC.net 19132";
        return $title . $subtitle1 . $onlineplayers . $subtitle2;
    }

}
?>