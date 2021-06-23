<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>User Subscription</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>
    <form class="signup-form" action="{{ route('subscribe') }}" method="post">
        @csrf
        <!-- form header -->
        <div class="form-header">
            <h1>User Subscription Form</h1>
        </div>
        @if (\Session::has('success'))
            <h4 class="success">Thank you</h4>            
        @endif
        <!-- form body -->
        <div class="form-body">

            <!-- Firstname and Lastname -->
            <div class="horizontal-group">
                <div class="form-group left">
                    <label for="firstname" class="label-title">First name *</label>
                    <input type="text" name="firstname" id="firstname" class="form-input" placeholder="enter your first name" required="required" />
                </div>
                <div class="form-group right">
                    <label for="lastname" class="label-title">Last name</label>
                    <input type="text" name="lastname" id="lastname" class="form-input" placeholder="enter your last name" />
                </div>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email" class="label-title">Email *</label>
                <input type="email" name="email" id="email" class="form-input" placeholder="enter your email" required="required" value="{{ $email }}">
            </div>

            <!-- Refer ID and Phone No -->
            <div class="horizontal-group">
                <div class="form-group left">
                    <label for="ReferID" class="label-title">Refer ID </label>
                    <input type="text" name="refid" id="refid" class="form-input" placeholder="enter your Refer ID">
                </div>
                <div class="form-group right">
                    <label for="Phone No" class="label-title">Phone No *</label>
                    <input type="tel" class="form-input" name="phone" id="phone" placeholder="enter your phone No" required="required">
                </div>
            </div>

            <!-- Address -->
            <div class="form-group">
                <label for="address" class="label-title">Address *</label>
                <input type="text" name="address" id="address" class="form-input" placeholder="enter your address" required="required">
            </div>

            <!-- City, state and country (Readonly because it would be automatically gotten from user IP)-->
            <div class="horizontal-group">
                <div class="form-group left">
                    <label for="City" class="label-title">City </label>
                    <input type="text" name="city" id="city" class="form-input" placeholder="" readonly>
                </div>
                <div class="form-group right">
                    <label for="State" class="label-title">State </label>
                    <input type="text" name="state" class="form-input" id="state" placeholder="" readonly>
                </div>
            </div>
            <div class="horizontal-group">
                <div class="form-group left">
                    <label for="Phone No" class="label-title">Country</label>
                    <input type="text" name="country" class="form-input" id="country" placeholder="" readonly>
                </div>

                <!-- Source of Income -->
                <div class="form-group right">
                    <label class="label-title">Source of Income</label>
                    <select class="form-input" name="source" id="level">
                        <option value="Employed">Employed</option>
                        <option value="Self-employed">Self-employed</option>
                        <option value="Unemployed">Unemployed</option>
                    </select>
                </div>


                <!-- Income and age -->

                <div class="form-group left">
                    <label for="experience" class="label-title">Income (Per annum)</label>
                    <input type="range" min="20" max="500" step="5" value="0" name="income" id="experience" class="form-input" onChange="change();" style="height:28px;width:78%;padding:0;">
                    <span id="range-label">20K</span>
                </div>

                <div class="horizontal-group">
                    <div class="form-group right">
                        <label for="age" class="label-title">Age</label>
                        <input type="number" name="age" min="18" max="80" value="18" class="form-input">
                    </div>

                    <!-- Gender and Contact option -->
                    <div class="form-group right">
                        <label class="label-title">Best contact Option</label>
                        <select class="form-input" name="contact_option" id="level">
                            <option value="Email">Email</option>
                            <option value="Phone">Phone</option>
                        </select>
                    </div>

                    <div class="horizontal-group">
                        <div class="form-group left">
                            <label class="label-title">Gender:</label>
                            <div class="input-group">
                                <label for="male"><input type="radio" name="gender" value="male" id="male"> Male</label>
                                <label for="female"><input type="radio" name="gender" value="female" id="female"> Female</label>
                            </div>
                        </div>


                        <!-- form-footer -->
                        <div class="form-footer">
                            <span>* required</span>
                            <button type="submit" class="btn">Subscribe</button>
                        </div>

    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <!-- Script for range input label -->
    <script>
        var rangeLabel = document.getElementById("range-label");
        var experience = document.getElementById("experience");

        function change() {
            rangeLabel.innerText = experience.value + "K";
        }
       

        $.getJSON('https://json.geoiplookup.io/?callback=?', function (data) {
            console.log(data);
            // $(".ip").text(data.ip);\
            // var settings = {
            // "url": `https://api.ipgeolocation.io/ipgeo?apiKey=a5b0180d74874ac5af4f7baaf3065e36&ip=${data.ip}?callback=?`,
            // "method": "GET",
            // "timeout": 0,
        
                let city = document.querySelector('#city');
                let st = document.querySelector('#state');
                let ct = document.querySelector('#country');
                city.value = data.city;
                st.value = data.region;
                ct.value = data.country_name;
        });
        
    </script>
    <style>
        .success {
            text-align: center;
            color: #0fb10f;
        }
    </style>
</body>

</html>