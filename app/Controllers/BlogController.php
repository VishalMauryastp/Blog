<?php

namespace App\Controllers;

use App\Models\BlogModel;
use CodeIgniter\Controller;

class BlogController extends Controller
{
    protected $blogModel;

    public function __construct()
    {
        $this->blogModel = new BlogModel();
    }

    // Display all blog posts
    public function index()
    {
        $data['blogs'] = $this->blogModel->findAll();
        return view('dashboard/blog/index', $data);
    }

    // Show the form to create a new blog post
    public function create()
    {
        return view('dashboard/blog/create');
    }

    // Store a new blog post
    public function store()
    {
        // Define the validation rules for the form fields
        $validationRules = [
            'title'             => 'required|min_length[3]|max_length[255]',
            'slug'              => 'required|min_length[3]|max_length[255]|is_unique[blogs.slug]',  // Ensure the slug is unique
            'content'           => 'required|min_length[10]',  // Make sure content is long enough
            'image'             => 'permit_empty|is_image[image]|max_size[image,1024]',  // Optional image validation
            'image_alt'         => 'permit_empty|min_length[3]|max_length[255]',
            'meta_title'        => 'permit_empty|min_length[3]|max_length[255]',
            'meta_keyword'      => 'permit_empty|min_length[3]|max_length[255]',
            'meta_description'  => 'permit_empty|min_length[10]|max_length[500]',
            'isEnable'          => 'required|in_list[0,1]',  // 0 (disabled) or 1 (enabled)
        ];
    
        // Define custom validation messages for the rules
        $validationMessages = [
            'title' => [
                'required' => 'The title field is required.',
                'min_length' => 'The title must be at least 3 characters long.',
                'max_length' => 'The title cannot exceed 255 characters.',
            ],
            'slug' => [
                'required' => 'The slug field is required.',
                'is_unique' => 'The slug must be unique.',
                'min_length' => 'The slug must be at least 3 characters long.',
                'max_length' => 'The slug cannot exceed 255 characters.',
            ],
            'content' => [
                'required' => 'Content is required.',
                'min_length' => 'Content must be at least 10 characters long.',
            ],
            'image' => [
                'is_image' => 'The uploaded file must be an image.',
                'max_size' => 'The image must not exceed 1MB.',
            ],
            'image_alt' => [
                'min_length' => 'The image alt text must be at least 3 characters long.',
                'max_length' => 'The image alt text cannot exceed 255 characters.',
            ],
            'meta_title' => [
                'min_length' => 'The meta title must be at least 3 characters long.',
                'max_length' => 'The meta title cannot exceed 255 characters.',
            ],
            'meta_keyword' => [
                'min_length' => 'The meta keywords must be at least 3 characters long.',
                'max_length' => 'The meta keywords cannot exceed 255 characters.',
            ],
            'meta_description' => [
                'min_length' => 'The meta description must be at least 10 characters long.',
                'max_length' => 'The meta description cannot exceed 500 characters.',
            ],
            'isEnable' => [
                'in_list' => 'The isEnable field must be either 0 (disabled) or 1 (enabled).',
            ],
        ];
    
        // Validate the form input
        if (!$this->validate($validationRules, $validationMessages)) {
            // Validation failed, redirect back with error messages and input data
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    
        // Handle the image file upload
        $image = $this->request->getFile('image');
        $imageName = null;
    
        if ($image && $image->isValid() && !$image->hasMoved()) {
            // Define the public directory path where the file will be stored
            $uploadPath = FCPATH . 'uploads/images/';  // FCPATH is the root of the public directory
            
            // Ensure the upload directory exists, create it if not
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true); // Creates the directory with appropriate permissions
            }
    
            // Generate a random name for the image file
            $imageName = $image->getRandomName();
    
            // Move the image to the public directory
            $image->move($uploadPath, $imageName);
        }
    
        // Prepare the data to insert into the database
        $data = [
            'title'            => $this->request->getPost('title'),
            'slug'             => $this->request->getPost('slug'),
            'content'          => $this->request->getPost('content'),
            'image'            => $imageName,  // Store the image filename if it's uploaded
            'image_alt'        => $this->request->getPost('image_alt'),
            'meta_title'       => $this->request->getPost('meta_title'),
            'meta_keyword'     => $this->request->getPost('meta_keyword'),
            'meta_description' => $this->request->getPost('meta_description'),
            'isEnable'         => $this->request->getPost('isEnable') ?? 0,  // Default to 0 (disabled) if not provided
        ];
    
