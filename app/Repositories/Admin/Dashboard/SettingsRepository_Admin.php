<?php 

namespace App\Repositories\Admin\Dashboard;

// Interface
use App\Interfaces\Admin\Dashboard\SettingsInterface_Admin;

// Model
use App\Models\Settings_Model;

// Request
use App\Http\Requests\StoreSettings;

class SettingsRepository_Admin implements SettingsInterface_Admin
{

    public function get_settings()
    {
        $data = [
            'title' => 'Settings',
            'settings' => Settings_Model::paginate(5)
        ];

        return view('Admin/Setting/view_setting', $data);
    }

    public function tambah_settings()
    {
        $data = [
            'title' => 'Settings'
        ];

        return view('Admin/Setting/create_genre', $data);
    }

    public function save_settings(StoreSettings $request)
    {
        $data_setting = [
            'nama_genre' => $request->input('nama_genre')
        ];

        //Create Data Setting Baru 
        Settings_Model::create($data_setting);

        return redirect('/setting')->with('success', 'Setting Baru Berhasil Ditambahkan');
    }

    public function update_settings(int $id)
    {
        $setting = Settings_Model::where('id', $id)->first();

        $data = [
            'title' => 'Genre',
            'genre' => $setting
        ];

        return view('Admin/Setting/update_setting', $data);        
    }

    public function save_update(StoreSettings $request, int $id)
    {
        $setting = Settings_Model::where('id', $id)->first();

        $data_setting = [
            'nama_genre' => $request->input('nama_genre')
        ];

        //Create Data Setting Baru 
        Settings_Model::where('id', $setting->id)->update($data_setting);

        return redirect('/setting')->with('success-update', 'Setting Baru Berhasil Diubah');        
    }

    public function delete_settings(int $id)
    {
        // Getting specific data
        $setting = Settings_Model::where('id', $id)->first();

        // Delete data from table
        Settings_Model::where('id', $setting->id)->delete();

        return redirect('/setting')->with('danger', 'Setting Berhasil Dihapus');
    }

}

