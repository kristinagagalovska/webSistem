<?php
/**
 * Created by PhpStorm.
 * User: kristina
 * Date: 01.06.2016
 * Time: 00:14
 */

namespace App\Handlers\Commands;


use App\Commands\UpdateAdvertisementCommand;
use App\Repositories\AdvertisementsRepositoryInterface;

class UpdateAdvertisementCommandHandler
{
    public function __construct(AdvertisementsRepositoryInterface $advertisements)
    {
        $this->advertisements = $advertisements;
    }

    public function handle(UpdateAdvertisementCommand $command)
    {
        $advertisement = $this->advertisements->find($command->getId());
        $advertisement->setTitle($command->getTitle());
        $advertisement->setDescription($command->getDescription());
        $advertisement->setType($command->getType());
        $advertisement->setCategory($command->getCategory());
        $advertisement->setAddress($command->getAddress());
        $advertisement->setTown($command->getTown());
        $advertisement->setPrice($command->getPrice());
        $advertisement->setGarage($command->getGarage());
        $advertisement->setRenovated($command->isRenovated());
        $advertisement->setNew($command->isNew());
        $advertisement->setNamesten($command->isNamesten());

        $this->advertisements->store($advertisement);
    }

}