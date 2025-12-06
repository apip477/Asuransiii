{{-- resources/views/emails/works/approved.blade.php --}}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Anda Disetujui</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; background-color: #f7f7f7;">

    <div style="max-width: 600px; margin: 20px auto; padding: 20px; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        
        <h2 style="color: #1e3a8a; text-align: center; border-bottom: 2px solid #3b82f6; padding-bottom: 10px;">
            🎉 Pengajuan Jaminan Anda Telah Disetujui!
        </h2>
        
        <p>Yth. {{ $submission->user->name ?? 'Pelanggan' }},</p>

        <p>Kami sangat senang mengonfirmasi bahwa pengajuan jaminan Anda untuk proyek **{{ $submission->title ?? 'N/A' }}** telah disetujui oleh Admin kami dan siap untuk tahap penerbitan.</p>
        
        <p><strong>Nomor Sertifikat SJU:</strong> {{ $submission->certificate_number ?? 'Belum Ditetapkan' }}</p>

        <p style="font-weight: bold; margin-top: 30px;">
            Langkah selanjutnya adalah Konfirmasi dan Pembayaran Premi. Mohon segera hubungi kami melalui WhatsApp:
        </p>

        {{-- TOMBOL WHATSAPP (Aksi Kritis) --}}
        <div style="text-align: center; margin: 20px 0;">
            @php
                $wa_number = '6281234567890'; // GANTI DENGAN NOMOR WA BISNIS SJU
                // Menggunakan $submission->certificate_number yang sudah benar
                $wa_message = urlencode("Halo Admin SJU, Pengajuan No. {{ $submission->certificate_number }} saya sudah diverifikasi. Mohon panduan untuk pembayaran dan penerbitan polis.");
                $wa_link = "https://wa.me/{$wa_number}?text={$wa_message}";
            @endphp

            <a href="{{ $wa_link }}" 
               style="display: inline-block; padding: 12px 25px; background-color: #25D366; color: #ffffff !important; text-decoration: none; border-radius: 5px; font-weight: bold; font-size: 16px;">
                ➡️ KLIK DI SINI UNTUK KONFIRMASI VIA WHATSAPP
            </a>
        </div>
        
        <p style="margin-top: 30px; border-top: 1px solid #eee; padding-top: 15px; font-size: 0.9em; color: #777;">
            Hormat kami,<br>
            Tim PT Savannah Jaya Utama
        </p>
    </div>
</body>
</html>