<?php

declare(strict_types=1);

namespace App\Controller;

final class CommunityController extends AppController
{
    public function index(): void
    {
        $this->render('community', [
            'pageTitle' => 'Forum i baza wiedzy',
            'activePage' => 'community',
        ]);
    }
}
