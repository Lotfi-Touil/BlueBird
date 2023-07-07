<?php

namespace App\Controllers\Front;

use App\Controllers\Controller;
use App\Core\QueryBuilder;
use App\Models\EmailActivationToken;
use App\Models\User;

class AccountController extends Controller
{
 
    public function __construct()
    {
        parent::__construct();
    }

    public function profileAction(): void
    {
        view('account/profile', 'account-settings', [
            'title' => 'Mon compte'
        ]);
    }

    public function otherAction(): void
    {
        view('account/other', 'account-settings', [
            'title' => 'Mon compte'
        ]);
    }

    public function verifyAccountAction(): void
    {
        $isAccountVerified = QueryBuilder::table('email_activation_token')
            ->select('user.id')
            ->join('user', 'user.id', '=', 'email_activation_token.id_user')
            ->where('user.email', $_SESSION['login'])
            ->WhereNotNull('verified_at')
            ->exists();

        if ($isAccountVerified) {
            redirectHome();
        }

        view('account/verify-account', 'basic', [
            'title' => 'Activer mon compte'
        ]);
    }

    public function activateAccountAction($token): void
    {
        $EAT = EmailActivationToken::where('token', $token);

        if (!$EAT) {
            $this->redirectToVerificationPage();
        }

        $this->logout();

        if ($EAT->isVerified()) {
            view('account/already-verified', 'basic', [
                'title' => 'Lien invalide.'
            ]);
        }

        $EAT->setVerifiedAt(date('Y-m-d H:i:s.u'));
        $EAT->update();

        // TODO : voir pq même déconecté, le topbar de la vue possède une image de profil.
        view('account/verified-succesfully', 'basic', [
            'title' => 'Bienvenue !'
        ]);
    }

    private function logout(): void
    {
        session_destroy();
    }

    // TODO : mettre en place un temps d'attente minimum entre 2 envois
    public function resendMailAction(): void
    {
        $user = User::where('email', $_SESSION['login']);
        EmailActivationToken::sendActivationEmail($user);

        $this->redirectToVerificationPage();
    }

    private function redirectToVerificationPage(): void
    {
        header('Location: /verify-account');
        exit();
    }
}