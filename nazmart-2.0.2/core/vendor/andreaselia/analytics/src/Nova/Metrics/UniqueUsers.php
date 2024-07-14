<?php

namespace AndreasElia\Analytics\Nova\Metrics;

use AndreasElia\Analytics\Models\PageView;
use AndreasElia\Analytics\Nova\Ranges;
use Illuminate\Support\Facades\DB;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Value;
use Laravel\Nova\Metrics\ValueResult;

class UniqueUsers extends Value
{
    use Ranges;

    public function calculate(NovaRequest $request): ValueResult
    {
        return $this->count($request, PageView::class, DB::raw('DISTINCT session'))->allowZeroResult();
    }
}
