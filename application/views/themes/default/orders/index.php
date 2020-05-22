<style type="text/css">
tr{
  border: 1px solid #ddd;
  margin-top: 3px;
  padding-top: 3px;
  border-collapse: collapse; 
  line-height: 0px;
   min-height: 25px;
   height: 25px;
  border: none;
   }
td{
    margin-top: 3px;
    padding-top: 3px;
      padding: 20px;
    font-size: 15px;
    color: #666;
    border-right: none;
    text-align:left;  
  }
table, td, th {  
  text-align: left;

}

table {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
}
th {
    padding: 20px;
    font-size: 15px;
    border: 1px solid #ddd;
    background: #999;text-align: left;color:#FFF;
}
.star-rating-box{ background-color:#eeee,  
}

.table {width: 100%;border-spacing: initial;margin: 20px 0px;word-break: break-word;table-layout: auto;line-height:1.8em;color:#333;}
.table th {background: #999;padding: 5px;text-align: left;color:#FFF;}
.table td {border-bottom: #f0f0f0 1px solid;background-color: #ffffff;padding: 5px;}
.table td div.feed_title{text-decoration: none;color:#00d4ff;font-weight:bold;}
.table ul{margin:0;padding:0;}
.table li{cursor:pointer;list-style-type: none;display: inline-block;color: #F0F0F0;text-shadow: 0 0 1px #666666;font-size:20px;}
.table .highlight, .table .selected {color:#F4B30A;text-shadow: 0 0 1px #F48F0A;}
.form-popup {
  display: none; 
  border: 3px solid #f1f1f1;
  z-index: 9;
}
</style>  

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="<?php echo base_url(); ?>"><?php _el('home'); ?></a></li>
                <li class='active'><?php _el('orders');?></li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
</head>
<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->                
    <div class="col-md-12 col-sm-12 sign-in">
        <center>
        <h4 class=""><?php _el('my_orders');?></h4>       
        </center>
    <div>
    </div>

    <div class="row">
      <div class="col-md-12">
            <!-- Panel -->          
        <div class="row">
        <?php 
        if(empty($orders)){
        ?>
        <br><label class="info-title"><?php _el('no_order_yet_!');?></label><br><br>
        <?php
        }
      foreach ($orders as $order_value)
      { 
      ?>
      <div class="col-md-6 col-sm-12">  
      <table class="table table-responsive">
        <thead>
          <tr>
            <th width="40%">#<?php echo '&nbsp&nbsp'.$order_value['order_number'];?><br><?php echo date('jS F Y', strtotime($order_value['order_date'])); ?>
            </th>
            <th><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span><?php echo ".&nbsp".$order_value['grand_total'];?><br><?php echo time_to_words($order_value['order_date'])."&nbspago";?>
            </th>
          </tr>
        </thead>
        <tbody>
        <?php 
        if($order_items){
        foreach ($order_items as $order_info) 
        {
            if($order_info['order_id'] == $order_value['id'])
            { 
            ?>  

            <tr>                          
                <td> <?php
                if ($order_info['vendor_status'] == 1){
                echo '<span class="label label-info label-rounded">Processing</span>';}
                elseif ($order_info['vendor_status'] == 2){
                echo '<span class="label label-success label-rounded">Completed</span>';}
                elseif ($order_info['vendor_status'] == 3){
                echo '<span class="label label-danger label-rounded">Declined</span>';}
                else{
                echo '<span class="label label-warning label-rounded">Pending</span>';}
                ?></td>
                <td><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span><?php  echo $order_info['total_amount'];?></td>
            </tr>
            <tr>
                  <td> <a href="<?= site_url('Products/'.$order_info['slug']); ?>"><img class="img-circle" id="blah" src="<?php echo base_url() .$order_info['thumb_image'];?>" alt="image" height=64 width=100 /></a></td>
                  <td><?php echo ucwords($order_info['name']); ?> 
                  <?php  
                   $rating_val = get_star_rating($order_info['product_id']);
                   if(empty($rating_val))
                   {
                    $rating_val=1;
                   }
                  ?>
                      <div id="product-<?php echo $order_info['product_id']; ?>" class="star-rating-box">
                      <input type="hidden" name="rating" id="rating" value="<?php echo $rating_val; ?>" />
                      <ul  onMouseOut="resetRating(<?php echo $order_info['product_id']; ?>);">
                      <?php
                      for ($i = 1; $i <= 5; $i ++) {
                      $selected = "";
                      if (! empty($rating_val) && $i <= $rating_val) {
                          $selected = "selected";
                      }
                      ?>
                       <li class='<?php echo $selected; ?>'  onmouseover="highlightStar(this,<?php echo $order_info['product_id']; ?>);" onmouseout="removeHighlight(<?php echo $order_info['product_id']; ?>);" onClick="addRating(this,<?php echo $order_info['product_id']; ?>);">★</li>  
                        <?php }  ?>
                    <a href="javascript:void(0)" title="review" onclick="return openForm(<?php echo $order_info['product_id']; ?>)">  <?php _el('write_review');?></a>
                      <div class="form-popup" id="review_form_<?php echo $order_info['product_id']; ?>" method="post">
                        
                           <textarea name="comment" id="comment_<?php echo $order_info['product_id']; ?>" placeholder="Enter your review here.." required></textarea>

                          <br>
                          <button type="submit"  onclick="submit_review(<?php echo $order_info['product_id']; ?>)" class="btn btn-primary"><?php _el('send');?></button>
                          <button type="button" class="btn btn-danger cancel" onclick="closeForm(<?php echo $order_info['product_id']; ?>)"><?php _el('close');?></button>
                        </form>
                      </div>
                      </ul>
                       <div id="star-rating-count-<?php echo $order_info['product_id']; ?>" class="star-rating-count">
                        </div>
                       </div>                   
                     </td>                  
             </tr> 
             <tr style="border-bottom: 1px solid #ddd;">
                  <td><b><a title="<?php _el('buy_it_again')?>" href="<?= site_url('Products/'.$order_info['slug']); ?>"><u><?php _el('buy_it_again');?></u></a></b></td><td><b>  <a  title="<?php _el('details')?>" href="<?php echo site_url('orders/details/'.$order_info['order_id']); ?>" ><u><?php _el('View_details');?></u> </a></b></td>
            </tr>  
                                    
          <?php
                }
           }  
        }
           ?>   
  </tbody>
</table>
                          
  </div>
  <?php } ?>
  </div>
</div>
</div>
</div>
</div>
</div>
</div><!--container-->
</div><!--body-content-->
  
 <script>
  function highlightStar(obj, id) {
    removeHighlight(id);
    $('.table #product-' + id + ' li').each(function(index) {
      $(this).addClass('highlight');
      if (index == $('.table #product-' + id + ' li').index(obj)) {
        return false;
      }
    });
  }

  function removeHighlight(id) {
    $('.table #product-' + id + ' li').removeClass('selected');
    $('.table #product-' + id + ' li').removeClass('highlight');
  }

  function addRating(obj, id) {
    $('.table #product-' + id + ' li').each(function(index) {
      $(this).addClass('selected');
      $('#product-' + id + ' #rating').val((index + 1));
      if (index == $('.table #product-' + id + ' li').index(obj)) {
        return false;
      }

    });
    
    var ratings=$('#product-' + id + ' #rating').val();
    $.ajax({
          url:BASE_URL+'review/add_review',
            type: 'POST',
            data: {products_id: id,star: ratings},
        async: false,
        success: function(msg)
        {
          if(msg)
          {
              jGrowlAlert(msg, 'success');

          }
          else
          {
             msg = 'Not submitted review.';
             jGrowlAlert(msg, 'danger');

          }

        }
    });
  
  }

  function resetRating(id) {
    if ($('#product-' + id + ' #rating').val() != 0) {
      $('.table #product-' + id + ' li').each(function(index) {
        $(this).addClass('selected');
        if ((index + 1) == $('#product-' + id + ' #rating').val()) {
          return false;
        }
      });
    }
  }

function openForm(id) {
   document.getElementById('review_form_'+id).style.display = "block";    
}

function closeForm(id) {
  document.getElementById("review_form_"+id).style.display = "none";
}
function submit_review(id){
      var review = $('#comment_'+id+'').val();
      
  if(review){
    $.ajax({
          url:BASE_URL+'review/add_review',
            type: 'POST',
            data: {products_id: id,review: review},
        async: false,
        success: function(msg)
        {
          if(msg)
          {
                jGrowlAlert(msg, 'success');

          }
          else
          {
             msg = 'Not submitted review.';
             jGrowlAlert(msg, 'danger');

          }

        }
    });
  }
  }
</script>