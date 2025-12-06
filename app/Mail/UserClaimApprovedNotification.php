<?php

namespace App\Mail;

use App\Models\Work; // <-- IMPORT MODEL WORK, BUKAN CLAIM (Sesuai Controller Verifikasi)
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserClaimApprovedNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $submission; // Menggunakan nama property yang umum untuk pengajuan

    /**
     * Create a new message instance.
     */
    // Mengubah type hint dari Claim menjadi Work
    public function __construct(Work $submission)
    {
        $this->submission = $submission;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pengajuan Anda Telah Disetujui!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            // View yang akan digunakan untuk konten email
            // Ganti emails.claim.approved menjadi emails.works.approved (lebih generik)
            view: 'emails.works.approved', 
            with: [
                'submission' => $this->submission,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}