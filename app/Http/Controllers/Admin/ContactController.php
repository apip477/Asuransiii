<?php
// app/Http/Controllers/Admin/ContactController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact; // Import Model Contact
use Illuminate\View\View; // Import View

class ContactController extends Controller
{
    /**
     * Menampilkan daftar semua pesan kontak yang masuk untuk Admin.
     */
    public function index(): View
    {
        $contacts = Contact::orderBy('created_at', 'desc')->get(); 
        return view('admin.contacts.index', compact('contacts'));
    }
}