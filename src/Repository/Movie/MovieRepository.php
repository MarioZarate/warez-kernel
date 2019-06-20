<?php


namespace App\Repository\Movie;


use Doctrine\ORM\EntityRepository;

class MovieRepository extends EntityRepository
{
    private function toArray(object $obj): array
    {
        return [
            'id' => $obj->getId(),
            'country_id' => $obj->getCountryId(),
            'title' => $obj->getTitle(),
            'title_original' => $obj->getTitleOriginal(),
            'slug' => $obj->getSlug(),
            'cover' => $obj->getCover(),
            'release_year' => $obj->getReleaseDate()->format('Y'),
            'trailer' => $obj->getTrailer(),
            'restriction' => $obj->getRestriction(),
            'synopsis' => $obj->getSynopsis(),
            'duration' => $obj->getDuration(),
            'is_approved' => (bool)$obj->getIsApproved(),
            'status' => $obj->getStatus() === "" ? 'regular' : $obj->getStatus(),
            'status_date' => (bool)$obj->getStatusDate() === true ? $obj->getStatusDate()->format('Y-m-d') : null,
            'reorder_status' => $obj->getReorderStatus(),
            'created_date' => $obj->getCreatedDate()->format('Y-m-d H:i:s'),
            'updated_date' => !$obj->getUpdatedDate() ? null : $obj->getUpdatedDate()->format('Y-m-d H:i:s'),
            'alternative_titles' => $obj->getAlternativeTitlesFormatArrayWithTitle(),
            'genres' => $obj->getGenresFormatArrayWithId(),
            'cast' => $obj->getCastsFormatArrayWithIdActorIdNamePhoto(),
            'galleries' => $obj->getGalleriesFormArrayWithIdPhoto()
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
