<?php

namespace App\DataFixtures\ORM\Character;

use App\DataFixtures\ORM\AbstractFixture;
use App\Entity\Character\HeroClassTemplate;
use App\Entity\Character\HeroClassTemplateAttributeValue;

/**
 * Class HercoClassTemplateFixture
 */
class HeroClassTemplateFixture extends AbstractFixture
{

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 3;
    }

    /**
     * @return array
     */
    protected function getData()
    {
        return [
            'hero-class-template-warrior' => [
                $this->getReference('hero-class-warrior'),
                $this->getReference('role-physical-offense'),
                [
                    $this->buildAttributeValue('strength', 8, 80),
                    $this->buildAttributeValue('def', 5, 50),
                    $this->buildAttributeValue('intel', 2, 50),
                    $this->buildAttributeValue('magic-atk', 2, 65),
                    $this->buildAttributeValue('magic-def', 2, 60),
                    $this->buildAttributeValue('speed', 3, 60)
                ],
            ],
            'hero-class-template-guardian' => [
                $this->getReference('hero-class-warrior'),
                $this->getReference('role-defense'),
                [
                    $this->buildAttributeValue('strength', 5, 75),
                    $this->buildAttributeValue('def', 8, 80),
                    $this->buildAttributeValue('intel', 2, 65),
                    $this->buildAttributeValue('magic-atk', 2, 65),
                    $this->buildAttributeValue('magic-def', 7, 80),
                    $this->buildAttributeValue('speed', 3, 60)
                ],
            ],
            'hero-class-template-battlemage' => [
                $this->getReference('hero-class-warrior'),
                $this->getReference('role-magical-offense'),
                [
                    $this->buildAttributeValue('strength', 5, 75),
                    $this->buildAttributeValue('def', 5, 80),
                    $this->buildAttributeValue('intel', 2, 65),
                    $this->buildAttributeValue('magic-atk', 8, 65),
                    $this->buildAttributeValue('magic-def', 6, 80),
                    $this->buildAttributeValue('speed', 3, 60)
                ],
            ],
        ];
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function buildObject(array $data)
    {
        $template = (new HeroClassTemplate())
            ->setHeroClass($data[0])
            ->setHeroRole($data[1]);

        foreach ($data[2] as $attribute) {
            $template->addAttribute($attribute->setHeroClassTemplate($template));
        }

        return $template;
    }

    /**
     * @param string $code
     * @param int $value
     *
     * @return HeroClassTemplateAttributeValue
     */
    private function buildAttributeValue($code, $value, $progression)
    {
        $attributes = [
            'strength' => $this->getReference('attribute-strength'),
            'intel' => $this->getReference('attribute-intel'),
            'def' => $this->getReference('attribute-def'),
            'magic-atk' => $this->getReference('attribute-magic-attack'),
            'magic-def' => $this->getReference('attribute-magic_def'),
            'speed' => $this->getReference('attribute-speed'),
        ];

        return (new HeroClassTemplateAttributeValue())
            ->setAttribute($attributes[$code])
            ->setValue($value)
            ->setProgressPercentage($progression)
        ;
    }
}
