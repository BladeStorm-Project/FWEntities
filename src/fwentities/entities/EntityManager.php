<?php

namespace fwentities\entities;
use fwentities\{Main, entities\Locker, entities\DustShop, entities\Booster, entities\Title};
use pocketmine\{Server, Player, utils\TextFormat as Color, level\Level, entity\Entity, math\Vector3, entity\Skin};

final class EntityManager {

    public function setTitle(Player $player) {
        $nbt = Entity::createBaseNBT(new Vector3((float)$player->getX(), (float)$player->getY(), (float)$player->getZ()));
        $nbt->setTag(clone $player->namedtag->getCompoundTag('Skin'));
        $human = new Title($player->getLevel(), $nbt);
        $human->setSkin(new Skin($player->getSkin()->getSkinId(), $player->getSkin()->getSkinData(), $player->getSkin()->getCapeData(), $player->getSkin()->getGeometryName(), $player->getSkin()->getGeometryData()));
        $human->setNameTagVisible(true);
        $human->setNameTagAlwaysVisible(true);
        $human->yaw = $player->getYaw();
        $human->pitch = $player->getPitch();
        $human->spawnToAll();
    }

    public function setLocker(Player $player) {
        $nbt = Entity::createBaseNBT(new Vector3((float)$player->getX(), (float)$player->getY(), (float)$player->getZ()));
        $nbt->setTag(clone $player->namedtag->getCompoundTag('Skin'));
        $human = new Locker($player->getLevel(), $nbt);
        $human->setSkin(new Skin($player->getSkin()->getSkinId(), $player->getSkin()->getSkinData(), $player->getSkin()->getCapeData(), $player->getSkin()->getGeometryName(), $player->getSkin()->getGeometryData()));
        $human->setNameTagVisible(true);
        $human->setNameTagAlwaysVisible(true);
        $human->yaw = $player->getYaw();
        $human->pitch = $player->getPitch();
        $human->spawnToAll();
    }

    public function setDustShop(Player $player) {
        $nbt = Entity::createBaseNBT(new Vector3((float)$player->getX(), (float)$player->getY(), (float)$player->getZ()));
        $nbt->setTag(clone $player->namedtag->getCompoundTag('Skin'));
        $human = new DustShop($player->getLevel(), $nbt);
        $human->setSkin(new Skin($player->getSkin()->getSkinId(), $player->getSkin()->getSkinData(), $player->getSkin()->getCapeData(), $player->getSkin()->getGeometryName(), $player->getSkin()->getGeometryData()));
        $human->setNameTagVisible(true);
        $human->setNameTagAlwaysVisible(true);
        $human->yaw = $player->getYaw();
        $human->pitch = $player->getPitch();
        $human->spawnToAll();
    }

    public function setBooster(Player $player) {
        $nbt = Entity::createBaseNBT(new Vector3((float)$player->getX(), (float)$player->getY(), (float)$player->getZ()));
        $nbt->setTag(clone $player->namedtag->getCompoundTag('Skin'));
        $human = new Booster($player->getLevel(), $nbt);
        $human->setSkin(new Skin($player->getSkin()->getSkinId(), $player->getSkin()->getSkinData(), $player->getSkin()->getCapeData(), $player->getSkin()->getGeometryName(), $player->getSkin()->getGeometryData()));
        $human->setNameTagVisible(true);
        $human->setNameTagAlwaysVisible(true);
        $human->yaw = $player->getYaw();
        $human->pitch = $player->getPitch();
        $human->spawnToAll();
    }
}
