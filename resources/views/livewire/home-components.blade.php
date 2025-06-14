<div>
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14204894.14349098!2d109.78677494385022!3d-2.100861175253936!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c4c07d7496404b7%3A0xe37b4de71badf485!2sIndonesia!5e0!3m2!1sid!2sid!4v1749921027816!5m2!1sid!2sid" style="border:0; width: 100%;height:100vh;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  <div class="wrapper-map">
    <input type="checkbox" id="toogle" class="hidden-trigger">
    <label for="toogle" class="circle">
    <svg class="svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="48" height="48" xml:space="preserve" version="1.1" viewBox="0 0 48 48">
      <image width="48" height="48" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAQAAAD9CzEMAAAAbElEQVR4Ae3XwQnFQAiE4eVVsGAP1mkPFjwvQvYSWCQYCYGZv4Dv5MGB5ghcIiDQI+kCftCzNsAR8y5gYu2rwCBAgMBTgEC3rek2yQEtAZoDjso8AyaKexmIDJUZD40AAQIE0gwx449GgMC9/t0b7GTsa7J+AAAAAElFTkSuQmCC"></image>
    </svg>
    </label>
    
    <div class="subs">
      <button class="sub-circle" onclick="window.location.href='/users'">
        <input value="1" name="sub-circle" type="radio" id="sub1" class="hidden-sub-trigger">
        <label for="sub1">
          <img src="{{asset('image/users.png')}}" alt="users" width="40" srcset="">
        </label>
      </button>
      <button class="sub-circle" onclick="window.location.href='/history'">
        <input value="1" name="sub-circle" type="radio" id="sub2" class="hidden-sub-trigger">
        <label for="sub2">
          <img src="{{asset('image/history.png')}}" alt="users" width="40" srcset="">
        </label>
      </button>
      <button class="sub-circle" onclick="window.location.href='/pegawai'">
        <input value="1" name="sub-circle" type="radio" id="sub3" class="hidden-sub-trigger">
        <label for="sub3">
          <img src="{{asset('image/employee.png')}}" alt="users" width="40" srcset="">
        </label>
      </button>
      <button class="sub-circle" onclick="window.location.href='/ruangan'">
        <input value="1" name="sub-circle" type="radio" id="sub4" class="hidden-sub-trigger">
        <label for="sub4">
          <img src="{{asset('image/room.png')}}" alt="users" width="40" srcset="">
        </label>
      </button>
      <button class="sub-circle" onclick="window.location.href='/perangkat'">
        <input value="1" name="sub-circle" type="radio" id="sub5" class="hidden-sub-trigger">
        <label for="sub5">
          <img src="{{asset('image/cctv.png')}}" alt="users" width="40" srcset="">
        </label>
      </button>
    </div>
  </div>
</div>