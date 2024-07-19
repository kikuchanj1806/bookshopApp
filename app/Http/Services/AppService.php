<?php

namespace App\Http\Services;

use Illuminate\Pagination\LengthAwarePaginator;

class AppService
{
    public function buildTree($categories, $parentId = 0, $level = 0)
    {
        $result = [];
        foreach ($categories as $category) {
            if ($category->parent_id == $parentId) {
                $category->level = $level;
                $result[] = $category;
                $children = $this->buildTree($categories, $category->id, $level + 1);
                $result = array_merge($result, $children);
            }
        }
        return $result;
    }

    public function paginate($items, $perPage)
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = array_slice($items, ($currentPage - 1) * $perPage, $perPage);
        return new LengthAwarePaginator($currentItems, count($items), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);
    }
}
