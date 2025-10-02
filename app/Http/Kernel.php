

protected $routeMiddleware = [
    // outros middlewares...
    'auth.session' => \App\Http\Middleware\AuthSession::class,
];
