<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

    <title>CodeIgniter Tutorial</title>
  </head>
  <body>
  <div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
    <a class="nav-link" href="http://localhost:8080/clients">Home</a>
        <a class="nav-link active ms-0" href="http://localhost:8080/clients/create">Add Client</a>
        <a class="nav-link" href="#" target="__blank">About</a>
        <a class="nav-link" href="#"  target="__blank">Notifications</a>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    <!-- Profile picture upload button-->
                    <button class="btn btn-primary" type="button">Upload new image</button>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <form>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="first_name">First name</label>
                                <input class="form-control" id="first_name" type="text" placeholder="Enter first name" required/>
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="last_name">Last name</label>
                                <input class="form-control" id="last_name" type="text" placeholder="Enter last name" required/>
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="gender">Gender</label>
                                <select class="form-control" id="gender">
                                  <option id="male">Male</option>
                                  <option id="female">Female</option>
                                </select>
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="birthday">Birthday</label>
                                <input class="form-control" id="birthday" type="date" placeholder="Enter date of birth" required/>
                            </div>
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="email">Email</label>
                                <input class="form-control" id="email" type="email" placeholder="Enter email address" required/>
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="position">Position</label>
                                <input class="form-control" id="position" type="text" name="position" placeholder="Enter position" required/>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-12">
                                <label class="small mb-1" for="phone1">Phone (If entering multiple numbers follow the given example)</label>
                                <input class="form-control" id="phone1" type="tel" placeholder="Enter phone numbers eg(0777123456, 0688656434, 0711556677)" required/>
                            </div>
                            <!-- Form Group (birthday)-->
                            <!-- <div class="col-md-6">
                                <label class="small mb-1" for="phone2">Another Phone Number </label>
                                <input class="form-control" id="phone2" type="number" name="phone2" placeholder="Enter another phone number"/>
                            </div> -->
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="address1">Address 1</label>
                            <input class="form-control" id="address1" type="text" placeholder="Enter your physical address" required/>
                        </div>
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="address2">Address 2</label>
                            <input class="form-control" id="address2" type="text" placeholder="Enter another address"/>
                        </div>
                        <!-- Save changes button-->
                        <button class="btn btn-primary" type="submit">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script defer>
  $(document).ready(function(){

    let url = 'http://localhost:8080/clients/create'

    function redirect(){
        window.location.replace('http://localhost:8080/')
    }
    
    $('form').submit(function(e){
      e.preventDefault();

      let fname = $('#first_name').val().trim()
      let lname = $('#last_name').val().trim()
      let gender = $('#gender').val().trim()
      let dob = $('#birthday').val()
      let email = $('#email').val().trim()
      let position = $('#position').val().trim().toLowerCase()
      let phone1 = $('#phone1').val()
      //let phone2 = $('#phone2').val()
      let address1 = $('#address1').val()
      let address2 = $('#address2').val()

      //encodeURI()

      let phone = phone1.split(',')
      let address

      if(address2.length == 0){
        address = address1
      }
      else {
        address = []; address[0] = address1; address[1] = address2
      }

      let data = {
        fname,
        lname,
        gender,
        dob,
        email,
        position,
        phone,
        address
      }

      $.post(url, data, function(data, success){
        console.log(success)

        if(success){

          $('nav').after(
            `<div class="row d-flex align-items-center justify-content-center bg-success"><strong class="text-white">${data}</strong></div>`
          )

          setTimeout(redirect(), 5000);

        }
      })

    })
  })
</script>
</body>
</html>