<?php

namespace App\DataFixtures;

use App\Entity\Module;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ModuleFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Récupérer les formations depuis la base
        $formationRepo = $manager->getRepository(\App\Entity\Formation::class);
        $dwwm = $formationRepo->findOneBy(['name' => 'Développeur Web et Web Mobile']);
        $comptable = $formationRepo->findOneBy(['name' => 'Comptable']);

        $modulesDwwm = [
            [
                'name' => 'HTML/CSS',
                'description' => 'Maîtrise des langages de balisage et de style pour la création de pages web',
                'position' => 1
            ],
            [
                'name' => 'JavaScript',
                'description' => 'Programmation côté client avec JavaScript et frameworks modernes',
                'position' => 2
            ],
            [
                'name' => 'PHP/MySQL',
                'description' => 'Développement back-end avec PHP et bases de données MySQL',
                'position' => 3
            ],
            [
                'name' => 'Symfony',
                'description' => 'Framework PHP pour le développement d\'applications web robustes',
                'position' => 4
            ],
            [
                'name' => 'React/Vue.js',
                'description' => 'Frameworks JavaScript pour le développement front-end moderne',
                'position' => 5
            ],
            [
                'name' => 'API REST',
                'description' => 'Conception et développement d\'APIs RESTful',
                'position' => 6
            ],
            [
                'name' => 'Sécurité web',
                'description' => 'Bonnes pratiques de sécurité pour les applications web',
                'position' => 7
            ],
            [
                'name' => 'Déploiement',
                'description' => 'Mise en production et gestion d\'environnements',
                'position' => 8
            ]
        ];

        foreach ($modulesDwwm as $moduleData) {
            $module = new Module();
            $module->setName($moduleData['name']);
            $module->setDescription($moduleData['description']);
            $module->setPosition($moduleData['position']);
            $module->setFormation($dwwm);
            $module->setCreatedAt(new \DateTimeImmutable());
            $module->setUpdatedAt(new \DateTimeImmutable());
            $manager->persist($module);
        }

        // Modules Comptable
        $comptable = $formationRepo->findOneBy(['name' => 'Comptable']);

        $modulesComptable = [
            [
                'name' => 'Comptabilité générale',
                'description' => 'Principes fondamentaux de la comptabilité et tenue des comptes',
                'position' => 1
            ],
            [
                'name' => 'Comptabilité analytique',
                'description' => 'Analyse des coûts et contrôle de gestion',
                'position' => 2
            ],
            [
                'name' => 'Fiscalité',
                'description' => 'Réglementation fiscale et déclarations',
                'position' => 3
            ],
            [
                'name' => 'Droit des sociétés',
                'description' => 'Aspects juridiques de la gestion d\'entreprise',
                'position' => 4
            ],
            [
                'name' => 'Logiciels comptables',
                'description' => 'Utilisation d\'outils informatiques pour la comptabilité',
                'position' => 5
            ],
            [
                'name' => 'Audit et contrôle',
                'description' => 'Techniques d\'audit et contrôle interne',
                'position' => 6
            ]
        ];

        foreach ($modulesComptable as $moduleData) {
            $module = new Module();
            $module->setName($moduleData['name']);
            $module->setDescription($moduleData['description']);
            $module->setPosition($moduleData['position']);
            $module->setFormation($comptable);
            $module->setCreatedAt(new \DateTimeImmutable());
            $module->setUpdatedAt(new \DateTimeImmutable());
            $manager->persist($module);
        }

        $manager->flush();
    }
}
