<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite, Auth, Redirect, Session, URL;
use App\Repositories\User\UserInterface;

class SocialAuthController extends Controller
{
    protected $userRepository;

    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function redirectToProvider($provider)
    {
        $backUrl = Session::get('backUrl');

        if (!Session::has('pre_url')) {
            Session::put('pre_url', $backUrl);
        } elseif (URL::previous() != route('login')) { 
            Session::put('pre_url', $backUrl);
        }

        return Socialite::driver($provider)->redirect();
    }  

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);

        return Redirect::to(Session::get('pre_url'));
    }

    public function findOrCreateUser($user, $provider)
    {
        $authUser = $this->userRepository->getAuthUser('provider_id', $user->id);

        if ($authUser) {
            return $authUser;
        }

        $authUser = $this->userRepository->getAuthUser('email', $user->email);

        if ($authUser) {
            return $authUser;
        }

        return $this->userRepository->create([
            'firstname' => $user->name,
            'email' => $user->email,
            'provider' => $provider,
            'provider_id' => $user->id
        ]);
    }
}
