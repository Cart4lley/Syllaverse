<?php
// ------------------------------------------------
// File: app/Http/Controllers/SuperAdmin/MasterDataController.php
// Description: Handles CRUD operations for Master Data (SDG, IGA, SO, CDIO, General Info) - Syllaverse
// ------------------------------------------------

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sdg;
use App\Models\Iga;
use App\Models\So;
use App\Models\Cdio;
use App\Models\GeneralInformation;

class MasterDataController extends Controller
{
    public function index()
    {
        return view('superadmin.master-data', [
            'sdgs' => Sdg::all(),
            'igas' => Iga::all(),
            'studentOutcomes' => So::all(),
            'cdios' => Cdio::all(),
            'info' => GeneralInformation::all()->keyBy('section')
        ]);
    }

    public function store(Request $request, $type)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'required|string'
        ]);

        $modelMap = $this->getModelMap();

        if (!array_key_exists($type, $modelMap)) {
            abort(404);
        }

        $data = ['description' => $request->description];

        if (in_array($type, ['sdg', 'iga', 'cdio'])) {
            $data['title'] = $request->title;
        }

        $modelMap[$type]::create($data);

        return redirect()->route('superadmin.master-data')->with('success', strtoupper($type) . ' added successfully!');
    }

    public function update(Request $request, $type, $id)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'required|string'
        ]);

        $modelMap = $this->getModelMap();

        if (!array_key_exists($type, $modelMap)) {
            abort(404);
        }

        $item = $modelMap[$type]::findOrFail($id);

        $data = ['description' => $request->description];

        if (in_array($type, ['sdg', 'iga', 'cdio'])) {
            $data['title'] = $request->title;
        }

        $item->update($data);

        return redirect()->route('superadmin.master-data')->with('success', strtoupper($type) . ' updated successfully!');
    }

    public function destroy($type, $id)
    {
        $modelMap = $this->getModelMap();

        if (!array_key_exists($type, $modelMap)) {
            abort(404);
        }

        $item = $modelMap[$type]::findOrFail($id);
        $item->delete();

        return redirect()->route('superadmin.master-data')->with('success', strtoupper($type) . ' deleted successfully!');
    }

    public function updateGeneralInfo(Request $request, $section)
    {
        // Validate only the specific field being saved
        $request->validate([
            $section => 'required|string'
        ]);

        // Save/update only that one section's content
        GeneralInformation::updateOrCreate(
            ['section' => $section],
            ['content' => $request->input($section)]
        );

        return back()->with('success', ucfirst($section) . ' updated successfully.');
    }

    private function getModelMap(): array
    {
        return [
            'sdg' => Sdg::class,
            'iga' => Iga::class,
            'so' => So::class,
            'cdio' => Cdio::class,
        ];
    }
}
