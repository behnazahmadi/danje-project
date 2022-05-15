<div>
        <div class="contact-form">
            <form wire:submit.prevent="contact" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <input type="text" wire:model="topic" name="topic" id="topic" required data-error="موضوع پیام خود را وارد کنید" class="form-control" placeholder="موضوع">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <input type="text" wire:model="name" name="name" id="name" class="form-control" required data-error="لطفا نام خود را وارد کنید" placeholder="نام">
                            @error("name")
                            <sapn class="text text-danger">{{$message}}</sapn>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <input type="email" wire:model="email" name="email" id="email" class="form-control" required data-error="لطفا آدرس ایمیل خود را وارد کنید" placeholder="پست الکترونیک">
                            @error("email")
                            <sapn class="text text-danger">{{$message}}</sapn>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 text-right">
                        <div class="form-group text-right">
                            <select  required data-error="درجه اهمیت پیام خود را وارد کنید" name="importance" class="form-control" id="">
                                <option value="normal">نرمال</option>
                                <option value="high">زیاد</option>
                                <option value="low">کم</option>
                            </select>
                            @error("importance")
                            <sapn class="text text-danger">{{$message}}</sapn>
                            @enderror
                        </div>
                    </div>



                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <textarea name="content" wire:model="content" class="form-control" id="content" cols="30" rows="6" required data-error="پیام خود را تایپ کنید" placeholder="پیام شما"></textarea>
                            @error("content")
                            <sapn class="text text-danger">{{$message}}</sapn>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <button type="submit" class="btn btn-primary">ارسال پیام</button>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
