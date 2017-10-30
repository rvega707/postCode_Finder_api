<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>PostCode Finder!</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <style type="text/css">
      .container {
        background-color: #D97333;
        height: 450px;
      }
    </style>

  </head>
  <body>



  <div class="container">
   <img src="PostCode.jpg">
    <h1>Postcode Finder</h1>
      <p>Enter a partial address to get the postcode.</p>

      <div id="message"></div>

      <form>
  <fieldset class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" id="address" placeholder="Enter partial address">
  </fieldset>

  <button id="finderCode" class="btn btn-primary">Submit</button>
</form>
</div>



    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript">


    $("#finderCode").click(function(e){
      e.preventDefault();
      $.ajax({

        url: "https://maps.googleapis.com/maps/api/geocode/json?address=" + encodeURIComponent($("#address").val()) + "&key=AIzaSyAmPbXIi9MsBWyiG54Qq2nt1rekQJVHIPA",
        type: "GET",
        success: function(data){

          if(data["status"] != "OK"){

            $("#message").html('<div class="alert alert-warning" role="alert"><strong>Postcode could not be found</strong> - Please try again!</div>')
          } else {
          $.each(data["results"][0]["address_components"], function(type, value){

            if (value["types"] == "postal_code"){
            

              $("#message").html('<div class="alert alert-success" role="alert"><strong>Postcode found!</strong> The postcode is ' + value["long_name"] + '</div>')
              
            }

          });
        }
        }


      })
      });
    </script>
  </body>
</html>