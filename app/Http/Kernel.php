<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Fruitcake\Cors\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

        'agent_status' => \App\Http\Middleware\Agent_status::class,
        'company_status' => \App\Http\Middleware\Company::class,
        'requirement_status' => \App\Http\Middleware\Requirement_status::class,
        'process_status' => \App\Http\Middleware\Process_status::class,
        'ticket_status' => \App\Http\Middleware\Ticket_status::class,
        'final_delivery_status' => \App\Http\Middleware\Final_delivery_status::class,
        'trees_status' => \App\Http\Middleware\Trees_status::class,
        'accounts_status' => \App\Http\Middleware\Accounts_status::class,

        'check_account_status' => \App\Http\Middleware\CheckAccount::class,

        'users_status' => \App\Http\Middleware\Users_status::class,
        'report_status' => \App\Http\Middleware\Report::class,
        'setting_status' => \App\Http\Middleware\Setting_status::class,
        'regiment_status' => \App\Http\Middleware\RegimentStatus::class,









        // 'type_process_status' => \App\Http\Middleware\Type_process_status::class,
        // 'visa_status' => \App\Http\Middleware\Visa_status::class,
        'dollar_price_status' => \App\Http\Middleware\Dollar_price_status::class,


        //umrah



        // Api
        'header' => \App\Http\Middleware\AddHeaders::class,




    ];
}
