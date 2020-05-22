// jQuery(document).ready(function(){

function time_counter(end_date,id)
{
  var result = '';
  // Set the date we're counting down to
  var countDownDate = new Date(end_date).getTime();

  // Update the count down every 1 second
  var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);



    // If the count down is over, write some text
    if (distance > 0)
    {
        if(days > 0)
        {
            result += '<div class="box-wrapper">';
            result += '<div class="date box"> <span class="key" id="days">'+days+'</span> <span class="value">DAYS</span> </div>';
            result += '</div>';
        }

        result += '<div class="box-wrapper">';
        result += '<div class="hour box"> <span class="key" id="hours">'+hours+'</span> <span class="value">HRS</span> </div>';
        result += '</div>';
        result += '<div class="box-wrapper">';
        result += '<div class="minutes box"> <span class="key" id="minutes">'+minutes+'</span> <span class="value">MINS</span> </div>';
        result += '</div>';
        result += '<div class="box-wrapper hidden-md">';
        result += '<div class="seconds box"> <span class="key" id="seconds">'+seconds+'</span> <span class="value">SEC</span> </div>';
        result += '</div>';
        }

        $('#time_counter_'+id).html(result);
        result='';
  }, 1000);
}

// });
