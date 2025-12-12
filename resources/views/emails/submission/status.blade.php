@php
    $wa_number = '6283144770143'; // NOMOR WA PT SJU
    $submission_id = $submission->id;
    $wa_message_accepted = urlencode("Halo Admin SJU, Pengajuan saya (ID: {$submission_id}) telah diterima. Mohon panduan untuk proses penerbitan.");
    $wa_link = "https://wa.me/{$wa_number}?text={$wa_message_accepted}";

    // Memastikan status dibaca dengan aman: lowercase dan hapus spasi
    $clean_status = strtolower(trim($status));
    
    $nasabah_name = $submission->user->name ?? 'Nasabah Yth.'; // Ambil nama user
@endphp

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembaruan Status Pengajuan Jaminan</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; background-color: #f7f7f7; padding: 20px;">

    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); border-top: 5px solid #1e3a8a;">
        
        <h1 style="color: #1e3a8a; text-align: center; border-bottom: 1px solid #eee; padding-bottom: 15px; margin-bottom: 20px;">Pembaruan Status Pengajuan Jaminan</h1>

        <p>Yth. {{ $nasabah_name }},</p>
        
        {{-- LOGIKA DITERIMA/VERIFIKASI --}}
        @if ($clean_status === 'accepted' || $clean_status === 'verified') 
            <p style="font-size: 1.1em; font-weight: bold; color: #059669;">
                🎉 Selamat, Pengajuan Jaminan Anda (ID: {{ $submission_id }}) telah <span style="text-transform: uppercase;">DISETUJUI</span> oleh tim verifikasi kami!
            </p>
            <p>Langkah selanjutnya adalah proses penerbitan jaminan. Silakan lanjutkan komunikasi langsung melalui WhatsApp resmi kami untuk proses cepat dan efisien:</p>
            
            {{-- TOMBOL WHATSAPP --}}
            <div style="text-align: center; margin: 30px 0;">
                <a href="{{ $wa_link }}" 
                   style="display: inline-block; padding: 12px 25px; background-color: #25D366; color: white !important; text-decoration: none; border-radius: 8px; font-weight: bold; font-size: 16px;">
                    Lanjut Proses via WhatsApp
                </a>
            </div>
            
        {{-- LOGIKA DITOLAK --}}
        @elseif ($clean_status === 'rejected')
            <p style="font-size: 1.1em; font-weight: bold; color: #DC2626;">
                Mohon maaf, Pengajuan Jaminan Anda (ID: {{ $submission_id }}) telah DITOLAK.
            </p>
            <p>Alasan penolakan: [TAMPILKAN ALASAN PENOLAKAN DARI DATABASE/INPUT ADMIN]. Untuk informasi lebih lanjut mengenai dokumen yang diperlukan, silakan hubungi kami.</p>

        @else 
            {{-- Fallback untuk Debugging, sekarang seharusnya jarang tampil --}}
            <p style="color: #f97316;">Status Pengajuan Tidak Diketahui (Status Terbaca: {{ $clean_status }}). Silakan hubungi Admin.</p>
        @endif
        
        <p style="margin-top: 40px; font-size: 0.9em; color: #777; border-top: 1px solid #eee; padding-top: 15px;">
            Hormat kami,<br>Tim PT Savannah Jaya Utama
        </p>
    </div>
</body>
</html>