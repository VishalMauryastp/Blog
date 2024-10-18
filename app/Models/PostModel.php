<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'posts'; 
    protected $primaryKey = 'id'; 
    protected $allowedFields = [
        'title', 
        'slug', 
        'content', 
        'image', 
        'image_alt', 
        'isEnable', 
        'meta_title', 
        'meta_keyword', 
        'meta_description'
    ]; 

    protected $useTimestamps = true; 

   
    protected $validationRules = [
        'title' => 'required|min_length[3]|max_length[255]',
        'slug' => 'required|is_unique[posts.slug]',
        'content' => 'required',
        'image' => 'permit_empty|valid_url',
        'image_alt' => 'permit_empty|max_length[255]',
        'isEnable' => 'required|in_list[0,1]',
        'meta_title' => 'permit_empty|max_length[255]',
        'meta_keyword' => 'permit_empty|max_length[255]',
        'meta_description' => 'permit_empty|max_length[255]',
    ];

    protected $validationMessages = [
        'title' => [
            'required' => 'The title is required.',
            'min_length' => 'The title must be at least 3 characters long.',
            'max_length' => 'The title cannot exceed 255 characters.',
        ],
        'slug' => [
            'required' => 'The slug is required.',
            'is_unique' => 'The slug must be unique.',
        ],
        'content' => [
            'required' => 'The content is required.',
        ],
        'image' => [
            'valid_url' => 'The image must be a valid URL.',
        ],
        'image_alt' => [
            'max_length' => 'The alt text cannot exceed 255 characters.',
        ],
        'isEnable' => [
            'required' => 'The status is required.',
            'in_list' => 'The status must be either 0 (disabled) or 1 (enabled).',
        ],
        'meta_title' => [
            'max_length' => 'The meta title cannot exceed 255 characters.',
        ],
        'meta_keyword' => [
            'max_length' => 'The meta keywords cannot exceed 255 characters.',
        ],
        'meta_description' => [
            'max_length' => 'The meta description cannot exceed 255 characters.',
        ],
    ];

    
    protected $afterInsert = ['afterInsertPost'];
    
    protected function afterInsertPost(array $data)
    {
        // Custom logic after inserting a post, if needed
    }
}
