<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Auth\Login as BasePage;

class Login extends BasePage
{
    public function mount(): void
    {
        parent::mount();

        $this->form->fill([
            'email' => 'devfaysal@gmail.com',
            'password' => 'password',
            'remember' => true,
        ]);
    }
}