        // Insert the new blog post into the database
        if ($this->blogModel->insert($data)) {
            // Success: Redirect to the blog index page with a success message
            return redirect()->to('dashboard/blog')->with('success', 'Blog post created successfully');
        } else {
            // Failure: Redirect back with an error message
            return redirect()->back()->with('error', 'Failed to create blog post');
        }
    }
    
    // Show the form to edit an existing blog post
    public function edit($id)
    {
        $data['blog'] = $this->blogModel->find($id);

        if (!$data['blog']) {
            return redirect()->to('/dashboard/blog')
                ->with('error', 'Blog post not found.');
        }

        return view('dashboard/blog/edit', $data);
    }

    // Update an existing blog post
    public function update($id)
    {
        
        $blog = $this->blogModel->find($id);
    
       
        if (!$blog) {
            return redirect()->to('dashboard/blog')->with('error', 'Blog post not found');
        }
    
        
        $validationRules = [
            'title'             => 'required|min_length[3]|max_length[255]',
            'slug'              => 'required|min_length[3]|max_length[255]|is_unique[blogs.slug,id,' . $id . ']',  
            'content'           => 'required|min_length[10]',
            'image'             => 'permit_empty|is_image[image]|max_size[image,1024]', 
            'image_alt'         => 'permit_empty|min_length[3]|max_length[255]',
            'meta_title'        => 'permit_empty|min_length[3]|max_length[255]',
            'meta_keyword'      => 'permit_empty|min_length[3]|max_length[255]',
            'meta_description'  => 'permit_empty|min_length[10]|max_length[500]',
            'isEnable'          => 'required|in_list[0,1]',
        ];
    
     
        $validationMessages = [
            'title' => [
                'required' => 'The title field is required.',
                'min_length' => 'The title must be at least 3 characters long.',
                'max_length' => 'The title cannot exceed 255 characters.',
            ],
            'slug' => [
                'required' => 'The slug field is required.',
                'is_unique' => 'The slug must be unique.',
                'min_length' => 'The slug must be at least 3 characters long.',
                'max_length' => 'The slug cannot exceed 255 characters.',
            ],
            'content' => [
                'required' => 'Content is required.',
                'min_length' => 'Content must be at least 10 characters long.',
            ],
            'image' => [
                'is_image' => 'The uploaded file must be an image.',
                'max_size' => 'The image must not exceed 1MB.',
            ],
            'image_alt' => [
                'min_length' => 'The image alt text must be at least 3 characters long.',
                'max_length' => 'The image alt text cannot exceed 255 characters.',
            ],
            'meta_title' => [
                'min_length' => 'The meta title must be at least 3 characters long.',
                'max_length' => 'The meta title cannot exceed 255 characters.',
            ],
            'meta_keyword' => [
                'min_length' => 'The meta keywords must be at least 3 characters long.',
                'max_length' => 'The meta keywords cannot exceed 255 characters.',
            ],
            'meta_description' => [
                'min_length' => 'The meta description must be at least 10 characters long.',
                'max_length' => 'The meta description cannot exceed 500 characters.',
            ],
            'isEnable' => [
                'in_list' => 'The isEnable field must be either 0 (disabled) or 1 (enabled).',
            ],
        ];
    
    
        if (!$this->validate($validationRules, $validationMessages)) {
       
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    
        // Process the uploaded image (optional)
        $image = $this->request->getFile('image');
        $imageName = $blog['image'];  
    
        if ($image && $image->isValid() && !$image->hasMoved()) {
           
            $uploadPath = FCPATH . 'uploads/images/';  
            $imageName = $image->getRandomName();
          
            if ($image->move($uploadPath, $imageName)) {
               
                if ($blog['image'] && file_exists($uploadPath . $blog['image'])) {
                    unlink($uploadPath . $blog['image']);  
                }
            } else {  
                return redirect()->back()->with('error', 'Failed to upload the image.');
            }
        }
    
      
        $data = [
            'title'            => $this->request->getPost('title'),
            'slug'             => $this->request->getPost('slug'),
            'content'          => $this->request->getPost('content'),
            'image'            => $imageName, 
            'image_alt'        => $this->request->getPost('image_alt'),
            'meta_title'       => $this->request->getPost('meta_title'),
            'meta_keyword'     => $this->request->getPost('meta_keyword'),
            'meta_description' => $this->request->getPost('meta_description'),
            'isEnable'         => $this->request->getPost('isEnable') ?? 0, 
        ];
    
        if ($this->blogModel->update($id, $data)) {
            return redirect()->to('dashboard/blog')->with('success', 'Blog post updated successfully');
        } else { 
            return redirect()->to('dashboard/blog')->with('error', 'Failed to update blog post');
        }
    }
    
    

    // Delete a blog post
    public function delete($id)
    {
        $blog = $this->blogModel->find($id);
    
        if (!$blog) {
            return redirect()->to('dashboard/blog')->with('error', 'Blog post not found.');
        }
    
        $uploadPath = FCPATH . 'uploads/images/';
    
        if ($blog['image'] && file_exists($uploadPath . $blog['image'])) {
            unlink($uploadPath . $blog['image']);
        }
    
        if ($this->blogModel->delete($id)) {
            return redirect()->to('dashboard/blog')->with('message', 'Blog post deleted successfully.');
        } else {
            return redirect()->to('dashboard/blog')->with('error', 'Failed to delete blog post.');
        }
    }
    
}
