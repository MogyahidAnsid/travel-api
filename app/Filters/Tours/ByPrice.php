<?php

namespace App\Filters\Tours;

use App\Http\Requests\TourListRequest;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Http\Request;

class ByPrice
{
    public function __construct(protected TourListRequest $request)
    {
        //
    }

    public function handle(Builder $builder, \Closure $next)
    {

        return $next($builder)
            ->when(
                $this->request->priceFrom,
                fn ($query) => $query->where('price', '>=', request()->priceFrom * 100),
            )
            ->when(
                $this->request->priceTo,
                fn ($query) => $query->where('price', '<=', request()->priceTo * 100),
            );
    }
}
