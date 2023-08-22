<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\ObjectDB;

class Controller extends BaseController
{
    public function index()
    {
        $firstLoad = session('SESSION_FIRST_LOAD', true);

        if ($firstLoad) {
            session(['SESSION_FIRST_LOAD' => false]);
            session(['selectedCategories' => ['Бесплатные', 'Платные', 'iOS', 'Android']]);
        }

        $selectedCategories = session('selectedCategories', []);

        $objects = ObjectDB::whereHas('categories', function ($query) use ($selectedCategories) {
            $query->whereIn('title', $selectedCategories);
        })->get();

        return view('welcome', compact('objects'));
    }

    public function filter(Request $request)
    {
        // Первое нажатие на фильтр
        $firstFilterClick = session('FIRST_FILTER_CLICK', true);

        if ($firstFilterClick) {
            session(['selectedCategories' => []]); // Сброс selectedCategories
            session(['FIRST_FILTER_CLICK' => false]); // Установка флага первого нажатия на фильтр
        }

        $selectedCategory = $request->input('categories'); // Получаем выбранную категорию

        $selectedCategories = session('selectedCategories', []);
    
        // Проверяем, есть ли выбранная категория в массиве выбранных
        $categoryIndex = array_search($selectedCategory, $selectedCategories);
    
        if ($categoryIndex !== false) {
            // Если категория уже выбрана, удаляем её из массива
            unset($selectedCategories[$categoryIndex]);
        } else {
            // Если категория не выбрана, добавляем её в массив
            $selectedCategories[] = $selectedCategory;
        }
    
        session(['selectedCategories' => $selectedCategories]);
    
        $objects = ObjectDB::whereHas('categories', function ($query) use ($selectedCategories) {
            $query->whereIn('title', $selectedCategories);
        })->get();
    
        return view('layouts.filtered_objects', compact('objects'));
    }

}
