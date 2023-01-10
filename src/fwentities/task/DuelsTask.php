<?php
declare(strict_types=1);

namespace fwentities\task;

use fwentities\{Main, entities\Duels};
use pocketmine\{Server, player\Player, utils\TextFormat as Color, entity\Effect, entity\EffectInstance, scheduler\Task};

class DuelsTask extends Task {

    public $plugin;

    public function __construct(Main $plugin){
        $this->plugin = $plugin;
    }

    public function onRun(int $currentTick) : void {
        foreach (Server::getInstance()->getDefaultLevel()->getEntities() as $entity) {
            if ($entity instanceof Duels) {
                $entity->addEffect(new EffectInstance(Effect::getEffect(Effect::CONDUIT_POWER), 999));
                $entity->setNameTag(self::setName());
                $entity->setNameTagAlwaysVisible(true);
                $entity->setScale(1.3);
            }
        }
    }

    public static function setName() : string {

        $colors = [Color::AQUA . '§cComing soon §7» ', Color::AQUA . '§dFireworkMC Unique', '§cHighly competitive...'];
        $title = "§l§c???" . "\n" . "\n";
        $subtitle1 = Color::BOLD . Color::RESET . $colors[array_rand($colors)] . "\n";
        return $title . $subtitle1;
    }

}
?>