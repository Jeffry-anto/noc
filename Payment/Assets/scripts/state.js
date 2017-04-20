function populate(s1,s2){
	
	
var modelsArray = new Array(
["", ""],
["Andaman and Nicobar" ," ", "North and Middle Andaman", "South Andaman", "Nicobar","Others"],
["Andhra Pradesh" ,"", "Adilabad", "Anantapur", "Chittoor", "East Godavari", "Guntur", "Hyderabad", "Kadapa", "Karimnagar", "Khammam", "Krishna", "Kurnool", "Mahbubnagar", "Medak", "Nalgonda", "Nellore", "Nizamabad", "Prakasam", "Rangareddi", "Srikakulam", "Vishakhapatnam", "Vizianagaram", "Warangal", "West Godavari","Others"],
["Arunachal Pradesh" ,"", "Anjaw", "Changlang", "East Kameng", "Lohit", "Lower Subansiri", "Papum Pare", "Tirap", "Dibang Valley", "Upper Subansiri", "West Kameng","Others"],
["Assam" ,"", "Barpeta", "Bongaigaon", "Cachar", "Darrang", "Dhemaji", "Dhubri", "Dibrugarh", "Goalpara", "Golaghat", "Hailakandi", "Jorhat", "Karbi Anglong", "Karimganj", "Kokrajhar", "Lakhimpur", "Marigaon", "Nagaon", "Nalbari", "North Cachar Hills", "Sibsagar", "Sonitpur", "Tinsukia","Others"],
["Bihar" ,"", "Araria", "Aurangabad", "Banka", "Begusarai", "Bhagalpur", "Bhojpur", "Buxar", "Darbhanga", "Purba Champaran", "Gaya", "Gopalganj", "Jamui", "Jehanabad", "Khagaria", "Kishanganj", "Kaimur", "Katihar", "Lakhisarai", "Madhubani", "Munger", "Madhepura", "Muzaffarpur", "Nalanda", "Nawada", "Patna", "Purnia", "Rohtas", "Saharsa", "Samastipur", "Sheohar", "Sheikhpura", "Saran", "Sitamarhi", "Supaul", "Siwan", "Vaishali", "Pashchim Champaran","Others"],
["Chandigarh" ,"", "Chandigarh","Others"],
["Chhattisgarh" ,"", 	"Bastar", "Bilaspur", "Dantewada", "Dhamtari", "Durg", "Jashpur", "Janjgir-Champa", "Korba", "Koriya", "Kanker", "Kawardha", "Mahasamund", "Raigarh", "Rajnandgaon", "Raipur", "Surguja","Others"],
["Dadra and Nagar Haveli" ,"", "Dadra","Silvassa","Others"],
["Daman and Diu" ,"", "Diu", "Daman","Others"],
["Delhi" ,"", "Central Delhi", "East Delhi", "New Delhi", "North Delhi", "North East Delhi", "North West Delhi", "South Delhi", "South West Delhi", "West Delhi","Others"],
["Goa" ,"", "North Goa", "South Goa","Others"],
["Gujarat" ,"", "Ahmedabad", "Amreli District", "Anand", "Banaskantha", "Bharuch", "Bhavnagar", "Dahod", "The Dangs", "Gandhinagar", "Jamnagar", "Junagadh", "Kutch", "Kheda", "Mehsana", "Narmada", "Navsari", "Patan", "Panchmahal", "Porbandar", "Rajkot", "Sabarkantha", "Surendranagar", "Surat", "Vadodara", "Valsad","Others"],
["Haryana" ,"", "Ambala", "Bhiwani", "Faridabad", "Fatehabad", "Gurgaon", "Hissar", "Jhajjar", "Jind", "Karnal", "Kaithal", "Kurukshetra", "Mahendragarh", "Mewat", "Panchkula", "Panipat", "Rewari", "Rohtak", "Sirsa", "Sonepat", "Yamuna Nagar", "Palwal","Others"],
["Himachal Pradesh" ,"", "Bilaspur", "Chamba", "Hamirpur", "Kangra", "Kinnaur", "Kulu", "Lahaul and Spiti", "Mandi", "Shimla", "Sirmaur", "Solan", "Una","Others"],
["Jammu and Kashmir" ,"", "Anantnag", "Badgam", "Bandipore", "Baramula", "Doda", "Jammu", "Kargil", "Kathua", "Kupwara", "Leh", "Poonch", "Pulwama", "Rajauri", "Srinagar", "Samba", "Udhampur","Others"],
["Jharkhand" ,"", "Bokaro", "Chatra", "Deoghar", "Dhanbad", "Dumka", "Purba Singhbhum", "Garhwa", "Giridih", "Godda", "Gumla", "Hazaribagh", "Koderma", "Lohardaga", "Pakur", "Palamu", "Ranchi", "Sahibganj", "Seraikela and Kharsawan", "Pashchim Singhbhum", "Ramgarh","Others"],
["Karnataka" ,"", "Bidar", "Belgaum", "Bijapur", "Bagalkot", "Bellary", "Bangalore Rural District", "Bangalore Urban District", "Chamarajnagar", "Chikmagalur", "Chitradurga", "Davanagere", "Dharwad", "Dakshina Kannada", "Gadag", "Gulbarga", "Hassan", "Haveri District", "Kodagu", "Kolar", "Koppal", "Mandya", "Mysore", "Raichur", "Shimoga", "Tumkur", "Udupi", "Uttara Kannada", "Ramanagara", "Chikballapur", "Yadagiri","Others"],
["Kerala" ,"", "Alappuzha", "Ernakulam", "Idukki", "Kollam", "Kannur", "Kasaragod", "Kottayam", "Kozhikode", "Malappuram", "Palakkad", "Pathanamthitta", "Thrissur", "Thiruvananthapuram", "Wayanad","Others"],
["Lakshadweep" ,"","Kavaratti" ,"Others"],
["Madhya Pradesh" ,"","Alirajpur", "Anuppur", "Ashok Nagar", "Balaghat", "Barwani", "Betul", "Bhind", "Bhopal", "Burhanpur", "Chhatarpur", "Chhindwara", "Damoh", "Datia", "Dewas", "Dhar", "Dindori", "Guna", "Gwalior", "Harda", "Hoshangabad", "Indore", "Jabalpur", "Jhabua", "Katni", "Khandwa", "Khargone", "Mandla", "Mandsaur", "Morena", "Narsinghpur", "Neemuch", "Panna", "Rewa", "Rajgarh", "Ratlam", "Raisen", "Sagar", "Satna", "Sehore", "Seoni", "Shahdol", "Shajapur", "Sheopur", "Shivpuri", "Sidhi", "Singrauli", "Tikamgarh", "Ujjain", "Umaria", "Vidisha","Others"],
["Maharashtra" ,"", "Ahmednagar", "Akola", "Amrawati", "Aurangabad", "Bhandara", "Beed", "Buldhana", "Chandrapur", "Dhule", "Gadchiroli", "Gondiya", "Hingoli", "Jalgaon", "Jalna", "Kolhapur", "Latur", "Mumbai City", "Mumbai suburban", "Nandurbar", "Nanded", "Nagpur", "Nashik", "Osmanabad", "Parbhani", "Pune", "Raigad", "Ratnagiri", "Sindhudurg", "Sangli", "Solapur", "Satara", "Thane", "Wardha", "Washim", "Yavatmal","Others"],
["Manipur" ,"", "Bishnupur", "Churachandpur", "Chandel", "Imphal East", "Senapati", "Tamenglong", "Thoubal", "Ukhrul", "Imphal West","Others"],
["Meghalaya" ,"", "East Garo Hills", "East Khasi Hills", "Jaintia Hills", "Ri-Bhoi", "South Garo Hills", "West Garo Hills", "West Khasi Hills","Others"],
["Mizoram" ,"", "Aizawl", "Champhai", "Kolasib", "Lawngtlai", "Lunglei", "Mamit", "Saiha", "Serchhip","Others"],
["Nagaland" ,"", "Dimapur", "Kohima", "Mokokchung", "Mon", "Phek", "Tuensang", "Wokha", "Zunheboto","Others"],
["Orissa" ,"", "Angul", "Boudh", "Bhadrak", "Bolangir", "Bargarh", "Baleswar", "Cuttack", "Debagarh", "Dhenkanal", "Ganjam", "Gajapati", "Jharsuguda", "Jajapur", "Jagatsinghpur", "Khordha", "Kendujhar", "Kalahandi", "Kandhamal", "Koraput", "Kendrapara", "Malkangiri", "Mayurbhanj", "Nabarangpur", "Nuapada", "Nayagarh", "Puri", "Rayagada", "Sambalpur", "Subarnapur", "Sundargarh","Others"],
["Puducherry" ,"", "Karaikal", "Mahe", "Puducherry", "Yanam"	,"Others"],
["Punjab" ,"", "Amritsar", "Bathinda", "Firozpur", "Faridkot", "Fatehgarh Sahib", "Gurdaspur", "Hoshiarpur", "Jalandhar", "Kapurthala", "Ludhiana", "Mansa", "Moga", "Mukatsar", "Nawan Shehar", "Patiala", "Rupnagar", "Sangrur","Others"],
["Rajasthan" ,"", "Ajmer", "Alwar", "Bikaner", "Barmer", "Banswara", "Bharatpur", "Baran", "Bundi", "Bhilwara", "Churu", "Chittorgarh", "Dausa", "Dholpur", "Dungapur", "Ganganagar", "Hanumangarh", "Juhnjhunun", "Jalore", "Jodhpur", "Jaipur", "Jaisalmer", "Jhalawar", "Karauli", "Kota", "Nagaur", "Pali", "Pratapgarh", "Rajsamand", "Sikar", "Sawai Madhopur", "Sirohi", "Tonk", "Udaipur","Others"],
["Sikkim" ," ", "East Sikkim", "North Sikkim", "South Sikkim", "West Sikkim","Others"],
["Tamil Nadu" ,"", "Ariyalur", "Chennai", "Coimbatore", "Cuddalore", "Dharmapuri", "Dindigul", "Erode", "Kanchipuram", "Kanyakumari", "Karur", "Madurai", "Nagapattinam", "The Nilgiris", "Namakkal", "Perambalur", "Pudukkottai", "Ramanathapuram", "Salem", "Sivagangai", "Tiruppur", "Tiruchirappalli", "Theni", "Tirunelveli", "Thanjavur", "Thoothukudi", "Thiruvallur", "Thiruvarur", "Tiruvannamalai", "Vellore", "Villupuram","Others"],
["Tripura" ,"", "Dhalai", "North Tripura", "South Tripura", "West Tripura","Others"],
["Uttarakhand" ,"", "Almora", "Bageshwar", "Chamoli", "Champawat", "Dehradun", "Haridwar", "Nainital", "Pauri Garhwal", "Pithoragharh", "Rudraprayag", "Tehri Garhwal", "Udham Singh Nagar", "Uttarkashi","Others"],
["Uttar Pradesh" ,"", 	"Agra", "Allahabad", "Aligarh", "Ambedkar Nagar", "Auraiya", "Azamgarh", "Barabanki", "Badaun", "Bagpat", "Bahraich", "Bijnor", "Ballia", "Banda", "Balrampur", "Bareilly", "Basti", "Bulandshahr", "Chandauli", "Chitrakoot", "Deoria", "Etah", "Kanshiram Nagar", "Etawah", "Firozabad", "Farrukhabad", "Fatehpur", "Faizabad", "Gautam Buddha Nagar", "Gonda", "Ghazipur", "Gorkakhpur", "Ghaziabad", "Hamirpur", "Hardoi", "Mahamaya Nagar", "Jhansi", "Jalaun", "Jyotiba Phule Nagar", "Jaunpur District", "Kanpur Dehat", "Kannauj", "Kanpur Nagar", "Kaushambi", "Kushinagar", "Lalitpur", "Lakhimpur Kheri", "Lucknow", "Mau", "Meerut", "Maharajganj", "Mahoba", "Mirzapur", "Moradabad", "Mainpuri", "Mathura", "Muzaffarnagar", "Pilibhit", "Pratapgarh", "Rampur", "Rae Bareli", "Saharanpur", "Sitapur", "Shahjahanpur", "Sant Kabir Nagar", "Siddharthnagar", "Sonbhadra", "Sant Ravidas Nagar", "Sultanpur", "Shravasti", "Unnao", "Varanasi","Others"],
["West Bengal" ,"", "Birbhum", "Bankura", "Bardhaman", "Darjeeling", "Dakshin Dinajpur", "Hooghly", "Howrah", "Jalpaiguri", "Cooch Behar", "Kolkata", "Malda", "Midnapore", "Murshidabad", "Nadia", "North 24 Parganas", "South 24 Parganas", "Purulia", "Uttar Dinajpur","Others"]

);
	
	
	
var optionArray = [];
var s1 = document.getElementById(s1);
var s2 = document.getElementById(s2);
s2.innerHTML = "";

   for(var i = 0; i < modelsArray.length; i++){
      if(s1.value == modelsArray[i][0]){
         for(var x = 1; x < modelsArray[i].length; x++){
            optionArray.push(modelsArray[i][x]);
         }
      }
   }
   optionArray.sort();
   for(var option in optionArray){
      var newOption = document.createElement("option");
      newOption.value = optionArray[option];
      newOption.innerHTML = optionArray[option];
      s2.options.add(newOption);
   }
}
	

	
