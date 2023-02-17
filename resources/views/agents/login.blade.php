<!DOCTYPE html>
<html lang="fa" dir="rtl">
@include('layouts.head')
<!-- /header content -->
<body class="login">
    @include('sweetalert::alert')
         @include('partials._msg')
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <a class="hiddenanchor" id="reset"></a>

      <div class="login_wrapper">
        <div class="animate form login_form x_panel">
          <section class="login_content">
            <form  action="{{ route('agent.login') }}"  method="POST">
                @csrf
              <h1>تسجيل دخول الوكلاء  </h1>
              <div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="text" class="form-control" placeholder="البريد الالكتروني" name="user_name"  required autofocus/>

              </div>
              <div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="password" min="3" class="form-control" placeholder="كلمة المرور"  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />

              </div>
              <div>
                <button class="btn btn-default submit" >تسجيل الدخول </button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">


                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> <span style="font-weight: bold; letter-spacing: 1px;">ExSuda</span> </h1>
                  <p>2022 جميع الحقوق محفوظة لشركة سوداكود</p>
                </div>
              </div>
            </form>
          </section>
        </div>

      </div>
    </div>
  </body>
</html>
