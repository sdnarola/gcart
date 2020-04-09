 <div>
        <h3>Congratulations, the image has successfully been uploaded</h3>
        <p>Click here to view the image you just uploaded
            <?=anchor('uploads/'.$file['file_name'], 'View My Image!')?><br>
            <?=anchor('uploads/', 'View All Image!')?>

           

        </p>

        <p>
            <?php echo anchor('admin/products/add', 'Go back to Image Upload'); ?>
        </p>
    </div>