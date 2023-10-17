<?php

namespace App\Livewire\User;



use App\Models\Document as ModelsDocument;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Livewire\Attributes\Rule;


class Document extends Component
{
    public $title,
        $document,
        $description,
        $edit_id,
        $edit_title,
        $edit_description,
        $new_document,
        $old_document,
        $showTable = true,
        $createForm = false,
        $updateForm = false;


    public $totalDocuments;
    use WithFileUploads;

    use WithPagination;
    public function pageinationView()
    {
        return 'custom-pagination-links-view';
    }
    public function render()
    {
        $documents = ModelsDocument::orderBy('id', 'DESC')->where('user_id', Auth::user()->id)->paginate(4);
        $this->totalDocuments = ModelsDocument::count();
        return view('livewire.user.document', compact('documents'))->layout('layouts.user-app');
    }

    public function goBack()
    {
        $this->showTable = true;
        $this->createForm = false;
        $this->updateForm = false;
    }

    public function showForm()
    {
        $this->showTable = false;
        $this->createForm = true;
    }



    public function create()
    {
        $document = new ModelsDocument();
        $this->validate([
            'title' => ['required'],
            'description'=>'nullable',
            'document' => 'required|mimes:png,jpg,jpeg,doc,docx,xlx,csv,pdf|max:2048',

        ]);


      $filename = "";
      if ($this->document) {


        $filename = $this->document->store('documents','public');
          $document->document = $filename;
       }
        $document->title = $this->title;
        $document->description = $this->description;
        $document->user_id = Auth::user()->id;
        $document->document = $filename;
        $result = $document->save();
        if ($result) {
            session()->flash('success', 'Document upload Successfully');
            $this->title = "";
            $this->description="";
            $this->document = "";
            $this->goBack();
        }
    }

    public function edit($id)
    {
        $this->showTable = false;
        $this->updateForm = true;
        $documents = ModelsDocument::findOrFail($id);
        $this->edit_id = $documents->id;
        $this->edit_title = $documents->title;
        $this->edit_description = $documents->description;
        $this->old_document = $documents->document;
    }

    public function update($id)
    {
        $documents = ModelsDocument::findOrFail($id);
        $this->validate([
            'edit_title' => ['required'],
            'edit_description'=>'nullable',
        ]);
        $filename = "";
        if ($this->new_document) {
            $path = public_path('storage\\') . $documents->document;
            if (File::exists($path)) {
                File::delete($path);
            }
            $filename = $this->new_document->store('documents', 'public');
        } else {
            $filename = $this->old_document;
        }
        $documents->title = $this->edit_title;
        $documents->description = $this->edit_description;
        $documents->document = $filename;
        $result = $documents->save();
        if ($result) {
            session()->flash('success', 'Document Update Successfully');
            $this->edit_title = "";
            $this->edit_description = "";
            $this->new_document = "";
            $this->old_document = "";
            $this->goBack();
        }
    }

    public function delete($id)
    {
        $documents = ModelsDocument::findOrFail($id);
        $path = public_path('storage\\') . $documents->document;
        if (File::exists($path)) {
            File::delete($path);
        }
        $result = $documents->delete();
        if ($result) {
            session()->flash('success', 'Document Delete Successfully');
        }
    }

    public function download(Request $request, $document){
        $request->document=ModelsDocument::all();



    }

    public function view($id){
        $data=ModelsDocument::findOrFail($id);
        $path = public_path('storage\\') . $data->document;
        return response()->file($path);

    }


}
