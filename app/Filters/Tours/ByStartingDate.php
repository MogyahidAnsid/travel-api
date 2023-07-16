<?php

namespace App\Filters\Tours;

use App\Http\Requests\TourListRequest;
use Illuminate\Contracts\Database\Query\Builder;

class ByStartingDate
{
    public function __construct(protected TourListRequest $request)
    {
        //
    }
    public function handle(Builder $builder, \Closure $next)
    {
        return $next($builder)
            ->when(
                $this->request->dateFrom,
                fn ($query) => $query->where('starting_date', '>=', $this->request->dateFrom),
            )
            ->when(
                $this->request->dateTo,
                fn ($query) => $query->where('starting_date', '<=', $this->request->dateTo),
            );
    }
}
