<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $url = "https://restcountries.com/v3.1/all?fields=name,idd,flags,cca3";
        $response = Http::withOptions(['verify' => false])->withHeaders(['Content-Type : application/json'])->get($url);
        $items = json_decode($response);
        $countries = [];
        foreach ($items as $key => $item) {
            $suf = ($item->idd->suffixes);
            if ($item->cca3 == 'USA') {
                $code = '+1';
            } else {
                $code = ($item->idd->root) . '-' . str(end($suf));
            }
            array_push($countries, [
                'name' => $item->name->common,
                'flag' => $item->flags->png,
                'code' => $code,
                'cca3' => $item->cca3,
                // 'suff'=>$suf
            ]);
        }
        // return $countries;
        return view('auth.register',compact('countries'));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
