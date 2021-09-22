<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="/assets/css/sign_up.css">


  <title>Hello, world!</title>
</head>

<body>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
          <div class="card-img-left d-none d-md-flex">
            <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Register</h5>
            <form>

              <div class="form-floating mb-3">
                <input class="form-control" id="username" type="text" placeholder="Username" data-sb-validations="required" />
                <label for="username">Username</label>
                <div class="invalid-feedback" data-sb-feedback="username:required">Username is required.</div>
              </div>

              <div class="form-floating mb-3">
                <input class="form-control" id="password" type="text" placeholder="Password" data-sb-validations="required" />
                <label for="password">Password</label>
                <div class="invalid-feedback" data-sb-feedback="password:required">Password is required.</div>
              </div>

              <hr>

              <div class="form-floating mb-3">
                <textarea class="form-control" id="alamat" type="text" placeholder="Alamat" style="height: 10rem;" data-sb-validations=""></textarea>
                <label for="alamat">Alamat</label>
              </div>
              
              <div class="form-floating mb-3">
                <input class="form-control" id="nomorHp" type="text" placeholder="Nomor HP" data-sb-validations="" />
                <label for="nomorHp">Nomor HP</label>
              </div>

              <div class="form-floating mb-3">
                <input class="form-control" id="email" type="email" placeholder="Email" data-sb-validations="email" />
                <label for="email">Email</label>
                <div class="invalid-feedback" data-sb-feedback="email:email">Email Email is not valid.</div>
              </div>

              <div class="form-floating mb-3">
                <input class="form-control" id="fileKtp" type="text" placeholder="File KTP" data-sb-validations="" />
                <label for="fileKtp">File KTP</label>
              </div>

              <div class="form-floating mb-3">
                <input class="form-control" id="fotoProfile" type="text" placeholder="Foto Profile" data-sb-validations="" />
                <label for="fotoProfile">Foto Profile</label>
              </div>

              <div class="d-none" id="submitSuccessMessage">
                <div class="text-center mb-3">
                  <div class="fw-bolder">Form submission successful!</div>
                  <p>To activate this form, sign up at</p>
                  <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                </div>
              </div>

              <div class="d-none" id="submitErrorMessage">
                <div class="text-center text-danger mb-3">Error sending message!</div>
              </div>

              <div class="d-grid">
                <button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Submit</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>