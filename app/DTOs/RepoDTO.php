<?php

namespace App\DTOs;

use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Validator;

class RepoDTO
{
    private string $id;
    private string $name;
    private string|null $fullName;
    private bool $private;
    private string|null $description;
    private string $url;
    private string $visibility;
    private DateTime|null $createdAt;

    public function __construct(array $data)
    {
        $validator = Validator::make($data, [
            'id' => 'required|integer',
            'name' => 'required|string|max:255',
            'full_name' => 'nullable|string',
            'private' => 'required|boolean',
            'description' => 'nullable|string|max:255',
            'url' => 'nullable|string|url',
            'visibility' => 'required|string|max:255',
            'created_at' => 'nullable|date'
        ]);

        if ($validator->fails()) {
            throw new \InvalidArgumentException($validator->errors()->first());
        }
        $this->createdAt = isset($data['created_at']) ? Carbon::parse($data['created_at']) : null;
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->fullName = $data['full_name'] ?? '';
        $this->private = $data['private'];
        $this->description = $data['description'];
        $this->url = $data['url'];
        $this->visibility = $data['visibility'];
    }

    public function fromArray(): array
    {
        return [
            "id"=> $this->id,
            "name"=>$this->name, 
            "fullName"=>$this->fullName,
            "private"=>$this->private,
            "description"=>$this->description ,
            "url"=>$this->url,
            "visibility"=>$this->visibility ,
            "createdAt"=>$this->createdAt,
        ];
    }
}
