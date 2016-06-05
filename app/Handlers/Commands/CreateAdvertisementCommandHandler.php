<?php

namespace App\Handlers\Commands;

use App\Advertisement;
use App\Commands\CreateAdvertisementCommand;
use App\Repositories\AdvertisementsRepositoryInterface;

class CreateAdvertisementCommandHandler
{
    public function __construct(AdvertisementsRepositoryInterface $advertisements)
    {
        $this->advertisements = $advertisements;
    }

    public function handle(CreateAdvertisementCommand $command)
    {
        $advertisement = new Advertisement();
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
        $advertisement->setAuthorId($command->getAuthorId());
        
        $this->advertisements->store($advertisement);
    }

}