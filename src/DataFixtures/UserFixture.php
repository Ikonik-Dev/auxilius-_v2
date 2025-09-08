<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixture extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // Administrateur
        $admin = new User();
        $admin->setEmail('admin@auxilius.com');
        $admin->setRoles(['ROLE_DEVELOPPEUR']);
        $admin->setPseudo('Admin');
        $admin->setPassword($this->passwordHasher->hashPassword($admin, 'admin123'));
        $admin->setIsActive(true);
        $admin->setCreatedAt(new \DateTimeImmutable());
        $admin->setUpdatedAt(new \DateTimeImmutable());
        $manager->persist($admin);

        // Directeur
        $directeur = new User();
        $directeur->setEmail('directeur@auxilius.com');
        $directeur->setRoles(['ROLE_DIRECTEUR']);
        $directeur->setPseudo('Directeur');
        $directeur->setPassword($this->passwordHasher->hashPassword($directeur, 'directeur123'));
        $directeur->setIsActive(true);
        $directeur->setCreatedAt(new \DateTimeImmutable());
        $directeur->setUpdatedAt(new \DateTimeImmutable());
        $manager->persist($directeur);

        // Responsable pédagogique
        $responsable = new User();
        $responsable->setEmail('responsable@auxilius.com');
        $responsable->setRoles(['ROLE_RESPONSABLE']);
        $responsable->setPseudo('Responsable');
        $responsable->setPassword($this->passwordHasher->hashPassword($responsable, 'responsable123'));
        $responsable->setIsActive(true);
        $responsable->setCreatedAt(new \DateTimeImmutable());
        $responsable->setUpdatedAt(new \DateTimeImmutable());
        $manager->persist($responsable);

        // Formateurs - Scientifiques célèbres
        $formateurs = [
            ['email' => 'isaac.newton@auxilius.com', 'pseudo' => 'Isaac Newton', 'password' => 'newton123'],
            ['email' => 'albert.einstein@auxilius.com', 'pseudo' => 'Albert Einstein', 'password' => 'einstein123'],
            ['email' => 'marie.curie@auxilius.com', 'pseudo' => 'Marie Curie', 'password' => 'curie123'],
            ['email' => 'nikola.tesla@auxilius.com', 'pseudo' => 'Nikola Tesla', 'password' => 'tesla123'],
            ['email' => 'ada.lovelace@auxilius.com', 'pseudo' => 'Ada Lovelace', 'password' => 'lovelace123'],
        ];

        foreach ($formateurs as $data) {
            $formateur = new User();
            $formateur->setEmail($data['email']);
            $formateur->setRoles(['ROLE_FORMATEUR']);
            $formateur->setPseudo($data['pseudo']);
            $formateur->setPassword($this->passwordHasher->hashPassword($formateur, $data['password']));
            $formateur->setIsActive(true);
            $formateur->setCreatedAt(new \DateTimeImmutable());
            $formateur->setUpdatedAt(new \DateTimeImmutable());
            $manager->persist($formateur);
        }

        // Stagiaires - Scientifiques célèbres
        $stagiaires = [
            ['email' => 'charles.darwin@auxilius.com', 'pseudo' => 'Charles Darwin', 'password' => 'darwin123'],
            ['email' => 'galileo.galilei@auxilius.com', 'pseudo' => 'Galileo Galilei', 'password' => 'galileo123'],
            ['email' => 'stephen.hawking@auxilius.com', 'pseudo' => 'Stephen Hawking', 'password' => 'hawking123'],
            ['email' => 'richard.feynman@auxilius.com', 'pseudo' => 'Richard Feynman', 'password' => 'feynman123'],
            ['email' => 'neil.degrasse.tyson@auxilius.com', 'pseudo' => 'Neil deGrasse Tyson', 'password' => 'tyson123'],
            ['email' => 'carl.sagan@auxilius.com', 'pseudo' => 'Carl Sagan', 'password' => 'sagan123'],
            ['email' => 'leonardo.da.vinci@auxilius.com', 'pseudo' => 'Leonardo da Vinci', 'password' => 'davinci123'],
            ['email' => 'thomas.edison@auxilius.com', 'pseudo' => 'Thomas Edison', 'password' => 'edison123'],
        ];

        foreach ($stagiaires as $data) {
            $stagiaire = new User();
            $stagiaire->setEmail($data['email']);
            $stagiaire->setRoles(['ROLE_STAGIAIRE']);
            $stagiaire->setPseudo($data['pseudo']);
            $stagiaire->setPassword($this->passwordHasher->hashPassword($stagiaire, $data['password']));
            $stagiaire->setIsActive(true);
            $stagiaire->setCreatedAt(new \DateTimeImmutable());
            $stagiaire->setUpdatedAt(new \DateTimeImmutable());
            $manager->persist($stagiaire);
        }

        $manager->flush();
    }
}
