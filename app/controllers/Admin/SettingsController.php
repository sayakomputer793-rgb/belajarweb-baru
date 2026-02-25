<?php

require_once __DIR__ . '/../../models/Setting.php';

class SettingsController extends Controller
{
    protected string $layout = 'admin/layouts/main';

    public function index(): void
    {
        $this->requireLogin();
        $settingModel = new Setting();

        $this->view('admin.settings.index', [
            'pageTitle' => 'Pengaturan Situs',
            'settings' => $settingModel->getAll(),
            'csrfToken' => $this->csrfToken()
        ]);
    }

    public function update(): void
    {
        $this->requireLogin();
        if (!$this->validateCsrf()) {
            $this->redirect('/admin/settings');
            return;
        }

        $settingModel = new Setting();
        $settings = $_POST['settings'] ?? [];

        foreach ($settings as $key => $value) {
            $settingModel->set($key, $this->sanitize($value));
        }

        $this->setFlash('success', 'Pengaturan situs berhasil diperbarui.');
        $this->redirect('/admin/settings');
    }
}
