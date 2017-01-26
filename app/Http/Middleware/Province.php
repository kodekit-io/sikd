<?php

namespace App\Http\Middleware;

use App\Service\Province as ProvinceService;
use Closure;
use Illuminate\Support\Facades\View;

class Province
{
    /**
     * @var ProvinceService
     */
    private $province;

    /**
     * Province constructor.
     * @param ProvinceService $province
     */
    public function __construct(ProvinceService $province)
    {
        $this->province = $province;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $provinces = $this->province->getProvinces();
        View::share('gProvinces', $provinces);

        return $next($request);
    }
}
