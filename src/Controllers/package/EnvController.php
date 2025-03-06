<?php

namespace App\Http\Controllers\package;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EnvController extends Controller
{
    public function index()
    {
        $envContent = File::get(base_path('.env'));
        return view("full-Admin-Panel.admin.env-editor", compact('envContent'));
    }

    public function update(Request $request)
    {
        $request->validate( [
            'env_content' => 'required',
        ]);

        try {
            File::put(base_path('.env'), $request->env_content);
            return redirect()->back()->with('success', 'Environment file updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating environment file: ' . $e->getMessage());
        }
    }
}
