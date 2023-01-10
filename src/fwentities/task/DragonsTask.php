<?php
declare(strict_types=1);

namespace fwentities\task;
use fwentities\{Main, entities\Dragons};
use pocketmine\{Server, player\Player, utils\TextFormat as Color, entity\Effect, entity\EffectInstance, scheduler\Task};

class DragonsTask extends Task
{

    public $plugin;

    public function __construct(Main $plugin)
    {
        $this->plugin = $plugin;

    }

    public function onRun(int $currentTick): void
    {
        foreach (Server::getInstance()->getDefaultLevel()->getEntities() as $entity) {
            if ($entity instanceof Dragons) {
                $entity->addEffect(new EffectInstance(Effect::getEffect(Effect::CONFUSION), 999));
                $entity->setNameTag(self::setName());
                $entity->setNameTagAlwaysVisible(true);
                $entity->setScale(1);
            }
        }
    }

    public function setName() : string {
        $colors = [Color::AQUA . 'New Game', Color::AQUA . 'Do not dragons kill you'];
        $title = Color::GREEN . Color::BOLD . '»' . Color::GRAY . '§9NEW GAME' . Color::GREEN . '«' . "\n";
        $subtitle1 = Color::BOLD . Color::GOLD . 'DRAGONS ' . Color::RESET . $colors[array_rand($colors)] . "\n";
        $subtitle2 = Color::GREEN . $this->plugin->serverPlayers("pe.fireworkmc.net", 19190) . ' Players';
        return $title . $subtitle1 . $subtitle2;
    }
}