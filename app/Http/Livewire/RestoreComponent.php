<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Students;

class RestoreComponent extends Component
{
    public function trashed($id){
        $students = Students::withTrashed()->find($id);
        $students->restore();
        // return redirect()->route('student');
        if($students !=''){
            $this->dispatchBrowserEvent('restore', [
                'title' => 'Restore success',
                'timer'=>1500,
                'icon'=>'success',
                'toast'=>true,
                'position'=>'top-right',
                'showCancelButton'=> false,
                'showConfirmButton'=>false
            ]);
        }
    }
    public function resAll(){
        $students_all = Students::onlyTrashed();
        $students_all->restore();
        // return redirect()->route('student');
        if($students_all !=''){
            $this->dispatchBrowserEvent('restore-all', [
                'title' => 'Restore all students success',
                'timer'=>1500,
                'icon'=>'success',
                'toast'=>true,
                'position'=>'top-right',
                'showCancelButton'=> false,
                'showConfirmButton'=>false
            ]);
        }

    }
    public function foredel($id){
        $students = Students::withTrashed()->find($id);
        $students->forceDelete();
        session()->flash('message', 'delete success');
    }
    public function render()
    {
        $students = Students::onlyTrashed()->get();
        return view('livewire.restore-component', ['students'=>$students])->layout('livewire.layouts.base');
    }

}
