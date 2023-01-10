<?php
declare(strict_types=1);

namespace fwentities\task;
use fwentities\{Main, entities\DustShop};
use pocketmine\{Server, player\Player, utils\TextFormat as Color, entity\Effect, entity\EffectInstance, scheduler\Task};

class DustShopTask extends Task {
    
    public $plugin;

    public function __construct(Main $plugin){
        $this->plugin = $plugin;
    }
    
    public function onRun(int $currentTick) : void {
        foreach (Server::getInstance()->getDefaultLevel()->getEntities() as $entity) {
            if ($entity instanceof DustShop) {
                $entity->addEffect(new EffectInstance(Effect::getEffect(Effect::ABSORPTION), 999));
                $entity->setNameTag(self::setName());
                $entity->setNameTagAlwaysVisible(true);
                $entity->setScale(1);
            }
        }
    }

    public static function setName() : string {
        $colors = [Color::AQUA . 'Buy cosmetics', Color::AQUA . 'New shop every season!'];
        $title = Color::GREEN . Color::BOLD . '»' . Color::GOLD . 'IN-GAME SHOP' . Color::GREEN . '«' . "\n";
        $subtitle1 = Color::BOLD . Color::RESET . $colors[array_rand($colors)] . "\n";
        return $title . $subtitle1;
    }

}
?>
