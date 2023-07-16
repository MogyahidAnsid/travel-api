<?php

namespace App\Filters\Tours;

use App\Http\Requests\TourListRequest;
use Illuminate\Contracts\Database\Query\Builder;

class ByOrder
{
    public function __construct(protected TourListRequest $request)
    {
        //
    }

    public function handle(Builder $builder, \Closure $next)
    {
        return $next($builder)
            ->when(
                $this->request->sortBy && $this->request->sortOrder,
                fn ($query) => $query->orderBy($this->request->sortBy, $this->request->sortOrder)
            );
    }
}
