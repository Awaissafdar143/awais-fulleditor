<?php

namespace Awaistech\Larpack\Controllers\Package;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Awaistech\Larpack\Models\Setting;

class MaintenanceController extends Controller
{
    // Display the form to edit maintenance settings
    public function edit()
    {
        $content = Setting::get('maintenance_content', '');
        $enabled = Setting::get('maintenance_enabled', '0');
        return view('full-Admin-Panel.admin.maintenance_edit', compact('content', 'enabled'));
    }
    
    // Update the maintenance settings
    public function update(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        // Update the maintenance page content
        Setting::set('maintenance_content', $request->content);

        // Toggle maintenance mode: set "1" if checkbox is checked, otherwise "0"
        $enabled = $request->has('enabled') ? '1' : '0';
        Setting::set('maintenance_enabled', $enabled);

        return redirect()->back()->with('success', 'Maintenance settings updated.');
    }
}
