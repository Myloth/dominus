<?php

namespace App\DataFixtures\ORM\Crafting;

use App\DataFixtures\ORM\AbstractFixture;
use App\Entity\Crafting\Job;

/**
 * Class JobFixtures
 */
class JobFixtures extends AbstractFixture
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
            'job-forge' => [1, 'Forge', Job::JOB_FORGE],
            'job-herborism' => [2, 'Herborisme', Job::JOB_HERBORISM],
            'job-tailoring' => [3, 'Couture', Job::JOB_TAILORING],
        ];
    }

    /**
     * @param array $data
     *
     * @return Job
     */
    protected function buildObject(array $data)
    {
        $job = (new Job())
            ->setId($data[0])
            ->setName($data[1])
            ->setCode($data[2]);

        return $job;
    }
}
