<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Services\SocialAccountService;
use Laravel\Socialite\Facades\Socialite;

trait SocialAuthentications
{
    /**
     * Redirect the user to the provider authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    /**
     * Obtain the user information from provider.
     *
     * @return Response
     */
    public function handleProviderCallback(SocialAccountService $service, $provider)
    {
        $user = $service->createOrGetUser(Socialite::driver($provider)->user(), $provider);
        auth()->login($user);
        return redirect()->to('profile');
    }
}