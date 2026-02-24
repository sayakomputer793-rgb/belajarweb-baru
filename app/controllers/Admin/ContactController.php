<?php

require_once __DIR__ . '/../../models/Contact.php';

class ContactController extends Controller
{
    private Contact $contact;

    public function __construct()
    {
        parent::__construct();
        $this->contact = new Contact();
    }

    public function index(): void
    {
        $this->requireLogin();
        $contacts = $this->contact->findAll('created_at DESC');
        $unreadCount = $this->contact->getUnreadCount();

        $this->view('admin.contacts.index', [
            'pageTitle' => 'Messages',
            'contacts' => $contacts,
            'unreadCount' => $unreadCount,
        ]);
    }

    public function markRead(string $id): void
    {
        $this->requireLogin();
        $this->contact->markAsRead((int)$id);
        $this->redirect('/admin/contacts');
    }

    public function delete(string $id): void
    {
        $this->requireLogin();
        $this->contact->delete((int)$id);
        $_SESSION['flash_success'] = 'Pesan berhasil dihapus!';
        $this->redirect('/admin/contacts');
    }
}
