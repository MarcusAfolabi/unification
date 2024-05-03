<?php

namespace App\Livewire\CEC;

use Livewire\Component;
use App\Models\Resource;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Resources extends Component
{
    public $name;
    public $file;
    use WithFileUploads;

    protected $rules = [
        'name' => 'required|string|unique:resources,name',
        'file' => 'required|file',
    ];

    public function save()
    {
        $validatedData = $this->validate();

        $slug = Str::slug($validatedData['name'], '-');
        $iconUrl = null;

        if ($validatedData['file']) {
            $uploadResult = cloudinary()->upload($validatedData['file']->getRealPath());
            $iconUrl = $uploadResult->getSecurePath();
        }

        Resource::create([
            'name' => $validatedData['name'],
            'slug' => $slug,
            'file' => $iconUrl,
        ]);

        $this->reset(['name', 'file', 'icon']);

        session()->flash('message', 'Resource created successfully.');
    }

    public function render()
    {
        $resources = Resource::latest()->paginate(10);
        return view('livewire.cec.resources', compact('resources'));
    }

    public function delete($resourceId)
    {
        $resource = Resource::findOrFail($resourceId);

        // Delete associated file from storage
        if ($resource->file) {
            Storage::disk('public')->delete($resource->file);
        }

        // Delete associated icon from Cloudinary (if exists)
        if ($resource->icon) {
            $publicId = basename($resource->icon, '.' . pathinfo($resource->icon, PATHINFO_EXTENSION));
            cloudinary()->destroy($publicId);
        }

        $resource->delete();

        session()->flash('message', 'Resource deleted successfully.');
    }

}
