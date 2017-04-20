function examcity(s1,s2)
{
	var examarray= new Array(
["", ""],
["Andhra Pradesh" ," ", "Hyderabad", "Vishakhapatnam", "vijayawada"],["Assam" ," ", "guwahati"],["Bihar" ," ", "patna"],["Chhattisgarh" ," ", "Raipur"],["Dadraand Nagar Haveli" ," ", "Dadra","Silvassa"],
["Delhi" ," ", "Delhi"],
["Gujarat" ," ", "Ahmadabad"],
["Jammu and Kashmir" ," ", "Srinagar"],
["Jharkhand" ," ", "Ranchi"],
["Karnataka" ," ", "Bangaluru","Mangalore"],
["Kerala" ," ", "Ernakulam"],
["Madhya Pradesh" ," ","Bhopal", "Gwalior"],
["Maharashtra" ," ", "Mumbai", "Nagpur", "Pune"],
["Orissa" ," ", "bhubaneswar"],
["Punjab" ," ", "chandigarh"],
["Rajasthan" ," ", "Jaipur"],
["Tamil Nadu" ," ", "Chennai", "Coimbatore", "Madurai"],
["Uttar Pradesh" ," ", "Allahabad", "Lucknow"],
["uttarakhand" ," ",  "dehradun"],
["West Bengal" ," ", "Kolkata"]
	);
	
	
	var optionArray = [];
var s1 = document.getElementById(s1);
var s2 = document.getElementById(s2);
s2.innerHTML = "";

   for(var i = 0; i < examarray.length; i++){
      if(s1.value == examarray[i][0]){
         for(var x = 1; x < examarray[i].length; x++){
            optionArray.push(examarray[i][x]);
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