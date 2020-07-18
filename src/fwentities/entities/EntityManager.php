<?php

/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 04/07/2020
 * Time: 18:24
 */

namespace fwentities\entities;
use fwentities\{Main, entities\Locker, entities\DustShop, entities\Booster, entities\Duels};
use pocketmine\{Server, Player, utils\TextFormat as Color, level\Level, entity\Entity, math\Vector3, entity\Skin};

final class EntityManager {

    public function setSkins($player, string $value) {
        $dir = Main::getInstance()->getDataFolder() . $value . '.png';
        $load = @imagecreatefrompng($dir);
        $skinbytes = '';
        $values = (int)@getimagesize($dir)[1];
        for($y = 0; $y < $values; $y++) {
            for($x = 0; $x < 64; $x++) {
                $bytes = @imagecolorat($load, $x, $y);
                $a = ((~((int)($bytes >> 24))) << 1) & 0xff;
                $b = ($bytes >> 16) & 0xff;
                $c = ($bytes >> 8) & 0xff;
                $d = $bytes & 0xff;
                $skinbytes .= chr($b) . chr($c) . chr($d) . chr($a);
            }
        }
        @imagedestroy($load);
        $player->setSkin(new Skin($player->getSkin()->getSkinId(), $skinbytes, '', 'geometry.' . $value,file_get_contents(Main::getInstance()->getDataFolder() . $value. '.json')));
        $player->sendSkin();
    }

    public function setDuels(Player $player) {
        $nbt = Entity::createBaseNBT(new Vector3((float)$player->getX(), (float)$player->getY(), (float)$player->getZ()));
        $nbt->setTag(clone $player->namedtag->getCompoundTag('Skin'));
        $human = new Duels($player->getLevel(), $nbt);
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

    public function setDab(Player $player) {
        $nbt = Entity::createBaseNBT(new Vector3((float)$player->getX(), (float)$player->getY(), (float)$player->getZ()));
        $nbt->setTag(clone $player->namedtag->getCompoundTag('Skin'));
        $human = new Dab($player->getLevel(), $nbt);
        $human->setSkin(new Skin($player->getSkin()->getSkinId(), $player->getSkin()->getSkinData(), $player->getSkin()->getCapeData(), "geometry.humanoid.custom", file_get_contents(Main::getInstance()->getDataFolder() . 'dab.json')));
        $human->setNameTagVisible(true);
        $human->setNameTagAlwaysVisible(true);
        $human->yaw = $player->getYaw();
        $human->pitch = $player->getPitch();
        $human->spawnToAll();
    }

    public function setTNTTag(Player $player) {
        $nbt = Entity::createBaseNBT(new Vector3((float)$player->getX(), (float)$player->getY(), (float)$player->getZ()));
        $nbt->setTag(clone $player->namedtag->getCompoundTag('Skin'));
        $human = new TNTTag($player->getLevel(), $nbt);
        $human->setSkin(new Skin($player->getSkin()->getSkinId(), $player->getSkin()->getSkinData(), $player->getSkin()->getCapeData(), $player->getSkin()->getGeometryName(), $player->getSkin()->getGeometryData()));
        $human->setNameTagVisible(true);
        $human->setNameTagAlwaysVisible(true);
        $human->yaw = $player->getYaw();
        $human->pitch = $player->getPitch();
        $human->spawnToAll();
    }

    public function setDragons(Player $player) {
        $nbt = Entity::createBaseNBT(new Vector3((float)$player->getX(), (float)$player->getY(), (float)$player->getZ()));
        $nbt->setTag(clone $player->namedtag->getCompoundTag('Skin'));
        $human = new Dragons($player->getLevel(), $nbt);
        $human->setSkin(new Skin($player->getSkin()->getSkinId(), $player->getSkin()->getSkinData(), $player->getSkin()->getCapeData(), $player->getSkin()->getGeometryName(), $player->getSkin()->getGeometryData()));
        $human->setNameTagVisible(true);
        $human->setNameTagAlwaysVisible(true);
        $human->yaw = $player->getYaw();
        $human->pitch = $player->getPitch();
        $human->spawnToAll();
    }

    public function setQuake(Player $player) {
        $nbt = Entity::createBaseNBT(new Vector3((float)$player->getX(), (float)$player->getY(), (float)$player->getZ()));
        $nbt->setTag(clone $player->namedtag->getCompoundTag('Skin'));
        $human = new Quake($player->getLevel(), $nbt);
        $human->setSkin(new Skin($player->getSkin()->getSkinId(), $player->getSkin()->getSkinData(), $player->getSkin()->getCapeData(), $player->getSkin()->getGeometryName(), $player->getSkin()->getGeometryData()));
        $human->setNameTagVisible(true);
        $human->setNameTagAlwaysVisible(true);
        $human->yaw = $player->getYaw();
        $human->pitch = $player->getPitch();
        $human->spawnToAll();
    }
}