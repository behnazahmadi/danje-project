<div>
    <div class="card-body">
        <form wire:submit.prevent="editProfile" method="post"  class="needs-validation" enctype="multipart/form-data">
            @csrf
            <div class="form-row">

                <div class="col-md-12 mb-3">
                    @if ($profile_image)
                        <img src="{{ $profile_image->temporaryUrl() }}" width="70">
                      @else
                        <img src="{{asset("assets/users/".$user->profile_image)}}" width="70" alt="">
                    @endif

                    <label for="validationTooltip01">عکس پروفایل</label>
                    <input type="file" wire:model="profile_image" class="form-control"  id="validationTooltip01" >

                </div>

                <div class="col-md-6 mb-3">
                    <label for="validationTooltip01">نام</label>
                    <input type="text" class="form-control"  placeholder="نام" wire:model="name" value="{{auth()->user()->name}}"   required>
                    @error("name")
                    <span class="text text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="validationTooltip01">ایمیل</label>
                    <input type="email" class="form-control" name="email" id="validationTooltip01" disabled placeholder="ایمیل" value="{{$user->email}}" required>

                </div>

                <div class="col-md-12 mb-3">
                    <label for="validationTooltip01">درباره من</label>
                    <textarea class="form-control" wire:model="about_me" id="" cols="30" rows="10">{{$user->about_me}}</textarea>
                    @error("about_me")
                    <span class="text text-danger">{{$message}}</span>
                    @enderror
                </div>


            </div>

            <button class="btn btn-primary" type="submit">ویرایش</button>
        </form>
    </div>

</div>
