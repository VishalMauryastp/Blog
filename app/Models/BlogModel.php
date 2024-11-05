<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    // The table this model will interact with
    protected $table = 'blogs';

    // The primary key field of the table
    protected $primaryKey = 'id';

    // The allowed fields for insert and update operations
    protected $allowedFields = [
        'title', 
        'slug', 
        'content', 
        'image', 
        'image_alt', 
        'meta_title', 
        'meta_keyword', 
        'meta_description', 
        'isEnable'
    ];

    // Enable timestamps (created_at, updated_at)
    protected $useTimestamps = true;

  
   
}
