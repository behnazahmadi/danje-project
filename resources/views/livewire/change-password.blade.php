<div>
    <div class="card-body">
        @if(session("wrong_pass"))
            <p class="text text-danger">{{session("wrong_pass")}}</p>
        @endif
        @if(session("changed_pass"))
            <p class="text text-success">{{session("changed_pass")}}</p>
        @endif

        <form wire:submit.prevent="changePassword" method="post"  class="needs-validation" enctype="multipart/form-data">
            @csrf
            <div class="form-row">

                @if(!empty(auth()->user()->password))
                    <div class="col-md-12 mb-3">
                    <label for="validationTooltip01">رمز قعلی</label>
                    <input type="password" wire:model="old_password" class="form-control" name="old_password" id="validationTooltip01" placeholder="رمز فعلی"  required>
                    @error("old_password")
                    <span class="text text-danger">{{$message}}</span>
                    @enderror
                </div>
                @endif

                <div class="col-md-6 mb-3">
                    <label for="validationTooltip01">رمز جدید</label>
                    <input type="password" class="form-control" wire:model="password" name="password" id="validationTooltip01"  placeholder="رمز جدید" required>
                    @error("password")
                    <span class="text text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="validationTooltip01">تکرار رمز جدید</label>
                    <input type="password" class="form-control" wire:model="password_confirmation" name="password_confirmation" id="validationTooltip01"  placeholder="تکرار رمز جدید" required>
                </div>
                @error("password_confirmation")
                <span class="text text-danger">{{$message}}</span>
                @enderror

            </div>

            <button class="btn btn-primary" type="submit">تغییر رمز</button>
        </form>
    </div>
</div>
