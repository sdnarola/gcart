<style type="text/css">
tr{
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
    border-right: none;
    text-align:left;
    max-width: 150px;
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
}

.table>thead>tr>th,
.table>tbody>tr>th,
.table>tfoot>tr>th,
.table>thead>tr>td,
.table>tbody>tr>td,
.table>tfoot>tr>td {
    padding: 12px 15px;
    line-height: 1.5384616;
    vertical-align: top;
}
</style>

   <?php $this->load->view('themes/default/includes/alerts');?>
    <div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="<?php echo base_url(); ?>"><?php _el('home');?></a></li>
                <li class='active'><?php _el('profile');?></li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->
    <div class="col-md-12 col-sm-12 sign-in">
        <center>
        <h4 class=""><?php _el('account_information');?></h4>
        </center>
    <div>
    </div>

                <div class="col-md-6 col-sm-12">
                    <table  class="table table-responsive">
                  <tbody>
                      <tr>
                        <td><?php _el('profile');?></td><td>:</td>
                        <td>
                        <?php
                        if (empty($user['profile_image']))
                        {
                        ?>                                       
                              <a data-lightbox="image-1" data-title="Profile" href="<?php echo base_url() ?>assets/uploads/users/default_user.png"><img class="img-responsive"  style="width:135px; height: 135px;" alt="Image" src="<?php echo base_url() ?>assets/uploads/users/1-user.png" data-echo="<?php echo base_url() ?>assets/uploads/users/default_user.png" /></a>
                       <?php
                       	}
                       	else
                       	{
                       	?>                        
                            <a data-lightbox="image-1" data-title="Profile" href="<?php echo base_url().$user['profile_image']; ?>">
                                <img class="img-responsive"  style="width:135px; height: 135px;" alt="Image" src="<?php echo base_url().$user['profile_image']; ?>" data-echo="<?php echo base_url().$user['profile_image']; ?>" /></a>    
                        <?php
                        	}

                        ?>                   
                        </td>
                      </tr>
                      <tr>
                        <td><?php _el('firstname');?></td>
                        <td>:</td>
                        <td><?php echo ucwords($user['firstname']); ?></td>
                      </tr>
                      <tr>
                        <td><?php _el('lastname');?></td>
                        <td>:</td>
                        <td><?php echo ucwords($user['lastname']); ?></td>
                      </tr>
                     <tr>
                        <td><?php _el('email');?></td>
                        <td>:</td>
                        <td><a href="mailto:<?php echo $user['email']; ?>"><?php echo $user['email']; ?></a></td>
                      </tr>
                      <tr>
                        <td><?php _el('mobile_no');?></td>
                        <td>:</td>
                        <td><a href="tel:<?php echo $user['mobile']; ?>"><?php echo $user['mobile']; ?></a></td>
                      </tr>
                     </tbody>
                </table>
            </div><!--col-md-6-->

            <div class="col-md-6">

                 <table  class="table table-responsive">

                <?php

                	if (!empty($user_address))
                	{
                		foreach ($user_address as $address)
                		{
                		?>
                    <thead>
                       <tr>
                        <th colspan="3"><h3 class="panel-title"><strong><?php _el('personal_address');?></strong></h3></th>
                      </tr>
                    </thead>
                    <tbody>

                      <tr>
                        <td><?php _el('house_village');?></td>
                        <td>:</td>
                        <td><?php echo ucwords($address['house_or_village']); ?></td>
                      </tr>

                       <tr>
                        <td width='35%'><?php _el('street_society');?></td>
                        <td>:</td>
                        <td><?php echo ucwords($address['street_or_society']); ?></td>
                      </tr>

                      <tr>
                        <td width='35%'><?php _el('landmark');?></td>
                        <td>:</td>
                        <td><?php echo ucwords($address['landmark']); ?></td>
                      </tr>

                      <tr>
                        <td><?php _el('city');?></td>
                        <td>:</td>
                        <td><?php if(!empty($address['city_id'])) { echo get_city_name($address['city_id'], 'name');  }?></td>
                      </tr>

                        <tr>
                        <td><?php _el('state');?></td>
                        <td>:</td>
                        <td><?php if(!empty($address['state_id'])) { echo get_state_name($address['state_id'], 'name'); } ?></td>
                      </tr>

                       </tr>
                        <tr>
                        <td><?php _el('pincode');?></td>
                        <td>:</td>
                        <td><?php echo $address['pincode']; ?></td>
                      </tr>

                       </tbody>
                       <?php
                       	}
                       	}

                       ?>
                 </table>
             </div>
            </div><!--row-->

            <hr>

     </div><!--col-md-12-->
    </div><!--row-->
	</div>
</div><!--row-->
</div><!--signin class-->
</div><!--container-->
</div><!--body content-->

