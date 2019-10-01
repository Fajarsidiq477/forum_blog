<?php
namespace App\Services;
use App\Models\User;
use App\Models\SocialAccount;
use Laravel\Socialite\Contracts\User as ProviderUser;
class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser, $provider)
    {
        $account = SocialAccount::whereProvider($provider)
            ->whereProviderUserId($providerUser->getId())
            ->first();
        if ($account) {
            return $account->user;
        } else {
            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $provider
            ]);
            $user = User::whereEmail($providerUser->getEmail())->first();
            if (!$user) {
                if(str_contains($providerUser->getName(), ' ')) {
                    $name = explode(' ', $providerUser->getName());
                    $first_name = $name[0];
                    $last_name = $name[1];
                } else {
                    $first_name = $providerUser->getName();
                    $last_name = null;
                }
                $user = User::create([
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'email' => $providerUser->getEmail(),
                    'photo' => $providerUser->getAvatar()
                ]);
            }
            $account->user()->associate($user);
            $account->save();
            return $user;
        }
    }
}