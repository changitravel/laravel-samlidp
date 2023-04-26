<?php

namespace CodeGreenCreative\SamlIdp\Listeners;

use CodeGreenCreative\SamlIdp\Jobs\SamlSso;
use Illuminate\Auth\Events\Login;

class SamlLogin
{
    /**
     * Listen for the Authenticated event
     *
     * @param  Authenticated $event [description]
     * @return [type]               [description]
     */
    public function handle(Login $event)
    {
        if (request()->is('signin')) {
            // We don't want to do any SSO stuff yet we will 2FA the user first
        } else {
            if (in_array($event->guard, config('samlidp.guards')) && request()->filled('SAMLRequest') && ! request()->is('saml/logout')) {
                abort(response(SamlSso::dispatchNow($event->guard)), 302);
            }
        }
    }
}
