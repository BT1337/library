<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class BookFilter extends AbstractFilter
{
    public const TITLE = 'title';

    public const DESCRIPTION = 'description';

    public const AUTHORS = 'authors';

    public function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::DESCRIPTION => [$this, 'description'],
            self::AUTHORS => [$this, 'authors']
        ];
    }

    public function title(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");
    }

    public function description(Builder $builder, $value)
    {
        $builder->where('description', 'like', "%{$value}%");
    }

    public function authors(Builder $builder, $value)
    {
        $builder->whereHas('authors', function ($query) use ($value) {
            $query->where('full_name', 'like', "%{$value}%");
        });
    }
}
