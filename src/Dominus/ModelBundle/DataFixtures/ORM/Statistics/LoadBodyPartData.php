<?php

namespace Dominus\ModelBundle\DataFixtures\Statistics;

use Dominus\ModelBundle\DataFixtures\ORM\AbstractFixture;
use Dominus\ModelBundle\Entity\Statistics\BodyPart;

/**
 * Class LoadBodyPartData
 */
class LoadBodyPartData extends AbstractFixture
{

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }

    /**
     * @return array
     */
    protected function getData()
    {
        return [
            'body-part-head' => [1, 'Tête', BodyPart::HEAD],
            'body-part-arms' => [2, 'Bras', BodyPart::ARMS],
            'body-part-body' => [3, 'Plastron', BodyPart::BODY],
            'body-part-legs' => [4, 'Jambes', BodyPart::LEGS],
            'body-part-foot' => [5, 'Pieds', BodyPart::FOOT],
            'body-part-right-hand' => [6, "Main droite", BodyPart::RIGHT_HAHD],
            'body-part-left-hand' => [7, "Main gauche", BodyPart::LEFT_HAND],
        ];
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function buildObject(array $data)
    {
        $bodyPart = (new BodyPart())
            ->setId($data[0])
            ->setName($data[1])
            ->setCode($data[2]);

        return $bodyPart;
    }
}
