{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-10 center-screen">
            <div class="card animated fadeIn w-100 p-3">
                <div class="card-body">
                    <h4>Sign Up</h4>
                    <hr />
                    <div class="container-fluid m-0 p-0">
                        <div class="row m-0 p-0 ">
                            <div class="col-md-4 p-2">
                                <label>Email Address</label>
                                <input id="email" placeholder="User Email" class="form-control" type="email" />
                            </div>
                            <div class="col-md-4 p-2">
                                <label>First Name</label>
                                <input id="firstName" placeholder="First Name" class="form-control" type="text" />
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Last Name</label>
                                <input id="lastName" placeholder="Last Name" class="form-control" type="text" />
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Mobile Number</label>
                                <input id="mobile" placeholder="Mobile" class="form-control" type="mobile" />
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Password</label>
                                <input id="password" placeholder="User Password" class="form-control"
                                    type="password" />
                            </div>
                        </div>
                        <div class="row m-0 p-0">
                            <div class="col-md-4 p-2 ">
                                <button onclick="onRegistration()" class="btn mt-3 w-100  gradient-custom text-white">Complete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="container">
    <div class="row d-flex justify-content-center align-items-center h-100 ">
        <div class="col-md-10 col-lg-10 center-screen">
            <div class="card animated fadeIn w-100 p-3">
                <div class="card-body">
                    <h4 class="text-color">Sign Up</h4>
                    <hr />
                    <div class="container-fluid m-0 p-0">
                        <div class="row m-0 p-0">
                            <div class="col-md-4 gradient-custom text-center text-white"
                                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                    alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                                <h5>Marie Horwitz</h5>
                                <p>Web Designer</p>
                                <i class="far fa-edit mb-5"></i>
                            </div>
                            <div class="col-md-8 gradient-custom ">
                                <div class="row">
                                    <div class="col-md-6 p-2">
                                        <label class="text-white">Email Address</label>
                                        <input id="email" placeholder="User Email" class="form-control"
                                            type="email" />
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <label class="text-white">First Name</label>
                                        <input id="firstName" placeholder="First Name" class="form-control"
                                            type="text" />
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <label class="text-white">Last Name</label>
                                        <input id="lastName" placeholder="Last Name" class="form-control"
                                            type="text" />
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <label class="text-white">Mobile Number</label>
                                        <input id="mobile" placeholder="Mobile" class="form-control"
                                            type="mobile" />
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <label class="text-white">Password</label>
                                        <input id="password" placeholder="User Password" class="form-control"
                                            type="password" />
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row m-0 p-0">
                            <div class="col-md-4 p-2 ">
                                <button onclick="onRegistration()"
                                    class="btn mt-3 w-100  gradient-custom text-white">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    async function onRegistration() {
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        let firstName = document.getElementById('firstName').value;
        let lastName = document.getElementById('lastName').value;
        let mobile = document.getElementById('mobile').value;
        if (email.length === 0) {
            errorToast("Email Required !");
        } else if (password.length === 0) {
            errorToast("Password Required !")
        } else if (firstName.length === 0) {
            errorToast("First Name Required")
        } else if (lastName.length === 0) {
            errorToast("Last Name Required")
        } else if (mobile.length === 0) {
            errorToast("Mobile Number Required !")
        } else {
            showLoader();
            let res = await axios.post("/User-Registration", {
                firstName: firstName,
                lastName: lastName,
                email: email,
                password: password,
                mobile: mobile
            })
            hideLoader();
            if (res.status === 200 && res.data['status'] === "success") {
                successToast(res.data['message']);
                setTimeout(() => {
                    window.location.href = "/userLogin"
                }, 2000);

            } else {
                errorToast(res.data['message']);
            }
        }
    }
</script>
