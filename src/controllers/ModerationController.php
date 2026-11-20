<?php

declare(strict_types=1);

namespace App\Controller;

final class ModerationController extends AppController
{
    public function index(): void
    {
        $this->requireModerator();

        $this->render('moderation', [
            'pageTitle' => 'Centrum weryfikacji i moderacji',
            'activePage' => 'moderation',
        ]);
    }
}
