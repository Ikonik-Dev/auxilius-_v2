<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DesignSystemController extends AbstractController
{
    #[Route('/design-system', name: 'app_design_system', methods: ['GET'])]
    public function index(): Response
    {
        // Données de démonstration pour les composants
        $stats = [
            [
                'title' => 'Total des stagiaires',
                'value' => '1,234',
                'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z',
                'trend' => ['value' => '+12%', 'type' => 'positive']
            ],
            [
                'title' => 'Formations actives',
                'value' => '24',
                'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                'trend' => ['value' => '+3', 'type' => 'positive']
            ],
            [
                'title' => 'Taux de réussite',
                'value' => '94.2%',
                'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                'trend' => ['value' => '+2.1%', 'type' => 'positive']
            ],
            [
                'title' => 'Sessions planifiées',
                'value' => '18',
                'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z',
                'trend' => ['value' => '+5', 'type' => 'positive']
            ]
        ];

        $formations = [
            [
                'id' => 1,
                'name' => 'Développeur Web et Web Mobile',
                'description' => 'Formation complète pour devenir développeur full-stack avec les technologies modernes du web.',
                'category' => 'qualifiant',
                'duration' => 1200,
                'maxStudents' => 15,
                'level' => 'Avancé',
                'certification' => 'Titre professionnel RNCP'
            ],
            [
                'id' => 2,
                'name' => 'Gestionnaire de Paie',
                'description' => 'Maîtrisez la gestion de la paie et le droit social pour devenir expert en ressources humaines.',
                'category' => 'qualifiant',
                'duration' => 800,
                'maxStudents' => 12,
                'level' => 'Intermédiaire',
                'certification' => 'Titre professionnel RNCP'
            ],
            [
                'id' => 3,
                'name' => 'Savoirs de Base (SA)',
                'description' => 'Remise à niveau en français, mathématiques et compétences numériques de base.',
                'category' => 'pré-qualifiant',
                'duration' => 400,
                'maxStudents' => 20,
                'level' => 'Débutant',
                'certification' => 'Attestation de formation'
            ]
        ];

        $notifications = [
            ['message' => 'Nouvelle inscription de Marie Dubois en DWWM', 'type' => 'info', 'time' => '2 min'],
            ['message' => 'Session Gestionnaire de Paie complète', 'type' => 'success', 'time' => '15 min'],
            ['message' => 'Attention: Planning modifié pour demain', 'type' => 'warning', 'time' => '1h'],
            ['message' => 'Problème technique résolu sur la plateforme', 'type' => 'success', 'time' => '2h']
        ];

        $users = [
            [
                'id' => 1,
                'name' => 'Jean Dupont',
                'email' => 'jean.dupont@email.com',
                'role' => 'Formateur',
                'formation' => 'DWWM',
                'status' => 'active',
                'avatar' => null
            ],
            [
                'id' => 2,
                'name' => 'Marie Martin',
                'email' => 'marie.martin@email.com',
                'role' => 'Stagiaire',
                'formation' => 'Gestionnaire de Paie',
                'status' => 'active',
                'avatar' => null
            ],
            [
                'id' => 3,
                'name' => 'Pierre Bernard',
                'email' => 'pierre.bernard@email.com',
                'role' => 'Responsable',
                'formation' => 'Toutes',
                'status' => 'active',
                'avatar' => null
            ]
        ];

        return $this->render('design_system/showcase.html.twig', [
            'stats' => $stats,
            'formations' => $formations,
            'notifications' => $notifications,
            'users' => $users
        ]);
    }
}
