# FWEntities
All FireworkMC Entities

### Usage

/fwentity (entity) -> spawn an Entity

/fwentity remove (entity) -> remove an Entity


## Creating an Entity on EntityManager:

```
    public function Example(Player $player) {
        $nbt = Entity::createBaseNBT(new Vector3((float)$player->getX(), (float)$player->getY(), (float)$player->getZ()));
        $nbt->setTag(clone $player->namedtag->getCompoundTag('Skin'));
        $human = new ExampleEntity($player->getLevel(), $nbt);
        $human->setSkin(new Skin($player->getSkin()->getSkinId(), $player->getSkin()->getSkinData(), $player->getSkin()->getCapeData(), $player->getSkin()->getGeometryName(), $player->getSkin()->getGeometryData()));
        $human->setNameTagVisible(true);
        $human->setNameTagAlwaysVisible(true);
        $human->yaw = $player->getYaw();
        $human->pitch = $player->getPitch();
        $human->spawnToAll();
    }
```

## Spawning an Entity:

```
$entity = new EntityManager();
$entity->Example(Player $player);
```
