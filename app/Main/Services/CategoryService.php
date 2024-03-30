<?php

namespace App\Main\Services;

use App\Models\Category;
use App\Main\Helpers\Response;
use App\Main\Repositories\CategoryRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use function App\Main\Helpers\responseJsonSuccess;

class CategoryService
{
    protected $response;
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategories($perPage)
    {
        return $this->categoryRepository->paginate($perPage);
    }

    public function getCategoryById($id)
    {
       return $this->categoryRepository->find($id);
    }

    public function createCategory($data)
    {
        return $this->categoryRepository->create($data);
    }

    public function updateCategory($id, $data)
    {
        return $this->categoryRepository->updateOrCreate(['id' => $id], $data);
    }
    public function deleteCategory($id)
    {
        return $this->categoryRepository->delete($id);  
    }
    
}
