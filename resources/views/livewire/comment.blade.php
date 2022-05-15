<div>
    <div class="comment-respond">
        <h3 class="comment-reply-title">نظر بدهید</h3>

        <form class="comment-form" wire:submit.prevent="store" method="post">
            @csrf
            <p class="comment-notes">
                <span id="email-notes">آدرس ایمیل شما منتشر نخواهد شد</span>
                اطلاعات شما محفوظ است
                <span class="required">*</span>
            </p>
            <p class="comment-form-comment">
                <label>نظر</label>
                <textarea name="content" wire:model="content" id="comment" cols="45" rows="5" maxlength="65525" required="required"></textarea>

                @error("content")
                <span class="text text-danger">{{$message}}</span>
                @enderror
            </p>

            <p class="form-submit">
                <input type="submit" name="submit" id="submit" class="submit" value="ارسال نظر">
            </p>
        </form>
    </div>
</div>
