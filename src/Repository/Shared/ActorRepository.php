<?php


namespace App\Repository\Shared;

use Doctrine\ORM\EntityRepository;

class ActorRepository extends EntityRepository
{
    private function toArray(object $obj): array
    {
        return [
            'id' => $obj->getId(),
            'country_id' => $obj->getCountryId(),
            'name' => $obj->getName(),
            'slug' => $obj->getSlug(),
            'biography' => $obj->getBiography(),
            'photo' => $obj->getPhoto(),
            'created_date' => !$obj->getCreatedDate() ? null : ($obj->getCreatedDate())->format("Y-m-d H:i:s"),
            'updated_date' => !$obj->getUpdatedDate() ? null : ($obj->getUpdatedDate())->format("Y-m-d H:i:s")
        ];
    }

    public function fetchOneById(string $id): ?array
    {
        $item = self::find($id);
        if (!$item)
            return null;
        return $this->toArray($item);
    }
}
