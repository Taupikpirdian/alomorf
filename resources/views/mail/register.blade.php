<!DOCTYPE html>
<html>
  <body style="background-color: #222533; padding: 20px; font-family: font-size: 14px; line-height: 1.43; font-family: &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif;">
    <div style="max-width: 600px; margin: 10px auto 20px; font-size: 12px; color: #A5A5A5; text-align: center;">
    </div>
    <div style="max-width: 600px; margin: 0px auto; background-color: #fff; box-shadow: 0px 20px 50px rgba(0,0,0,0.05);">
      <table style="width: 100%;">
        <tr>
          <td style="background-color: #fff;">
            <img alt="" src="{{ asset('/front/images/logoweb.jpg') }}" style="width: 200px; padding: 20px">
          </td>
          <td style="padding-left: 50px; text-align: right; padding-right: 20px;">
          </td>
        </tr>
      </table><div style="padding: 40px 70px; border-top: 1px solid rgba(0,0,0,0.05);">
        <h1 style="margin-top: 0px;">
          Selamat datang di alomorf.com!
        </h1>
        <div style="color: #636363; font-size: 14px;">
          <p>
            Hi {{ $data['name'] }}, Terimakasih telah mendaftar di alomorf.com.
          </p>
          <p>
            Silahkan klik tombol verifikasi di bawah ini untuk melakukan verifikasi akun anda.
          </p>
        </div>
        <div style="border: 2px solid #4B72FA; padding: 40px; margin: 40px 0px;">
          <table style="width: 100%; border-top: 1px solid #eee">
            <tr>
              <td style="text-align: center;">
                <a href="{{ url('/verification?token='.$data['token']) }}" style="padding: 8px; background-color: #4B72FA; color: #fff; font-weight: bolder; font-size: 16px; display: inline-block; margin: 0px; text-decoration: none;">Verifikasi Akun</a>
              </td>
            </tr>
          </table>
        </div>
        <h4 style="margin-bottom: 10px;">
          Butuh bantuan?
        </h4>
        <div style="color: #A5A5A5; font-size: 12px;">
          <p>
            Jika anda ingin mengetahui informasi lebih lanjut silahkan hubungi kami via email : <a href="#" style="text-decoration: underline; color: #4B72FA;">alomorff@gmail.com</a>
          </p>
        </div>
      </div><div style="background-color: #F5F5F5; padding: 40px; text-align: center;">
        <div style="margin-top: 0px; padding-top: 0px; border-top: 1px solid rgba(0,0,0,0.05);">
          <div style="color: #A5A5A5; font-size: 10px; margin-bottom: 5px;">
            <!-- 1073 Madison Ave, suite 649, New York, NY 10001 -->
          </div>
          <div style="color: #A5A5A5; font-size: 10px;">
            <a href="http://alomorf.com"> alomorf.com </a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
