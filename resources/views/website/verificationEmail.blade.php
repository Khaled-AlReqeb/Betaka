<form method="POST" action="{{ url('/email/verification-notification') }}">
    @csrf
    <div class="alert alert-danger" role="alert">
        لتفعيل صفحة حسابك نتمنى تأكيد بريدك الالكتروني بالضغط على زر التأكيد المرسل له ({{ auth()->user()->email }})  .
        <button type="submit" title="#" class="alert-link" style="border: none;background-color:#f2dede">إعادة ارسال رابط التفعيل</button>
        {{--                لتفعيل صفحة حسابك نتمنى تأكيد بريدك الالكتروني بالضغط على زر التأكيد المرسل له (faisal@toot.im)  .  <a href="success.html" title="#" class="alert-link">إعادة ارسال رابط التفعيل</a>--}}
    </div><!-- alert -->
</form>
