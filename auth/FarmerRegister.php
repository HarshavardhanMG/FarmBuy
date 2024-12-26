<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Farmer Registration Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #4a90e2;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #333;
        }

        .container {
            background: #ffffff;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 500px;
            text-align: center;
            animation: slideIn 1s ease-out;
        }

        .container h1 {
            font-family: 'Pacifico', cursive;
            margin-bottom: 20px;
            color: #4a90e2;
        }

        .form-control {
            background: #f0f2f5;
            border: 1px solid #ccc;
            color: #333;
            margin-bottom: 20px;
            border-radius: 30px;
            padding: 10px 20px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #4a90e2;
            background: #ffffff;
        }

        .btn {
            background: #4a90e2;
            color: #fff;
            border: none;
            border-radius: 30px;
            padding: 10px 20px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background: #357ab7;
        }

        .links a {
            color: #4a90e2;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .links a:hover {
            color: #357ab7;
        }

        @keyframes slideIn {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Farmer Registration</h1>
        <form name="my-form" action="FarmerRegister.php" method="post">
            <div class="form-group">
                <input type="text" id="full_name" class="form-control" name="name" placeholder="Enter Your Name" required>
            </div>
            <div class="form-group">
                <input type="text" id="phone_number" class="form-control" name="phonenumber" placeholder="Phone Number" required>
            </div>
            <div class="form-group">
                <textarea id="present_address" class="form-control" rows="4" name="address" placeholder="Address" required></textarea>
            </div>
            <div class="form-group">
                <select name="statevalue" id="states" onchange="state()" class="form-control">
                    <option value="0">--Select State--</option>
                    <option value="ANDAMAN & NICOBAR ISLANDS">ANDAMAN & NICOBAR ISLANDS</option>
                    <option value="ANDHRA PRADESH">ANDHRA PRADESH</option>
                    <option value="ARUNACHAL PRADESH">ARUNACHAL PRADESH</option>
                    <option value="ASSAM">ASSAM</option>
                    <option value="BIHAR">BIHAR</option>
                    <option value="CHANDIGARH">CHANDIGARH</option>
                    <option value="CHHATTISGARH">CHHATTISGARH</option>
                    <option value="DADRA AND NAGAR HAVELI">DADRA AND NAGAR HAVELI</option>
                    <option value="DAMAN AND DIU">DAMAN AND DIU</option>
                    <option value="DELHI">DELHI</option>
                    <option value="GOA">GOA</option>
                    <option value="GUJARAT">GUJARAT</option>
                    <option value="HARYANA">HARYANA</option>
                    <option value="HIMACHAL PRADESH">HIMACHAL PRADESH</option>
                    <option value="JAMMU AND KASHMIR">JAMMU AND KASHMIR</option>
                    <option value="JHARKAND">JHARKAND</option>
                    <option value="KARNATAKA">KARNATAKA</option>
                    <option value="KERALA">KERALA</option>
                    <option value="LAKSHADWEEP">LAKSHADWEEP</option>
                    <option value="MADHYA PRADESH">MADHYA PRADESH</option>
                    <option value="MAHARASHTRA">MAHARASHTRA</option>
                    <option value="MANIPUR">MANIPUR</option>
                    <option value="MEGHALAYA">MEGHALAYA</option>
                    <option value="MIZORAM">MIZORAM</option>
                    <option value="NAGALAND">NAGALAND</option>
                    <option value="ODISHA">ODISHA</option>
                    <option value="PUDUCHERRY">PUDUCHERRY</option>
                    <option value="PUNJAB">PUNJAB</option>
                    <option value="RAJASTHAN">RAJASTHAN</option>
                    <option value="SIKKIM">SIKKIM</option>
                    <option value="TAMIL NADU">TAMIL NADU</option>
                    <option value="TELANGANA">TELANGANA</option>
                    <option value="TRIPURA">TRIPURA</option>
                    <option value="UTTAR PRADESH">UTTAR PRADESH</option>
                    <option value="UTTARAKHAND">UTTARAKHAND</option>
                    <option value="WEST BENGAL">WEST BENGAL</option>
                </select>
            </div>
            <div class="form-group">
                <select name="district" id="district" class="form-control">
                    <option>Select District</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" id="account2" class="form-control" name="pan" placeholder="Pan number" required>
            </div>
            <div class="form-group">
                <input type="text" id="account1" class="form-control" name="account" placeholder="Bank Account number" required>
            </div>
            <div class="form-group">
                <input id="p1" class="form-control" type="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input id="p2" class="form-control" type="password" name="confirmpassword" placeholder="Confirm Password" required>
            </div>
            <button type="submit" class="btn" name="register" value="Register">Register</button>
        </form>
    </div>
    <script>
        function state() {
            var a = document.getElementById('states').value;
            if (a === 'ANDAMAN & NICOBAR ISLANDS') {
                var array = ['Andamans', 'Nicobars'];
            } else if (a === 'ANDHRA PRADESH') {
                var array = ['Adilabad', 'Nizamabad', 'Karimnagar', 'Medak', 'Hyderabad', 'Rangareddi', 'Mahbubnagar', 'Nalgonda', 'Warangal', 'Khammam', 'Srikakulam', 'Vizianagaram', 'Visakhapatnam', 'East Godavari', 'West Godavari', 'Krishna', 'Guntur', 'Prakasam', 'Nellore', 'Cuddapah', 'Kurnool', 'Anantapur', 'Chittoor'];
            } else if (a === 'ASSAM') {
                var array = ['Kokrajhar', 'Dhubri', 'Goalpara', 'Bongaigaon', 'Barpeta', 'Kamrup', 'Nalbari', 'Darrang', 'Marigaon', 'Nagaon', 'Sonitpur', 'Lakhimpur', 'Dhemaji', 'Tinsukia', 'Dibrugarh', 'Sibsagar', 'Jorhat', 'Golaghat', 'Karbi Anglong', 'North Cachar Hills', 'Cachar', 'Karimganj', 'Hailakandi'];
            } else if (a === 'BIHAR') {
                var array = ['Pashchim Champaran', 'Purba Champaran', 'Sheohar *', 'Sitamarhi', 'Madhubani', 'Supaul *', 'Araria', 'Kishanganj', 'Purnia', 'Katihar', 'Madhepura', 'Saharsa', 'Darbhanga', 'Muzaffarpur', 'Gopalganj', 'Siwan', 'Saran', 'Vaishali', 'Samastipur', 'Begusarai', 'Khagaria', 'Bhagalpur', 'Banka *', 'Munger', 'Lakhisarai *', 'Sheikhpura *', 'Nalanda', 'Patna', 'Bhojpur', 'Buxar *', 'Kaimur (Bhabua) *', 'Rohtas', 'Jehanabad ', 'Aurangabad', 'Gaya', 'Nawada', 'Jamui *'];
            } else if (a === 'GUJARAT') {
                var array = ['Kachchh', 'Banas Kantha', 'Patan  *', 'Mahesana', 'Sabar Kantha', 'Gandhinagar', 'Ahmadabad', 'Surendranagar', 'Rajkot', 'Jamnagar', 'Porbandar  *', 'Junagadh', 'Amreli', 'Bhavnagar', 'Anand  *', 'Kheda', 'Panch Mahals', 'Dohad  *', 'Vadodara', 'Narmada  *', 'Bharuch', 'Surat', 'The Dangs', 'Navsari  *', 'Valsad'];
            } else if (a === 'HARYANA') {
                var array = ['Panchkula *', 'Ambala', 'Yamunanagar', 'Kurukshetra', 'Kaithal', 'Karnal', 'Panipat', 'Sonipat', 'Jind', 'Fatehabad *', 'Sirsa', 'Hisar', 'Bhiwani', 'Rohtak', 'Jhajjar *', 'Mahendragarh', 'Rewari', 'Gurgaon', 'Faridabad'];
            } else if (a === 'HIMACHAL PRADESH') {
                var array = ['Chamba', 'Kangra', 'Lahul & Spiti', 'Kullu', 'Mandi', 'Hamirpur', 'Una', 'Bilaspur', 'Solan', 'Sirmaur', 'Shimla', 'Kinnaur'];
            } else if (a === 'JAMMU AND KASHMIR') {
                var array = ['Kupwara', 'Baramula', 'Srinagar', 'Badgam', 'Pulwama', 'Anantnag', 'Leh (Ladakh)', 'Kargil', 'Doda', 'Udhampur', 'Punch', 'Rajauri', 'Jammu', 'Kathua'];
            } else if (a === 'KARNATAKA') {
                var array = ['Belgaum', 'Bagalkot ', 'Bijapur', 'Gulbarga', 'Bidar', 'Raichur', 'Koppal *', 'Gadag *', 'Dharwad', 'Uttara Kannada', 'Haveri *', 'Bellary', 'Chitradurga', 'Davangere', 'Shimoga', 'Udupi ', 'Chikmagalur', 'Tumkur', 'Kolar', 'Bangalore', 'Bangalore Rural', 'Mandya', 'Hassan', 'Dakshina Kannada', 'Kodagu', 'Mysore', 'Chamrajnagar'];
            } else if (a === 'KERALA') {
                var array = ['Kasaragod', 'Kannur', 'Wayanad', 'Kozhikode', 'Malappuram', 'Palakkad', 'Thrissur', 'Ernakulam', 'Idukki', 'Kottayam', 'Alappuzha', 'Pathanamthitta', 'Kollam', 'Thiruvananthapuram'];
            } else if (a === 'MADHYA PRADESH') {
                var array = ['Sheopur *', 'Morena', 'Bhind', 'Gwalior', 'Datia', 'Shivpuri', 'Guna', 'Tikamgarh', 'Chhatarpur', 'Panna', 'Sagar', 'Damoh', 'Satna', 'Rewa', 'Umaria *', 'Shahdol', 'Sidhi', 'Neemuch *', 'Mandsaur', 'Ratlam', 'Ujjain', 'Shajapur', 'Dewas', 'Jhabua', 'Dhar', 'Indore', 'West Nimar', 'Barwani *', 'East Nimar', 'Rajgarh', 'Vidisha', 'Bhopal', 'Sehore', 'Raisen', 'Betul', 'Harda *', 'Hoshangabad', 'Katni *', 'Jabalpur', 'Narsimhapur', 'Dindori *', 'Mandla', 'Chhindwara', 'Seoni', 'Balaghat'];
            } else if (a === 'MAHARASHTRA') {
                var array = ['Nandurbar *', 'Dhule', 'Jalgaon', 'Buldana', 'Akola', 'Washim *', 'Amravati', 'Wardha', 'Nagpur', 'Bhandara', 'Gondiya *', 'Gadchiroli', 'Chandrapur', 'Yavatmal', 'Nanded', 'Hingoli *', 'Parbhani', 'Jalna', 'Aurangabad', 'Nashik', 'Thane', 'Mumbai (Suburban) *', 'Mumbai', 'Raigarh', 'Pune', 'Ahmadnagar', 'Bid', 'Latur', 'Osmanabad', 'Solapur', 'Satara', 'Ratnagiri', 'Sindhudurg', 'Kolhapur', 'Sangli'];
            } else if (a === 'TAMIL NADU') {
                var array = ['Thiruvallur', 'Chennai', 'Kancheepuram', 'Vellore', 'Dharmapuri', 'Tiruvannamalai', 'Viluppuram', 'Salem', 'Namakkal   *', 'Erode', 'The Nilgiris', 'Coimbatore', 'Dindigul', 'Karur  *', 'Tiruchirappalli', 'Perambalur  *', 'Ariyalur  *', 'Cuddalore', 'Nagapattinam  *', 'Thiruvarur', 'Thanjavur', 'Pudukkottai', 'Sivaganga', 'Madurai', 'Theni  *', 'Virudhunagar', 'Ramanathapuram', 'Thoothukkudi', 'Tirunelveli ', 'Kanniyakumari'];
            } else if (a === 'PUDUCHERRY') {
                var array = ['Yanam', 'Pondicherry', 'Mahe', 'Karaikal'];
            } else if (a === 'LAKSHADWEEP') {
                var array = ['Lakshadweep'];
            } else if (a === 'GOA') {
                var array = ['North Goa ', 'South Goa'];
            } else if (a === 'DADRA AND NAGAR HAVELI') {
                var array = ['Dadra & Nagar Haveli'];
            } else if (a === 'DAMAN AND DIU') {
                var array = ['Diu', 'Daman'];
            } else if (a === 'CHHATTISGARH') {
                var array = ['Koriya ', 'Surguja', 'Jashpur *', 'Raigarh', 'Korba *', 'Janjgir - Champa', 'Bilaspur', 'Kawardha ', 'Rajnandgaon', 'Durg', 'Raipur', 'Mahasamund *', 'Dhamtari *', 'Kanker *', 'Baster', 'Dantewada'];
            } else if (a === 'JHARKAND') {
                var array = ['Garhwa *', 'Palamu', 'Chatra *', 'Hazaribag', 'Kodarma *', 'Giridih', 'Deoghar', 'Godda', 'Sahibganj', 'Pakaur *', 'Dumka', 'Dhanbad', 'Bokaro *', 'Ranchi', 'Lohardaga', 'Gumla', 'Pashchimi Singhbhum', 'Purbi Singhbhum', 'ORISSA', 'Bargarh  *', 'Jharsuguda  *', 'Sambalpur', 'Debagarh  *', 'Sundargarh', 'Kendujhar', 'Mayurbhanj', 'Baleshwar', 'Bhadrak  *', 'Kendrapara *', 'Jagatsinghapur  *', 'Cuttack', 'Jajapur  *', 'Dhenkanal', 'Anugul  *', 'Nayagarh  *', 'Khordha  *', 'Puri', 'Ganjam', 'Gajapati  *', 'Kandhamal', 'Baudh  *', 'Sonapur  *', 'Balangir', 'Nuapada  *', 'Kalahandi', 'Rayagada  *', 'Nabarangapur  *', 'Koraput', 'Malkangiri  *'];
            } else if (a === 'WEST BENGAL') {
                var array = ['Darjiling ', 'Jalpaiguri ', 'Koch Bihar ', 'Uttar Dinajpur', 'Dakshin Dinajpur *', 'Maldah ', 'Murshidabad ', 'Birbhum', 'Barddhaman ', 'Nadia ', 'North Twenty Four Parganas', 'Hugli ', 'Bankura ', 'Puruliya', 'Medinipur ', 'Haora ', 'Kolkata', 'South  Twenty Four Parganas'];
            } else if (a === 'MEGHALAYA') {
                var array = ['West Garo Hills', 'East Garo Hills', 'South Garo Hills *', 'West Khasi Hills', 'Ri Bhoi  *', 'East Khasi Hills', 'Jaintia Hills'];
            } else if (a === 'SIKKIM') {
                var array = ['North ', 'West', 'South', 'East'];
            } else if (a === 'UTTAR PRADESH') {
                var array = ['Saharanpur', 'Muzaffarnagar', 'Bijnor', 'Moradabad', 'Rampur', 'Jyotiba Phule Nagar *', 'Meerut', 'Baghpat *', 'Ghaziabad', 'Gautam Buddha Nagar *', 'Bulandshahr', 'Aligarh', 'Hathras *', 'Mathura', 'Agra', 'Firozabad', 'Etah', 'Mainpuri', 'Budaun', 'Bareilly', 'Pilibhit', 'Shahjahanpur', 'Kheri', 'Sitapur', 'Hardoi', 'Unnao', 'Lucknow', 'Rae Bareli', 'Farrukhabad', 'Kannauj *', 'Etawah', 'Auraiya *', 'Kanpur Dehat', 'Kanpur Nagar', 'Jalaun ', 'Jhansi', 'Lalitpur', 'Hamirpur', 'Mahoba *', 'Banda', 'Chitrakoot *', 'Fatehpur', 'Pratapgarh', 'Kaushambi *', 'Allahabad ', 'Barabanki', 'Faizabad', 'Ambedkar Nagar *', 'Sultanpur', 'Bahraich', 'Shrawasti *', 'Balrampur *', 'Gonda', 'Siddharthnagar', 'Basti', 'Sant Kabir Nagar *', 'Maharajganj', 'Gorakhpur', 'Kushinagar *', 'Deoria', 'Azamgarh', 'Mau', 'Ballia', 'Jaunpur', 'Ghazipur', 'Chandauli *', 'Varanasi', 'Sant Ravidas Nagar *', 'Mirzapur', 'Sonbhadra'];
            } else if (a === 'RAJASTHAN') {
                var array = ['Ganganagar', 'Hanumangarh *', 'Bikaner', 'Churu', 'Jhunjhunun', 'Alwar', 'Bharatpur', 'Dhaulpur', 'Karauli *', 'Sawai Madhopur', 'Dausa *', 'Jaipur', 'Sikar', 'Nagaur', 'Jodhpur', 'Jaisalmer', 'Barmer', 'Jalor', 'Sirohi', 'Pali', 'Ajmer', 'Tonk', 'Bundi', 'Bhilwara', 'Rajsamand *', 'Udaipur', 'Dungarpur', 'Banswara', 'Chittaurgarh', 'Kota', 'Baran *', 'Jhalawar'];
                //check
            } else if (a === 'PUNJAB') {
                var array = ['Gurdaspur', 'Amritsar', 'Kapurthala', 'Jalandhar', 'Hoshiarpur', 'Nawanshahr *', 'Rupnagar', 'Fatehgarh Sahib *', 'Ludhiana', 'Moga *', 'Firozpur', 'Muktsar *', 'Faridkot', 'Bathinda', 'Mansa *', 'Sangrur', 'Patiala'];
            } else if (a === 'NAGALAND') {
                var array = ['Mon', 'Tuensang', 'Mokokchung', 'Zunheboto', 'Wokha', 'Dimapur *', 'Kohima', 'Phek', 'MANIPUR', 'Senapati', 'Tamenglong', 'Churachandpur', 'Bishnupur', 'Thoubal', 'Imphal West', 'Imphal East *', 'Ukhrul', 'Chandel'];
            } else if (a === 'TRIPURA') {
                var array = ['West Tripura ', 'South Tripura ', 'Dhalai  *', 'North Tripura '];
            } else if (a === 'MIZORAM') {
                var array = ['Mamit *', 'Kolasib *', 'Aizawl', 'Champhai *', 'Serchhip *', 'Lunglei', 'Lawngtlai', 'Saiha *'];
            } else if (a === 'ARUNACHAL PRADESH') {
                var array = ['Tawang', 'West Kameng', 'East Kameng', 'Papum Pare *', 'Lower Subansiri', 'Upper Subansiri', 'West Siang', 'East Siang', 'Upper Siang *', 'Dibang Valley', 'Lohit', 'Changlang', 'Tirap'];
            } else if (a === 'CHANDIGARH') {
                var array = ['Chandigarh'];
            } else if (a === 'DELHI') {
                var array = ['North West   *', 'North   *', 'North East   *', 'East   *', 'New Delhi', 'Central  *', 'West   *', 'South West   *', 'South  *'];
            } else if (a === 'DELHI') {
                var array = ['Uttarkashi', 'Chamoli', 'Rudraprayag *', 'Tehri Garhwal', 'Dehradun', 'Garhwal', 'Pithoragarh', 'Bageshwar', 'Almora', 'Champawat', 'Nainital', 'Udham Singh Nagar *', 'Hardwar'];
            }


            var string = "";
            for (let i = 0; i < array.length; i++) {
                string = string + "<option>" + array[i] + "</option>";

            }
            string = "<select nmae = 'lol'>" + string + "</select>"
            document.getElementById('district').innerHTML = string;
        }
    </script>
</body>

</html>

<?php
include("../Includes/db.php");

$ciphering = "AES-128-CTR";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$encryption_iv = '2345678910111211';
$encryption_key = "DE";

if (isset($_POST['register'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $account = mysqli_real_escape_string($con, $_POST['account']);
    $pan = mysqli_real_escape_string($con, $_POST['pan']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirmpassword = mysqli_real_escape_string($con, $_POST['confirmpassword']);
    $district = mysqli_real_escape_string($con, $_POST['district']);
    $state = mysqli_real_escape_string($con, $_POST['statevalue']);

    $encryption = openssl_encrypt($password, $ciphering, $encryption_key, $options, $encryption_iv);

    if (strcmp($password, $confirmpassword) == 0) {
        $query = "INSERT INTO farmerregistration (farmer_name, farmer_phone, farmer_address, farmer_state, farmer_district, farmer_pan, farmer_bank, farmer_password) VALUES ('$name', '$phonenumber', '$address', '$state', '$district', '$pan', '$account', '$encryption')";
        $run_register_query = mysqli_query($con, $query);
        echo "<script>console.log('Successfully Inserted');</script>";
        echo "<script>window.open('FarmerLogin.php', '_self')</script>";
    } else {
        echo "<script>alert('Password and Confirm Password should be the same');</script>";
    }
}
?>