<?php
declare(strict_types=1);

namespace fwentities\task;
use fwentities\{Main, entities\Quake};
use pocketmine\{Server, player\Player, utils\TextFormat as Color, entity\Effect, entity\EffectInstance, scheduler\Task};

class QuakeTask extends Task
{

    public $plugin;

    public function __construct(Main $plugin)
    {
        $this->plugin = $plugin;

    }

    public function onRun(int $currentTick): void
    {
        foreach (Server::getInstance()->getDefaultLevel()->getEntities() as $entity) {
            if ($entity instanceof Quake) {
                $entity->addEffect(new EffectInstance(Effect::getEffect(Effect::FATAL_POISON), 999));
                $entity->setNameTag(self::setName());
                $entity->setNameTagAlwaysVisible(true);
                $entity->setScale(1);
            }
        }
    }

    public function setName() : string {
        $colors = [Color::AQUA . '§lFWMC ORIGINAL', Color::AQUA . 'Shoot them all!'];
        $title = Color::GREEN . Color::BOLD . '»' . Color::GRAY . '§6COMING SOON' . Color::GREEN . '«' . "\n";
        $subtitle1 = Color::BOLD . Color::GOLD . 'Quake ' . Color::RESET . $colors[array_rand($colors)] . "\n";
        $subtitle2 = Color::GREEN . '§cOffline';
        return $title . $subtitle1 . $subtitle2;
    }
}