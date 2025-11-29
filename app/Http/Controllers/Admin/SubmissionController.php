<?php
// app/Http/Controllers/Admin/SubmissionController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Submission; // Import Model yang baru dibuat
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function index()
    {
        // Ambil semua pengajuan, urutkan dari yang terbaru, dan sertakan data user
        $submissions = Submission::with('user')->latest()->get();

        return view('admin.submissions.index', compact('submissions'));
    }

    // Method lain (show, edit, update) akan ditambahkan nanti
}