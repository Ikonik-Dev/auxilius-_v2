<?php

namespace App\DataFixtures;

use App\Entity\Formation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FormationFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Formation DWWM (Développeur Web et Web Mobile)
        $dwwm = new Formation();
        $dwwm->setName('Développeur Web et Web Mobile');
        $dwwm->setDescription('Formation complète pour devenir développeur web full-stack, maîtrisant les technologies front-end et back-end.');
        $dwwm->setCategory('Qualifiant');
        $dwwm->setDuration(910); // heures
        $dwwm->setMaxStudents(15);
        $dwwm->setObjectives('Maîtriser le développement d\'applications web modernes, comprendre les architectures client-serveur, et développer des compétences en programmation.');
        $dwwm->setCreatedAt(new \DateTimeImmutable());
        $dwwm->setUpdatedAt(new \DateTimeImmutable());
        $manager->persist($dwwm);

        // Formation Comptable
        $comptable = new Formation();
        $comptable->setName('Comptable');
        $comptable->setDescription('Formation spécialisée en comptabilité, gestion financière et fiscalité pour les entreprises.');
        $comptable->setCategory('Qualifiant');
        $comptable->setDuration(700); // heures
        $comptable->setMaxStudents(20);
        $comptable->setObjectives('Acquérir les compétences nécessaires pour gérer la comptabilité d\'une entreprise, établir des bilans et déclarations fiscales.');
        $comptable->setCreatedAt(new \DateTimeImmutable());
        $comptable->setUpdatedAt(new \DateTimeImmutable());
        $manager->persist($comptable);

        // Formation Pré-qualifiante EAA
        $eaa = new Formation();
        $eaa->setName('Élaboration d\'un projet professionnel');
        $eaa->setDescription('Formation pré-qualifiante pour l\'élaboration et la mise en œuvre d\'un projet professionnel.');
        $eaa->setCategory('Pré-qualifiant');
        $eaa->setDuration(200); // heures
        $eaa->setMaxStudents(25);
        $eaa->setObjectives('Développer les compétences pour élaborer un projet professionnel cohérent et réalisable.');
        $eaa->setCreatedAt(new \DateTimeImmutable());
        $eaa->setUpdatedAt(new \DateTimeImmutable());
        $manager->persist($eaa);

        // Formation Pré-qualifiante SA
        $sa = new Formation();
        $sa->setName('Savoirs de base');
        $sa->setDescription('Formation pré-qualifiante pour renforcer les savoirs fondamentaux en français, mathématiques et anglais.');
        $sa->setCategory('Pré-qualifiant');
        $sa->setDuration(300); // heures
        $sa->setMaxStudents(20);
        $sa->setObjectives('Consolider les bases en français, mathématiques et anglais pour réussir dans une formation qualifiante.');
        $sa->setCreatedAt(new \DateTimeImmutable());
        $sa->setUpdatedAt(new \DateTimeImmutable());
        $manager->persist($sa);

        // Formation Gestionnaire de paie
        $paie = new Formation();
        $paie->setName('Gestionnaire de paie');
        $paie->setDescription('Formation spécialisée dans la gestion de la paie et des ressources humaines.');
        $paie->setCategory('Qualifiant');
        $paie->setDuration(600); // heures
        $paie->setMaxStudents(18);
        $paie->setObjectives('Maîtriser les techniques de calcul de paie, les réglementations sociales et la gestion administrative du personnel.');
        $paie->setCreatedAt(new \DateTimeImmutable());
        $paie->setUpdatedAt(new \DateTimeImmutable());
        $manager->persist($paie);

        $manager->flush();
    }
}
