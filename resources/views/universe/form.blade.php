{{-- <!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #3e8e41;
}

#myInput {
  box-sizing: border-box;
  background-image: url('searchicon.png');
  background-position: 14px 12px;
  background-repeat: no-repeat;
  font-size: 16px;
  padding: 14px 20px 12px 45px;
  border: none;
  border-bottom: 1px solid #ddd;
}

#myInput:focus {outline: 3px solid #ddd;}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f6f6f6;
  min-width: 230px;
  overflow: auto;
  border: 1px solid #ddd;
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>
</head>
<body>

<h2>Search/Filter Dropdown</h2>
<p>Click on the button to open the dropdown menu, and use the input field to search for a specific dropdown link.</p>

<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Dropdown</button>
  <div id="myDropdown" class="dropdown-content">
    <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
    <a href="#about">About</a>
    <a href="#base">Base</a>
    <a href="#blog">Blog</a>
    <a href="#contact">Contact</a>
    <a href="#custom">Custom</a>
    <a href="#support">Support</a>
    <a href="#tools">Tools</a>
  </div>
</div>

<script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}
</script>

</body>
</html>
 --}}








<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<form action="">

    <select name="country" id="country">
        <option value="">--select option--</option>
        @foreach ($countries as $country )
        @php
            $country = (array)$country
        @endphp
        <option value="{{ $country['country_name'] }}">{{ $country['country_name'] }}</option>


        @endforeach
    </select>

    <br><br>
    <select name="state" id="state">
        <option value="">--select option--</option>
        {{-- <option value="{{ $country[' state_name'] }}">{{ $country[' state_name'] }}</option> --}}

    </select>

    <br><br>
    <select name="city" id="city">
        <option value="">--select option--</option>
    </select>

   <input type="hidden" name="token" id="token" value="{{ $token }}">

</form>

<script>

    $(document).ready(function(){
        $("#country").change(function(){
        var country = $(this).val();
        if(country == ''){
            country = 'null';
        }
        var data = {
            token:$('#token').val(),
            country:country

        }

        $.ajax({
            url:"{{ route('states') }}",
            type:"GET",
            data:data,
            success:function(response){
                // console.log(response);
               var states = JSON.parse(response);
               var html = '  <option value="">--select option--</option>';
               if(states.length > 0){
                for (let i= 0; i<states.length; i++){
                    html += ' <option value=" '+states[i]['state_name']+'" > \
                        '+states[i]['state_name']+'\
                        ';
                }

               }
               else{
                $("#city").html(html);
               }
               $("#state").html(html);
            }

        });


         });

         //city fetch

         $("#state").change(function(){
        var state = $(this).val();
        if(state == ''){
            state = 'null';
        }
        var data = {
            token:$('#token').val(),
            state:state

        }

        $.ajax({
            url:"{{ route('cities') }}",
            type:"GET",
            data:data,
            success:function(response){
                // console.log(response);
               var cities = JSON.parse(response);
               var html = '  <option value="">--select option--</option>';
               if(cities.length > 0){
                for (let i= 0; i<cities.length; i++){
                    html += ' <option value=" '+cities[i]['city_name']+'" > \
                        '+cities[i]['city_name']+'\
                        ';
                }

               }
               $("#city").html(html);
            }

        });


         });

    });

</script>
