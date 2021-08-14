<?php

namespace App\Http\Livewire;

use App\Models\Bill;
use App\Models\User;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class BillCRUD extends Component
{

    use WithFileUploads;

    public Bill $bill;
    public bool $newUser = true;
    public User $user;
    public $photo;
    public bool $comingFromUser = false;

    public function rules(): array
    {
        return
            [
                'bill.number' => ['required', Rule::unique('bills', 'number')->ignore($this->bill->id)],
                'bill.amount' => 'required|numeric',
                'bill.status' => 'required|in:closed,open',
                'bill.released_at' => 'required|date',
                'bill.user_id' => 'nullable',

                'user.name' => 'required',
                'user.email' => 'required|email',
                'user.phone' => ['required', Rule::unique('users', 'phone')->ignore($this->user->id)],
                'user.whatsapp' => 'required',
            ];
    }

    public function mount(Bill $bill): void
    {
        if ($bill->exists) {
            $this->user = $bill->load('user')->user;
            $this->newUser = false;
        } else {

            $this->bill = $bill;
            $this->user = new User();
        }
    }


    public function save()
    {
        $this->validate();
        if ($this->newUser) {
            $this->user->save();
            $this->user->bills()->save($this->bill);
        } else {
            $this->bill->save();
        }
        if ($this->photo) {
            try {
                $this->bill->addMedia($this->photo->getRealPath())->toMediaCollection('bills');
            } catch (FileDoesNotExist $e) {
                return 'Photo never upload due to file does not exist please contact support';
            } catch (FileIsTooBig $e) {
                return 'Photo never upload due to big file size please contact support';

            }
        }
        toast('تم حفظ الفاتورة بنجاح', 'success')->autoClose(1000);
        $this->redirect(route('admin.bill.index'));
    }


    public function render()
    {
        return view('livewire.bill-c-r-u-d');
    }
}
