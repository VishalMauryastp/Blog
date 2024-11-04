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

    public function index()
    {
        $data['blogs'] = $this->blogModel->findAll();
        return view('blogs/index', $data);
    }

    public function create()
    {
        return view('blogs/create');
    }

    public function store()
    {
        $validationRules = [
            'title' => 'required|min_length[3]|max_length[255]',
            'content' => 'required|min_length[10]',
        ];

        if (!$this->validate($validationRules)) {
          
            return redirect()->to('/blogs/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->blogModel->save([
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
        ]);
    }

    public function edit($id)
    {
        $data['blog'] = $this->blogModel->find($id);
        return view('blogs/edit', $data);
    }

    public function update($id)
    {
        // Define validation rules
        $validationRules = [
            'title' => 'required|min_length[3]|max_length[255]',
            'content' => 'required|min_length[10]',
        ];

        // Validate input
        if (!$this->validate($validationRules)) {
            // Redirect back with input and validation errors
            return redirect()->to('/blogs/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }

        // Update the blog post
        $this->blogModel->update($id, [
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
        ]);

        // Redirect to the index method with a success message
        return redirect()->to('/blogs')->with('message', 'Blog post updated successfully.');
    }

    public function delete($id)
    {
        $this->blogModel->delete($id);
        return redirect()->to('/blogs')->with('message', 'Blog post deleted successfully.');
    }
}
