<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cookie Encryption
    |--------------------------------------------------------------------------
    |
    | By default, Laravel encrypts all cookies which are created by the
    | framework. This means that cookies will only be readable by the
    | application that created them. You may disable this for testing.
    |
    */

    'encrypt' => true,

    /*
    |--------------------------------------------------------------------------
    | Cookie Expiration
    |--------------------------------------------------------------------------
    |
    | This option controls how long cookies will remain valid. The cookie
    | expiration time is measured in minutes. You may set this to any
    | reasonable value you wish.
    |
    */

    'expiration' => 526600,

    /*
    |--------------------------------------------------------------------------
    | Cookie Path
    |--------------------------------------------------------------------------
    |
    | The cookie path determines the path for which the cookie will be
    | regarded as available. Typically, cookies are available to the
    | entire domain, but you may specify a path if needed.
    |
    */

    'path' => '/',

    /*
    |--------------------------------------------------------------------------
    | Cookie Domain
    |--------------------------------------------------------------------------
    |
    | The cookie domain determines the domain for which the cookie will
    | be regarded as available. You may set this to any domain you wish
    | or keep it as null to use the current domain.
    |
    */

    'domain' => env('COOKIE_DOMAIN', null),

    /*
    |--------------------------------------------------------------------------
    | Secure Cookies
    |--------------------------------------------------------------------------
    |
    | This option determines whether cookies should only be sent over
    | HTTPS connections. This is generally recommended, but may be
    | disabled for local development or testing.
    |
    */

    'secure' => env('COOKIE_SECURE', null),

    /*
    |--------------------------------------------------------------------------
    | HTTP Only Cookies
    |--------------------------------------------------------------------------
    |
    | This option determines whether cookies should be accessible only
    | through the HTTP protocol. This means that the cookie won't be
    | accessible by scripting languages like JavaScript.
    |
    */

    'http_only' => true,

    /*
    |--------------------------------------------------------------------------
    | Same-Site Cookies
    |--------------------------------------------------------------------------
    |
    | This option determines how your cookies behave when cross-site
    | requests take place, and can be used to mitigate CSRF attacks.
    | By default, we will set this value to "lax" to permit secure
    | cross-site requests. You may set this to "strict", "lax", or
    | "none".
    |
    */

    'same_site' => env('COOKIE_SAME_SITE', 'lax'),

];
