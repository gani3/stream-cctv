<style>
   .bg-peta {
      /* background-image: url('/image/newTMIIMAP.jpg'); */
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      height: 100vh;
      background-image: url('{{asset("image/newTMIIMAP.jpg")}}');
      /* background-size: contain; */
   }
</style>

<div>
  <div class="bg-peta" id="myDiv">

  </div>
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

<script>


// mengambil posisi ketika di klik

 const div = document.getElementById('myDiv');
  div.addEventListener('click', function(e) {
    const x = e.clientX; // posisi X terhadap viewport
    const y = e.clientY; // posisi Y terhadap viewport
    alert(`Klik pada posisi:\nX: ${x}, Y: ${y}`);
  });
</script>