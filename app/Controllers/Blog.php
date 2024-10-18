<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Blog extends BaseController
{
    protected $postModel;

    public function __construct()
    {
        $this->postModel = new PostModel(); // Initialize the PostModel
    }

    // Display a list of all blog posts
    public function index()
    {
        $data['posts'] = $this->postModel->findAll();
        return view('blog/index', $data); // Pass data to the index view
    }

    // Show the form for creating a new blog post
    public function create()
    {
        return view('blog/create'); // Load the create view
    }

    // Store a newly created blog post
    public function store()
    {
        $this->postModel->save([
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            // You can add more fields as necessary
        ]);

        return redirect()->to('/posts'); // Redirect to the posts list
    }

    // Display a specific blog post
    public function show($id)
    {
        $data['post'] = $this->postModel->find($id);
        return view('blog/show', $data); // Load the show view
    }

    // Show the form for editing a specific blog post
    public function edit($id)
    {
        $data['post'] = $this->postModel->find($id);
        return view('blog/edit', $data); // Load the edit view
    }

    // Update a specific blog post
    public function update($id)
    {
        $this->postModel->update($id, [
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            // Update other fields as necessary
        ]);

        return redirect()->to('/posts'); // Redirect to the posts list
    }

    // Delete a specific blog post
    public function delete($id)
    {
        $this->postModel->delete($id);
        return redirect()->to('/posts'); // Redirect to the posts list
    }
}
