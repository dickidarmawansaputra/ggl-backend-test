<?php

namespace App\Containers\NewsSection\Category\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class UpdateCategoryRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    protected array $decode = [
        'id',
    ];

    protected array $urlParameters = [
        'id',
    ];

    public function rules(): array
    {
        return [
            'name' => 'required|max:100',
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
