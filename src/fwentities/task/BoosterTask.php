<?php
declare(strict_types=1);

namespace fwentities\task;
use fwentities\{Main, entities\Booster};
use pocketmine\{Server, Player, utils\TextFormat as Color, entity\Effect, entity\EffectInstance, scheduler\Task};

class BoosterTask extends Task {
    public function onRun(int $currentTick) : void {
        foreach (Server::getInstance()->getDefaultLevel()->getEntities() as $entity) {
            if ($entity instanceof Booster) {
                $entity->addEffect(new EffectInstance(Effect::getEffect(Effect::ABSORPTION), 999));
                $entity->setNameTag(self::setName());
                $entity->setNameTagAlwaysVisible(true);
                $entity->setScale(1);
            }
        }
    }

    public static function setName() : string {
        $colors = [Color::AQUA . 'Network Booster', Color::AQUA . 'See more informations'];
        $title = Color::GREEN . Color::BOLD . '»' . Color::GOLD . 'BOOSTER' . Color::GREEN . '«' . "\n";
        $subtitle1 = Color::BOLD . Color::RESET . $colors[array_rand($colors)] . "\n";
        return $title . $subtitle1;
    }

}
?>