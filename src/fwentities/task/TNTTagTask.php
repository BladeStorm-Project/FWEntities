<?php
declare(strict_types=1);

namespace fwentities\task;
use fwentities\{Main, entities\TNTTag};
use pocketmine\{Server, player\Player, utils\TextFormat as Color, entity\Effect, entity\EffectInstance, scheduler\Task};

class TNTTagTask extends Task
{

    public $plugin;

    public function __construct(Main $plugin)
    {
        $this->plugin = $plugin;

    }

    public function onRun(int $currentTick): void
    {
        foreach (Server::getInstance()->getDefaultLevel()->getEntities() as $entity) {
            if ($entity instanceof TNTTag) {
                $entity->addEffect(new EffectInstance(Effect::getEffect(Effect::ABSORPTION), 999));
                $entity->setNameTag(self::setName());
                $entity->setNameTagAlwaysVisible(true);
                $entity->setScale(1);
            }
        }
    }

    public function setName() : string {    
        $colors = [Color::AQUA . 'FWMC Classic', Color::AQUA . 'Updated!'];
        $title = Color::GREEN . Color::BOLD . '»' . Color::GRAY . 'NEW MAP §8: §9JUNGLE' . Color::GREEN . '«' . "\n";
        $subtitle1 = Color::BOLD . Color::GOLD . 'TNTTAG ' . Color::RESET . $colors[array_rand($colors)] . "\n";
        $subtitle2 = Color::GREEN . $this->plugin->serverPlayers("pe.fireworkmc.net", 19100) . ' Players';
        return $title . $subtitle1 . $subtitle2;
    }
}