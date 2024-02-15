<?php

namespace App\Containers\NewsSection\News\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class UpdateNewsRequest extends ParentRequest
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
            'title' => 'required|max:255',
            'categories' => 'required',
            'user_id' => 'required',
            'thumbnail' => 'required',
            'content' => 'required',
            'publish_at' => 'nullable|date|date_format:Y-m-d',
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
