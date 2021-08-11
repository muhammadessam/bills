<?php

namespace App\Http\Livewire;

use App\Models\Bill;
use App\Models\User;
use Livewire\Component;

class BillCRUD extends Component
{

    public Bill $bill;
    public bool $newUser = true;
    public User $user;

    public function rules(): array
    {
        return
            [
                'bill.number' => 'required|unique:bills,number,' . $this->bill->id,
                'bill.amount' => 'required|numeric',
                'bill.status' => 'required|in:closed,open',
                'bill.released_at' => 'required|date',
                'bill.user_id' => 'nullable',

                'user.name' => 'required',
                'user.email' => 'required|email',
                'user.phone' => 'required|unique:users,phone,' . $this->user->id,
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
        toast('تم حفظ الفاتورة بنجاح', 'success')->autoClose(1000);
        $this->redirect(route('admin.bill.index'));
    }


    public function render()
    {
        return view('livewire.bill-c-r-u-d');
    }
}
