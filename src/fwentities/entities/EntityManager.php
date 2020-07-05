<?php

namespace fwentities\entities;
use fwentities\{Main, entities\Locker, entities\DustShop, entities\Booster, entities\Title};
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

    public function setTitle(Player $player) {
        $nbt = Entity::createBaseNBT(new Vector3((float)$player->getX(), (float)$player->getY(), (float)$player->getZ()));
        $nbt->setTag(clone $player->namedtag->getCompoundTag('Skin'));
        $human = new Title($player->getLevel(), $nbt);
        $this->setSkins($human, 'Title');
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
        $this->setSkins($human, 'Locker');
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
        $this->setSkins($human, 'DustShop');
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
        $this->setSkins($human, 'Booster');
        $human->setNameTagVisible(true);
        $human->setNameTagAlwaysVisible(true);
        $human->yaw = $player->getYaw();
        $human->pitch = $player->getPitch();
        $human->spawnToAll();
    }
}
