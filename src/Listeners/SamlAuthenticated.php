<?php

namespace CodeGreenCreative\SamlIdp\Listeners;

use CodeGreenCreative\SamlIdp\Jobs\SamlSso;
use Illuminate\Auth\Events\Authenticated;

class SamlAuthenticated
{
    /**
     * Listen for the Authenticated event
     *
     * @param  Authenticated $event [description]
     * @return [type]               [description]
     */
    public function handle(Authenticated $event)
    {
        if (in_array($event->guard, config('samlidp.guards')) && request()->filled('SAMLRequest') && ! request()->is('saml/logout') && request()->isMethod('get')) {
            try {
                abort(response(SamlSso::dispatchNow($event->guard)), 302);
            } catch (\Throwable $th) {
                abort(response(SamlSso::dispatchSync($event->guard)), 302);
            }
        }
    }
}
