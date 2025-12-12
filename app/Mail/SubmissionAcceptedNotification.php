<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SubmissionAcceptedNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $submission; // Objek pengajuan
    public $status;     // Status ('accepted' atau 'rejected')

    public function __construct($submission, $status)
    {
        $this->submission = $submission;
        $this->status = $status;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pembaruan Status Pengajuan Jaminan Anda',
        );
    }

    public function content(): Content
    {
        return new Content(
            // View yang digunakan
            view: 'emails.submission.status', 
        );
    }
}