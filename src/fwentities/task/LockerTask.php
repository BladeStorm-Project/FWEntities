<?php
declare(strict_types=1);

namespace fwentities\task;
use fwentities\{Main, entities\Locker};
use pocketmine\{Server, player\Player, utils\TextFormat as Color, entity\Effect, entity\EffectInstance, scheduler\Task};

class LockerTask extends Task {
    
    public $plugin;

    public function __construct(Main $plugin){
        $this->plugin = $plugin;
    }
    
    public function onRun(int $currentTick) : void {
        foreach (Server::getInstance()->getDefaultLevel()->getEntities() as $entity) {
            if ($entity instanceof Locker) {
                $entity->addEffect(new EffectInstance(Effect::getEffect(Effect::ABSORPTION), 999));
                $entity->setNameTag(self::setName());
                $entity->setNameTagAlwaysVisible(true);
                $entity->setScale(1);
            }
        }
    }

    public static function setName() : string {
        $colors = [Color::AQUA . 'Customize your player', Color::AQUA . 'Titles, Skins and more!'];
        $title = Color::GREEN . Color::BOLD . '»' . Color::RED . 'LOCKER' . Color::GREEN . '«' . "\n";
        $subtitle1 = Color::BOLD . Color::RESET . $colors[array_rand($colors)] . "\n";
        return $title . $subtitle1;
    }

}
?>
