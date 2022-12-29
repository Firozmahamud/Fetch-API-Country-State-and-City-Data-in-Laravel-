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

        //state fetch
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
