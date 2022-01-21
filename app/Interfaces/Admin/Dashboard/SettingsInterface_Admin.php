<?php

namespace App\Interfaces\Admin\Dashboard;

use App\Http\Requests\StoreSettings;

interface SettingsInterface_Admin
{
    public function get_settings();
    public function tambah_settings();
    public function save_settings(StoreSettings $request);
    public function update_settings(int $id);
    public function save_update(StoreSettings $request, int $id);
    public function delete_settings(int $id);
}