<?php

namespace App\Filament\Pages\Register;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Auth\EditProfile as BaseEditProfile;
use Filament\Pages\Auth\Register as AuthRegister;

class Register extends AuthRegister
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getNameFormComponent(),
                $this->getEmailFormComponent(),
                TextInput::make('tel')
                    ->label('Telefone')
                    ->prefix('+55')
                    ->autocomplete('tel')
                    ->required()
                    ->maxLength(11),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
            ]);
    }
}
