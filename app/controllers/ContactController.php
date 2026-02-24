<?php

require_once __DIR__ . '/../models/Contact.php';

class ContactController extends Controller
{
    public function store(): void
    {
        // CSRF validation
        if (!$this->validateCsrf()) {
            $this->json(['success' => false, 'message' => 'Invalid security token. Silakan refresh halaman.'], 403);
            return;
        }

        // Honeypot anti-spam
        if (!empty($_POST['website'])) {
            $this->json(['success' => true, 'message' => 'Pesan berhasil dikirim!']);
            return;
        }

        // Validate inputs
        $name = $this->sanitize($_POST['name'] ?? '');
        $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
        $subject = $this->sanitize($_POST['subject'] ?? '');
        $message = $this->sanitize($_POST['message'] ?? '');

        if (!$name || !$email || !$subject || !$message) {
            $this->json(['success' => false, 'message' => 'Semua field harus diisi dengan benar.'], 422);
            return;
        }

        if (strlen($name) > 100 || strlen($subject) > 200 || strlen($message) > 5000) {
            $this->json(['success' => false, 'message' => 'Input terlalu panjang.'], 422);
            return;
        }

        // Rate limiting (simple session-based)
        $lastSubmit = $_SESSION['last_contact'] ?? 0;
        if (time() - $lastSubmit < 30) {
            $this->json(['success' => false, 'message' => 'Silakan tunggu 30 detik sebelum mengirim pesan lagi.'], 429);
            return;
        }

        // Save to database
        $contactModel = new Contact();
        $contactModel->create([
            'name' => $name,
            'email' => $email,
            'subject' => $subject,
            'message' => $message,
        ]);

        $_SESSION['last_contact'] = time();

        $this->json(['success' => true, 'message' => 'Pesan berhasil dikirim! Terima kasih telah menghubungi kami.']);
    }
}
