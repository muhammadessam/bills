<div class="col-xl-8 col-lg-6 col-md-6 col-sm-12 col-12" style="margin:0 auto 24px auto">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    @if($bill->exists)
                        <h4>تعديل الفاتورة رقم : {{$bill->number}}</h4>
                    @else
                        <h4>انشاء فاتورة جديدة</h4>
                    @endif
                </div>
            </div>
        </div>

        <div class="widget-content widget-content-area">

            <div class="form-row mb-4">
                <div class="form-group col-md-6">
                    <label for="number">رقم الفاتورة:</label>
                    <input type="text" class="form-control" id="number" placeholder="رقم الفاتورة" wire:model="bill.number">
                    @error('bill.number')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="amount">قيمة الفاتورة:</label>
                    <input type="number" step="any" class="form-control" id="amount" placeholder="قيمة الفاتورة" wire:model="bill.amount">
                    @error('bill.amount')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="form-row mb-4">
                <div class="form-group col-md-6">
                    <label for="status">حالة الفاتورة</label>
                    <select id="status" class="form-control" style="padding: 8px 10px;" wire:model="bill.status">
                        @foreach(\App\Models\Bill::STATUS as $key=>$status)
                            <option value="{{$key}}">{{$status}}</option>
                        @endforeach
                    </select>
                    @error('bill.status')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="released_at">تاريخ الفاتورة:</label>
                    <input type="date" class="form-control" id="released_at" placeholder="تاريخ الفاتورة" wire:model="bill.released_at">
                    @error('bill.released_at')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="form-row mb-4">
                <div class="custom-file-container" data-upload-id="bill-photo">
                    <label class="btn btn-primary" for="photo">اختر صورة الفاتورة</label>
                    <input wire:model="photo" id="photo" type="file" class="d-none" accept="image/*">
                    @if($photo)
                        <button class="btn btn-danger" wire:click="$set('photo',null)">حذف الصورة</button>
                    @endif
                    <div>
                        @if($photo)
                            <img style="width: 250px;height: 250px;" class="img-thumbnail border border-2" src="{{$photo->temporaryUrl()}}" alt="">
                        @elseif($bill->exists)
                            <img style="width: 250px;height: 250px;" class="img-thumbnail border border-2" src="{{$bill->getFirstMediaUrl('bills')}}" alt="">
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-row mb-4">
                <div class="col-6">
                    <div class="n-chk">
                        <label class="new-control new-radio radio-classic-primary">
                            <input type="radio" class="new-control-input" value="1" name="new-user" wire:model="newUser">
                            <span class="new-control-indicator"></span>مستخدم جديد
                        </label>
                    </div>
                </div>

                <div class="col">
                    <div class="n-chk">
                        <label class="new-control new-radio radio-classic-primary">
                            <input type="radio" class="new-control-input" value="0" name="new-user" wire:model="newUser">
                            <span class="new-control-indicator"></span>مستخدم موجود
                        </label>
                    </div>
                </div>
            </div>

            @if($newUser)
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="number">اسم المستخدم:</label>
                        <input type="text" class="form-control" id="user.name" placeholder="اسم المستخدم" wire:model="user.name">
                        @error('user.name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="number">رقم الهاتف:</label>
                        <input type="text" class="form-control" id="user.phone" placeholder="رقم الهاتف" wire:model="user.phone">
                        @error('user.phone')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="number">رقم هاتف الواتس اب:</label>
                        <input type="text" class="form-control" id="user.whatsapp" placeholder="الواتس اب" wire:model="user.whatsapp">
                        @error('user.whatsapp')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="number">البريد:</label>
                        <input type="email" class="form-control" id="user.email" placeholder="البريد الالكتروني" wire:model="user.email">
                        @error('user.email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="n-chk">
                        <label class="new-control new-checkbox checkbox-primary">
                            <input name="is_sms" type="checkbox" wire:model="user.is_sms" class="new-control-input">
                            <span class="new-control-indicator"></span>يمكن استقبال الرسائل عير sms
                        </label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="n-chk">
                        <label class="new-control new-checkbox checkbox-primary">
                            <input name="is_email" type="checkbox" wire:model="user.is_email" class="new-control-input">
                            <span class="new-control-indicator"></span>يمكن استقبال الرسائل عير البريد الالكتروني
                        </label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="n-chk">
                        <label class="new-control new-checkbox checkbox-primary">
                            <input name="is_whatsapp" type="checkbox" wire:model="user.is_whatsapp" class="new-control-input">
                            <span class="new-control-indicator"></span>يمكن استقبال الرسائل عير whatsapp
                        </label>
                    </div>
                </div>
            @else
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="user_id">اختر عميل</label>
                        <select id="user_id" class="form-control" style="padding: 8px 10px;" wire:model="bill.user_id">
                            @foreach(\App\Models\User::all() as $user)
                                <option value="{{$user['id']}}">{{$user['name']}}</option>
                            @endforeach
                        </select>
                        @error('bill.user_id')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            @endif

            <button type="button" class="btn btn-primary mt-3 float-right" wire:click="save">حفظ</button>
        </div>

    </div>
</div>
